<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
class authController extends Controller
{
    Public function getLogin() {
    	if(!Auth::check()){
    		return view('form');
    	}else{
    		return redirect('user');
    	}
    }
    Public function getadmin() {
    	if(!Auth::check()){
    		return view('form');
    	}else{
    		return view('admin',['user'=>Auth::user()]);
    	}
    }
    Public function postadmin(Request $request) {
    	$user = [
    		'name' => $request->input('name'),
    		'password' => $request->input('password'),
    	];
    	if(Auth::attempt($user)){
    		return view('admin',['user'=>Auth::user()]);
    	}else{
    		return redirect('form')->with('error','Login False');
    	}
    }
    Public function logout() {
    	Auth::logout();
    	return redirect('form');
    }
}



