<?php

namespace App\Livewire\Curriculum\Pages;

use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Lazy;
use App\Models\CurriculumFile;
use Livewire\Attributes\Title;
use Jantinnerezo\LivewireAlert\LivewireAlert;

#[Lazy()]
#[Title('CEIT | Curriculum - National TVET')]
class CurriculumNatnlTvetFile extends Component
{
    public $tableFilter = 'CERTIFICATES';

    use LivewireAlert;
    public $id;

    protected $listeners = [
        'confirmed',
        'cancelled'
    ];

    #[On('delete:national-tvet')]
    public function deleteNationalTvet($rowId): void
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

        $this->flash('success', 'Successfully Deleted', [], 'curriculum/national-tvet/certificate-files');
    }

    public function render()
    {
        return view('livewire.curriculum.pages.curriculum-natnl-tvet-file');
    }
}
