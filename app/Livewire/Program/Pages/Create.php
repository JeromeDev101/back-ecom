<?php

namespace App\Livewire\Program\Pages;

use App\Models\Program;
use Livewire\Component;
use Livewire\Attributes\Title;
use Jantinnerezo\LivewireAlert\LivewireAlert;

#[Title('Program | Create')]
class Create extends Component
{
    use LivewireAlert;

    public $name;
    public $acronym;

    protected $rules = [
        'name' => 'required|unique:programs,name',
        'acronym' => 'nullable|unique:programs,acronym',
    ];

    public function save()
    {
        $this->validate();

        $program = new Program;
        $program->name = $this->name;
        $program->acronym = $this->acronym;
        $program->save();

        $this->flash('success', 'Successfully Added',[
            'position' => 'center'
        ], 'settings/programs');
        return redirect('settings/programs');

    }

    public function render()
    {
        return view('livewire.program.pages.create');
    }
}
