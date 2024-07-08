<?php

namespace App\Livewire\Curriculum;

use Livewire\Component;
use Livewire\Attributes\Lazy;
use Livewire\Attributes\Title;

#[Lazy()]
#[Title('CEIT | Curriculum')]
class CurriculumView extends Component
{
    public function render()
    {
        return view('livewire.curriculum.curriculum-view');
    }
}
