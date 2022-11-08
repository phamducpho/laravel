<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\SanPham;
use App\Nhacungcap;
use App\Loaihang;
use App\Lienhe;
use Mail,DB;

class LienheController extends Controller
{
      public function getAdd(){
      $loaihang=Loaihang::all();
      $nhacungcap=Nhacungcap::all();
    	return view('user.lienhe',compact('loaihang','nhacungcap'));
    }
    public function postAdd( Request $request){
    	$cungcap=new Lienhe;
    	$cungcap->hoten=$request->hoten;
    	$cungcap->cty=$request->cty;
    	$cungcap->email=$request->email;	
    	$cungcap->dienthoai=$request->dienthoai;
    	$cungcap->fax=$request->fax;
    	$cungcap->diachi=$request->diachi;
    	$cungcap->noidung=$request->noidung;
    	$cungcap->ngaylienhe=$request->ngaylienhe;	
    	$cungcap->save();

        $data=['hoten'=>$request->hoten,'tinnhan'=>$request->noidung,'email'=>$request->email];
      Mail::send('user.blan',$data, function($message){
      
              $message->from('phamducpho14t1@gmail.com','Pho Pho');
              $message->to('phamducpho14t1@gmail.com','Pho Pho')->subject('ý kiến khách hàng');

      });
      // echo "<script>
      //         alert('Cảm ơn bạn đã liên hệ với chúng tôi, mọi đóng góp của bạn sẽ tạo động lực cho trang web ngày càng phát triển');
      //         window.location='". route('CHshop')   ."'
      // </script>";
    	return redirect()->route('CHshop');
}

public function index(){
 

              $data= Lienhe::paginate(3);
      return view('admin.lienhe',compact('data'));
}

 public function getDelete($id){
           $cate=Lienhe::find($id);
           $cate->delete();
           return redirect('admin/lienhe/list');

    }
     public function getEdit($id){
          $data=Lienhe::find($id);
        return view('admin.editlienhe',compact('data'));

    }
}
