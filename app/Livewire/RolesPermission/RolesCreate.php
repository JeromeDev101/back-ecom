<?php

namespace App\Livewire\RolesPermission;

use Livewire\Component;
use Livewire\Attributes\Lazy;
use Livewire\Attributes\Title;
use Spatie\Permission\Models\Role;
use Jantinnerezo\LivewireAlert\LivewireAlert;

#[Title('CEIT | Create Role')]
#[Lazy()]

class RolesCreate extends Component
{
    use LivewireAlert;

    public $name;

    public function rules()
    {
        return [
            'name' => 'required|min:3|unique:roles,name',
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

    public function save()
    {
        $input = $this->validate();
        Role::create($input);
        $this->reset();

        $this->flash('success', 'Successfully Added',[
            'position' => 'center'
        ], 'roles-and-permissions');
        return redirect('roles-and-permission');
    }
    public function render()
    {
        return view('livewire.roles-permission.roles-create');
    }
}
