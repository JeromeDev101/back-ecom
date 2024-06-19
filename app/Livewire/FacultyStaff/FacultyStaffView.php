<?php

namespace App\Livewire\FacultyStaff;

use Livewire\Component;
use Livewire\Attributes\Title;

#[Title('CEIT - Faculty Staff')]
class FacultyStaffView extends Component
{
    public function render()
    {
        return view('livewire.faculty-staff.faculty-staff-view')
        ->layout('layouts.app');
    }
}
