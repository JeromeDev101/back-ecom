<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\NatureOfAppointment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class NatureOfAppointmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        NatureOfAppointment::create(['name' => 'Permanent']);
        NatureOfAppointment::create(['name' => 'Temporary']);
        NatureOfAppointment::create(['name' => 'Full-time contractual']);
        NatureOfAppointment::create(['name' => 'Part time/JO']);
    }
}
