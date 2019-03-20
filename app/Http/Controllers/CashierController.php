<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use App\User;
use App\Concessionaire;
use App\Rate;
use App\Monthlybill;
use App\Tempbill;
Use App\Bill;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;

class CashierController extends Controller
{
    //
    public function login()
    {
        return view('cashier.login');
    }
    public function index()
    {
        $dataUsers = Concessionaire::with('user','rate','cashierbill')
        ->get();
        $dataConcessionaire = Concessionaire::where('status', '=', 'connected')->count();
        $dataConcessionaireAll = Concessionaire::count();
        $dataConcessionairediscon = Concessionaire::where('status', '=', 'disconnected')->count();
        $dataSetting = Setting::all();
        $collectibles = Monthlybill::where('status','=',0)->get();
        $amount = 0;
        foreach($collectibles as $dataCollectibles){
            $amount= $amount + $dataCollectibles->billAmount;
        }
        $payments = Monthlybill::where('status','=',1)->get();
        $paymentsamount = 0;
        foreach($payments as $payment){
            $paymentsamount= $paymentsamount + $payment->billAmount;
        }

        return view('cashier.home', compact('dataUsers','dataSetting', 'dataConcessionaire', 'dataConcessionairediscon', 'dataConcessionaireAll','amount','paymentsamount'));
    }
    public function report()
    {
        $dataConcessionaire = Concessionaire::where('status', '=', 'connected')->count();
        $dataConcessionaireAll = Concessionaire::count();
        $dataConcessionairediscon = Concessionaire::where('status', '=', 'disconnected')->count();
        $dataSetting = Setting::all();
        $collectibles = Monthlybill::where('status','=',0)->get();
        $amount = 0;
        foreach($collectibles as $dataCollectibles){
            $amount= $amount + $dataCollectibles->billAmount;
        }
        $payments = Monthlybill::where('status','=',1)->get();
        $paymentsamount = 0;
        foreach($payments as $payment){
            $paymentsamount= $paymentsamount + $payment->billAmount;
        }

        return view('cashier.report', compact('dataSetting', 'dataConcessionaire', 'dataConcessionairediscon', 'dataConcessionaireAll','amount','paymentsamount'));
        
    }
    public function generatereport(Request $request){
        $dataReport = Bill::where('datepaid', '>=', $request->from)
        ->where('datepaid', '<=', $request->to)
        ->get();
        return view('cashier.reportresult', compact('dataReport'));
    }
    public function search(Request $request){
        $q = $request->input('q');
        //return $query->where('name', 'LIKE', %search%);
        $dataUsers = User::where('usertype', '=', 'concessionaire')
        ->where('fname', 'LIKE', '%'.$q.'%')
        ->orWhere('lname', 'LIKE', '%'.$q.'%')
        ->orWhere('mname', 'LIKE', '%'.$q.'%')
        ->paginate(50);;
        //dd($dataUsers);                
        return view('cashier.search',compact('dataUsers'));
    }
    public function payment($id)
    {
        $Concessionaire = User::where('id', '=', $id)->with('concessionaire')->first();
        $dataSetting = Setting::first();
        $Account = Concessionaire::where('userId', '=', $Concessionaire->id)->first(); 
        $Rate = Rate::find($Account->category);
        $Bills = Monthlybill::where('meternum', '=', $Account->meternum)
                            ->where('status', '=', 0)
                            ->get();
        $TempBills = Tempbill::all();                   
        //dd($Account);
        //echo count($Bills);
        return view('cashier.payment', compact('Concessionaire', 'Rate', 'Bills', 'Account', 'TempBills', 'dataSetting'));

    }
    public function success($id)
    {
        $Concessionaire = User::find($id);
        $dataSetting = Setting::first();
        $Account = Concessionaire::where('userId', '=', $Concessionaire->id)->first(); 
        $Rate = Rate::find($Account->category);
        
        $TempBills = Tempbill::all();                   
        //dd($Account);
        $Bill = Bill::where('consumerId', '=', $id)->orderBy('id', 'desc')->take(1)->get();
        //dd($Bill); 
        return view('cashier.successpayment', compact('Concessionaire', 'Account', 'TempBills', 'dataSetting', 'Bill', 'Rate', 'Bills'));
    }
    public function addpay($id,$billid,$amount)
    {
        $data = new Tempbill();
        $data->MonthlyBillId = $billid;
        $data->billAmount = $amount;
        $data->userId = $id;
    
        $data->save();  
                    
        //dd($data);
         //return view('cashier.payment', compact('Concessionaire', 'Rate', 'Bills', 'Account', 'TempBills'));
         return redirect('/cashier/payment/'.$id);
    }
    public function removepay($id,$billid)
    {
        Tempbill::find($billid)->delete();

        return redirect('/cashier/payment/'.$id);
    }
    public function processpayment(Request $request)
    {
        $rules = array(
                'officialReciept' => 'required',
                
        );
        $validator = Validator::make(Input::all(), $rules);
            if ($validator->fails()) {
                return Response::json(array(
                        'errors' => $validator->getMessageBag()->toArray(),
                ));
            } else {
            
                $data = new Bill();
                $data->amount = $request->amount;
                $data->datepaid = date("Y-m-d");
                $data->consumerId = $request->userId;
                $data->status = 1;
                $data->cpenalty = $request->penalty;
                $data->discount = $request->discount;
                $data->officialReciept = $request->officialReciept;
                $data->save();  

                $dataTempBill = Tempbill::get();

                foreach ($dataTempBill as $tempBill) {
                    $dataBill = Monthlybill::find($tempBill->MonthlyBillId);
                    $dataBill->status = 1;
                    $dataBill->save();

                    Tempbill::find($tempBill->id)->delete();
                }
                
                return redirect('/cashier/success/'.$request->userId);
                //return view('cashier.successpayment', compact('Concessionaire', 'Rate', 'Bills', 'Account', 'TempBills', 'dataSetting'));
                //return response()->json($data);
            }
        }
    
}
