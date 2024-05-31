<?php

namespace App\Livewire\Faculty;

use Livewire\Component;

class FacultyView extends Component
{
    public function render()
    {
        return view('livewire.faculty.faculty-view')->layout('layouts.app');
    }
}
