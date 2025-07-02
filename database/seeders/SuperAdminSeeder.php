<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Super admin rolünü oluştur
        $superAdminRole = Role::firstOrCreate(
            ['name' => 'super_admin'],
            [
                'name' => 'super_admin',
                'guard_name' => 'web'
            ]
        );

        // Super admin kullanıcısını oluştur
        $user = User::create([
            'name' => 'Süper Admin',
            'email' => 'admin@qrmenu.com',
            'password' => Hash::make('password'),
            'is_active' => true,
            'email_verified_at' => now(),
        ]);

        // Kullanıcıya super_admin rolünü ata
        $user->assignRole($superAdminRole);
    }
}
