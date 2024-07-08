<?php

namespace App\Livewire\Faculty;

use Livewire\Component;
use Livewire\Attributes\Lazy;
use Livewire\Attributes\Title;
#[Lazy()]
#[Title('CEIT | Faculty profile')]
class FacultyView extends Component
{
    public function render()
    {
        return view('livewire.faculty.faculty-view');
    }
}
