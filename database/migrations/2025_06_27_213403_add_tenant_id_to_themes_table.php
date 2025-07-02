<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('themes', function (Blueprint $table) {
            $table->foreignId('tenant_id')->nullable()->after('id')->constrained('tenants')->nullOnDelete();
            $table->string('folder_name')->nullable()->after('description');
            $table->string('thumbnail')->nullable()->after('folder_name');

            // Gereksiz alanları kaldır
            $table->dropColumn(['preview_image', 'is_premium', 'price', 'config', 'version']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('themes', function (Blueprint $table) {
            $table->dropForeign(['tenant_id']);
            $table->dropColumn('tenant_id');
            $table->dropColumn('folder_name');
            $table->dropColumn('thumbnail');

            // Kaldırılan alanları geri ekle
            $table->string('preview_image')->nullable();
            $table->boolean('is_premium')->default(false);
            $table->decimal('price', 8, 2)->nullable();
            $table->json('config')->nullable();
            $table->string('version')->nullable();
        });
    }
};
