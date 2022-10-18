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

class CollectorController extends Controller
{
    //
    public function login()
    {
        return view('cashier.login');
    }
    public function index(){
        $consumers = Concessionaire::with('rate','cashierbill')
        ->get();
        $dataConcessionaire = Concessionaire::where('status', '=', 'connected')->count();
        $dataConcessionaireAll = Concessionaire::count();
        $dataConcessionairediscon = Concessionaire::where('status', '=', 'disconnected')->count();
        $dataSetting = Setting::all();
        $collectibles = Monthlybill::with('consumer_details.rate')->where('status','unpaid')->get();
        //dd($collectibles);
        $amount = 0;
        foreach($collectibles as $dataCollectibles){
            $amount= $amount + $dataCollectibles->billAmount;
        }
        $payments = Monthlybill::where('status','=',1)->get();
        $paymentsamount = 0;
        foreach($payments as $payment){
            $paymentsamount= $paymentsamount + $payment->billAmount;
        }
        return view('collector.home', compact('consumers','dataSetting', 'dataConcessionaire', 'dataConcessionairediscon', 'dataConcessionaireAll','amount','paymentsamount', 'collectibles'));
    }
    public function report()
    {
        $dataConcessionaire = Concessionaire::where('status', '=', 'connected')->count();
        $dataConcessionaireAll = Concessionaire::count();
        $dataConcessionairediscon = Concessionaire::where('status', '=', 'disconnected')->count();
        $dataSetting = Setting::all();
        $collectibles = Monthlybill::where('status','unpaid')->get();
        $amount = 0;
        foreach($collectibles as $dataCollectibles){
            $amount= $amount + $dataCollectibles->billAmount;
        }
        $payments = Monthlybill::where('status','=',1)->get();
        $paymentsamount = 0;
        foreach($payments as $payment){
            $paymentsamount= $paymentsamount + $payment->billAmount;
        }

        return view('collector.report', compact('dataSetting', 'dataConcessionaire', 'dataConcessionairediscon', 'dataConcessionaireAll','amount','paymentsamount'));
        
    }
    public function generatereport(Request $request){
        $dataReport = Bill::where('datepaid', '>=', $request->from)
        ->where('datepaid', '<=', $request->to)
        ->get();
        return view('admin.reportresult', compact('dataReport'));
    }
    public function search(Request $request){
        $q = $request->input('q');
        //return $query->where('name', 'LIKE', %search%);
        $consumers = Concessionaire::where('first_name', 'LIKE', '%'.$q.'%')
        ->orWhere('last_name', 'LIKE', '%'.$q.'%')
        ->orWhere('middle_name', 'LIKE', '%'.$q.'%')
        ->paginate(50);;
        //dd($dataUsers);                
        return view('collector.search',compact('consumers'));
    }
    public function payment($id)
    {
        //$Concessionaire = Concessionaire::where('id', '=', $id)->first();
        $dataSetting = Setting::first();
        $Account = Concessionaire::where('id', $id)->with('rate')->first(); 
        $Rate = Rate::find($Account->category);
        $Bills = Monthlybill::with('temp_bill')->where('meternum', '=', $Account->meternum)
                            ->where('status', '=', 0)
                            ->get();
        $TempBills = Tempbill::with('monthly_bill')->get();                   
        //dd($TempBills);
        //echo count($Bills);
        return view('collector.payment', compact('Rate', 'Bills', 'Account', 'TempBills', 'dataSetting'));

    }
    public function success($id)
    {
        //$Concessionaire = User::find($id);
        $dataSetting = Setting::first();
        $Account = Concessionaire::with('rate')->where('id', '=', $id)->first(); 
        $Rate = Rate::find($Account->category);
        
        $TempBills = Tempbill::all();                   
        //dd($Account);
        $Bill = Bill::where('consumerId', '=', $id)->orderBy('id', 'desc')->take(1)->get();
        //dd($Bill); 
        return view('collector.successpayment', compact( 'Account', 'TempBills', 'dataSetting', 'Bill', 'Rate'));
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
         return redirect('/collector/payment/'.$id);
    }
    public function removepay($id,$billid)
    {
        Tempbill::find($billid)->delete();
        return redirect('/collector/payment/'.$id);
    }
    public function processpayment(Request $request)
    {
        $rules = array(
                'officialReciept' => 'required',
                
        );
        $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return Response::json(array(
                        'errors' => $validator->getMessageBag()->toArray(),
                ));
            } else {
                $dataTempBill = Tempbill::where('userId', $request->userId)->get();
                //dd($dataTempBill);
                $data = new Bill();
                $data->amount = $request->amount;
                $data->datepaid = date("Y-m-d");
                $data->consumerId = $request->userId;
                $data->status = 'paid';
                $data->paybillId = !empty($dataTempBill) ? $dataTempBill : 'n/a';
                $data->cpenalty = $request->penalty;
                $data->discount = 0;
                $data->officialReciept = $request->officialReciept;
                $data->save();  

                foreach ($dataTempBill as $tempBill) {
                    //dd($tempBill);
                    $dataBill = Monthlybill::find($tempBill->MonthlyBillId);
                    $dataBill->status = 'paid';
                    $dataBill->save();
                    Tempbill::find($tempBill->id)->delete();
                }
                
                return redirect('/collector/success/'.$request->userId);
                //return view('cashier.successpayment', compact('Concessionaire', 'Rate', 'Bills', 'Account', 'TempBills', 'dataSetting'));
                //return response()->json($data);
            }
        }
    
}
