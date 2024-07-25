<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\CountrySeeder;
use Database\Seeders\ProgramSeeder;
use Database\Seeders\DepartmentSeeder;
use Database\Seeders\AcademicRankSeeder;
use Database\Seeders\NatureOfAppointmentSeeder;
use Database\Seeders\RolesAndPermissionsSeeder;
use Database\Seeders\EducationalAttainmentSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RolesAndPermissionsSeeder::class,
            ProgramSeeder::class,
            CountrySeeder::class,
            AcademicRankSeeder::class,
            NatureOfAppointmentSeeder::class,
            EducationalAttainmentSeeder::class,
            DepartmentSeeder::class,
        ]);
    }
}
