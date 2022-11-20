<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use App\Concessionaire;
use App\Position;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class MeterController extends Controller
{
    public function login(){
        return view('reader.login');
    }
    public function profile(){
        $user_type = Auth::user()->usertype;
        $user_details = Auth::user();
        return view('profile', compact('user_type', 'user_details'));
    }
    public function index(){
        $dataSetting = Setting::all();
        return view('reader.home', compact('dataSetting'));
    }
    public function reading(){
        $user_type = Auth::user()->usertype;
        $data_consumers = Concessionaire::where('status', 'connected')->with('user','rate','bill')->paginate(50);
        //dd($data_consumers);
        return view('reader.reading',compact('data_consumers', 'user_type'));
    }

    public function search_consumer(Request $request){
        $q = $request->input('q');
        $user_type = Auth::user()->usertype;
        //return $query->where('name', 'LIKE', %search%);
        $data_consumers = Concessionaire::where('first_name', 'LIKE', '%'.$q.'%')
        ->orWhere('last_name', 'LIKE', '%'.$q.'%')
        ->orWhere('meternum', 'LIKE', '%'.$q.'%')
        ->paginate(20);
        $data_consumers->appends(['q' => $q]);
        //dd($dataUser);                
        return view('reader.reading',compact('data_consumers','user_type'));
    }
    public function report()
    {
        $dataUsers = Concessionaire::with('user','rate','bill')
                ->get();
        return view('reader.report',compact('dataUsers'));
    }
}
