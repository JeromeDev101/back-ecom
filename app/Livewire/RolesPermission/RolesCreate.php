<?php

namespace App\Livewire\RolesPermission;

use Livewire\Component;
use Livewire\Attributes\Title;
use Spatie\Permission\Models\Role;

#[Title('CEIT | Create Role')]
class RolesCreate extends Component
{

    public $name;

    public function rules()
    {
        return [
            'name' => 'required|min:3',
        ];
    }

    public function save()
    {
        $input = $this->validate();
        Role::create($input);
        $this->reset();
        session()->flash('message', 'Successsfully Added!');
    }
    public function render()
    {
        return view('livewire.roles-permission.roles-create')->layout('layouts.app');
    }
}
