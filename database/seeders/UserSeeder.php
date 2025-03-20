<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Create a default Super Admin
        $user = User::create([
            'name'     => 'Super Admin',
            'email'    => 'admin@example.com',
            'password' => bcrypt('password'), // Use a strong password in production
        ]);

        // Assign the super-admin role to this user
        $user->assignRole('super-admin');
    }
}
