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

class ConcessionaireController extends Controller
{
    //
    public function addConcessionaire(Request $request)
    {
        $rules = array(
                'fname' => 'required',
                'lname' => 'required',
                'mname' => 'required',
                'categories' => 'required',
                'meternum' => 'required|unique:users',
                'clark' => 'required',
                'password' => 'required|string|min:6',
                'email' => 'required|string|email|max:255|unique:users'
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Response::json(array(
                    'errors' => $validator->getMessageBag()->toArray(),
            ));
        } else {
            $data = new User();
            $data->fname = $request->fname;
            $data->mname = $request->mname;
            $data->lname = $request->lname;
            $data->meternum = $request->meternum;
            $data->email = $request->email;
            $data->usertype = 'concessionaire';

            $data->password = bcrypt($request->password);
            $data->save();


            $dataCons = new Concessionaire();
            $dataCons->meternum = $request->meternum;
            $dataCons->category = $request->categories;
            $dataCons->clark = $request->clark;
            $dataCons->status = 'connected';
            $dataCons->userId = $data->id;
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
            $dataBill->status =1;
            $dataBill->meternum = $request->meternum;
            $dataBill->save();

            return response()->json($data);
        }
    }
    public function readConcessionaire(Request $req)
    {
       
        $dataUser = User::where('usertype', '=', 'concessionaire')
                    ->with('concessionaire')
                    ->paginate(50);
                    
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
        return view('admin.concessionairefilter',compact('dataUser', 'dataRate', 'filtername'));
        
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
        $dataUser = User::where('usertype', '=', 'concessionaire')
        ->where('fname', 'LIKE', '%'.$q.'%')
        ->orWhere('lname', 'LIKE', '%'.$q.'%')
        ->orWhere('mname', 'LIKE', '%'.$q.'%')
        ->paginate(20);
        $dataUser->appends(['q' => $q]);
        //dd($dataUser);                
        $dataRate = Rate::all();
        return view('admin.concessionaires',compact('dataUser', 'dataRate'));
    }
    
    public function editConcessionaire(Request $request)
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

        $updateConcessionaire = User::where('id', '=', $request->id)
                    ->update(['fname' => $request->fname,
                    'mname' =>$request->mname,
                    'lname' =>$request->lname,
                    'usertype' => 'concessionaire',
                    'email' => $request->email,
                    'password' => bcrypt($request->password)
                    ]);


        return response()->json($updateConcessionaire);
    }

    public function disconnect($meternum)
    {
        $getCon = Concessionaire::where('meternum', '=', $meternum)->first();
        
        $updateConcessionaire = Concessionaire::where('userId', '=', $getCon->userId)
                    ->update(['status' => 'disconnected'
                    ]);
        return redirect('/admin/concessionaire/'.$getCon->userId);
    }
    public function reconnect($meternum)
    {
        $getCon = Concessionaire::where('meternum', '=', $meternum)->first();
        
        $updateConcessionaire = Concessionaire::where('userId', '=', $getCon->userId)
                    ->update(['status' => 'connected'
                    ]);
        return redirect('/admin/concessionaire/'.$getCon->userId);
    }
    public function deleteConcessionaire(Request $req)
    {
        User::find($req->id)->delete();
        Concessionaire::where('userId', '=', $req->id)->delete();

        return response()->json();
    }
    public function concessionaire($id)
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
        $dataUsers = Concessionaire::with('user','rate','bill')
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

    public function clarkconcessionaire($clark)
    {
        $dataUsers = Concessionaire::with('user')->where('clark', '=', $clark)->paginate(10); 
       
        //dd($Rate);
        return view('reader.reading',compact('dataUsers'));
    }

/// Cashier Controller ///
    public function cashierConcessionaires(Request $req)
    {
        $dataUsers = Concessionaire::with('user','rate','cashierbill')
                                    ->get();
        //dd($dataUsers);    
        
        
        return view('cashier.concessionaires',compact('dataUsers'));
        
    }
    public function cashierconcessionaire($id)
    {
        
        $Concessionaire = User::find($id);
        $paymentHistory = Bill::where('consumerId','=',$id)->get();
        $billHistory = Monthlybill::where('meternum','=',$Concessionaire->meternum)->get();
        //dd($billHistory);
        
        $Account = Concessionaire::where('meternum', '=', $Concessionaire->meternum)->first(); 
        $Rate = Rate::find($Account->category);
        //dd($Account);
         return view('cashier.concessionaire', compact('Concessionaire', 'Rate', 'billHistory', 'Account', 'paymentHistory'));
        
        
        // $billHistory = Bill::where('consumerId','=',$id)->get();
        // $Concessionaire = User::find($id);
        // $Account = Concessionaire::where('meternum', '=', $Concessionaire->meternum)->first(); 
        // $billHistory = Monthlybill::where('meternum','=',$Concessionaire->meternum)->get();
        // $Rate = Rate::find($Account->category);
        // //dd($Rate);
        //  return view('cashier.concessionaire', compact('Concessionaire', 'Rate','billHistory'));
    }
}
