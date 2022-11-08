<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Http\Requests\CateRequest;
use App\Http\Controllers\Controller;
use App\Project;
use App\SanPham;
use App\Nhacungcap;
use App\Loaihang;
use App\Taikhoan;
use Auth;

class TaikhoanController extends Controller
{
        public function getList(){
        $data= Taikhoan::paginate(3);
    	return view('admin.taikhoan',compact('data'));
    }
     public function getDelete($id){
     	$user=Auth::user()->MaND;
        $cate=Taikhoan::find($id);
        	if(($id==12) || ($user!=12) && ($user['level'] ==1) ){
        	return redirect('admin/nguoidung/list')->with('loi','Không đủ level để xóa');			

        	}
        	else{
        		$cate->delete();
        	return redirect('admin/nguoidung/list');
        	}
        
    }


     public function getAdd(){
    	return view('admin.adtaikhoan');
    }
     public function postAdd(Request $request){
     	        $sanpham= new Taikhoan;
              $sanpham->HoTen=$request->HoTen;
              $sanpham->Gioitinh=$request->Gioitinh;
              $sanpham->SDT=$request->SDT;
              $sanpham->email=$request->email;
              $sanpham->password=bcrypt($request->password);
              $sanpham->TaiKhoan=$request->TaiKhoan;
              $sanpham->level=$request->level;
             $sanpham->DiaChi=$request->DiaChi;
              $sanpham->save();
          return redirect('admin/nguoidung/list');
   
    }
     public function getEdit($id){
       
      
            $sua=TaiKhoan::find($id);
            return view ('admin.suataikhoan',compact('sua'));
     	

    }
    public function postEdit( $id,Request $request){
              $sanpham= Taikhoan::find($id); 
              $sanpham->HoTen=$request->HoTen;
              $sanpham->Gioitinh=$request->Gioitinh;
              $sanpham->SDT=$request->SDT;
              $sanpham->email=$request->email;
              $sanpham->password=bcrypt($request->password);
              $sanpham->TaiKhoan=$request->TaiKhoan;
              $sanpham->level=$request->level;
              $sanpham->DiaChi=$request->DiaChi;
              $sanpham->save();
        return redirect('admin/nguoidung/list');
   
    }
    public function capdo(){
       $sanpham=Taikhoan::all();
       return view('admin.capdotaikhoan',compact('sanpham'));
    }
}
