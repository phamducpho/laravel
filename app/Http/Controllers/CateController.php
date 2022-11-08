<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Http\Requests\CateRequest;
use Auth;
use App\Http\Controllers\Controller;
use App\Project;
use App\SanPham;
use App\Nhacungcap;
use App\Loaihang;


class CateController extends Controller
{
    public function getAdd(){
      $loaihang=Loaihang::all();
      $nhacungcap=Nhacungcap::all();
    	return view('admin.themsanpham',compact('loaihang','nhacungcap'));
    }
     public function postAdd(Request $request){
     	        $sanpham= new SanPham;
              $sanpham->TenSP=$request->TenSP;
              $sanpham->CPU=$request->cpu;
              $sanpham->baohanh=$request->baohanh;
              $sanpham->DonGia=$request->DonGia;
              $sanpham->Ram=$request->Ram;
              $sanpham->Sluongcon=$request->Sluongcon;
              $sanpham->giakm=$request->giakm;
              $sanpham->vga=$request->vga;
              $sanpham->hedieuhanh=$request->hedieuhanh;
              $sanpham->mota=$request->mota;
              $sanpham->MaLoai=$request->MaLoai;
              $sanpham->ManhaCC=$request->manhacc;       
              $sanpham->img  = $request->hinh;
              $sanpham->save();
              
          return redirect('admin/cate/list');
   
    }
    public function getList(){
     $data= SanPham::paginate(5);
    	return view('admin.list',compact('data'));
    }
    public function getDelete($id){
        $cate=SanPham::find($id);
        $cate->delete();
        return redirect('admin/cate/list');
    }
    public function getEdit($id){
       $loaihang=Loaihang::all();
      $nhacungcap=Nhacungcap::all();
      $sua=SanPham::find($id);
        return view('admin.edit',compact('loaihang','nhacungcap','sua'));

    }
    public function postEdit( $id,Request $request){
              $sanpham= SanPham::find($id);
              $sanpham->TenSP=$request->TenSP;
              $sanpham->CPU=$request->cpu;
              $sanpham->baohanh=$request->baohanh;
              $sanpham->DonGia=$request->DonGia;
              $sanpham->Ram=$request->Ram;
              $sanpham->Sluongcon=$request->Sluongcon;
              $sanpham->giakm=$request->giakm;
              $sanpham->vga=$request->vga;
              $sanpham->hedieuhanh=$request->hedieuhanh;
              $sanpham->mota=$request->mota;
              $sanpham->MaLoai=$request->MaLoai;
              $sanpham->ManhaCC=$request->ManhaCC;       
              $sanpham->img  = $request->hinh;
              $sanpham->save();
        return redirect('admin/cate/list');
   
    }
}
