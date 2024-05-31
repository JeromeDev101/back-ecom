<?php

namespace App\Livewire\StudentProfile;

use Livewire\Component;

class StudentProfileView extends Component
{
    public function render()
    {
        return view('livewire.student-profile.student-profile-view')->layout('layouts.app');
    }
}
