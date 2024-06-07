<?php

namespace App\Livewire\RolesPermission;

use Livewire\Component;

class RolesPermissionView extends Component
{
    public function render()
    {
        return view('livewire.roles-permission.roles-permission-view')
            ->layout('layouts.app')
            ->title('CEIT - Roles and Permission');
    }
}
