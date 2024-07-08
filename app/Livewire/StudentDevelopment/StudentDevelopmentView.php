<?php

namespace App\Livewire\StudentDevelopment;

use Livewire\Component;
use Livewire\Attributes\Lazy;
use Livewire\Attributes\Title;
#[Lazy()]
#[Title('CEIT | Student Development')]
class StudentDevelopmentView extends Component
{
    public function render()
    {
        return view('livewire.student-development.student-development-view');
    }
}
