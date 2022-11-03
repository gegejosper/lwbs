<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Response;
use App\User;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    public function addUser(Request $request)
    {
        $rules = array(
                'fname' => 'required',
                'lname' => 'required',
                'mname' => 'required',
                'password' => 'required|string|min:6',
                'email' => 'required|string|email|max:255|unique:users',
                'position' => 'required'
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return Response::json(array(
                    'errors' => $validator->getMessageBag()->toArray(),
            ));
        } else {
            $data = new User();
            $data->fname = $request->fname;
            $data->mname = $request->mname;
            $data->lname = $request->lname;
            $data->usertype = $request->position;
            $data->meternum = '0000-00-0';
            $data->email = $request->email;
            $data->username = $request->username;
            $data->password = bcrypt($request->password);
            $data->save();
            $user_name = Auth::user()->lname.', '.Auth::user()->fname;
            Log::notice($user_name.' added new user to the system'.$request->lname.', '.$request->fname);
            return response()->json($data);
        }
    }
    public function readUser(Request $req)
    {
        $dataUser = User::all();
        return view('admin.rate',compact('dataUser'));
        
    }
    public function editUser(Request $request)
    {
        $data = User::find($request->id);
        $data->fname = $request->fname;
        $data->mname = $request->mname;
        $data->lname = $request->lname;
        $data->usertype = $request->position;
        $data->meternum = '0000-00-0';
        $data->email = $request->email;
        $data->usertype = $request->position;
        $data->password = bcrypt($request->password);
        $data->save();

        return response()->json($data);
    }
    public function deleteUser(Request $req)
    {
        User::find($req->id)->delete();

        return response()->json();
    }
}
