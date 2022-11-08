<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      
        $this->middleware('guest', ['except' => 'logout']);
    }
    public function getLogin(){

            return view('admin.login');
    }
    public function postLogin( Request $request){
                $login=array(
                        'TaiKhoan'=>$request->name,
                        'password'=>$request->password,
                        'level'=>1,

                    );
           if(Auth::attempt($login)){
                    return redirect('admin/cate/list')->with('users',Auth::user());
                }else{
                      return redirect()->back();
                }
   
    }
     Public function logout() {
                 Auth::logout();
     return redirect('admin/login1');
    }

}

