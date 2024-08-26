<?php

namespace App\Livewire\StudentProfile\Pages;

use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Lazy;
use App\Models\CurriculumFile;
use Livewire\Attributes\Title;
use Jantinnerezo\LivewireAlert\LivewireAlert;

#[Lazy()]
#[Title('CEIT | Student Profile - Recognition and Awards')]
class AwardsPhoto extends Component
{
    public $tableFilter = "RECOGNITION";

    use LivewireAlert;
    public $id;

    protected $listeners = [
        'confirmed',
        'cancelled'
    ];

    #[On('delete:recognition-photo')]
    public function deleteRecognitionPhoto($rowId): void
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

        $this->flash('success', 'Successfully Deleted', [], 'student-profile/recognition-and-awards/photos');
    }

    public function render()
    {
        return view('livewire.student-profile.pages.awards-photo');
    }
}
