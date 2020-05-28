<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\CategoryModel;
use DB;

class CategoryController extends Controller
{

    public function index(Request $request){

        $json = '[{"id":1,"children":[{"id":2,"children":[{"id":3,"children":[]},{"id":4,"children":[]}]}]},{"id":5,"children":[{"id":6,"children":[{"id":7,"children":[{"id":8,"children":[{"id":9,"children":[{"id":10,"children":[]}]}]}]}]}]}]';

        $decoded_json = json_decode($json, TRUE);
        // dd($decoded_json);

        $simplified_list = [];
        $r = $this->recur1($decoded_json, $simplified_list);
        // $r = $this->convertedNestedArrayToSimplifiedList($decoded_json, $simplified_list);

        // return $decoded_json;
        dd($simplified_list);






        $info = [
            'categories' => CategoryModel::where(['parent_id' => 0])->get(),
        ];

        // dd($info['categories'][1]->categories);

        return view('category-subcategory.list', $info);
    }

    public function recur1($nested_array=[], &$simplified_list=[]){
        static $counter = 0;
        
        if(!isset($nested_array[0])){
            $nested_array = $nested_array['children'];
        }

        // if($counter==2){
        //     dd($simplified_list, $nested_array);
        // }

        foreach($nested_array as $k => $v){
            $simplified_list[] = ["category_id" => $v['id'], 'parent_id' => NULL];
            if(!empty($v["children"])){
                $counter+=1;
                $this->recur2($v['children'], $simplified_list);
            }
            // dd($simplified_list,44);
        }

        dd($simplified_list);
    }

    public function recur2($sub_nested_array=[], &$simplified_list=[]){
        static $counter = 0;
        foreach($sub_nested_array as $k => $v){
            $simplified_list[] = ["category_id" => $v['id'], 'parent_id' => NULL];
            // dd($v, $simplified_list);
            if(!empty($v["children"])){
                $counter+=1;
                if($counter==2){
                    // dd($simplified_list, $sub_nested_array);
                }
                return $this->recur2($v['children'], $simplified_list);
            }
            // dd($simplified_list,45);
        }
    }

    public function convertedNestedArrayToSimplifiedList($nested_array=[], &$simplified_list=[], $next_array_item = NULL, &$counter=0){
        $arr = (!empty($next_array_item))?  $next_array_item[0] : $nested_array[0];

        // if($counter==1){
        //     dd($arr, 'ss');
        // }

        $key = rand(0,1000);
        $simplified_list[$key] = ["category_id" => $arr['id'], "parent_id" => NULL, "childs" => [] ];

        if($counter==1){
            // dd($arr);
        }

        if(isset($arr['children']) && !empty( $arr['children'] )){
            $counter+=1;
            if($counter==5){
                // dd($simplified_list);
            }
            return $this->convertedNestedArrayToSimplifiedList( $nested_array, $simplified_list[$key], $arr['children'], $counter );
        }
        dd($simplified_list);
    }

    public function create(Request $request){
        $info = [
            'categories' => CategoryModel::orderBy('name', 'ASC')->get(),
        ];

        return view('category-subcategory.create', $info);
    }

    public function store(Request $request){
        $rules=[
            'name' => 'required',
            'parent_id' => 'nullable',
        ];

        $messages = [
            "name.required" => "Category name is required.",
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        
        if( $validator->fails() ){
            return back()->withErrors($validator)->withInput();
        } else {
            DB::beginTransaction();
            try {
                $info = [
                    "success" => FALSE,
                ];
                $query = [
                    'name' => $request->name,
                    'parent_id' => (!empty($request->parent_id))? $request->parent_id : 0,
                ];
    
                $category = CategoryModel::updateOrCreate(['category_id' => $request->category_id], $query);

                DB::commit();
                $info['success'] = TRUE;
            } catch (\Exception $e) {
                dd($e);
                DB::rollback();
                $info['success'] = FALSE;
            }

            if(!$info['success']){
                return redirect(route('category-subcategory.create'))->with('error', "Failed to save.");
            }

            return redirect(route('category-subcategory.edit', ['category_id' => $category->category_id]))->with('success', "Successfully saved.");
        }
    }

    public function edit(Request $request){
        $info = [
            'categories' => CategoryModel::orderBy('name', 'ASC')->get(),
            'category' => CategoryModel::find($request->category_id),
        ];

        return view('category-subcategory.create', $info);
    }
}
