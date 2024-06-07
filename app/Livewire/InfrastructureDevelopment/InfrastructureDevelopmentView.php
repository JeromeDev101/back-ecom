<?php

namespace App\Livewire\InfrastructureDevelopment;

use Livewire\Component;

class InfrastructureDevelopmentView extends Component
{
    public function render()
    {
        return view('livewire.infrastructure-development.infrastructure-development-view')
            ->layout('layouts.app')
            ->title('CEIT - Infrastructure Development');
    }
}
