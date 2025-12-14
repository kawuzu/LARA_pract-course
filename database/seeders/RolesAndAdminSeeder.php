<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class RolesAndAdminSeeder extends Seeder
{
    public function run()
    {
        Role::firstOrCreate(['name' => 'admin']);
        Role::firstOrCreate(['name' => 'user']);

        $adminEmail = 'admin@example.com';
        $admin = User::where('email', $adminEmail)->first();
        if (! $admin) {
            $admin = User::create([
                'name' => 'Administrator',
                'email' => $adminEmail,
                'password' => Hash::make('password'),
            ]);
            $admin->assignRole('admin');
        }
    }
}
