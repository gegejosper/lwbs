<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;

class CategoryController extends Controller
{
    //
    public function addCategory(Request $request)
    {
        $rules = array(
                'cat_name' => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Response::json(array(
                    'errors' => $validator->getMessageBag()->toArray(),
            ));
        } else {
            $data = new Category();
            $data->cat_name = $request->cat_name;
            $data->save();

            return response()->json($data);
        }
    }
    public function readCategory(Request $req)
    {
        $data = Category::all();

        return view('admin.categories')->withData($data);
        //return view('admin.home')->withData($data);
        
    }
    public function editCategory(Request $req)
    {
        $data = Category::find($req->id);
        $data->cat_name = $req->cat_name; 
        $data->save();

        return response()->json($data);
    }
    public function deleteCategory(Request $req)
    {
        Category::find($req->id)->delete();

        return response()->json();
    }
}

