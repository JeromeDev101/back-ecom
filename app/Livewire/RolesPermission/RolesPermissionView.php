<?php

namespace App\Livewire\RolesPermission;

use Livewire\Component;
use App\Models\Role\Role;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Spatie\Permission\Models\Permission;
use Jantinnerezo\LivewireAlert\LivewireAlert;

#[Title('CEIT | Roles and Permission')]
class RolesPermissionView extends Component
{
    use LivewireAlert;

    public $role_id;
    public $permission_id;
    public $activeTab = 'roles';
    public $confirmType;

    protected $listeners = [
        'confirmed',
        'cancelled'
    ];

    #[On('delete:roles')]
    public function deleteRole($rowId): void
    {
        $this->confirm('Are you sure do want to delete?', [
            'onConfirmed' => 'confirmed',
            'onDismissed' => 'cancelled'
        ]);

        $this->role_id = $rowId;
        $this->confirmType = 'role';
    }

    #[On('delete:permission')]
    public function deletePermission($rowId): void
    {
        $this->confirm('Are you sure do want to delete?', [
            'onConfirmed' => 'confirmed',
            'onDismissed' => 'cancelled'
        ]);

        $this->permission_id = $rowId;
        $this->confirmType = 'permission';
    }

    public function confirmed()
    {
        if($this->confirmType == 'role'){
            $role = Role::find($this->role_id);
            $role->delete();
        } else {
            $permission = Permission::find($this->permission_id);
            $permission->delete();
        }

        $this->flash('success', 'Successfully Deleted', [], 'roles-and-permission');
    }

    public function setActiveTab($tabName)
    {
        $this->activeTab = $tabName;
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
