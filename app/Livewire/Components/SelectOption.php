<?php

namespace App\Livewire\Components;

use Livewire\Attributes\Modelable;
use Livewire\Component;

class SelectOption extends Component
{
    #[Modelable]
    public $value = '';

    public array $options;

    public function render()
    {
        return view('livewire.components.select-option');
    }
}
