<?php

namespace App\Livewire\Curriculum\Pages;

use App\Models\CurriculumCertification;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Lazy;
use Livewire\Attributes\Title;
use Jantinnerezo\LivewireAlert\LivewireAlert;

#[Lazy()]
#[Title('CEIT | Curriculum - Faculty National TVET')]
class CurriculumNatnlTvet extends Component
{
    use LivewireAlert;
    public $id;

    protected $listeners = [
        'confirmed',
        'cancelled'
    ];

    #[On('delete:certification')]
    public function deleteCertification($rowId): void
    {
        $this->confirm('Are you sure do want to delete?', [
            'onConfirmed' => 'confirmed',
            'onDismissed' => 'cancelled'
        ]);

        $this->id = $rowId;
    }

    public function confirmed()
    {
        $cert = CurriculumCertification::find($this->id);
        $cert->delete();

        $this->flash('success', 'Successfully Deleted', [], 'curriculum/num-national-tvet');
    }

    public function render()
    {
        return view('livewire.curriculum.pages.curriculum-natnl-tvet');
    }
}
