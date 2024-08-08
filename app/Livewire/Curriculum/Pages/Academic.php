<?php

namespace App\Livewire\Curriculum\Pages;

use App\Models\CurriculumAcademic;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Lazy;
use Livewire\Attributes\Title;
use Jantinnerezo\LivewireAlert\LivewireAlert;

#[Lazy()]
#[Title('CEIT | Curriculum - Academic')]
class Academic extends Component
{
    use LivewireAlert;
    public $id;

    protected $listeners = [
        'confirmed',
        'cancelled'
    ];

    #[On('delete:academic')]
    public function deleteFaculty($rowId): void
    {
        $this->confirm('Are you sure do want to delete?', [
            'onConfirmed' => 'confirmed',
            'onDismissed' => 'cancelled'
        ]);

        $this->id = $rowId;
    }

    public function confirmed()
    {
        $faculty = CurriculumAcademic::find($this->id);
        $faculty->delete();

        $this->flash('success', 'Successfully Deleted', [], 'curriculum/academic');
    }

    public function render()
    {
        return view('livewire.curriculum.pages.academic');
    }
}
