<?php

namespace App\Livewire\RolesPermission;

use Livewire\Component;
use Livewire\Attributes\Lazy;
use Livewire\Attributes\Title;
use Spatie\Permission\Models\Permission;
use Jantinnerezo\LivewireAlert\LivewireAlert;

#[Title('CEIT | Edit Permission')]
#[Lazy()]

class PermissionsEdit extends Component
{
    use LivewireAlert;
    public $name;
    public $id;

    public function mount($id)
    {
        $this->id = $id;
        $this->name = Permission::find($id)->name;
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
            'name.unique' => 'The Permission name already existed',
            'name.required' => 'The Permission name is required',
            'name.min' => 'The Permission name has a minimum of 3 characters',
        ];
    }

    public function save()
    {
        $input = $this->validate();
        $permission = Permission::find($this->id);
        $permission->update($input);

        $this->flash('success', 'Successfully Updated',[
            'position' => 'center'
        ], 'roles-and-permissions');

        return redirect('roles-and-permission');
    }
    public function render()
    {
        return view('livewire.roles-permission.permissions-edit');
    }
}
