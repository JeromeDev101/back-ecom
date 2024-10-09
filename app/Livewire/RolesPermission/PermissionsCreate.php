<?php

namespace App\Livewire\RolesPermission;

use App\Traits\FormOptionTrait;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\Attributes\Lazy;
use Livewire\Attributes\Title;
use Spatie\Permission\Models\Permission;
use Jantinnerezo\LivewireAlert\LivewireAlert;

#[Title('CEIT | Create Permission')]
#[Lazy()]

class PermissionsCreate extends Component
{
    use LivewireAlert, FormOptionTrait;

    public $name;
    public $temp_name;
    public $permissionOptions = [];

    public function mount()
    {
        $this->permissionOptions = $this->permissionOptions();
    }

    public function rules()
    {
        return [
            'name' => 'required|min:3|unique:roles,name',
            'group_name' => 'required',
        ];
    }

    public function updatedTempName()
    {
        $this->name = Str::slug($this->temp_name) . '-create';
    }

    public function messages()
    {
        return [
            'name.unique' => 'The Permission name already existed',
            'name.required' => 'The Permission name is required',
            'name.min' => 'The Permission name has a minimum of 3 characters',
            'group_name.required' => 'The Group name is required',
        ];
    }

    public function save()
    {
        $this->validate();
        $methods = ['create', 'update', 'read', 'delete'];

        foreach($methods as $method) {
            Permission::create([
                'name' => Str::slug($this->name). '-' .$method,
                'guard_name' => 'web'
            ]);
        }

        $this->flash('success', 'Successfully Added',[
            'position' => 'center'
        ], 'roles-and-permissions');

        return $this->redirectRoute('permissions.index');
    }

    public function render()
    {
        return view('livewire.roles-permission.permissions-create');
    }
}
