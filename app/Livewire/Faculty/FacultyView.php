<?php

namespace App\Livewire\Faculty;

use App\Models\Faculty;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Lazy;
use Livewire\Attributes\Title;
#[Lazy()]
#[Title('CEIT | Faculty profile')]
class FacultyView extends Component
{
    use LivewireAlert;
    public $id;

    protected $listeners = [
        'confirmed',
        'cancelled'
    ];

    #[On('delete:faculty')]
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
        $faculty = Faculty::find($this->id);
        $faculty->delete();

        $this->flash('success', 'Successfully Deleted', [], 'faculty-profile');
    }

    public function render()
    {
        return view('livewire.faculty.faculty-view');
    }
}
