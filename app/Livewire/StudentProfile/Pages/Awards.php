<?php

namespace App\Livewire\StudentProfile\Pages;

use App\Models\StudentRecognition;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Lazy;
use Livewire\Attributes\Title;
use Jantinnerezo\LivewireAlert\LivewireAlert;

#[Lazy()]
#[Title('CEIT | Student Profile - Recognition and Awards')]
class Awards extends Component
{
    use LivewireAlert;
    public $id;

    protected $listeners = [
        'confirmed',
        'cancelled'
    ];

    #[On('delete:recognition')]
    public function deleteRecognition($rowId): void
    {
        $this->confirm('Are you sure do want to delete?', [
            'onConfirmed' => 'confirmed',
            'onDismissed' => 'cancelled'
        ]);

        $this->id = $rowId;
    }

    public function confirmed()
    {
        $recognition = StudentRecognition::find($this->id);
        $recognition->delete();

        $this->flash('success', 'Successfully Deleted', [], 'student-profile/recognition-and-awards');
    }

    public function render()
    {
        return view('livewire.student-profile.pages.awards');
    }
}
