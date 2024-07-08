<?php

namespace App\Livewire\FacultyStaff;

use Livewire\Component;
use Livewire\Attributes\Lazy;
use Livewire\Attributes\Title;

#[Title('CEIT | Faculty Staff')]
#[Lazy()]
class FacultyStaffView extends Component
{
    public function render()
    {
        return view('livewire.faculty-staff.faculty-staff-view');
    }
}
