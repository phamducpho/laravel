<?php

namespace App\Http\Controllers;
use App\Http\Requests;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class admincontroller extends Controller
{
     Public function getLogin() { 
        return view('janux.login');
    }

    Public function getadmin() {
      if(!Auth::check()){
        return view('janux.login');
      }else{
        return view('janux.sanpham',['user'=>Auth::user()]);
      }
    }
    
    Public function postadmin(Request $request) {

      $user = [
        'TaiKhoan' => $request->name,
        'password' => $request->password,
      ];
      if(Auth::attempt($user)){

     
          return redirect('sanpham')->with('user',Auth::user());
      }
      else{

         return redirect('dangnhap')->with('error','Đăng nhập thất bại');
      }
    }
    Public function logout() {
      Auth::logout();
     return redirect('dangnhap');
    }
    Public function them( Request $request){
       $sida=Auth::user();
       return view('them')->with('sida',$sida);
       }
}
