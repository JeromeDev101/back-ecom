<?php

namespace App\Livewire\StudentDevelopment;

use Livewire\Component;

class StudentDevelopmentView extends Component
{
    public function render()
    {
        return view('livewire.student-development.student-development-view')
            ->layout('layouts.app')
            ->title('CEIT - Student Development');
    }
}
