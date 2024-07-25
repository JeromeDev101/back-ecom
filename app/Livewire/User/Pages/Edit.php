<?php

namespace App\Livewire\User\Pages;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Title;
use App\Traits\FormOptionTrait;
use Illuminate\Support\Facades\Hash;
use Jantinnerezo\LivewireAlert\LivewireAlert;

#[Title('User | Edit')]
class Edit extends Component
{
    use FormOptionTrait, LivewireAlert;

    public $id;
    public $name;
    public $email;
    public $role = '';
    public $password;
    public $is_active;
    public $password_confirmation;
    public $roleOptions;

    public function mount()
    {
        $user = User::find($this->id);
        $this->name = $user->name;
        $this->email = $user->email;
        $this->is_active = $user->is_active;
        $this->role = $user->getRoleNames()->toArray()[0];
        $this->roleOptions = $this->roleOptions();
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required|unique:users,email,'. $this->id,
            'role' => 'required',
            'password' => 'nullable|confirmed',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Name is required',
            'email.required' => 'Email is required',
            'role.required' => 'Role is required',
            'password.confirmed' => 'Comfirmation password doesn\'t match',
        ];
    }

    public function save()
    {
        $this->validate();

        $user = User::find($this->id);
        $user->name = $this->name;
        $user->email = $this->email;
        if(!empty($this->password)){
            $user->password = Hash::make($this->password);
        }
        $user->save();

        // Clear all current roles
        $user->syncRoles([]);

        $user->assignRole($this->role);

        $this->flash('success', 'Successfully Updated',[
            'position' => 'center'
        ], 'users');
        return redirect('users');
    }

    public function render()
    {
        return view('livewire.user.pages.edit');
    }
}
