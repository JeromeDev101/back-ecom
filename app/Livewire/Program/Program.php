<?php

namespace App\Livewire\Program;

use App\Models\Program as ModelsProgram;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Lazy;
use Livewire\Attributes\Title;
use Jantinnerezo\LivewireAlert\LivewireAlert;

#[Lazy()]
#[Title('CEIT | Programs')]
class Program extends Component
{
    use LivewireAlert;
    public $id;

    protected $listeners = [
        'confirmed',
        'cancelled'
    ];

    #[On('delete:program')]
    public function deleteProgram($rowId): void
    {
        $this->confirm('Are you sure do want to delete?', [
            'onConfirmed' => 'confirmed',
            'onDismissed' => 'cancelled'
        ]);

        $this->id = $rowId;
    }

    public function confirmed()
    {
        $program = ModelsProgram::find($this->id);
        $program->delete();

        $this->flash('success', 'Successfully Deleted', [], 'settings/programs');
    }

    public function render()
    {
        return view('livewire.program.program');
    }
}
