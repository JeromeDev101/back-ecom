<?php

namespace App\Livewire\Curriculum\Pages;

use App\Models\CurriculumCertification;
use App\Traits\FormOptionTrait;
use Illuminate\Support\Carbon;
use Livewire\Component;
use Livewire\Attributes\Lazy;
use Livewire\Attributes\Title;
use Jantinnerezo\LivewireAlert\LivewireAlert;

#[Lazy()]
#[Title('CEIT | Curriculum - Qualification and Certification')]
class CurriculumNatnlTvetCreate extends Component
{
    use LivewireAlert, FormOptionTrait;

    public $certifications;

    public $facultyOptions = [];

    public function mount()
    {
        $this->certifications = [
            'faculty_ids' => '',
            'type' => '',
            'date_held' => ''
        ];

        $this->facultyOptions = $this->facultyOptions();
    }

    public function rules()
    {
        return [
            'certifications.faculty_ids' => 'required',
            'certifications.type' => 'required',
            'certifications.date_held' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'certifications.faculty_ids' => 'Please provide atleast one faculty.',
            'certifications.type' => 'Please provide type of certifications.',
            'certifications.date_held' => 'Please provide date held.',
        ];
    }

    public function save()
    {
        $this->validate();

        $certification = new CurriculumCertification;
        $certification->faculty_ids = $this->certifications['faculty_ids'];
        $certification->type = $this->certifications['type'];
        $certification->date_held = Carbon::parse($this->certifications['date_held'])->format('Y-m-d');
        $certification->save();

        $this->flash('success', 'Successfully Created',[
            'position' => 'center'
        ], route('curriculum-national-tvet.index'));

        return $this->redirectRoute('curriculum-national-tvet.index');
    }

    public function render()
    {
        return view('livewire.curriculum.pages.curriculum-natnl-tvet-create');
    }
}
