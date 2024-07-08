<?php

namespace App\Livewire\RolesPermission;

use Livewire\Component;
use Livewire\Attributes\Lazy;
use Livewire\Attributes\Title;

#[Title('CEIT | Edit Role')]
#[Lazy()]
class RolesEdit extends Component
{
    public function render()
    {
        return view('livewire.roles-permission.roles-edit');
    }
}
