<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Concessionaire;
use App\Rate;
use App\Monthlybill;
Use App\Bill;
use Validator;
use Response;
use Auth;
use Redirect;
use App\Setting;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Log;

class ConsumerController extends Controller
{
    //
    public function login()
    {
        return view('consumer.login');
    }
    public function index()
    {
        $id = Auth::user()->id;
        
        $Concessionaire = User::find($id);

        $paymentHistory = Bill::where('consumerId','=',$id)->get();
        $billHistory = Monthlybill::where('meternum','=',$Concessionaire->meternum)->get();
        //dd($billHistory);
        
        $Account = Concessionaire::where('meternum', '=', $Concessionaire->meternum)->first(); 
        $Rate = Rate::find($Account->category);
        //dd($Account);
         return view('consumer.home', compact('Concessionaire', 'Rate', 'billHistory', 'Account', 'paymentHistory'));
        
        
        // $dataSetting = Setting::all();
        // return view('consumer.home', compact('dataSetting'));
    }

    public function bill($billid)
    {

        $billHistory = Monthlybill::where('id','=',$billid)->first();
        //dd($billHistory);
        
        $Account = Concessionaire::where('meternum', '=', $billHistory->meternum)->first(); 

        //dd($Account);
         return view('consumer.bill', compact('Concessionaire', 'billHistory'));
        
        
        // $dataSetting = Setting::all();
        // return view('consumer.home', compact('dataSetting'));
    }
    public function notifications()
    {
        $dataSetting = Setting::all();
        return view('consumer.notifications', compact('dataSetting'));
    }
    public function profile()
    {
        $dataSetting = Setting::all();
        return view('consumer.profile', compact('dataSetting'));
    }
    public function payment()
    {
        $dataSetting = Setting::all();
        return view('consumer.payment', compact('dataSetting'));
    }
    public function calculator()
    {
        $dataSetting = Setting::all();
        return view('consumer.calculator', compact('dataSetting'));
    }

    public function apply()
    {
        $dataCategory = Rate::all();
        return view('apply', compact('dataCategory'));
    }

    public function registerconcessionaire(Request $request)
    {

        $rules = array(
            'fname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'meternum' => 'required|string|max:255|unique:users'
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            // return Response::json(array(
            //          'errors' => $validator->getMessageBag()->toArray(),
            // ));
            //return response()->json(['errors'=>$validator->errors()]);
            return Redirect::back()->withErrors($validator);
            //$data->message = "Error! Please check";
            //return response()->json($data);
        } else {
            $dataUser = new User();
            $dataUser->fname = $request->fname;
            $dataUser->mname = $request->lname;
            $dataUser->lname = $request->mname;
            $dataUser->usertype = 'concessionaire';
            $dataUser->meternum = $request->meternum;
            $dataUser->email = $request->email;
            $dataUser->password = bcrypt($request->password);
            $dataUser->save();

            $dataCons = new Concessionaire();
            $dataCons->meternum = $request->meternum;
            $dataCons->category = $request->categories;
            $dataCons->clark = $request->clark;
            $dataCons->status = 'pending';
            $dataCons->userId = $dataUser->id;

            $dataCons->pic = 'pic';
            $dataCons->save();
            $user_name = Auth::user()->lname.', '.Auth::user()->fname;
            Log::notice($user_name.' added new consumer '.$request->lname.', '.$request->fname);
            return view('regsuccess', compact('dataUser'));
        }
        
    }

}

