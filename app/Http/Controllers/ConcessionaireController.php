<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Response;
use App\User;
use App\Rate;
use App\Category;
use App\Concessionaire;
use App\Monthlybill;
use App\Setting;
use App\Bill;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class ConcessionaireController extends Controller
{
    //
    public function addconsumer(Request $request)
    {
        $rules = array(
                'fname' => 'required',
                'lname' => 'required',
                'mname' => 'required',
                'categories' => 'required',
                'meternum' => 'required|unique:users',
                //'clark' => 'required',
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return Response::json(array(
                    'errors' => $validator->getMessageBag()->toArray(),
            ));
        } else {
            // $data = new User();
            // $data->fname = $request->fname;
            // $data->mname = $request->mname;
            // $data->lname = $request->lname;
            // $data->meternum = $request->meternum;
            // $data->email = $request->email;
            // $data->usertype = 'concessionaire';

            // $data->password = bcrypt($request->password);
            // $data->save();


            $dataCons = new Concessionaire();
            $dataCons->meternum = $request->meternum;
            $dataCons->category = $request->categories;
            $dataCons->purok = $request->purok;
            $dataCons->first_name = $request->fname;
            $dataCons->middle_name = $request->mname;
            $dataCons->last_name = $request->lname;
            $dataCons->status = 'connected';
            $dataCons->userId = 'n/a';
            $dataCons->pic = 'pic';
            $dataCons->save();

            $dataSetting = Setting::first();
            $duedate = $dataSetting->duedate;
            $finalDueDate = time() + ($duedate * 24 * 60 * 60);

            $dataBill = new Monthlybill();
            $dataBill->cubicCount = 0;
            $dataBill->prevrec = 0;
            $dataBill->newrec = 0;
            $dataBill->monthlyDueDate = date("Y-m-d", $finalDueDate);
            $dataBill->monthlyRecordDate = date("Y-m-d H:i:s");
            $dataBill->monthlyBillDate = date("2018-01");
            $dataBill->billAmount = 0;
            $dataBill->status ='1';
            $dataBill->meternum = $request->meternum;
            $dataBill->save();
            $user_name = Auth::user()->lname.', '.Auth::user()->fname;
            Log::notice($user_name.' added new consumer '.$request->lname.', '.$request->fname);
            return response()->json($dataCons);
        }
    }
    public function readconsumer(Request $req)
    {
       
        $dataUser = Concessionaire::with('rate')->paginate(50);
                    
        $dataRate = Rate::all();

        //dd($dataUser);
        return view('admin.concessionaires',compact('dataUser', 'dataRate'));
        
    }
    public function connectedConcessionaire()
    {
        // $dataUser = User::where('usertype', '=', 'concessionaire')
        //             ->with(['concessionaire' => function($query){
        //                 $query->where('status', '=', 'connected'); 
        //             }])
        //             ->paginate(20);            
        //dd($dataUser);
        $dataUser = Concessionaire::where('status', '=', 'connected')
        ->with('user')
        ->paginate(50);
        //dd($dataUser);
        $filtername = 'Connected';
        $dataRate = Rate::all();
        return view('admin.concessionairefilter',compact('dataUser', 'dataRate', 'filtername'));
        
    }
    public function disconnectedConcessionaire()
    {
       
        $dataUser = Concessionaire::where('status', '=', 'disconnected')
        ->with('user')
        ->paginate(50);
        //dd($dataUser);
        $filtername = 'Disconnected';
        return view('admin.concessionairefilter',compact('dataUser','filtername'));
        
    }
    public function consumers_list()
    {
        // $dataUser = User::where('usertype', '=', 'concessionaire')
        //             ->with(['concessionaire' => function($query){
        //                 $query->where('status', '=', 'connected'); 
        //             }])
        //             ->paginate(20);            
        //dd($dataUser);
        $dataUser = Concessionaire::with('user')->paginate(50);
        //dd($dataUser);
        $filtername = '';
        return view('admin.concessionairefilter',compact('dataUser', 'filtername'));
        
    }
    public function applicantConcessionaire()
    {
       
        $dataUser = Concessionaire::where('status', '=', 'pending')
        ->with('user')
        ->paginate(50);
        //dd($dataUser);
        $filtername = 'Applicant';
        $dataRate = Rate::all();
        // $dataUser = User::where('usertype', '=', 'concessionaire')
        //             ->with(['concessionaire' => function($query){
        //                 $query->where('status', '=', 'pending'); 
        //             }])
        //             ->paginate(20);            
        return view('admin.concessionairefilter',compact('dataUser', 'dataRate', 'filtername'));
        
    }
    public function applicants()
    {
       
        $dataUser = Concessionaire::where('status', '=', 'pending')
        ->with('user')
        ->paginate(50);
        //dd($dataUser);
        $filtername = 'Applicant';
        $dataRate = Rate::all();         
        return view('admin.applicants',compact('dataUser', 'dataRate', 'filtername'));
        
    }

    public function viewClark($clark)
    {
        
        $dataUser = Concessionaire::where('clark', '=', $clark)
        ->with('user')
        ->paginate(50);
        //dd($dataUser);
        $filtername = $clark;
        $dataRate = Rate::all();
        
        $dataUsers = Concessionaire::with('user')->where('clark', '=', $clark)->paginate(10); 
       
        //dd($Rate);
        return view('admin.concessionairefilter',compact('dataUser', 'dataRate', 'filtername'));
    }

    public function searchConcessionaire(Request $request){
        $q = $request->input('q');
        //return $query->where('name', 'LIKE', %search%);
        $dataUser = Concessionaire::where('first_name', 'LIKE', '%'.$q.'%')
        ->orWhere('last_name', 'LIKE', '%'.$q.'%')
        ->paginate(20);
        $dataUser->appends(['q' => $q]);
        //dd($dataUser);                
        $dataRate = Rate::all();
        return view('admin.concessionaires',compact('dataUser', 'dataRate'));
    }
    
    public function editconsumer(Request $request)
    {
        // $data = User::find($request->id);
        // $data->fname = $request->fname;
        // $data->mname = $request->mname;
        // $data->lname = $request->lname;
        // $data->usertype = 'concessionaire';
        // $data->meternum = $request->meternum;
        // $data->email = $request->email;
        // $data->password = bcrypt($request->password);
        // $data->save();
        //dd($request);
        $updateConcessionaire = Concessionaire::where('id', '=', $request->id)
            ->update(['first_name' => $request->fname,
            'middle_name' =>$request->mname,
            'last_name' =>$request->lname,
            'category' =>$request->categories,
            'purok' =>$request->purok,
            ]);
        return response()->json($updateConcessionaire);
    }

    public function disconnect($meternum)
    {
        $getCon = Concessionaire::where('meternum', '=', $meternum)->first();
        
        $updateConcessionaire = Concessionaire::find($getCon->id)
                    ->update(['status' => 'disconnected'
                    ]);
        $user_name = Auth::user()->lname.', '.Auth::user()->fname;
        Log::notice($user_name.' disconnect '.$getCon->last_name.', '.$getCon->first_name);
        return redirect('/admin/consumer/'.$getCon->id);
    }
    public function reconnect($meternum)
    {
        $getCon = Concessionaire::where('meternum', '=', $meternum)->first();
        
        $updateConcessionaire = Concessionaire::find($getCon->id)
                    ->update(['status' => 'connected'
                    ]);
        $user_name = Auth::user()->lname.', '.Auth::user()->fname;
        Log::notice($user_name.' reconnect '.$getCon->last_name.', '.$getCon->first_name);
        return redirect('/admin/consumer/'.$getCon->id);
    }
    public function deleteconsumer(Request $req)
    {
        //User::find($req->id)->delete();
        Concessionaire::where('id', $req->id)->delete();
        return response()->json();
    }
    public function consumer($id)
    {
        $Concessionaire = User::find($id);
        $paymentHistory = Bill::where('consumerId','=',$id)->get();
        $billHistory = Monthlybill::where('meternum','=',$Concessionaire->meternum)->get();
        //dd($billHistory);
        
        $Account = Concessionaire::where('meternum', '=', $Concessionaire->meternum)->first(); 
        $Rate = Rate::find($Account->category);
        //dd($Account);
         return view('admin.concessionaire', compact('Concessionaire', 'Rate', 'billHistory', 'Account', 'paymentHistory'));
    }
    

/// Meter Reader Controller ///
    public function readerConcessionaires(Request $req)
    {
       
        // $dataUser = Concessionaire::where('usertype', '=', 'concessionaire')
        //             ->with('user')
        //             ->get();
        $dataUsers = Concessionaire::with('rate','bill')
                                    ->paginate(10);
        //dd($dataUser);
        return view('reader.concessionaires',compact('dataUsers'));
        
    }
    public function readerconcessionaire($id)
    {
        $Concessionaire = User::find($id);
        $Account = Concessionaire::where('meternum', '=', $Concessionaire->meternum)->first(); 
        $Rate = Rate::find($Account->category);
        //dd($Rate);
         return view('reader.concessionaire', compact('Concessionaire', 'Rate'));
    }

    public function view_purok_consumers($purok)
    {
        $data_consumers = Concessionaire::with('bill')->where('purok', '=', $purok)->paginate(10); 
        //dd($data_consumers);
        return view('reader.reading',compact('data_consumers'));
    }

/// Collector Controller ///
    public function cashier_consumers(Request $req)
    {
        $consumers = Concessionaire::with('rate','cashierbill')
                                    ->get();
        return view('collector.consumers',compact('consumers'));
        
    }
    public function cashier_consumer($id)
    {
        
        $Concessionaire = Concessionaire::with('rate')->find($id);
        //dd($Concessionaire);
        $paymentHistory = Bill::where('consumerId','=',$id)->latest()->get();
        $billHistory = Monthlybill::where('meternum','=',$Concessionaire->meternum)->latest()->get();
       
        
        $Account = Concessionaire::where('meternum', '=', $Concessionaire->meternum)->first(); 
        $Rate = Rate::find($Account->category);
        //dd($Account);
         return view('collector.consumer', compact('Concessionaire', 'Rate', 'billHistory', 'Account', 'paymentHistory'));
        
        
        // $billHistory = Bill::where('consumerId','=',$id)->get();
        // $Concessionaire = User::find($id);
        // $Account = Concessionaire::where('meternum', '=', $Concessionaire->meternum)->first(); 
        // $billHistory = Monthlybill::where('meternum','=',$Concessionaire->meternum)->get();
        // $Rate = Rate::find($Account->category);
        // //dd($Rate);
        //  return view('cashier.concessionaire', compact('Concessionaire', 'Rate','billHistory'));
    }

    public function admin_consumer($id)
    {
        $Concessionaire = Concessionaire::with('rate')->find($id);
        $paymentHistory = Bill::where('consumerId','=',$id)->get();
        $billHistory = Monthlybill::where('meternum','=',$Concessionaire->meternum)->get();
       
        $Account = Concessionaire::where('meternum', '=', $Concessionaire->meternum)->first(); 
        $Rate = Rate::find($Account->category);
        return view('admin.consumer', compact('Concessionaire', 'Rate', 'billHistory', 'Account', 'paymentHistory'));
    }
}
