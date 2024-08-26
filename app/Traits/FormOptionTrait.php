<?php

namespace App\Traits;

use App\Models\Faculty;
use App\Models\Program;
use App\Models\AcademicRank;
use Illuminate\Support\Carbon;
use Spatie\Permission\Models\Role;
use App\Models\NatureOfAppointment;
use App\Models\EducationalAttainment;

trait FormOptionTrait {
    public function statusAccreditationLevelOptions()
    {
        return [
            [
                'value' => 'Level I',
                'label' => 'Level I'
            ],
            [
                'value' => 'Level II',
                'label' => 'Level II'
            ],
            [
                'value' => 'Level III',
                'label' => 'Level III'
            ],
            [
                'value' => 'Level IV',
                'label' => 'Level IV'
            ],
            [
                'value' => 'Level V',
                'label' => 'Level V'
            ],
        ];
    }

    public function semesterOptions()
    {
        return [
            [
                'label' => '1st Semester',
                'value' => '1',
            ],
            [
                'label' => '2nd Semester',
                'value' => '2',
            ],
        ];
    }

    public function yearOptions($range = 10)
    {
        $options = [];
        $currentYear = Carbon::now()->year;

        for ($i = 0; $i < $range; $i++) {
            $years[] = $currentYear - $i;
            $options[] = [
                'label' => $currentYear - $i,
                'value' => $currentYear - $i
            ];
        }

        return $options;
    }

    public function facultyOptions()
    {
        $faculties = Faculty::all();
        $options = [];

        foreach($faculties as $faculty) {
            $options[] = [
                'value' => $faculty['id'],
                'label' => $faculty['last_name']. ', ' . $faculty['first_name']
            ];
        }

        return collect($options)->sortBy('label')->toArray();
    }

    public function statusAccreditationOptions()
    {
        return [
            [
                'value' => 'Accredited',
                'label' => 'Accredited'
            ],
            [
                'value' => 'Reaccredited',
                'label' => 'Reaccredited'
            ]
        ];
    }

    public function statusAcademicOptions()
    {
        return [
            [
                'value' => 1,
                'label' => 'With COPC'
            ],
            [
                'value' => 0,
                'label' => 'Without COPC'
            ]
        ];
    }

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

    public function awardTypeOptions()
    {
        return [
            [
                'label' => 'Champion',
                'value' => 'Champion',
            ],
            [
                'label' => 'Gold Medalist',
                'value' => 'Gold Medalist',
            ],
            [
                'label' => 'Silver Medalist',
                'value' => 'Silver Medalist',
            ],
            [
                'label' => 'Bronze Medalist',
                'value' => 'Bronze Medalist',
            ],
            [
                'label' => '1st Place',
                'value' => '1st Place',
            ],
            [
                'label' => '2nd Place',
                'value' => '2nd Place',
            ],
            [
                'label' => '3rd Place',
                'value' => '3rd Place',
            ],
        ];
    }

    public function programOptions($display = 'name')
    {
        $programs = Program::all();
        $options = [];

        foreach($programs as $program) {
            $options[] = [
                'value' => $program['id'],
                'label' => $program[$display]
            ];
        }

        return $options;
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
