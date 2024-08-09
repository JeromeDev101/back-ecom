<?php

namespace App\Livewire\Curriculum\Pages;

use App\Models\CurriculumFile;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Lazy;
use Livewire\Attributes\Title;
use Jantinnerezo\LivewireAlert\LivewireAlert;

#[Lazy()]
#[Title('CEIT | Curriculum - Performance')]
class Banner extends Component
{
    use LivewireAlert;
    public $id;
    public $tableFilter = 'CURRICULUM';

    protected $listeners = [
        'confirmed',
        'cancelled'
    ];

    #[On('delete:banner')]
    public function deleteBanner($rowId): void
    {
        $this->confirm('Are you sure do want to delete?', [
            'onConfirmed' => 'confirmed',
            'onDismissed' => 'cancelled'
        ]);

        $this->id = $rowId;
    }

    public function confirmed()
    {
        $file = CurriculumFile::find($this->id);
        $file->delete();

        $this->flash('success', 'Successfully Deleted', [], 'curriculum/national-tvet');
    }

    public function render()
    {
        return view('livewire.curriculum.pages.banner');
    }
}
