<?php

namespace App\Livewire\Curriculum\Pages;

use Livewire\Component;
use Livewire\Attributes\Lazy;
use Livewire\Attributes\Title;

#[Lazy()]
#[Title('CEIT | Curriculum - Qualifications and Certifications')]
class CurriculumNumNatnlTvet extends Component
{
    public function render()
    {
        return view('livewire.curriculum.pages.curriculum-num-natnl-tvet');
    }
}
