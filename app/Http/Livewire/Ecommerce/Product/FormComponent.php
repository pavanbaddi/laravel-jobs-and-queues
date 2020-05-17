<?php

namespace App\Http\Livewire\Ecommerce\Product;

use Livewire\Component;
use Exception;
use Log;
use File;
use Illuminate\Support\Str;
use Storage;
use Illuminate\Support\Facades\Validator;

class FormComponent extends Component
{

    public $product = [
        "name" => "",
        "image" => "",
        "price" => NULL,
    ];

    public $validation_errors = [];

    public function save(){
        

        $rules=[
            'name' => 'required',
            'image' => 'nullable|required',
            'price' => 'required|integer',
        ];

        $messages = [
            "name.required" => "Name must be filled.",
            "image.required" => "Choose one image.",
            "price.required" => "Enter price.",
            "price.integer" => "Price must not have decimal points.",
        ];

        $validator = Validator::make($this->product,$rules, $messages);

        // $validator->after(function ($validator) {

        //     if($this->getFileInfo($validator->getData()["image"])["file_type"] != "image"){
        //         $validator->errors()->add('image', 'Must be an image');   
        //     }

        // });
        dd($validator);
        if($validator->fails()){
            return $this->validation_errors = $validator->errors()->toArray();
        }else{

            
        }
    }

    public function render()
    {
        return view('livewire.ecommerce.product.create_form');
    }
}
