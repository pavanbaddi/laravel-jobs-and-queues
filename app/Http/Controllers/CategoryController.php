<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\CategoryModel;
use DB;

class CategoryController extends Controller
{

    public function index(Request $request){
        $info = [
            'categories' => CategoryModel::where(['parent_id' => 0])->get(),
        ];

        dd($info['categories'][1]->categories);

        return view('category-subcategory.list', $info);
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
