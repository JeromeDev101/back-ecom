<?php

namespace App\Livewire\StudentProfile\Pages;

use App\Models\StudentForeign;
use Livewire\Component;
use Livewire\Attributes\Title;
use App\Traits\FormOptionTrait;
use Jantinnerezo\LivewireAlert\LivewireAlert;

#[Title('Foreign Student | Create')]
class ForeignCreate extends Component
{
    use FormOptionTrait, LivewireAlert;
    public $foreign;
    public $semesterOptions = [];
    public $yearOptions = [];
    public $programOptions = [];
    public $countryOptions = [];
    public $sy;

    public function mount()
    {
        $this->foreign = [
            'program_id' => '',
            'num_student' => '',
            'country_id' => '',
            'sy' => '',
            'semester' => ''
        ];

        $this->sy = [
            'opt1' => '',
            'opt2' => '',
        ];

        $this->semesterOptions = $this->semesterOptions();
        $this->yearOptions = $this->yearOptions();
        $this->programOptions = $this->programOptions();
        $this->countryOptions = $this->countryOptions();
    }

    public function rules()
    {
        return [
            'foreign.program_id' => 'required',
            'foreign.num_student' => 'required',
            'foreign.sy' => 'required',
            'foreign.country_id' => 'required',
            'foreign.semester' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'foreign.program_id.required' => 'Program is required',
            'foreign.sy.required' => 'School year is required',
            'foreign.semester.required' => 'Semester is required',
            'foreign.num_student.required' => 'Number of student is required',
            'foreign.country_id.required' => 'Country is required',
        ];
    }

    public function updatedSy($value, $key)
    {
        $this->foreign['sy'] = $this->sy['opt1'] .'-'. $this->sy['opt2'];
    }

    public function save()
    {
        $this->validate();

        if ($this->sy['opt1'] > $this->sy['opt2']) {
            $this->addError('sy', 'Please provide valid Shool year.');
            return;
        }

        $foreign = new StudentForeign();
        $foreign->program_id = $this->foreign['program_id'];
        $foreign->sy1 = $this->sy['opt1'];
        $foreign->sy2 = $this->sy['opt2'];
        $foreign->semester = $this->foreign['semester'];
        $foreign->num_student = $this->foreign['num_student'];
        $foreign->country_id = $this->foreign['country_id'];
        $foreign->save();

        $this->flash('success', 'Successfully Added',[
            'position' => 'center'
        ], 'student-profile/enrolments');
        return redirect('student-profile/foreign-student');
    }

    public function render()
    {
        return view('livewire.student-profile.pages.foreign-create');
    }
}
