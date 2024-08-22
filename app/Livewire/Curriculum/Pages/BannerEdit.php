<?php

namespace App\Livewire\Curriculum\Pages;

use Livewire\Component;
use Livewire\Attributes\Lazy;
use Livewire\WithFileUploads;
use App\Models\CurriculumFile;
use Livewire\Attributes\Title;
use App\Traits\FileUploadTrait;
use Jantinnerezo\LivewireAlert\LivewireAlert;

#[Lazy()]
#[Title('CEIT | Curriculum - Banner')]
class BannerEdit extends Component
{
    use LivewireAlert, WithFileUploads, FileUploadTrait;

    public $id;
    public $files;
    public $newFile;

    public function mount()
    {
        $this->files = CurriculumFile::find($this->id);
    }

    public function rules()
    {
        return [
            'files.newFile' => 'nullable|mimes:jpeg,jpg,png,bmp,gif|max:1024',
            'files.banner_text' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'files.banner_text.required' => 'Banner text is required',
        ];
    }

    public function save()
    {
        $this->validate();

        $file = CurriculumFile::find($this->id);
        if($file) {
            $file->reference = 'CURRICULUM';
            $file->orig_file_name = $this->newFile->getClientOriginalName();
            $file->banner_text = $this->files['banner_text'];
            if($this->newFile) {
                $filename = $this->uploadFile($this->newFile, 'images/curriculum/banner');
                $file->file_name = $filename;
                $file->path = $filename['path'];
            }
            $file->save();
        }

        $this->flash('success', 'Successfully Updated',[
            'position' => 'center'
        ], 'curriculum/performance/banner');
        return redirect('curriculum/performance/banner');
    }

    public function render()
    {
        return view('livewire.curriculum.pages.banner-edit');
    }
}
