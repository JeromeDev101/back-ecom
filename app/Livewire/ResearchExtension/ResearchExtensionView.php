<?php

namespace App\Livewire\ResearchExtension;

use Livewire\Component;
use Livewire\Attributes\Lazy;
use Livewire\Attributes\Title;

#[Lazy()]
#[Title('CEIT | Research and Extension')]
class ResearchExtensionView extends Component
{
    public function render()
    {
        return view('livewire.research-extension.research-extension-view');
    }
}
