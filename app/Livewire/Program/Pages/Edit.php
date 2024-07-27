<?php

namespace App\Livewire\Program\Pages;

use App\Models\Program;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Edit extends Component
{
    use LivewireAlert;

    public $id;
    public $name;
    public $acronym;

    public function mount()
    {
        $program = Program::find($this->id);
        $this->name = $program->name;
        $this->acronym = $program->acronym;
    }

    public function rules()
    {
        return [
            'name' => 'required|unique:programs,name,' . $this->id,
            'acronym' => 'nullable|unique:programs,acronym,' . $this->id,
        ];
    }

    public function save()
    {
        $this->validate();

        $program = Program::find($this->id);
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
        return view('livewire.program.pages.edit');
    }
}
