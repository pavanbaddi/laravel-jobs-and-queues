<?php

namespace App\Http\Livewire\Ecommerce\Product;

use Livewire\Component;
use Exception;
use Log;
use File;
use Illuminate\Support\Str;
use Storage;
use Illuminate\Support\Facades\Validator;
use App\ProductModel;
use DB;
use Illuminate\Support\Arr;
use Throwable;

class FormComponent extends Component
{

    public $product = [
        "product_id" => NULL,
        "name" => "Soya bean",
        "image" => "",
        "price" => "100",
    ];

    public $listeners = [
        "product_file_uploaded" => "fileUploaded"
    ];

    public $validation_errors = [];

    public function mount($product_id=NULL){
        try {
            $product = ProductModel::find($product_id)->toArray();
            $this->product = Arr::except($product, ['created_at', 'updated_at', 'deleted_at']);
        } catch (Throwable $e) {

        }

        
    }

    public function fileUploaded($file){
        $this->product["image"] = "";
        if($this->getFileInfo($file)["file_type"] == "image"){
            $this->product["image"] = $file;
        }
    }

    public function getFileInfo($file){
        $info = [
            "decoded_file" => NULL,
            "file_meta" => NULL,
            "file_mime_type" => NULL,
            "file_type" => NULL,
            "file_extension" => NULL,
        ];
        try{
            $info['decoded_file'] = base64_decode(substr($file, strpos($file, ',') + 1));
            $info['file_meta'] = explode(';', $file)[0];
            $info['file_mime_type'] = explode(':', $info['file_meta'])[1];
            $info['file_type'] = explode('/', $info['file_mime_type'])[0];
            $info['file_extension'] = explode('/', $info['file_mime_type'])[1];
        }catch(Exception $ex){

        }

        return $info;
    }

    public function save(){

        $rules=[
            'name' => 'required',
            'image' => 'nullable',
            'price' => 'required|integer',
        ];

        $messages = [
            "name.required" => "Name must be filled.",
            "price.required" => "Enter price.",
            "price.integer" => "Price must not have decimal points.",
        ];

        $validator = Validator::make($this->product,$rules, $messages);
        
        $validator->after(function ($validator) {
            if(!empty($validator->getData()["image"]) && $this->getFileInfo($validator->getData()["image"])["file_type"] != "image"){
                $validator->errors()->add('image', 'Must be an image');   
            }

        });

        if($validator->fails()){
            return $this->validation_errors = $validator->errors()->toArray();
        }else{
            $info = [
                "success" => FALSE,
                "product" => NULL,
            ];

            DB::beginTransaction(); 
            try {
                $product = $this->product;
                unset($product["product_id"], $product["image"]);
                $query = $product;
    
                $condition = [
                    "product_id" => $this->product["product_id"]
                ];

                $info["product"] = ProductModel::updateOrCreate($condition, $query);

                if(!empty($this->product["image"]) && $this->getFileInfo($this->product["image"])["file_type"] == "image"){
                    
                    $file_data = $this->getFileInfo($this->product["image"]);
                    $file_name = Str::random(10).'.'.$file_data['file_extension'];
                    $result = Storage::disk('public_uploads')->put($file_name, $file_data['decoded_file']);

                    if($result){
                        $info["product"]["image"] = $file_name;
                    }
                }

                $info["product"]->save();

                // dd($info);
                
                DB::commit();
                $info['success'] = TRUE;
            } catch (\Exception $e) {
                dd($e);
                DB::rollback();
                $info['success'] = FALSE;
            }
        
            if($info["success"]){ 
                $type = "success";
                if($info["product"]->wasRecentlyCreated){
                    $message = "New product created successfully.";
                }else{
                    $message = "Product updated successfully.";
                }   
            }else{
                $type = "error";
                $message = "Something went wrong while saving task.";
            }
            
            $this->emitTo('ecommerce.notification-component', 'flash_message', $type, $message);

            if($info["success"]){ 
                // return redirect()->to(route('ecommerce.product.edit', ["product_id" => $info["product"]["product_id"] ]));
            }
        }
    }

    public function render()
    {
        return view('livewire.ecommerce.product.create_form');
    }
}
