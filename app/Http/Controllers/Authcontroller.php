<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class Authcontroller extends Controller
{
    public function getlogin()
    {
        return view("login");
    }
    public function dologin(Request $request)
    {
        $credentials=[
            'password'=>$request->password,
            'status' => 1
        ];
        if (filter_var($request->username, FILTER_VALIDATE_EMAIL)){
            $credentials["email"]=$request->username;
        }else{
            $credentials["username"]=$request->username;
        }
        //dang-nhap
        if(Auth::attempt($credentials)){
            $user = Auth::user();
            if($user->status!=1)
            {
                return redirect()->route('website.getlogin')->with("message","Tài Khoản chưa được kích hoạt");

            }
            return redirect()->route('site.home');
        }
        else
        {
            return redirect()->route('website.getlogin')->with("message","Đăng nhập không thành thành công");
        }
        
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('site.home');
    }
}
