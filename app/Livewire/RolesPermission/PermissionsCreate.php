<?php

namespace App\Livewire\RolesPermission;

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
    use LivewireAlert;

    public $name;
    public $temp_name;

    public function rules()
    {
        return [
            'name' => 'required|min:3|unique:roles,name',
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

        return redirect('roles-and-permission');
    }

    public function render()
    {
        return view('livewire.roles-permission.permissions-create');
    }
}
