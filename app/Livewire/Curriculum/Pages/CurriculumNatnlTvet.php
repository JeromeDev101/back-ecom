<?php

namespace App\Livewire\Curriculum\Pages;

use Livewire\Component;
use Livewire\Attributes\Lazy;
use Livewire\Attributes\Title;

#[Lazy()]
#[Title('CEIT | Curriculum - National TVET')]
class CurriculumNatnlTvet extends Component
{
    public function render()
    {
        return view('livewire.curriculum.pages.curriculum-natnl-tvet');
    }
}
