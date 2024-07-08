<?php

namespace App\Livewire\RolesPermission;

use Livewire\Component;
use Livewire\Attributes\Lazy;

#[Lazy()]

class PermissionsCreate extends Component
{
    public function render()
    {
        return view('livewire.roles-permission.permissions-create');
    }
}
