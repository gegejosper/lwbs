<?php

namespace App\Http\Controllers;

use App\Setting;
use App\Category;
use App\Rate;
use App\User;
use App\Bill;
use App\Monthlybill;
use App\Concessionaire;
use App\Position;

use Validator;
use Response;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function index()
    {
        // $dataSetting = Setting::first();
        // $duedate = $dataSetting->duedate;
        
        // $finalDueDate = $nextWeek = time() + ($duedate * 24 * 60 * 60);
        
        $dataBill = Monthlybill::where('status', '=', 0)
        ->where('billAmount', '!=', 0)
        ->where('monthlyDueDate', '<=', date('Y-m-d'))
        ->with('concessionaire', 'user')
        ->get();
        
        $dataConcessionaire = Concessionaire::where('status', '=', 'connected')->count();
        $dataApplicant = Concessionaire::where('status', '=', 'pending')->count();
        $dataConcessionaireAll = Concessionaire::where('status', '!=', 'pending')->count();
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

        return view('admin.home', compact('dataSetting', 'dataConcessionaire', 'dataConcessionairediscon', 'dataConcessionaireAll','amount','paymentsamount', 'dataApplicant', 'dataBill'));
    }
    public function login()
    {
        return view('admin.login');
    }

    public function collectibles()
    {
        $dataBill = Monthlybill::where('status', '=', 0)
        ->where('billAmount', '!=', 0)
        ->with('concessionaire', 'user')
        ->get();
        $headername = 'Collectibles';
        //dd($dataBill);
        return view('admin.collectibles', compact('dataBill', 'headername'));
    }

    public function payments()
    {
        $dataBill = Monthlybill::where('status', '=', 1)
        ->with('concessionaire', 'user')
        ->get();
        //dd($dataBill);
        $headername = 'Payments';
        //dd($dataBill);
        return view('admin.collectibles', compact('dataBill', 'headername'));
    }

    public function employee (){
        $dataPosition = Position::all();
        $dataUser = User::where('usertype', '!=', 'concessionaire')
                        ->get();
        return view('admin.employee',compact('dataPosition', 'dataUser'));
    }
    // public function concessionaire(){
    //     return view('admin.concessionaire');
    // }
    public function applicants(){
        return view('admin.applicants');
    }
    public function setting(){
        $dataSetting= Setting::all();
        $dataCategory = Category::all();
        $dataRate = Rate::all();
        $dataPosition = Position::all();
        return view('admin.setting',compact('dataSetting', 'dataCategory', 'dataRate', 'dataPosition'));
    }
    public function report(){
        $dataConcessionaire = Concessionaire::where('status', '=', 'connected')->count();
        $dataApplicant = Concessionaire::where('status', '=', 'pending')->count();
        $dataConcessionaireAll = Concessionaire::where('status', '!=', 'pending')->count();
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
        return view('admin.report', compact('dataSetting', 'dataConcessionaire', 'dataConcessionairediscon', 'dataConcessionaireAll','amount','paymentsamount', 'dataApplicant'));

        
    }
    public function generatereport(Request $request){
        $dataReport = Bill::where('datepaid', '>=', $request->from)
        ->where('datepaid', '<=', $request->to)
        ->get();
        return view('admin.reportresult', compact('dataReport'));
    }
    public function messages(){
        return view('admin.messages');
    }
    public function reminders(){
        return view('admin.reminders');
    }
    public function notifications(){
        return view('admin.notifications');
    }
    
}
