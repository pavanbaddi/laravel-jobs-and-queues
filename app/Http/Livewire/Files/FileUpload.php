<?php

namespace App\Http\Livewire\Files;

use Exception;
use Livewire\Component;
use Log;
use File;
use Illuminate\Support\Str;
use Storage;

class FileUpload extends Component
{

    public $image;

    public $listeners = ["single_file_uploaded" => 'singleFileUploaded'];

    public function singleFileUploaded($file){

        try {

            $decoded_file = base64_decode($file);
            $file_meta = explode(';', $file)[0];
            $file_mime_type = explode(':', $file_meta)[1];
            $file_extension = explode('/', $file_mime_type)[1];

            $file_name = Str::random(10).'.'.$file_extension;

            $data = substr($file, strpos($file, ',') + 1);
            $result = Storage::disk('public_uploads')->put($file_name, $decoded_file);
        } catch (Exception $ex) {
            dd($ex);
        }
    }

    public function render()
    {
        return view('livewire.files.file-upload');
    }
}
