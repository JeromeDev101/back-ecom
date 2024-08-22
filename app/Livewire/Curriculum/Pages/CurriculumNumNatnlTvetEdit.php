<?php

namespace App\Livewire\Curriculum\Pages;

use Livewire\Component;
use Livewire\Attributes\Lazy;
use Livewire\Attributes\Title;
use App\Traits\FormOptionTrait;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use App\Models\CurriculumCertificationStudent;

#[Lazy()]
#[Title('CEIT | Curriculum - Students Qualification and Certification')]
class CurriculumNumNatnlTvetEdit extends Component
{
    use LivewireAlert, FormOptionTrait;

    public $id;
    public $certifications;

    public $facultyOptions = [];

    public function mount()
    {
        $this->certifications = CurriculumCertificationStudent::find($this->id);
    }

    public function rules()
    {
        return [
            'certifications.certification_type' => 'required',
            'certifications.num_student' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'certifications.certification_type' => 'Please provide type of certifications.',
            'certifications.num_student' => 'Please provide number of students.',
        ];
    }

    public function save()
    {
        $this->validate();

        $certification = CurriculumCertificationStudent::find($this->id);
        if($certification) {
            $certification->certification_type = $this->certifications['certification_type'];
            $certification->num_student = $this->certifications['num_student'];
            $certification->save();
        }

        $this->flash('success', 'Successfully Updated',[
            'position' => 'center'
        ], route('curriculum-num-national-tvet.index'));

        return $this->redirectRoute('curriculum-num-national-tvet.index');
    }

    public function render()
    {
        return view('livewire.curriculum.pages.curriculum-num-natnl-tvet-edit');
    }
}
