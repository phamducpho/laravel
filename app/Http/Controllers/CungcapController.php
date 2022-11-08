<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\SanPham;
use App\Nhacungcap;
use App\Loaihang;
class CungcapController extends Controller
{
     public function getAdd(){
      $loaihang=Loaihang::all();
      $nhacungcap=Nhacungcap::all();
    	return view('admin.nhacungcap',compact('loaihang','nhacungcap'));
    }
    public function postAdd( Request $request){
    	$cungcap=new Nhacungcap;
    	$cungcap->TennhaCC=$request->TennhaCC;
    	$cungcap->SDT=$request->SDT;
    	$cungcap->Diachi=$request->Diachi;		
    	$cungcap->save();
    	return redirect()->route('admin.cungcap.getAdd');
}
}
