<?php

namespace App\Livewire\StudentProfile;

use Livewire\Component;
use Livewire\Attributes\Lazy;
use Livewire\Attributes\Title;
#[Lazy()]
#[Title('CEIT | Student Profile')]
class StudentProfileView extends Component
{
    public function render()
    {
        return view('livewire.student-profile.student-profile-view');
    }
}
