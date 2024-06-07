<?php

namespace App\Livewire\Curriculum;

use Livewire\Component;

class CurriculumView extends Component
{
    public function render()
    {
        return view('livewire.curriculum.curriculum-view')
            ->layout('layouts.app')
            ->title('CEIT - Curriculum');
    }
}
