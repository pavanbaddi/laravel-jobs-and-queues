<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\CategoryModel;

class CategoryController extends Controller
{
    public function create(Request $request){
        $info = [
            'categories' => CategoryModel::orderBy('name', 'ASC')->get(),
        ];

        return view('category-subcategory.create', $info);
    }
}
