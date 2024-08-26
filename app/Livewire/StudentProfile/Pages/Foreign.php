<?php

namespace App\Livewire\StudentProfile\Pages;

use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Lazy;
use App\Models\StudentForeign;
use Livewire\Attributes\Title;
use Jantinnerezo\LivewireAlert\LivewireAlert;

#[Lazy()]
#[Title('CEIT | Student Profile - Foreign Students')]
class Foreign extends Component
{
    use LivewireAlert;
    public $id;

    protected $listeners = [
        'confirmed',
        'cancelled'
    ];

    #[On('delete:foreign')]
    public function deleteForeign($rowId): void
    {
        $this->confirm('Are you sure do want to delete?', [
            'onConfirmed' => 'confirmed',
            'onDismissed' => 'cancelled'
        ]);

        $this->id = $rowId;
    }

    public function confirmed()
    {
        $foreign = StudentForeign::find($this->id);
        $foreign->delete();

        $this->flash('success', 'Successfully Deleted', [], 'student-profile/foreign-student');
    }

    public function render()
    {
        return view('livewire.student-profile.pages.foreign');
    }
}
