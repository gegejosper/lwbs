<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Concessionaire;
use App\Monthlybill;
use App\Setting;
use Illuminate\Support\Facades\Log;

class ApplicantController extends Controller
{
    //
    public function approve($userId)
    {       
            
            $dataConcessionaire = Concessionaire::where('userId', '=', $userId)->first();

            $dataSetting = Setting::first();
            $duedate = $dataSetting->duedate;
            $finalDueDate = time() + ($duedate * 24 * 60 * 60);

            $dataBill = new Monthlybill();
            $dataBill->cubicCount = 0;
            $dataBill->prevrec = 0;
            $dataBill->newrec = 0;
            $dataBill->monthlyDueDate = '2017-12-01';
            $dataBill->monthlyRecordDate = '2017-12-01 00:00:00';
            $dataBill->monthlyBillDate = '2017-12-01';
            $dataBill->billAmount = 0;
            $dataBill->status =1;
            $dataBill->meternum = $dataConcessionaire->meternum;
            $dataBill->save(); 

            $updateConcessionaire = Concessionaire::where('userId', '=', $userId)
            ->update(['status' => 'connected'
            ]);

            return redirect('/admin/applicants');


    }

    public function decline($userId)
    {
        User::find($req->id)->delete();
        Concessionaire::where('userId', '=', $req->id)->delete();

        return response()->json();
    }

}
