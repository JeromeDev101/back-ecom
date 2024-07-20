<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\EducationalAttainment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EducationalAttainmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        EducationalAttainment::create(['name' => 'Ph.D']);
        EducationalAttainment::create(['name' => 'Ph.D Units']);
        EducationalAttainment::create(['name' => 'MA/MS Units']);
        EducationalAttainment::create(['name' => 'BS/BA']);
    }
}
