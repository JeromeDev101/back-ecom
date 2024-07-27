<?php

namespace App\Traits;

use Illuminate\Support\Carbon;
use Livewire\WithFileUploads;

trait FileUploadTrait {

    use WithFileUploads;

    public function uploadFile($file, $path)
    {
        if($file) {
            $filename = $file->store( $path, 'public');
            return [
                'path' => $filename,
                'orig_name' => $file->getClientOriginalName(),
            ];
        } else {
            return null;
        }
    }
}
