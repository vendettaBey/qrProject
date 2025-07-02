<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class CreateSuperAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:super-admin {email} {password}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a super admin user';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Create or get the super_admin role
        $role = Role::firstOrCreate(['name' => 'super_admin']);

        // Create the user
        $user = User::create([
            'name' => 'Super Admin',
            'email' => $this->argument('email'),
            'password' => Hash::make($this->argument('password')),
            'is_active' => true,
            'email_verified_at' => now(),
        ]);

        // Assign the role
        $user->assignRole($role);

        $this->info('Super admin user created successfully!');
    }
}
