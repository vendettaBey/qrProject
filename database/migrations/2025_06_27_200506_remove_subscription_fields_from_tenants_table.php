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
        Schema::table('tenants', function (Blueprint $table) {
            $table->dropColumn(['status', 'settings', 'trial_ends_at', 'subscription_ends_at']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tenants', function (Blueprint $table) {
            $table->enum('status', ['active', 'inactive', 'suspended'])->default('active')->after('address');
            $table->json('settings')->nullable()->after('status');
            $table->timestamp('trial_ends_at')->nullable()->after('settings');
            $table->timestamp('subscription_ends_at')->nullable()->after('trial_ends_at');
        });
    }
};
