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
        // создаём роли
        Role::firstOrCreate(['name' => 'admin']);
        Role::firstOrCreate(['name' => 'user']);

        // создаём администратора, если ещё нет
        $adminEmail = 'admin@example.com';
        $admin = User::where('email', $adminEmail)->first();
        if (! $admin) {
            $admin = User::create([
                'name' => 'Administrator',
                'email' => $adminEmail,
                'password' => Hash::make('password'), // смените пароль после входа
            ]);
            $admin->assignRole('admin');
        }
    }
}
