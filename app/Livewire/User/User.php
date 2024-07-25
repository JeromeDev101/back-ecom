<?php

namespace App\Livewire\User;

use App\Models\User as UserModel;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Lazy;
use Livewire\Attributes\Title;
use Jantinnerezo\LivewireAlert\LivewireAlert;

#[Lazy()]
#[Title('CEIT | Users')]
class User extends Component
{
    use LivewireAlert;
    public $id;

    protected $listeners = [
        'confirmed',
        'cancelled'
    ];

    #[On('delete:user')]
    public function deleteUser($rowId): void
    {
        $this->confirm('Are you sure do want to delete?', [
            'onConfirmed' => 'confirmed',
            'onDismissed' => 'cancelled'
        ]);

        $this->id = $rowId;
    }

    public function confirmed()
    {
        $user = UserModel::find($this->id);
        $user->delete();

        $this->flash('success', 'Successfully Deleted', [], 'users');
    }

    public function render()
    {
        return view('livewire.user.user');
    }
}
