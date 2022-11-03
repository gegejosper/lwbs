<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class SettingsController extends Controller
{
    //
    public function settingPenalty(Request $request)
    {
        $data = Setting::find($request->id);
        $data->penalty = $request->penalty;
        $data->save();
        Log::notice('Admin updated the penalty settings');
        return redirect('admin/setting');
    }
    public function settingDueDate(Request $request)
    {
        $data = Setting::find($request->id);
        $data->duedate = $request->duedate;
        $data->save();
        Log::notice('Admin updated the duedate settings');
        return redirect('admin/setting');
    }
    public function settingDiscount(Request $request)
    {
        $data = Setting::find($request->id);
        $data->discount = $request->discount;
        $data->save();
        Log::notice('Admin updated the discount settings');
        return redirect('admin/setting');
    }
    public function settingNotice(Request $request)
    {
        $data = Setting::find($request->id);
        $data->days = $request->days;
        $data->save();
        return redirect('admin/setting');
    }

    public function readSetting(Request $req)
    {
        $data = Category::all();
        return view('admin.categories')->withData($data);
        //return view('admin.home')->withData($data);
        
    }
}
