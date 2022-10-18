<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Concessionaire;
use DB;
use App\Rate;
use App\User;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;

class ConcessionaireControllerold extends Controller
{
    //
    public function addConcessionaire(Request $request)
    {
        $rules = array(
                'fname' => 'required',
                'mname' => 'required',
                'lname' => 'required',
                'meternum' => 'required',
                
                
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Response::json(array(

                    'errors' => $validator->getMessageBag()->toArray(),
            ));
        } else {
            $data = new Concessionaire();
            $data->fname = $request->fname;
            $data->lname = $request->lname;
            $data->mname = $request->mname;
            $data->meternum = $request->meternum;
            $data->clark = $request->clark;
            $image = $request->file('input_img');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/conimg');
            $image->move($destinationPath, $name);
            $data->pic =  $name;
            $data->save();
            $dataConcessionaire = Concessionaire::simplePaginate(50);
            //return view('admin.concessionaire',compact('dataConcessionaire'));
            return redirect('admin/concessionaire');
        }
    }
    public function readConcessionaire(Request $req)
    {
        $dataRate = Rate::all();
        $dataUser = User::where('usertype', '=', 'concessionaire')
                        ->get();
        $dataConcessionaire = Concessionaire::simplePaginate(50);
        return view('admin.concessionaire', compact('dataConcessionaire', 'dataRate', 'dataUser'));
        //return view('welcome');
    }
    public function editConcessionaire(Request $req)
    {
        $data = Concessionaire::find($req->id);
        $data->fname = $req->fname;
        $data->lname = $req->lname;
        $data->mname = $req->mname;
        $data->meternum = $req->meternum;
        $data->clark = $req->clark;
        $data->save();

        //return($req->bdate);
        return response()->json($data);
    }
    public function deleteConcessionaire(Request $req)
    {
        Concessionaire::find($req->id)->delete();

        return response()->json();
        //return redirect('admin/concessionaire');
    }
}
