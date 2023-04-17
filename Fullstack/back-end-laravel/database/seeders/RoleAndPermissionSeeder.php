<?php

namespace Database\Seeders;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleAndPermissionSeeder extends Seeder
{
    public function run()
    {
        Permission::create(['name' => 'create-users']);
        Permission::create(['name' => 'delete-users']);
        
        Permission::create(['name' => 'view-users']);
        Permission::create(['name' => 'edit-users']);
        

        $adminRole = Role::create(['name' => 'Admin']);
        $userRole = Role::create(['name' => 'User']);

        $adminRole->givePermissionTo([
            'create-users',
            'delete-users',   
        ]);
        $userRole->givePermissionTo([
            'view-users',
            'edit-users',
        ]);
    }
}