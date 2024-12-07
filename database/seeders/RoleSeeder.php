<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $superAdminRole = Role::create([
            'name' => 'superAdmin'
        ]);

        $adminRole = Role::create([
            'name' => 'admin'
        ]);

        $customerRole = Role::create([
            'name'=> 'customer'
        ]);

        $superAdminUser = User::Create([
            'role_id' => 1,
            'name'=> 'Super Admin',
            'email' => 'superadmin@gmail.com',
            'password' => bcrypt('z'),
        ]);

        $adminUser = User::Create([
            'role_id' => 2,
            'name'=> 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('z'),
        ]);

        $customerUser = User::Create([
            'role_id' => 3,
            'name'=> 'RizalRandyy',
            'email' => 'rizalrandy@gmail.com',
            'password' => bcrypt('z'),
        ]);

        $superAdminUser->assignRole($superAdminRole);
        $adminUser->assignRole($adminRole);
        $customerUser->assignRole($customerRole);
    }
}
