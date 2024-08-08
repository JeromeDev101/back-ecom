<?php

namespace App\Livewire\Curriculum\Pages;

use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Lazy;
use Livewire\Attributes\Title;
use App\Models\CurriculumAccreditation;
use Jantinnerezo\LivewireAlert\LivewireAlert;

#[Lazy()]
#[Title('CEIT | Curriculum - Accreditation')]
class Accreditation extends Component
{
    use LivewireAlert;
    public $id;

    protected $listeners = [
        'confirmed',
        'cancelled'
    ];

    #[On('delete:accreditation')]
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
        $faculty = CurriculumAccreditation::find($this->id);
        $faculty->delete();

        $this->flash('success', 'Successfully Deleted', [], 'curriculum/accreditation');
    }

    public function render()
    {
        return view('livewire.curriculum.pages.accreditation');
    }
}
