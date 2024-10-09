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
        Permission::create(['name' => 'roles-and-permission-create', 'group_name' => 'Roles and Permissions']);
        Permission::create(['name' => 'roles-and-permission-read', 'group_name' => 'Roles and Permissions']);
        Permission::create(['name' => 'roles-and-permission-update', 'group_name' => 'Roles and Permissions']);
        Permission::create(['name' => 'roles-and-permission-delete', 'group_name' => 'Roles and Permissions']);

        Permission::create(['name' => 'faculty-profile-create', 'group_name' => 'Faculty Profile']);
        Permission::create(['name' => 'faculty-profile-read', 'group_name' => 'Faculty Profile']);
        Permission::create(['name' => 'faculty-profile-update', 'group_name' => 'Faculty Profile']);
        Permission::create(['name' => 'faculty-profile-delete', 'group_name' => 'Faculty Profile']);

        Permission::create(['name' => 'curriculum-create', 'group_name' => 'Curriculum']);
        Permission::create(['name' => 'curriculum-read', 'group_name' => 'Curriculum']);
        Permission::create(['name' => 'curriculum-update', 'group_name' => 'Curriculum']);
        Permission::create(['name' => 'curriculum-delete', 'group_name' => 'Curriculum']);

        Permission::create(['name' => 'student-profile-create', 'group_name' => 'Student Profile']);
        Permission::create(['name' => 'student-profile-read', 'group_name' => 'Student Profile']);
        Permission::create(['name' => 'student-profile-update', 'group_name' => 'Student Profile']);
        Permission::create(['name' => 'student-profile-delete', 'group_name' => 'Student Profile']);

        Permission::create(['name' => 'faculty-staff-create', 'group_name' => 'Faculty Staff']);
        Permission::create(['name' => 'faculty-staff-read', 'group_name' => 'Faculty Staff']);
        Permission::create(['name' => 'faculty-staff-update', 'group_name' => 'Faculty Staff']);
        Permission::create(['name' => 'faculty-staff-delete', 'group_name' => 'Faculty Staff']);

        Permission::create(['name' => 'student-dev-create', 'group_name' => 'Student Development']);
        Permission::create(['name' => 'student-dev-read', 'group_name' => 'Student Development']);
        Permission::create(['name' => 'student-dev-update', 'group_name' => 'Student Development']);
        Permission::create(['name' => 'student-dev-delete', 'group_name' => 'Student Development']);

        Permission::create(['name' => 'research-ext-create', 'group_name' => 'Research']);
        Permission::create(['name' => 'research-ext-read', 'group_name' => 'Research']);
        Permission::create(['name' => 'research-ext-update', 'group_name' => 'Research']);
        Permission::create(['name' => 'research-ext-delete', 'group_name' => 'Research']);

        Permission::create(['name' => 'linkages-create', 'group_name' => 'Linkages']);
        Permission::create(['name' => 'linkages-read', 'group_name' => 'Linkages']);
        Permission::create(['name' => 'linkages-update', 'group_name' => 'Linkages']);
        Permission::create(['name' => 'linkages-delete', 'group_name' => 'Linkages']);

        Permission::create(['name' => 'infra-dev-create', 'group_name' => 'Infrastructure and Development']);
        Permission::create(['name' => 'infra-dev-read', 'group_name' => 'Infrastructure and Development']);
        Permission::create(['name' => 'infra-dev-update', 'group_name' => 'Infrastructure and Development']);
        Permission::create(['name' => 'infra-dev-delete', 'group_name' => 'Infrastructure and Development']);

        Permission::create(['name' => 'events-accomplish-create', 'group_name' => 'Events and Accomplishments']);
        Permission::create(['name' => 'events-accomplish-read', 'group_name' => 'Events and Accomplishments']);
        Permission::create(['name' => 'events-accomplish-update', 'group_name' => 'Events and Accomplishments']);
        Permission::create(['name' => 'events-accomplish-delete', 'group_name' => 'Events and Accomplishments']);


        // create roles and assign created permissions

        // Administrator Role
        $adminRole = Role::create(['name' => 'Administrator']);
        $adminRole->givePermissionTo([
            'roles-and-permission-create',
            'roles-and-permission-read',
            'roles-and-permission-update',
            'roles-and-permission-delete',

            'faculty-profile-create',
            'faculty-profile-read',
            'faculty-profile-update',
            'faculty-profile-delete',

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
            'faculty-profile-create',
            'faculty-profile-read',
            'faculty-profile-update',
            'faculty-profile-delete',

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


        // Chairperson Role
        $chairpersonRole = Role::create(['name' => 'Chairperson']);
        $chairpersonRole->givePermissionTo([
            'faculty-profile-create',
            'faculty-profile-read',
            'faculty-profile-update',
            'faculty-profile-delete',

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

        // Faculty Role
        $facultyRole = Role::create(['name' => 'Faculty']);
        $facultyRole->givePermissionTo([
            'faculty-profile-create',
            'faculty-profile-read',
            'faculty-profile-update',
            'faculty-profile-delete',
        ]);

    }
}
