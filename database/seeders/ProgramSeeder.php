<?php

namespace Database\Seeders;

use App\Models\Program;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $payload = [
            [
                'name' => 'BS Agricultural and Biosystems Engineering',
                'acronym' => 'BSABE'
            ],
            [
                'name' => 'BS Civil Engineering ',
                'acronym' => 'BSCE'
            ],
            [
                'name' => 'BS Electronics Engineering',
                'acronym' => 'BSECE'
            ],
            [
                'name' => 'BS Electrical Engineering',
                'acronym' => 'BSEE'
            ],
            [
                'name' => 'BS Computer Engineering',
                'acronym' => 'BSCpE'
            ],
            [
                'name' => 'BS Industrial Engineering',
                'acronym' => 'BSIE'
            ],
            [
                'name' => 'BS Architecture',
                'acronym' => 'BSArch'
            ],
            [
                'name' => 'BS Computer Science',
                'acronym' => 'BSCS'
            ],
            [
                'name' => 'BS Information Technology',
                'acronym' => 'BSIT'
            ],
            [
                'name' => 'Bachelor of Science in Industrial Technology',
                'acronym' => 'BSIndT'
            ],
            [
                'name' => 'BS Agricultural and Biosystems Engineering',
                'acronym' => 'BSABE'
            ],
            [
                'name' => 'Master of Engineering major in Electrical Engineering',
                'acronym' => null
            ],
            [
                'name' => 'Master of Engineering major in Water Engineering and Management',
                'acronym' => null
            ],
            [
                'name' => 'Master of Engineering major in Civil Engineering',
                'acronym' => null
            ],
            [
                'name' => 'Master of Engineering major in Computer Engineering',
                'acronym' => null
            ]
        ];
        Program::insert($payload);
    }
}
