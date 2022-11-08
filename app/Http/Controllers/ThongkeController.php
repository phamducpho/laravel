<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\SanPham;
use App\Nhacungcap;
use App\Loaihang;
use App\Taikhoan;
class ThongkeController extends Controller
{
      
     public function index(){
            return view('admin.thongke');

    
}


	public function getEdit(){
		$data=Taikhoan::all();
		return view('admin.editthanhvien',compact('data'));
	}
}
