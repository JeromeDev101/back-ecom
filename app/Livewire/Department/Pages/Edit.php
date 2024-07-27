<?php

namespace App\Livewire\Department\Pages;

use App\Models\Department;
use App\Traits\FileUploadTrait;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\Attributes\Title;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithFileUploads;

#[Title('Department | Edit')]
class Edit extends Component
{
    use LivewireAlert, WithFileUploads, FileUploadTrait;

    public $id;
    public $name;
    public $theme_color;
    public $logo;
    public $img_preview;

    public function mount()
    {
        $department = Department::find($this->id);
        $this->name = $department->name;
        $this->theme_color = $department->theme_color;
        $this->img_preview = $department->logo;
    }

    public function rules()
    {
        return [
            'name' => 'required|unique:departments,name,'.$this->id,
            'logo' => 'nullable|mimes:jpeg,jpg,png,bmp,gif|max:1024',
        ];
    }

    public function save()
    {
        $this->validate();

        $department = Department::find($this->id);
        $department->name = $this->name;
        $department->theme_color = $this->theme_color;
        if($this->logo) {
            $department->logo = $this->uploadFile($this->logo, 'images/department/logo');
        }
        $department->save();

        $this->flash('success', 'Successfully Added',[
            'position' => 'center'
        ], 'settings/departments');
        return redirect('settings/departments');
    }

    public function render()
    {
        return view('livewire.department.pages.edit');
    }
}
