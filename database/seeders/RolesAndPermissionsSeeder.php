<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'create products']);
        Permission::create(['name' => 'update products']);
        Permission::create(['name' => 'delete products']);
        Permission::create(['name' => 'create product categories']);
        Permission::create(['name' => 'update product categories']);
        Permission::create(['name' => 'delete product categories']);
        Permission::create(['name' => 'access user management']);

        // create roles and assign created permissions

        // Administrator Role
        $adminRole = Role::create(['name' => 'Administrator']);
        $adminRole->givePermissionTo([
            'create products',
            'update products',
            'delete products',
            'create product categories',
            'update product categories',
            'delete product categories',
            'access user management'
        ]);

        // User Role
        $userRole = Role::create(['name' => 'User']);
        $userRole->givePermissionTo([
            'create products',
            'update products',
            'delete products',
            'create product categories',
            'update product categories',
            'delete product categories',
        ]);
    }
}
