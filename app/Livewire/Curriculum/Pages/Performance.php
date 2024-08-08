<?php

namespace App\Livewire\Curriculum\Pages;

use App\Models\CurriculumPerformance;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Lazy;
use Livewire\Attributes\Title;
use Jantinnerezo\LivewireAlert\LivewireAlert;

#[Lazy()]
#[Title('CEIT | Curriculum - Performance')]
class Performance extends Component
{
    use LivewireAlert;
    public $id;

    protected $listeners = [
        'confirmed',
        'cancelled'
    ];

    #[On('delete:performance')]
    public function deletePerformance($rowId): void
    {
        $this->confirm('Are you sure do want to delete?', [
            'onConfirmed' => 'confirmed',
            'onDismissed' => 'cancelled'
        ]);

        $this->id = $rowId;
    }

    public function confirmed()
    {
        $performance = CurriculumPerformance::find($this->id);
        $performance->delete();

        $this->flash('success', 'Successfully Deleted', [], 'curriculum/performance');
    }


    public function render()
    {
        return view('livewire.curriculum.pages.performance');
    }
}
