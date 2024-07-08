<?php

namespace App\Livewire\Linkage;

use Livewire\Component;
use Livewire\Attributes\Lazy;
use Livewire\Attributes\Title;

#[Lazy()]
#[Title('CEIT | Linkages')]
class LinkageView extends Component
{
    public function render()
    {
        return view('livewire.linkage.linkage-view');
    }
}
