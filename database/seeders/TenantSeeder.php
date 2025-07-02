<?php

namespace Database\Seeders;

use App\Models\Tenant;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class TenantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Customer rolünü oluştur
        $customerRole = Role::firstOrCreate(
            ['name' => 'customer'],
            [
                'name' => 'customer',
                'guard_name' => 'web'
            ]
        );

        // 10 adet müşteri oluştur
        Tenant::factory(10)->create()->each(function ($tenant) use ($customerRole) {
            // Her müşteri için bir kullanıcı oluştur
            $user = User::create([
                'tenant_id' => $tenant->id,
                'name' => $tenant->name . ' Yöneticisi',
                'email' => 'user_' . $tenant->id . '@' . strtolower(str_replace(' ', '', $tenant->name)) . '.com',
                'password' => Hash::make('password'), // Tüm kullanıcılar için aynı şifre
                'is_active' => $tenant->is_active,
            ]);

            // Kullanıcıya customer rolünü ata
            $user->assignRole($customerRole);
        });
    }
}
