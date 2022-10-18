<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Position;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;

class PositionController extends Controller
{
    //
    public function addPosition(Request $request)
    {
        $rules = array(
                'pos_name' => 'required'
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return Response::json(array(
                    'errors' => $validator->getMessageBag()->toArray(),
            ));
        } else {
            $data = new Position();
            $data->name = $request->pos_name;
            $data->save();

            

            return response()->json($data);
        }
        //console.log($request->pos_name);
    }
    public function readPosition(Request $req)
    {
        $data = Position::all();

        return view('admin.positions')->withData($data);
        //return view('admin.home')->withData($data);
        
    }
    public function editPosition(Request $req)
    {
        $data = Position::find($req->id);
        $data->name = $req->pos_name; 
        $data->save();

        return response()->json($data);
    }
    public function deletePosition(Request $req)
    {
        Position::find($req->id)->delete();

        return response()->json();
    }
}
