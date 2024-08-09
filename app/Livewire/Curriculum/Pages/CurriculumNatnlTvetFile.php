<?php

namespace App\Livewire\Curriculum\Pages;

use Livewire\Component;

class CurriculumNatnlTvetFile extends Component
{
    public $tableFilter = 'CERTIFICATES';

    public function render()
    {
        return view('livewire.curriculum.pages.curriculum-natnl-tvet-file');
    }
}
