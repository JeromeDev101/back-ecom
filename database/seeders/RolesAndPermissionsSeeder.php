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
        Permission::create(['name' => 'read roles and permission']);
        Permission::create(['name' => 'create roles and permission']);
        Permission::create(['name' => 'update roles and permission']);
        Permission::create(['name' => 'delete roles and permission']);

        Permission::create(['name' => 'read faculty profile']);
        Permission::create(['name' => 'create faculty profile']);
        Permission::create(['name' => 'update faculty profile']);
        Permission::create(['name' => 'delete faculty profile']);

        Permission::create(['name' => 'read curriculum']);
        Permission::create(['name' => 'create curriculum']);
        Permission::create(['name' => 'update curriculum']);
        Permission::create(['name' => 'delete curriculum']);

        Permission::create(['name' => 'read student profile']);
        Permission::create(['name' => 'create student profile']);
        Permission::create(['name' => 'update student profile']);
        Permission::create(['name' => 'delete student profile']);

        Permission::create(['name' => 'read faculty staff']);
        Permission::create(['name' => 'create faculty staff']);
        Permission::create(['name' => 'update faculty staff']);
        Permission::create(['name' => 'delete faculty staff']);

        Permission::create(['name' => 'read student dev']);
        Permission::create(['name' => 'create student dev']);
        Permission::create(['name' => 'update student dev']);
        Permission::create(['name' => 'delete student dev']);

        Permission::create(['name' => 'read research ext']);
        Permission::create(['name' => 'create research ext']);
        Permission::create(['name' => 'update research ext']);
        Permission::create(['name' => 'delete research ext']);

        Permission::create(['name' => 'read linkages']);
        Permission::create(['name' => 'create linkages']);
        Permission::create(['name' => 'update linkages']);
        Permission::create(['name' => 'delete linkages']);

        Permission::create(['name' => 'read infra dev']);
        Permission::create(['name' => 'create infra dev']);
        Permission::create(['name' => 'update infra dev']);
        Permission::create(['name' => 'delete infra dev']);

        Permission::create(['name' => 'read events accomplish']);
        Permission::create(['name' => 'create events accomplish']);
        Permission::create(['name' => 'update events accomplish']);
        Permission::create(['name' => 'delete events accomplish']);


        // create roles and assign created permissions

        // Administrator Role
        $adminRole = Role::create(['name' => 'Administrator']);
        $adminRole->givePermissionTo([
            'roles-and-permission-create',
            'roles-and-permission-read',
            'roles-and-permission-update',
            'roles-and-permission-delete',

            'faculty-profile',
            'faculty-profile',
            'faculty-profile',
            'faculty-profile',

            'curriculum-create',
            'curriculum-read',
            'curriculum-update',
            'curriculum-delete',

            'student-profile-create',
            'student-profile-read',
            'student-profile-update',
            'student-profile-delete',

            'faculty-staff-create',
            'faculty-staff-read',
            'faculty-staff-update',
            'faculty-staff-delete',

            'student-dev-create',
            'student-dev-read',
            'student-dev-update',
            'student-dev-delete',

            'research-ext-create',
            'research-ext-read',
            'research-ext-update',
            'research-ext-delete',

            'linkages-create',
            'linkages-read',
            'linkages-update',
            'linkages-delete',

            'infra-dev-create',
            'infra-dev-read',
            'infra-dev-update',
            'infra-dev-delete',

            'events-accomplish-create',
            'events-accomplish-read',
            'events-accomplish-update',
            'events-accomplish-delete',
        ]);

        // Dean Role
        $deanRole = Role::create(['name' => 'Dean']);
        $deanRole->givePermissionTo([
            'read faculty profile',
            'create faculty profile',
            'update faculty profile',
            'delete faculty profile',

            'read curriculum',
            'create curriculum',
            'update curriculum',
            'delete curriculum',

            'read student profile',
            'create student profile',
            'update student profile',
            'delete student profile',

            'read faculty staff',
            'create faculty staff',
            'update faculty staff',
            'delete faculty staff',

            'read student dev',
            'create student dev',
            'update student dev',
            'delete student dev',

            'read research ext',
            'create research ext',
            'update research ext',
            'delete research ext',

            'read linkages',
            'create linkages',
            'update linkages',
            'delete linkages',

            'read infra dev',
            'create infra dev',
            'update infra dev',
            'delete infra dev',

            'read events accomplish',
            'create events accomplish',
            'update events accomplish',
            'delete events accomplish',
        ]);


        // Chairperson Role
        $chairpersonRole = Role::create(['name' => 'Chairperson']);
        $chairpersonRole->givePermissionTo([
            'read faculty profile',
            'create faculty profile',
            'update faculty profile',
            'delete faculty profile',

            'read curriculum',
            'create curriculum',
            'update curriculum',
            'delete curriculum',

            'read student profile',
            'create student profile',
            'update student profile',
            'delete student profile',

            'read faculty staff',
            'create faculty staff',
            'update faculty staff',
            'delete faculty staff',

            'read student dev',
            'create student dev',
            'update student dev',
            'delete student dev',

            'read research ext',
            'create research ext',
            'update research ext',
            'delete research ext',

            'read linkages',
            'create linkages',
            'update linkages',
            'delete linkages',

            'read infra dev',
            'create infra dev',
            'update infra dev',
            'delete infra dev',

            'read events accomplish',
            'create events accomplish',
            'update events accomplish',
            'delete events accomplish',
        ]);

        // Faculty Role
        $facultyRole = Role::create(['name' => 'Faculty']);
        $facultyRole->givePermissionTo([
            'read faculty profile',
            'create faculty profile',
            'update faculty profile',
            'delete faculty profile',
        ]);

    }
}
