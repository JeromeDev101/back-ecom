<?php

namespace App\Livewire\StudentProfile\Pages;

use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Lazy;
use App\Models\StudentScholar;
use Livewire\Attributes\Title;
use Jantinnerezo\LivewireAlert\LivewireAlert;

#[Lazy()]
#[Title('CEIT | Student Profile - Scholars')]
class Scholarship extends Component
{
    use LivewireAlert;
    public $id;

    protected $listeners = [
        'confirmed',
        'cancelled'
    ];

    #[On('delete:scholar')]
    public function deleteScholar($rowId): void
    {
        $this->confirm('Are you sure do want to delete?', [
            'onConfirmed' => 'confirmed',
            'onDismissed' => 'cancelled'
        ]);

        $this->id = $rowId;
    }

    public function confirmed()
    {
        $scholar = StudentScholar::find($this->id);
        $scholar->delete();

        $this->flash('success', 'Successfully Deleted', [], 'student-profile/graduates');
    }

    public function render()
    {
        return view('livewire.student-profile.pages.scholarship');
    }
}
