<?php

namespace App\Livewire\StudentProfile\Pages;

use App\Models\StudentEnrollment;
use Livewire\Component;
use Livewire\Attributes\Title;
use App\Traits\FormOptionTrait;
use Jantinnerezo\LivewireAlert\LivewireAlert;

#[Title('Enrollment | Create')]
class EnrollmentCreate extends Component
{
    use FormOptionTrait, LivewireAlert;
    public $enrollment;
    public $semesterOptions = [];
    public $yearOptions = [];
    public $programOptions = [];
    public $sy;

    public function mount()
    {
        $this->enrollment = [
            'program_id' => '',
            'sy' => '',
            'num_student' => '',
            'semester' => ''
        ];

        $this->sy = [
            'opt1' => '',
            'opt2' => '',
        ];

        $this->semesterOptions = $this->semesterOptions();
        $this->yearOptions = $this->yearOptions();
        $this->programOptions = $this->programOptions();
    }

    public function updatedSy($value, $key)
    {
        $this->enrollment['sy'] = $this->sy['opt1'] .'-'. $this->sy['opt2'];

        // dd($value, $key);
    }

    public function rules()
    {
        return [
            'enrollment.program_id' => 'required',
            'enrollment.sy' => 'required',
            'enrollment.num_student' => 'required',
            'enrollment.semester' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'enrollment.program_id.required' => 'Program is required',
            'enrollment.sy.required' => 'School year is required',
            'enrollment.num_student.required' => 'Number of student is required',
            'enrollment.semester.required' => 'Semester is required'
        ];
    }

    public function save()
    {
        $this->validate();

        $this->addError('year', 'Please provide valid Shool year.');

        if ($this->sy['opt1'] > $this->sy['opt2']) {
            $this->addError('sy', 'Please provide valid Shool year.');
            return;
        }

        $enrollment = new StudentEnrollment;
        $enrollment->program_id = $this->enrollment['program_id'];
        $enrollment->sy = $this->enrollment['sy'];
        $enrollment->semester = $this->enrollment['semester'];
        $enrollment->num_student = $this->enrollment['num_student'];
        $enrollment->save();


        $this->flash('success', 'Successfully Added',[
            'position' => 'center'
        ], 'student-profile/enrolments');
        return redirect('student-profile/enrolments');
    }

    public function render()
    {
        return view('livewire.student-profile.pages.enrollment-create');
    }
}
