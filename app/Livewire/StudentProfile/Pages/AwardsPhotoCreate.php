<?php

namespace App\Livewire\StudentProfile\Pages;

use Livewire\Component;
use Livewire\Attributes\Lazy;
use Livewire\WithFileUploads;
use App\Models\CurriculumFile;
use Livewire\Attributes\Title;
use App\Traits\FileUploadTrait;
use Jantinnerezo\LivewireAlert\LivewireAlert;

#[Lazy()]
#[Title('CEIT | Student Profile - Recognition and Awards')]
class AwardsPhotoCreate extends Component
{
    use LivewireAlert, WithFileUploads, FileUploadTrait;

    public $files;

    public function mount()
    {
        $this->files = [
            'reference' => '',
            'file_name' => '',
            'orig_file_name' => '',
            'banner_text' => ''
        ];
    }

    public function rules()
    {
        return [
            'files.file_name' => 'required|mimes:jpeg,jpg,png,bmp,gif|max:1024',
            'files.banner_text' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'files.file_name.required' => 'Please provide a banner',
            'files.banner_text.required' => 'Banner text is required',
        ];
    }

    public function save()
    {
        $this->validate();
        $filename = $this->uploadFile($this->files['file_name'], 'images/curriculum/banner');

        $file = new CurriculumFile;
        $file->reference = 'RECOGNITION';
        $file->file_name = $filename;
        $file->orig_file_name = $this->files['file_name']->getClientOriginalName();
        $file->banner_text = $this->files['banner_text'];
        $file->path = $filename['path'];
        $file->save();

        $this->flash('success', 'Successfully Created',[
            'position' => 'center'
        ], route('awards-photo.index'));

        return $this->redirectRoute('awards-photo.index');
    }

    public function render()
    {
        return view('livewire.student-profile.pages.awards-photo-create');
    }
}
