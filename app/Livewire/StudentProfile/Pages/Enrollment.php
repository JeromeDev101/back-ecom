<?php

namespace App\Livewire\StudentProfile\Pages;

use App\Models\StudentEnrollment;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Lazy;
use Livewire\Attributes\Title;
use Jantinnerezo\LivewireAlert\LivewireAlert;

#[Lazy()]
#[Title('CEIT | Student Profile - Enrolment')]
class Enrollment extends Component
{
    use LivewireAlert;
    public $id;

    protected $listeners = [
        'confirmed',
        'cancelled'
    ];

    #[On('delete:enrolment')]
    public function deleteEnrolment($rowId): void
    {
        $this->confirm('Are you sure do want to delete?', [
            'onConfirmed' => 'confirmed',
            'onDismissed' => 'cancelled'
        ]);

        $this->id = $rowId;
    }

    public function confirmed()
    {
        $enrolment = StudentEnrollment::find($this->id);
        $enrolment->delete();

        $this->flash('success', 'Successfully Deleted', [], 'student-profile/enrolments');
    }

    public function render()
    {
        return view('livewire.student-profile.pages.enrollment');
    }
}
