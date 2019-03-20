<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Response;
use App\Setting;
use App\Monthlybill;
use Illuminate\Support\Facades\Input;

class BillController extends Controller
{
    public function recordbill(Request $request)
    {
        $rules = array(
                
                'meternum' => 'required',
                'newrec' => 'required',
                'prevrec' => 'required',
                'payment' => 'required',
                'cubic' =>'required'
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Response::json(array(
                    'errors' => $validator->getMessageBag()->toArray(),
            ));
        } else {
            $dataSetting = Setting::first();
            $duedate = $dataSetting->duedate;
            
            $finalDueDate = $nextWeek = time() + ($duedate * 24 * 60 * 60);
            //dd($request);
            $dataMonth = Monthlybill::where('meternum', '=', $request->meternum)
                        ->where('monthlyBillDate', '=', date("Y-m"))
                        ->first();
            $resultMonth = count($dataMonth);
            if($resultMonth != 0 ){
                $data =  Monthlybill::find($dataMonth->id);
                $data->cubicCount = $request->cubic;
                $data->prevrec = $request->prevrec;
                $data->newrec = $request->newrec;
                $data->monthlyDueDate = date("Y-m-d", $finalDueDate);
                $data->monthlyRecordDate = date("Y-m-d H:i:s");
                $data->monthlyBillDate = $request->billdate;
                $data->billAmount = $request->payment;
                $data->status =0;
                $data->meternum = $request->meternum;
                $data->save();
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
                $data->status =0;
                $data->meternum = $request->meternum;
                $data->save();
                return response()->json($data);
            }
           
        }
    }
}
