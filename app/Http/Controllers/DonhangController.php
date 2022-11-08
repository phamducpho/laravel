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
use App\Donhang;
use App\Chitietdonhang;
use Auth;

class DonhangController extends Controller
{
        public function getList(){
        $data= Donhang::paginate(5);
    	return view('admin.danhsachdonhang',compact('data'));
    }
     public function getDelete($id){
     	$user=Donhang::find($id);
             $cc=$user->TinhTrang;
           if($cc==4){
             echo "<script>
              alert('Xin lỗi, bạn không thể xóa được đơn hàng đã thanh toán');
              window.location='". route('admin.donhang.getList')   ."'
      </script>";
           }
        	else{

              $capnhat=DB::table('chitietdh')->select('MaSP','MaDH','Soluong')->where('MaDH',$id)->get();
          
                foreach($capnhat as $cc){
                         $bb= $cc->MaSP;
                         $hh=$cc->Soluong;
                         $aa=SanPham::find($bb);
                         $aa->Sluongcon=$aa->Sluongcon+$hh;
                         $aa->save();
                         $cc2=SanPham::find($bb);
             
                    $cc2->Sluongban=$cc2->Sluongban - $hh;
                    $cc2->save();
                }
                  $user->delete();
           return redirect('admin/donhang/list');

        	
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
          return redirect('admin/donhang/list');
   
    }
     public function getEdit($id){
            $cc=Donhang::find($id);
            $up=$cc->TinhTrang;
             if($up==1){
              $cc->TinhTrang=2;
                 $cc->save();
             }
            $ten=Auth::user();
            $sua=Donhang::find($id);
            return view ('admin.chitietdonhang',compact('sua','ten'));
     	

    }
    public function postEdit( $id,Request $request){
              $sanpham= Donhang::find($id); 
              $sanpham->TinhTrang=$request->TinhTrang;
              $sanpham->NhanVienGH=$request->NhanVienGH;
              $sanpham->NhanVienTT=$request->NhanVienTT;
              $sanpham->NgGH=$request->nggh;
              $sanpham->NgTT=$request->ngtt;
              $sanpham->save();
        return redirect('admin/donhang/list');
   
    }
    public function capdo(){
       $sanpham=Taikhoan::all();
       return view('admin.capdotaikhoan',compact('sanpham'));
    }



     public function getEditnv($id){
          
            $ten=Auth::user();
            $sua=Donhang::find($id);
            return view ('admin.chitietdonhangnv',compact('sua','ten'));
      

    }
     public function postEditnv( $id,Request $request){
              $sanpham= Donhang::find($id); 
              $sanpham->TinhTrang=$request->TinhTrang;
              $sanpham->NhanVienGH=$request->NhanVienGH;
              $sanpham->NhanVienTT=$request->NhanVienTT;
              $sanpham->save();
        return redirect('admin/donhang/list');
   
    }
     public function getListnv(){
        $data= DB::table('donhang')->select('MaDH','MaND','TenKH','NhanVienGH','NhanVienTT','DiaChiGH','Tongtien','TinhTrang','NgGH','NgTT','NgDat','sdt','email')->where('TinhTrang',3)->get();
        //echo $data;
      return view('admin.danhsachdonhangnv',compact('data'));
    }
    
     public function indonhang($id){
          
      $in=Donhang::find($id);
      return view ('admin.inhoadon',compact('in'));

    }
}
