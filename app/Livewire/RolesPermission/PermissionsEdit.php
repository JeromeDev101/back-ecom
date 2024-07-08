<?php

namespace App\Livewire\RolesPermission;

use Livewire\Component;
use Livewire\Attributes\Lazy;
use Livewire\Attributes\Title;

#[Title('CEIT | Edit Permission')]
#[Lazy()]

class PermissionsEdit extends Component
{
    public function render()
    {
        return view('livewire.roles-permission.permissions-edit');
    }
}
