<?php

namespace App\Livewire\FacultyStaff;

use Livewire\Component;

class FacultyStaffView extends Component
{
    public function render()
    {
        return view('livewire.faculty-staff.faculty-staff-view')->layout('layouts.app');
    }
}
