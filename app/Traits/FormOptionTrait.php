<?php

namespace App\Traits;

use App\Models\AcademicRank;
use App\Models\EducationalAttainment;
use App\Models\NatureOfAppointment;

trait FormOptionTrait {
    public function genderOptions()
    {
        return [
            [
                'value' => 'male',
                'label' => 'Male'
            ],
            [
                'value' => 'female',
                'label' => 'Female'
            ]
        ];
    }

    public function educAttainmentOptions()
    {
        $educ_attainments = EducationalAttainment::all();
        $options = [];

        foreach($educ_attainments as $attainment) {
            $options[] = [
                'value' => $attainment['id'],
                'label' => $attainment['name']
            ];
        }

        return $options;
    }

    public function natureOfAppointmentOptions()
    {
        $nature_appointments = NatureOfAppointment::all();
        $options = [];

        foreach($nature_appointments as $appointment) {
            $options[] = [
                'value' => $appointment['id'],
                'label' => $appointment['name']
            ];
        }

        return $options;
    }

    public function academicOptions()
    {
        $academic_ranks = AcademicRank::all();
        $options = [];

        foreach($academic_ranks as $rank) {
            $options[] = [
                'value' => $rank['id'],
                'label' => $rank['name']
            ];
        }

        return $options;
    }


}
