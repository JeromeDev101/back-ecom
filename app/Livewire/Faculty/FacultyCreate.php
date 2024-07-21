<?php

namespace App\Livewire\Faculty;

use App\Models\Faculty;
use Livewire\Component;
use Livewire\Attributes\Title;
use App\Traits\FormOptionTrait;
use Jantinnerezo\LivewireAlert\LivewireAlert;

#[Title('Faculty | Create')]
class FacultyCreate extends Component
{
    use FormOptionTrait, LivewireAlert;
    public $faculty;
    public $genderOptions = [];
    public $educAttainmentOptions = [];
    public $natureOfAppointmentOptions = [];
    public $academicRankOptions = [];

    public function mount()
    {
        $this->faculty = [
            'first_name' => '',
            'last_name' => '',
            'middle_name' => '',
            'email' => '',
            'nature_of_appointment_id' => '',
            'gender' => '',
            'academic_rank_id' => '',
            'educational_attainment_id' => ''
        ];

        $this->genderOptions = $this->genderOptions();
        $this->educAttainmentOptions = $this->educAttainmentOptions();
        $this->natureOfAppointmentOptions = $this->natureOfAppointmentOptions();
        $this->academicRankOptions = $this->academicOptions();
    }

    public function rules()
    {
        return [
            'faculty.first_name' => 'required',
            'faculty.last_name' => 'required',
            'faculty.middle_name' => '',
            'faculty.nature_of_appointment_id' => 'required',
            'faculty.email' => 'required|unique:faculties,email',
            'faculty.gender' => 'required',
            'faculty.academic_rank_id' => 'required',
            'faculty.educational_attainment_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'faculty.first_name.required' => 'First name is required',
            'faculty.last_name.required' => 'Last name is required',
            'faculty.nature_of_appointment_id.required' => 'Nature of appointment is required',
            'faculty.email.required' => 'Email is required',
            'faculty.email.unique' => 'Email is already exist',
            'faculty.gender.required' => 'Gender is required',
            'faculty.academic_rank_id.required' => 'Academic rank is required',
            'faculty.educational_attainment_id.required' => 'Educational attainment is required'
        ];
    }

    public function save()
    {
        $this->validate();

        $this->faculty['nature_of_appointment_id'] = (int)$this->faculty['nature_of_appointment_id'];
        $this->faculty['academic_rank_id'] = (int)$this->faculty['academic_rank_id'];
        $this->faculty['educational_attainment_id'] = (int)$this->faculty['educational_attainment_id'];

        Faculty::create($this->faculty);

        $this->flash('success', 'Successfully Added',[
            'position' => 'center'
        ], 'faculty-profile');
        return redirect('faculty-profile');
    }

}
