<?php

namespace App\Livewire\RolesPermission;

use Livewire\Component;
use App\Models\Role\Role;
use Livewire\Attributes\On;
use Livewire\Attributes\Lazy;
use Livewire\Attributes\Title;
use Jantinnerezo\LivewireAlert\LivewireAlert;

#[Title('CEIT | Roles and Permission')]

class RolesPermissionView extends Component
{
    use LivewireAlert;

    public $id;

    protected $listeners = [
        'confirmed',
        'cancelled'
    ];

    #[On('delete:roles')]
    public function delete($rowId): void
    {
        $this->confirm('Are you sure do want to delete?', [
            'onConfirmed' => 'confirmed',
            'onDismissed' => 'cancelled'
        ]);

        $this->id = $rowId;
    }

    public function confirmed()
    {
        $role = Role::find($this->id);
        $role->delete();
        $this->flash('success', 'Successfully Deleted', [], 'roles-and-permission');
    }

    public function cancelled()
    {
        return $this->redirect('roles-and-permission');
    }
    public function render()
    {
        return view('livewire.roles-permission.roles-permission-view');
    }
}
