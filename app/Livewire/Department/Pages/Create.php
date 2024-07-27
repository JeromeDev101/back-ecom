<?php

namespace App\Livewire\Department\Pages;

use App\Models\Department;
use App\Traits\FileUploadTrait;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\Attributes\Title;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithFileUploads;

#[Title('Department | Create')]
class Create extends Component
{
    use LivewireAlert, WithFileUploads, FileUploadTrait;

    public $name;
    public $theme_color;
    public $logo;

    public function mount()
    {
        $this->theme_color = '#8FE4C2';
    }

    public function rules()
    {
        return [
            'name' => 'required|unique:departments,name',
            'logo' => 'nullable|mimes:jpeg,jpg,png,bmp,gif|max:1024',
        ];
    }

    public function save()
    {
        $this->validate();

        $department = new Department;
        $department->name = $this->name;
        $department->theme_color = $this->theme_color;
        $department->logo = $this->uploadFile($this->logo, 'images/department/logo');
        $department->save();

        $this->flash('success', 'Successfully Added',[
            'position' => 'center'
        ], 'settings/departments');
        return redirect('settings/departments');
    }

    public function render()
    {
        return view('livewire.department.pages.create');
    }
}
