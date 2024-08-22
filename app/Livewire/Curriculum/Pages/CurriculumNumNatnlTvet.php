<?php

namespace App\Livewire\Curriculum\Pages;

use App\Models\CurriculumCertificationStudent;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Lazy;
use Livewire\Attributes\Title;
use Jantinnerezo\LivewireAlert\LivewireAlert;

#[Lazy()]
#[Title('CEIT | Curriculum - Students Qualifications and Certifications')]
class CurriculumNumNatnlTvet extends Component
{
    use LivewireAlert;
    public $id;

    protected $listeners = [
        'confirmed',
        'cancelled'
    ];

    #[On('delete:certification')]
    public function deleteQualification($rowId): void
    {
        $this->confirm('Are you sure do want to delete?', [
            'onConfirmed' => 'confirmed',
            'onDismissed' => 'cancelled'
        ]);

        $this->id = $rowId;
    }

    public function confirmed()
    {
        $qualification = CurriculumCertificationStudent::find($this->id);
        $qualification->delete();

        $this->flash('success', 'Successfully Deleted', [], 'curriculum/performance/banner');
    }

    public function render()
    {
        return view('livewire.curriculum.pages.curriculum-num-natnl-tvet');
    }
}
