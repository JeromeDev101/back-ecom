<?php

namespace App\Livewire\RolesPermission;

use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Spatie\Permission\Models\Permission;
use Jantinnerezo\LivewireAlert\LivewireAlert;

#[Title('CEIT | Roles and Permission')]
class PermissionView extends Component
{
    use LivewireAlert;

    public $permissionId;

    protected $listeners = [
        'confirmed',
        'cancelled'
    ];

    #[On('delete:permission')]
    public function deletePermission($rowId): void
    {
        $this->confirm('Are you sure do want to delete?', [
            'onConfirmed' => 'confirmed',
            'onDismissed' => 'cancelled'
        ]);

        $this->permissionId = $rowId;
    }

    public function confirmed()
    {
        $permission = Permission::find($this->permissionId);
        $permission->delete();

        $this->flash('success', 'Successfully Deleted', [], route('permissions.index'));
    }

    public function cancelled()
    {
        return $this->redirectRoute('permissions.index');
    }

    public function render()
    {
        return view('livewire.roles-permission.permission-view');
    }
}
