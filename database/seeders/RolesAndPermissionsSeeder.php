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
        Permission::create(['name' => 'roles-and-permission-create']);
        Permission::create(['name' => 'roles-and-permission-read']);
        Permission::create(['name' => 'roles-and-permission-update']);
        Permission::create(['name' => 'roles-and-permission-delete']);

        Permission::create(['name' => 'faculty-profile-create']);
        Permission::create(['name' => 'faculty-profile-read']);
        Permission::create(['name' => 'faculty-profile-update']);
        Permission::create(['name' => 'faculty-profile-delete']);

        Permission::create(['name' => 'curriculum-create']);
        Permission::create(['name' => 'curriculum-read']);
        Permission::create(['name' => 'curriculum-update']);
        Permission::create(['name' => 'curriculum-delete']);

        Permission::create(['name' => 'student-profile-create']);
        Permission::create(['name' => 'student-profile-read']);
        Permission::create(['name' => 'student-profile-update']);
        Permission::create(['name' => 'student-profile-delete']);

        Permission::create(['name' => 'faculty-staff-create']);
        Permission::create(['name' => 'faculty-staff-read']);
        Permission::create(['name' => 'faculty-staff-update']);
        Permission::create(['name' => 'faculty-staff-delete']);

        Permission::create(['name' => 'student-dev-create']);
        Permission::create(['name' => 'student-dev-read']);
        Permission::create(['name' => 'student-dev-update']);
        Permission::create(['name' => 'student-dev-delete']);

        Permission::create(['name' => 'research-ext-create']);
        Permission::create(['name' => 'research-ext-read']);
        Permission::create(['name' => 'research-ext-update']);
        Permission::create(['name' => 'research-ext-delete']);

        Permission::create(['name' => 'linkages-create']);
        Permission::create(['name' => 'linkages-read']);
        Permission::create(['name' => 'linkages-update']);
        Permission::create(['name' => 'linkages-delete']);

        Permission::create(['name' => 'infra-dev-create']);
        Permission::create(['name' => 'infra-dev-read']);
        Permission::create(['name' => 'infra-dev-update']);
        Permission::create(['name' => 'infra-dev-delete']);

        Permission::create(['name' => 'events-accomplish-create']);
        Permission::create(['name' => 'events-accomplish-read']);
        Permission::create(['name' => 'events-accomplish-update']);
        Permission::create(['name' => 'events-accomplish-delete']);


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
