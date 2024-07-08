<?php

namespace App\Livewire\InfrastructureDevelopment;

use Livewire\Component;
use Livewire\Attributes\Lazy;
use Livewire\Attributes\Title;

#[Lazy()]
#[Title('CEIT | Infrastructure Development')]
class InfrastructureDevelopmentView extends Component
{
    public function render()
    {
        return view('livewire.infrastructure-development.infrastructure-development-view');
    }
}
