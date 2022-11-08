<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\SanPham;
use App\Nhacungcap;
use App\Loaihang;
use App\Phieunhap;
use App\Chitietphieunhap;
use App\Http\Requests\CateRequest;
class PhieunhapController extends Controller
{


      public function getList(){
        $data= Phieunhap::paginate(3);
          $nhacungcap=Nhacungcap::all();

      return view('admin.listphieunhap',compact('data','nhacungcap'));
    }
     public function getDelete($id){
     
        $cate=Phieunhap::find($id);
            $cate->delete();
          return redirect('admin/phieunhap/list');
          
        
    }


     public function getAdd(){
      $nhacungcap=Nhacungcap::all();
      return view('admin.addphieunhap',compact('nhacungcap'));
    }
     public function postAdd(Request $request){
              $sanpham= new Phieunhap;
              $sanpham->ManhaCC=$request->nhacungcap;
              $sanpham->NgNhap=$request->ngnhap;
              $sanpham->save();
          return redirect('admin/phieunhap/list');
   
    }
     public function getEdit($id){
            $sua=Phieunhap::find($id);
            $sanpham=SanPham::all();
            return view ('admin.suaphieunhap',compact('sua','sanpham'));
      

    }
    public function postEdit( $id,Request $request){
             $them=  new  Chitietphieunhap;
             $upsanpham=SanPham::find($request->MaSP);
             $Sluongcon= $upsanpham->Sluongcon;
             $Soluongthem=$request->Soluong;
             $upsanpham->Sluongcon=$Sluongcon+$Soluongthem;
             $them->MaSP=$request->MaSP;
             $them->Soluong=$request->Soluong;

             $them->dongia=$request->dongia;
              $sl=$request->Soluong;
              $dg=$request->dongia;
              $them->ThanhTien=$sl*$dg;
               $cc   = Phieunhap::find($id);
                $them->IdPN=$cc->IdPN;
             $them->save();    
                 $upsanpham->save();

       return redirect('admin/phieunhap/list');
   
    }
}
