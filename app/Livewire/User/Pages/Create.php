<?php

namespace App\Livewire\User\Pages;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Title;
use App\Traits\FormOptionTrait;
use Illuminate\Support\Facades\Hash;
use Jantinnerezo\LivewireAlert\LivewireAlert;

#[Title('User | Create')]
class Create extends Component
{
    use FormOptionTrait, LivewireAlert;

    public $name;
    public $email;
    public $role = '';
    public $password;
    public $password_confirmation;
    public $roleOptions;

    public function mount()
    {
        $this->roleOptions = $this->roleOptions();
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'role' => 'required',
            'password' => 'required|confirmed',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Name is required',
            'email.required' => 'Email is required',
            'email.unique' => 'Email is already used',
            'role.required' => 'Role is required',
            'password.required' => 'Password is required',
            'password.confirmed' => 'Confirm password Invalid',
        ];
    }

    public function save()
    {
        $this->validate();

        $user = new User;
        $user->name = $this->name;
        $user->email = $this->email;
        $user->password = Hash::make($this->password);
        $user->save();

        $user->assignRole($this->role);

        $this->flash('success', 'Successfully Added',[
            'position' => 'center'
        ], 'users');
        return redirect('users');
    }

    public function render()
    {
        return view('livewire.user.pages.create');
    }
}
