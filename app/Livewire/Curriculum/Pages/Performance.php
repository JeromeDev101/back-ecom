<?php

namespace App\Livewire\Curriculum\Pages;

use Livewire\Component;
use Livewire\Attributes\Lazy;
use Livewire\Attributes\Title;

#[Lazy()]
#[Title('CEIT | Curriculum - Performance')]
class Performance extends Component
{
    public function render()
    {
        return view('livewire.curriculum.pages.performance');
    }
}
