<?php

namespace App\Livewire\RolesPermission;

use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Spatie\Permission\Models\Role;

#[Title('CEIT | Roles and Permission')]
class RolesPermissionView extends Component
{

    #[On('delete')]
    public function delete($rowId): void
    {
        $role = Role::find($rowId);
        $role->delete();
        session()->flash('message', 'Successfully Deleted');
        $this->redirect('roles-and-permission');
    }
    public function render()
    {
        return view('livewire.roles-permission.roles-permission-view')
            ->layout('layouts.app');
    }
}
