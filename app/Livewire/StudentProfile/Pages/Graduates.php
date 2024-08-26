<?php

namespace App\Livewire\StudentProfile\Pages;

use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Lazy;
use Livewire\Attributes\Title;
use App\Models\StudentGraduate;
use Jantinnerezo\LivewireAlert\LivewireAlert;

#[Lazy()]
#[Title('CEIT | Student Profile - Graduates')]
class Graduates extends Component
{
    use LivewireAlert;
    public $id;

    protected $listeners = [
        'confirmed',
        'cancelled'
    ];

    #[On('delete:graduate')]
    public function deleteGraduate($rowId): void
    {
        $this->confirm('Are you sure do want to delete?', [
            'onConfirmed' => 'confirmed',
            'onDismissed' => 'cancelled'
        ]);

        $this->id = $rowId;
    }

    public function confirmed()
    {
        $graduate = StudentGraduate::find($this->id);
        $graduate->delete();

        $this->flash('success', 'Successfully Deleted', [], 'student-profile/graduates');
    }

    public function render()
    {
        return view('livewire.student-profile.pages.graduates');
    }
}
