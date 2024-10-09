<?php

namespace App\Livewire\RolesPermission;

use Livewire\Component;
use Livewire\Attributes\Lazy;
use Livewire\Attributes\Title;
use Spatie\Permission\Models\Role;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Spatie\Permission\Models\Permission;

#[Title('CEIT | Edit Role')]
#[Lazy()]
class RolesEdit extends Component
{
    use LivewireAlert;
    public $name;
    public $id;
    public $permissions;
    public $permissionCheckbox = [];

    public function mount($id)
    {
        $this->id = $id;
        $this->name = Role::find($id)->name;

        $this->permissions = Permission::all()->toArray();

        dd($this->permissions);

        foreach (Role::find($id)->permissions as $permission) {
            array_push($this->permissionCheckbox, $permission->name);
        }
    }

    public function rules()
    {
        return [
            'name' => 'required|min:3|unique:roles,name,' . $this->id,
        ];
    }

    public function messages()
    {
        return [
            'name.unique' => 'The Role name already existed',
            'name.required' => 'The Role name is required',
            'name.min' => 'The Role name has a minimum of 3 characters',
        ];
    }

    public function assignedPermission($permission, $isChecked)
    {
        if ($isChecked && !in_array($permission, $this->permissionCheckbox)) {
            array_push($this->permissionCheckbox, $permission);
        } else {
            $key = array_search($permission, $this->permissionCheckbox);
            if ($key !== false) {
                unset($this->permissionCheckbox[$key]);
            }
        }
    }

    public function save()
    {
        $input = $this->validate();
        $role = Role::find($this->id);
        $role->update($input);

        $this->flash('success', 'Successfully Updated',[
            'position' => 'center'
        ], 'roles-and-permissions');

        return $this->redirectRoute('roles-permission.index');
    }
    public function render()
    {
        return view('livewire.roles-permission.roles-edit');
    }
}
