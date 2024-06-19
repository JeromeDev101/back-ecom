<?php

namespace App\Livewire\RolesPermission;

use Livewire\Component;
use Livewire\Attributes\Title;

#[Title('CEIT | Edit Role')]
class RolesEdit extends Component
{
    public function render()
    {
        return view('livewire.roles-permission.roles-edit')->layout('layouts.app');
    }
}
