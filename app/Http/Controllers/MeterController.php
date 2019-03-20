<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use App\Concessionaire;
use App\Http\Controllers\Controller;

class MeterController extends Controller
{
    public function login()
    {
        return view('reader.login');
    }
    public function index()
    {
        $dataSetting = Setting::all();
        return view('reader.home', compact('dataSetting'));
    }
    public function reading()
    {
        $dataUsers = Concessionaire::with('user','rate','bill')->paginate(10);
        //dd($dataUsers);
        return view('reader.reading',compact('dataUsers'));
    }
    public function report()
    {
        $dataUsers = Concessionaire::with('user','rate','bill')
                ->get();
        return view('reader.report',compact('dataUsers'));
    }
}
