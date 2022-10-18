<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
    public function userLogin(Request $request){
        //dd($request->all());
        
        if(Auth::attempt([
            'username' => $request->username,
            'password' => $request->password
        ])){
            $user = User::where('username', $request->username )->first();
        
            if($user->usertype=='admin'){
                return redirect('admin/dashboard');
            }
            else if($user->usertype=='collector' || $user->usertype=='Collector' || $user->usertype=='COLLECTOR'){
                return redirect('collector/dashboard');
            } 
            else if($user->usertype=='Meter Reader' || $user->usertype=='reader' || $user->usertype=='meterreader' || $user->usertype=='meter'){
                return redirect('reader/dashboard');
            }
            else {
                return redirect('/');
            }
        }
        else {
            return redirect()->back()->withInput($request->only('email', 'remember'))->withErrors([
                'approve' => 'Wrong password or this account not approved yet.',
            ]);
        }
        //return redirect('dashboard');
    }
    public function adminLogin(Request $request){
        //dd($request->all());
        
        if(Auth::attempt([
            'username' => $request->username,
            'password' => $request->password
        ])){
            $user = User::where('username', $request->username )->first();
        
            if($user->usertype=='admin'){
                return redirect('admin/dashboard');
            }
            else {
                return redirect('/');
            }
        }
        else {
            return redirect()->back()->withInput($request->only('email', 'remember'))->withErrors([
                'approve' => 'Wrong password or this account not approved yet.',
            ]);
        }
        //return redirect('dashboard');
    }
    public function cashierLogin(Request $request){
        //dd($request->all());
        
        if(Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ])){
            $user = User::where('email', $request->email )->first();
        
            if($user->usertype=='collector' || $user->usertype=='Collector' || $user->usertype=='COLLECTOR'){
                return redirect('collector/dashboard');
            }
            else {
                return redirect('/');
            }
        }
        else {
            return redirect()->back()->withInput($request->only('email', 'remember'))->withErrors([
                'approve' => 'Wrong password or this account not approved yet.',
            ]);
        }
        //return redirect('dashboard');
    }
    public function readerLogin(Request $request){
        //dd($request->all());
        
        if(Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ])){
            $user = User::where('email', $request->email )->first();
        
            if($user->usertype=='Meter Reader' || $user->usertype=='reader' || $user->usertype=='meterreader' || $user->usertype=='meter'){
                return redirect('reader/dashboard');
            }
            else {
                return redirect('/');
            }
        }
        else {
            return redirect()->back()->withInput($request->only('email', 'remember'))->withErrors([
                'approve' => 'Wrong password or this account not approved yet.',
            ]);
        }
        //return redirect('dashboard');
    }
    public function consumerLogin(Request $request){
        //dd($request->all());
        
        if(Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ])){
            $user = User::where('email', $request->email )->first();
        
            if($user->usertype=='concessionaire' || $user->usertype=='Concessionaire' || $user->usertype=='CONCESSIONAIRE' || $user->usertype=='CONSUMER' || $user->usertype=='consumer' || $user->usertype=='Consumer'){
                return redirect('consumer/dashboard');
            }
            else {
                return redirect('/');
            }
        }
        else {
            return redirect()->back()->withInput($request->only('email', 'remember'))->withErrors([
                'approve' => 'Wrong password or this account not approved yet.',
            ]);
        }
        //return redirect('dashboard');
    }
}
