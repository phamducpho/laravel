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

class LoaihangController extends Controller
{
        public function getList(){
        $data= Loaihang::paginate(5);
    	return view('admin.loaihang',compact('data'));
    }
     public function getDelete($id){
        $cate=Loaihang::find($id);     

        $sanpham=DB::table('sanpham')->select('MaLoai')->where('MaLoai',$id)->first();
         if($sanpham==null){
                 $cate->delete();
          return redirect('admin/loaihang/list');      
         }
         else{
                   echo "<script>
              alert('Xin  lỗi, bạn không thể xóa do danh mục này vì danh mục  đã có bên  bản sản phẩm, để xóa đưọc bạn cần xóa sản phẩm bên kia rồi mới xóa đưọc');
              window.location='". route('admin.loaihang.getList')   ."'
      </script>";
         }
        	     
    }


     public function getAdd(){
    	return view('admin.adloaihang');
    }
     public function postAdd(CateRequest $request){
     	        $sanpham= new Loaihang;
                $sanpham->TenLoai=$request->TenLoai;
                $sanpham->mota=$request->MoTa;
              $sanpham->save();
          return redirect('admin/loaihang/list');
   
    }
     public function getEdit($id){
       
      
            $sua=TaiKhoan::Loaihang($id);
            return view ('admin.suataikhoan',compact('sua'));
     	

    }
    public function postEdit( $id,CateRequest $request){
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
}
