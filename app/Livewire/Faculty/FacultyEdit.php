<?php

namespace App\Livewire\Faculty;

use App\Models\Faculty;
use Livewire\Component;
use Livewire\Attributes\Title;
use App\Traits\FormOptionTrait;
use Jantinnerezo\LivewireAlert\LivewireAlert;

#[Title('Faculty | Edit')]
class FacultyEdit extends Component
{
    use FormOptionTrait, LivewireAlert;
    public $faculty;
    public $id;
    public $genderOptions = [];
    public $educAttainmentOptions = [];
    public $natureOfAppointmentOptions = [];
    public $academicRankOptions = [];

    public function mount($id)
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

        $this->faculty = Faculty::find($id);
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
            'faculty.nature_of_appointment_id' => 'required',
            'faculty.email' => 'required|unique:faculties,email,' . $this->id,
            'faculty.middle_name' => '',
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

        $faculty = Faculty::find($this->id);
        $faculty->update($this->faculty->toArray());

        $this->flash('success', 'Successfully Updated',[
            'position' => 'center'
        ], 'faculty-profile');
        return redirect('faculty-profile');
    }

}
