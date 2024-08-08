<?php

namespace App\Livewire\Curriculum\Pages;

use Livewire\Component;
use Livewire\Attributes\Lazy;
use Livewire\Attributes\Title;
use App\Traits\FormOptionTrait;
use App\Models\CurriculumAccreditation;
use Illuminate\Support\Carbon;
use Jantinnerezo\LivewireAlert\LivewireAlert;

#[Lazy()]
#[Title('CEIT | Accreditation - Create')]
class AccreditationCreate extends Component
{
    use FormOptionTrait, LivewireAlert;

    public $accreditation;
    public $statusAccreditationLevelOptions = [];
    public $statusAccreditationOptions = [];
    public $programOptions = [];

    public function mount()
    {
        $this->accreditation = [
            'program_id' => '',
            'date_visit' => '',
            'status' => '',
            'level' => ''
        ];

        $this->statusAccreditationLevelOptions = $this->statusAccreditationLevelOptions();
        $this->statusAccreditationOptions = $this->statusAccreditationOptions();
        $this->programOptions = $this->programOptions();

    }

    public function rules()
    {
        return [
            'accreditation.program_id' => 'required',
            'accreditation.date_visit' => 'required',
            'accreditation.status' => 'required',
            'accreditation.level' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'accreditation.program_id.required' => 'Program is required',
            'accreditation.date_visit.required' => 'Date held is required',
        ];
    }

    public function save()
    {
        $this->validate();

        $accreditation = new CurriculumAccreditation;
        $accreditation->program_id = $this->accreditation['program_id'];
        $accreditation->status = $this->accreditation['status'];
        $accreditation->level = $this->accreditation['level'];
        $accreditation->date_visit = Carbon::parse($this->accreditation['date_visit'])->format('Y-m-d');
        $accreditation->save();

        $this->flash('success', 'Successfully Created',[
            'position' => 'center'
        ], 'curriculum/accreditation');
        return redirect('curriculum/accreditation');
    }

    public function render()
    {
        return view('livewire.curriculum.pages.accreditation-create');
    }
}
