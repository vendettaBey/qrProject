<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class DeanAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Super admin rolünü oluştur veya bul
        $superAdminRole = Role::firstOrCreate(
            ['name' => 'super_admin'],
            [
                'name' => 'super_admin',
                'guard_name' => 'web'
            ]
        );

        // Dean Admin kullanıcısını oluştur
        $user = User::create([
            'name' => 'Dean Admin',
            'email' => 'dean@qr.com',
            'password' => Hash::make('test1234'),
            'is_active' => true,
            'email_verified_at' => now(),
        ]);

        // Kullanıcıya super_admin rolünü ata
        $user->assignRole($superAdminRole);

        $this->command->info('Dean Admin kullanıcısı başarıyla oluşturuldu!');
    }
}
