<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Response;
use App\Setting;
use App\Monthlybill;
use Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Log;


class BillController extends Controller
{
    public function recordbill(Request $request){
        $rules = array(
                'meternum' => 'required',
                'newrec' => 'required',
                'prevrec' => 'required',
                'payment' => 'required',
                'cubic' =>'required'
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return Response::json(array(
                    'errors' => $validator->getMessageBag()->toArray(),
            ));
        } else {
            $dataSetting = Setting::first();
            $duedate = $dataSetting->duedate;
            $disconnection = $duedate + $dataSetting->days;
            $penalty = $dataSetting->penalty;
            $finalDueDate = $nextWeek = time() + ($duedate * 24 * 60 * 60);
            $disconnection = time() + ($disconnection * 24 * 60 * 60);
            //dd($request);
            $dataMonth = Monthlybill::where('meternum', '=', $request->meternum)
                        ->where('monthlyBillDate', '=', date("Y-m"))
                        ->first();
            $user_name = Auth::user()->lname.', '.Auth::user()->fname;
            Log::notice($user_name.' record monthly bill for meter # '.$request->meternum);
            $with_penalty_amount = $penalty + $request->payment;
            if($dataMonth){
                $data =  Monthlybill::find($dataMonth->id);
                $data->cubicCount = $request->cubic;
                $data->prevrec = $request->prevrec;
                $data->newrec = $request->newrec;
                $data->monthlyDueDate = date("Y-m-d", $finalDueDate);
                $data->monthlyRecordDate = date("Y-m-d H:i:s");
                $data->monthlyBillDate = $request->billdate;
                $data->billAmount = $request->payment;
                $data->status ='unpaid';
                $data->meternum = $request->meternum;
                $data->disconnection = date("Y-m-d", $disconnection);
                $data->user_id = Auth::user()->id;
                $data->save();
                $data->with_penalty = $with_penalty_amount;
                return response()->json($data);
            }
            else {
                $data = new Monthlybill();
                $data->cubicCount = $request->cubic;
                $data->prevrec = $request->prevrec;
                $data->newrec = $request->newrec;
                $data->monthlyDueDate = date("Y-m-d", $finalDueDate);
                $data->monthlyRecordDate = date("Y-m-d H:i:s");
                $data->monthlyBillDate = $request->billdate;
                $data->billAmount = $request->payment;
                $data->status ='unpaid';
                $data->meternum = $request->meternum;
                $data->disconnection = date("Y-m-d", $disconnection);
                $data->user_id = Auth::user()->id;
                $data->save();
                $data->with_penalty = $with_penalty_amount;
                return response()->json($data);
            }
        }
    }
}
