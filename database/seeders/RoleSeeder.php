<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    public function run()
    {
        // Create roles for the system
        Role::create(['name' => 'super-admin']);
        Role::create(['name' => 'sales-manager']);
        Role::create(['name' => 'sales-representative']);
        Role::create(['name' => 'service-manager']);
        Role::create(['name' => 'service-technician']);
        Role::create(['name' => 'inventory-manager']);
        Role::create(['name' => 'customer']);
    }
}
