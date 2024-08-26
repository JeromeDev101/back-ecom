<?php

namespace App\Livewire\StudentProfile\Pages;

use Livewire\Component;
use App\Models\StudentScholar;
use Livewire\Attributes\Title;
use App\Traits\FormOptionTrait;
use Jantinnerezo\LivewireAlert\LivewireAlert;

#[Title('Scholarship | Create')]
class ScholarshipCreate extends Component
{
    use FormOptionTrait, LivewireAlert;
    public $scholar;
    public $semesterOptions = [];
    public $yearOptions = [];
    public $programOptions = [];
    public $sy;

    public function mount()
    {
        $this->scholar = [
            'program_id' => '',
            'num_student' => '',
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
    }

    public function rules()
    {
        return [
            'scholar.program_id' => 'required',
            'scholar.num_student' => 'required',
            'scholar.sy' => 'required',
            'scholar.semester' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'scholar.program_id.required' => 'Program is required',
            'scholar.sy.required' => 'School year is required',
            'scholar.semester.required' => 'Semester is required',
            'scholar.num_student.required' => 'Number of student is required',
        ];
    }

    public function updatedSy($value, $key)
    {
        $this->scholar['sy'] = $this->sy['opt1'] .'-'. $this->sy['opt2'];
    }

    public function save()
    {
        $this->validate();

        if ($this->sy['opt1'] > $this->sy['opt2']) {
            $this->addError('sy', 'Please provide valid Shool year.');
            return;
        }

        $scholar = new StudentScholar();
        $scholar->program_id = $this->scholar['program_id'];
        $scholar->sy1 = $this->sy['opt1'];
        $scholar->sy2 = $this->sy['opt2'];
        $scholar->semester = $this->scholar['semester'];
        $scholar->num_student = $this->scholar['num_student'];
        $scholar->save();

        $this->flash('success', 'Successfully Added',[
            'position' => 'center'
        ], 'student-profile/scholarship');
        return redirect('student-profile/scholarship');
    }

    public function render()
    {
        return view('livewire.student-profile.pages.scholarship-create');
    }
}
