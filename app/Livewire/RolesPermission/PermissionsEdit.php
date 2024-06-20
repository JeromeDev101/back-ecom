<?php

namespace App\Livewire\RolesPermission;

use Livewire\Component;
use Livewire\Attributes\Title;

#[Title('CEIT | Edit Permission')]
class PermissionsEdit extends Component
{
    public function render()
    {
        return view('livewire.roles-permission.permissions-edit')->layout('layouts.app');
    }
}
