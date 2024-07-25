<?php

namespace App\Livewire\Department;

use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Lazy;
use Livewire\Attributes\Title;
use App\Models\Department as DepartmentModel;
use Jantinnerezo\LivewireAlert\LivewireAlert;

#[Lazy()]
#[Title('CEIT | Departments')]
class Department extends Component
{
    use LivewireAlert;
    public $id;

    protected $listeners = [
        'confirmed',
        'cancelled'
    ];

    #[On('delete:department')]
    public function deleteDepartment($rowId): void
    {
        $this->confirm('Are you sure do want to delete?', [
            'onConfirmed' => 'confirmed',
            'onDismissed' => 'cancelled'
        ]);

        $this->id = $rowId;
    }

    public function confirmed()
    {
        $department = DepartmentModel::find($this->id);
        $department->delete();

        $this->flash('success', 'Successfully Deleted', [], 'settings/departments');
    }

    public function render()
    {
        return view('livewire.department.department');
    }
}
