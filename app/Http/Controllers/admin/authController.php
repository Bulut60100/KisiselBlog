<?php

namespace App\Http\Controllers\admin;

use App\Models\login;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class authController extends Controller
{
    public function login(){
        return view('auth.login');
    }

    public function loginpost(Request $request){
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            return redirect()->route('admin.index');
        }
        else{
            return redirect()->route('admin.login')->withErrors('Email Yada Şifre Hatalı');
        }
    }

    public function logout(){
        auth::logout();
        return redirect()->route('admin.login');
    }
}
