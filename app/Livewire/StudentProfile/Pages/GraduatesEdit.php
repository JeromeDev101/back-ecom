<?php

namespace App\Livewire\StudentProfile\Pages;

use App\Models\StudentGraduate;
use Livewire\Component;
use Livewire\Attributes\Title;
use App\Traits\FormOptionTrait;
use Jantinnerezo\LivewireAlert\LivewireAlert;

#[Title('Graduates | Edit')]
class GraduatesEdit extends Component
{
    use FormOptionTrait, LivewireAlert;
    public $graduates;
    public $semesterOptions = [];
    public $yearOptions = [];
    public $programOptions = [];
    public $sy;
    public $id;

    public function mount()
    {
        $this->graduates = StudentGraduate::find($this->id);

        if($this->graduates) {
            $this->sy['opt1'] = $this->graduates['sy1'] ?? '';
            $this->sy['opt2'] = $this->graduates['sy2'] ?? '';
            $this->graduates['sy'] = $this->sy['opt1'].'-'.$this->sy['opt2'];
        } else {
            $this->sy = [
                'opt1' => '',
                'opt2' => '',
            ];
        }

        $this->semesterOptions = $this->semesterOptions();
        $this->yearOptions = $this->yearOptions();
        $this->programOptions = $this->programOptions();
    }

    public function rules()
    {
        return [
            'graduates.program_id' => 'required',
            'graduates.num_student' => 'required',
            'graduates.sy' => 'required',
            'graduates.graduation_date' => 'required',
            'graduates.semester' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'graduates.program_id.required' => 'Program is required',
            'graduates.sy.required' => 'School year is required',
            'graduates.semester.required' => 'Semester is required',
            'graduates.num_student.required' => 'Number of student is required',
            'graduates.graduation_date.required' => 'Date of graduation is required',
        ];
    }

    public function updatedSy($value, $key)
    {
        $this->graduates['sy'] = $this->sy['opt1'] .'-'. $this->sy['opt2'];
    }

    public function save()
    {
        $this->validate();

        if ($this->sy['opt1'] > $this->sy['opt2']) {
            $this->addError('sy', 'Please provide valid Shool year.');
            return;
        }

        $graduate = StudentGraduate::find($this->id);

        if($graduate) {
            $graduate->program_id = $this->graduates['program_id'];
            $graduate->sy1 = $this->sy['opt1'];
            $graduate->sy2 = $this->sy['opt2'];
            $graduate->semester = $this->graduates['semester'];
            $graduate->num_student = $this->graduates['num_student'];
            $graduate->graduation_date = $this->graduates['graduation_date'];
            $graduate->save();
        }

        $this->flash('success', 'Successfully Updated',[
            'position' => 'center'
        ], 'student-profile/enrolments');
        return redirect('student-profile/graduates');
    }

    public function render()
    {
        return view('livewire.student-profile.pages.graduates-edit');
    }
}
