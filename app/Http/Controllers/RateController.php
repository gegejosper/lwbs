<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rate;
use App\Category;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class RateController extends Controller
{
    //
    public function addRate(Request $request)
    {
        $rules = array(
                'cat_name' => 'required',
                'minimum' => 'required',
                'rate' => 'required',
                'erate' => 'required'
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return Response::json(array(
                    'errors' => $validator->getMessageBag()->toArray(),
            ));
        } else {
            $data = new Rate();
            $data->name = $request->cat_name;
            $data->minimum = $request->minimum;
            $data->rate = $request->rate;
            $data->excessrate = $request->erate;
            $data->save();
            Log::notice('Admin added new rate '.$request->cat_name);
            return response()->json($data);
        }
    }
    public function readRate(Request $req)
    {
        $dataRate = Rate::all();
        $dataCategory = Category::all();
        return view('admin.rate',compact('dataRate', 'dataCategory'));
        
    }
    public function editRate(Request $req)
    {
        $data = Rate::find($req->id);
        $data->name = $req->cat_name; 
        $data->minimum = $req->minimum; 
        $data->rate = $req->rate; 
        $data->excessrate = $req->erate; 
        $data->save();
        Log::notice('Admin edit the rate '.$req->cat_name);
        return response()->json($data);
    }
    public function deleteRate(Request $req)
    {
        Rate::find($req->id)->delete();
        return response()->json();
    }
}
