<?php

namespace App\Livewire\Linkage;

use Livewire\Component;

class LinkageView extends Component
{
    public function render()
    {
        return view('livewire.linkage.linkage-view')
            ->layout('layouts.app')
            ->title('CEIT - Linkages');
    }
}
