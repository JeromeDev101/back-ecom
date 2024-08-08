<?php

namespace App\Livewire\Curriculum\Pages;

use Livewire\Component;
use Livewire\Attributes\Lazy;
use Illuminate\Support\Carbon;
use Livewire\Attributes\Title;
use App\Traits\FormOptionTrait;
use App\Models\CurriculumAcademic;
use Jantinnerezo\LivewireAlert\LivewireAlert;

#[Lazy()]
#[Title('CEIT | Academic - Create')]
class AcademicCreate extends Component
{
    use FormOptionTrait, LivewireAlert;

    public $academic;
    public $programOptions = [];
    public $statusAcademicOptions = [];

    public function mount()
    {
        $this->academic = [
            'program_id' => '',
            'is_copc' => '',
            'copc_number' => '',
            'date_held' => ''
        ];

        $this->programOptions = $this->programOptions();
        $this->statusAcademicOptions = $this->statusAcademicOptions();

    }

    public function rules()
    {
        return [
            'academic.program_id' => 'required',
            'academic.is_copc' => 'required',
            'academic.copc_number' => 'required',
            'academic.date_held' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'academic.is_copc.required' => 'Choose COPC status is required',
            'academic.copc_number.required' => 'COPC number is required',
            'academic.program_id.required' => 'Program is required',
            'academic.date_held.required' => 'Date held is required',
        ];
    }

    public function save()
    {
        $this->validate();

        $academic = new CurriculumAcademic;
        $academic->program_id = $this->academic['program_id'];
        $academic->is_copc = $this->academic['is_copc'];
        $academic->copc_number = $this->academic['copc_number'];
        $academic->date_held = Carbon::parse($this->academic['date_held'])->format('Y-m-d');
        $academic->save();

        $this->flash('success', 'Successfully Created',[
            'position' => 'center'
        ], 'curriculum/academic');
        return redirect('curriculum/academic');
    }

    public function render()
    {
        return view('livewire.curriculum.pages.academic-create');
    }
}
