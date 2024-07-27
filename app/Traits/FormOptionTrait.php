<?php

namespace App\Traits;

use App\Models\AcademicRank;
use Spatie\Permission\Models\Role;
use App\Models\NatureOfAppointment;
use App\Models\EducationalAttainment;

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

    public function activeOptions()
    {
        return [
            [
                'value' => 0,
                'label' => 'Inactive'
            ],
            [
                'value' => 1,
                'label' => 'Active'
            ]
        ];
    }

    public function roleOptions()
    {
        $roles = Role::all();
        $options = [];

        foreach($roles as $role) {
            $options[] = [
                'value' => $role['name'],
                'label' => $role['name']
            ];
        }

        return $options;
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
