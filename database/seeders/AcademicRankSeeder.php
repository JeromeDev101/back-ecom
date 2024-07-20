<?php

namespace Database\Seeders;

use App\Models\AcademicRank;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AcademicRankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AcademicRank::create(['name' => 'Professor']);
        AcademicRank::create(['name' => 'Associate Professor']);
        AcademicRank::create(['name' => 'Assistant Professor']);
        AcademicRank::create(['name' => 'Instructor']);
    }
}
