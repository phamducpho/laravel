<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\SanPham;
use App\Nhacungcap;
use App\Loaihang;
use App\Donhang;
use App\Chitietdonhang;
use DB,Cart;
use Auth;
use App\Taikhoan;
class WelcomeController extends Controller
{
    public function index(){
    	$product=DB::table('sanpham')->select('MaSP','TenSP','DonGia','Sluongcon','ManhaCC','MaLoai','Ram','img','vga','hedieuhanh','giakm','cpu','baohanh','mota','chuthich')->orderBy('MaSP','DESC')->paginate(9);

    	$moinhat=DB::table('sanpham')->select('MaSP','TenSP','DonGia','Sluongcon','ManhaCC','MaLoai','Ram','img','vga','hedieuhanh','giakm','cpu','baohanh','mota','chuthich')->orderBy('MaSP','DESC')->take(3)->get();

     
         // $banchay = 
         //        DB::table('sanpham')
         //        ->whereExists(function($query)
         //        {
         //        $query->select(DB::raw('sum(Soluong) as Soluong' )
         //        ->from('chitietdh')
         //        ->whereRaw('sanpham.MaSP = chitietdh.MaSP'
         //          )
         //        ->groupBy('Soluong')
                
         //        })
         //        ->get();

    $banchay = DB::table('sanpham')->select('MaSP','TenSP','DonGia','Sluongcon','ManhaCC','MaLoai','Ram','img','vga','hedieuhanh','giakm','cpu','baohanh','mota','chuthich','Sluongban')->orderBy('Sluongban','DESC')->take(3)->get();
             
    

         
    

    	 return view('user.index',compact('product','moinhat','banchay'));
      
    }
    public function loaisanpham($id){
    	$product=DB::table('sanpham')->select('MaSP','TenSP','DonGia','Sluongcon','ManhaCC','MaLoai','Ram','img','vga','hedieuhanh','giakm','cpu','baohanh','mota','chuthich')->orderBy('MaSP','DESC')->skip(0)->take(4)->get();

    	$loaisanpham=DB::table('sanpham')->select('MaSP','TenSP','DonGia','Sluongcon','ManhaCC','MaLoai','Ram','img','vga','hedieuhanh','giakm','cpu','baohanh','mota','chuthich')->where('MaLoai',$id)->get();
    	return view('user.loaisanpham',compact('product','loaisanpham'));
    }
    public function chitietsanpham($id){
    	$product=DB::table('sanpham')->select('MaSP','TenSP','DonGia','Sluongcon','ManhaCC','MaLoai','Ram','img','vga','hedieuhanh','giakm','cpu','baohanh','mota','chuthich')->orderBy('MaSP','DESC')->skip(0)->take(4)->get();
    	$loaisanpham=DB::table('sanpham')->select('MaSP','TenSP','DonGia','Sluongcon','ManhaCC','MaLoai','Ram','img','vga','hedieuhanh','giakm','cpu','baohanh','mota','chuthich')->where('MaLoai',$id)->get();
    	$chitiet=DB::table('sanpham')->select('MaSP','TenSP','DonGia','Sluongcon','ManhaCC','MaLoai','Ram','img','vga','hedieuhanh','giakm','cpu','baohanh','mota','chuthich')->where('MaSP',$id)->first();
    	return view('user.chitietsanpham', compact('product','chitiet','loaisanpham'));


    }
    public function muahang($id){
        $muahang=DB::table('sanpham')->where('MaSP',$id)->first();
        Cart::add(array('id'=>$id,'name'=>$muahang->TenSP,'qty'=>1,'price'=>$muahang->DonGia, 'options' => ['img' => $muahang->img]));

// $content=Cart::content();
//                 print_r($content);  $a=

           return redirect()->route('CHshop');
    }
    public function giohang(){
        $content=Cart::content();
        $tongtien=Cart::total();
        return view('user.giohang',compact('content','tongtien'));
    }
    public function xoasanpham($id){
        Cart::remove($id);
        return redirect()->route('giohang');
           
    }
    public function tinhtien( Request $request){
          if(Cart::count()==0){
            echo "<script>
              alert('Giỏ hàng của bạn đang trống, hãy chắc là bạn đã mua hàng');
              window.location='". route('CHshop')   ."'
      </script>";  
          }
          else{

      if(Auth::check()){
            $donhang = new Donhang;
            $tongtien=Cart::total();
            $content=Cart::content();
            $mand=Auth::user();
            date_default_timezone_set("Asia/Ho_Chi_Minh");
            $now = getdate(); 
            $currentDate = $now["mday"] . "/" . $now["mon"] . "/" . $now["year"];
            $donhang->MaND=$mand->MaND;
            $donhang->NgDat=$currentDate;
           $donhang->TenKH=$request->ten;
           $donhang->DiaChiGH=$request->diachi;
           $donhang->sdt=$request->sdt;
           $donhang->email=$request->email;
           $donhang->TinhTrang=1;
           $donhang->Tongtien=$tongtien;
           $donhang->save();           
           $zz=Cart::content();   
           $cc= DB::table('donhang')->orderBy('MaDH','DESC')->first();       
           $aa=  $cc->MaDH;
            foreach ($zz as $t) {                   
                $chitiet=new Chitietdonhang;
                   $chitiet->MaDH=$aa;
                   $chitiet->MaSP=$t->id;
                   $chitiet->GiaSP=$t->price;
                   $chitiet->Soluong=$t->qty;
                    $chitiet->save();
               
                    $cc2=SanPham::find($t->id);
             
                    $cc2->Sluongban=$cc2->Sluongban+ $t->qty;
                    $cc2->save();
              }
              Cart::destroy();
        echo "<script>
              alert('Cảm ơn bạn đã tin tưởng mua hàng của cửa hàng chúng tôi, đơn hàng của bạn sẽ đưọc gửi đi trong thời gian sớm nhất, trong khi đó sẽ có nhân viên gọi đến bạn để xác thực việc bạn có mua hàng hay không, Cảm ơn bạn');
              window.location='". route('CHshop')   ."'
      </script>";  
    }
    else{



         echo "<script>
              alert('Bạn cần đăng nhập để có thể mua hàng');
              window.location='". route('dangnhap1')   ."'
      </script>";  
    

    
  
     }
}

    }
    public function getDangnhap(){
      return view('user.dangnhap');
    }
    public function postDangnhap( Request $request){
                    $login=array(
                        'TaiKhoan'=>$request->TaiKhoan,
                        'password'=>$request->password,
                  

                    );
           if(Auth::attempt($login)){
                    return redirect('CHshop')->with('users',Auth::user());
                }else{
                      return redirect()->back()->withErrors(['msg' => 'Mật khẩu của bạn không đúng, vui lòng nhập lại']);
                }


    }

    Public function logout() {
                 Auth::logout();
     return redirect('CHshop');
    }
    public function getdangki(){
         return view('user.dangki');
    }
    public function postdangki( Request $request){
           
             $tao= new Taikhoan();
             $tao->HoTen=$request->ten;
             $tao->Gioitinh=$request->gt;
             $tao->DiaChi=$request->dc;
             $tao->SDT=$request->sdt;
             $tao->level=2;
             $tao->TaiKhoan=$request->tk;
             $tao->password=$request->mk;
             $tao->save();
             return redirect('CHshop');


    }
    public function getthongtin(){
      $thongtin = Auth::user();
     return view('user.capnhattaikhoan' ,compact('thongtin'));
    }
    public function postthongtin( Request $request){
              $thongtin = Auth::user();
              $matk = $thongtin->MaND;
              $sua  = Taikhoan::find($matk);
              $sua->HoTen=$request->HoTen;
              $sua->Gioitinh=$request->GioiTinh;
              $sua->DiaChi=$request->DiaChi;
              $sua->TaiKhoan=$request->TaiKhoan;
              $sua->password=$request->password;
              $sua->save();
              return redirect('CHshop');

    }
     public function getdonhangcu(){
      $thongtin = Auth::user();
         $matk = $thongtin->MaND;
        $data=DB::table('donhang')->where('MaND',$matk)->get();
          return view('user.danhsachdonhangnv', compact('data'));
    }
    public function postdonhangcu($id){
              $user=Donhang::find($id);
             $cc=$user->TinhTrang;
           if($cc==4){
             echo "<script>
              alert('Xin lỗi, bạn không thể xóa được đơn hàng đã thanh toán');
              window.location='". route('donhangcu')   ."'
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
           return redirect('donhangcu');

          
           }
    }


    public function capnhat(){
      if(request()->ajax()){   
        $id=Request()->get('id');
        $qty = Request()->get('qty');
        $maosp=Request()->get('maosp');
           $data=DB::table('sanpham')->where('MaSP',$maosp)->first();
          $aa=$data->Sluongcon;
        if($qty>$aa){
             
        }
        else{
        Cart::update($id,$qty);
        echo "oke";}
      }

      
    }
    public function timkiem( Request $request){
         $tk = $request->input('timkiem');
         $aa = DB::table('sanpham')->where('TenSP','LIKE','%'.$tk.'%')->get();
         // $aa=SanPham::where('TenSP','LIKE','%$tk%')->first();
         $moinhat=DB::table('sanpham')->select('MaSP','TenSP','DonGia','Sluongcon','ManhaCC','MaLoai','Ram','img','vga','hedieuhanh','giakm','cpu','baohanh','mota','chuthich')->orderBy('MaSP','DESC')->take(3)->get();

         return view('user.timkiem',compact('aa','moinhat'));




    }


    public function motrieu(){
      $product=DB::table('sanpham')->select('MaSP','TenSP','DonGia','Sluongcon','ManhaCC','MaLoai','Ram','img','vga','hedieuhanh','giakm','cpu','baohanh','mota','chuthich')->where('DonGia','>=','1000000')->where('DonGia','<=','2000000')->orderBy('MaSP','DESC')->paginate(9);

      $moinhat=DB::table('sanpham')->select('MaSP','TenSP','DonGia','Sluongcon','ManhaCC','MaLoai','Ram','img','vga','hedieuhanh','giakm','cpu','baohanh','mota','chuthich')->orderBy('MaSP','DESC')->take(3)->get();

         $banchay = DB::table('sanpham')->select('MaSP','TenSP','DonGia','Sluongcon','ManhaCC','MaLoai','Ram','img','vga','hedieuhanh','giakm','cpu','baohanh','mota','chuthich','Sluongban')->orderBy('Sluongban','DESC')->take(3)->get();
             
       return view('user.motrieu',compact('product','moinhat','banchay'));
    }
     public function haitrieu(){
      $product=DB::table('sanpham')->select('MaSP','TenSP','DonGia','Sluongcon','ManhaCC','MaLoai','Ram','img','vga','hedieuhanh','giakm','cpu','baohanh','mota','chuthich')->where('DonGia','>=','2000000')->where('DonGia','<=','3000000')->orderBy('MaSP','DESC')->paginate(9);

      $moinhat=DB::table('sanpham')->select('MaSP','TenSP','DonGia','Sluongcon','ManhaCC','MaLoai','Ram','img','vga','hedieuhanh','giakm','cpu','baohanh','mota','chuthich')->orderBy('MaSP','DESC')->take(3)->get();

     $banchay = DB::table('sanpham')->select('MaSP','TenSP','DonGia','Sluongcon','ManhaCC','MaLoai','Ram','img','vga','hedieuhanh','giakm','cpu','baohanh','mota','chuthich','Sluongban')->orderBy('Sluongban','DESC')->take(3)->get();
             
       return view('user.motrieu',compact('product','moinhat','banchay'));
    }
     public function batrieu(){
      $product=DB::table('sanpham')->select('MaSP','TenSP','DonGia','Sluongcon','ManhaCC','MaLoai','Ram','img','vga','hedieuhanh','giakm','cpu','baohanh','mota','chuthich')->where('DonGia','>','3000000')->orderBy('MaSP','DESC')->paginate(9);

      $moinhat=DB::table('sanpham')->select('MaSP','TenSP','DonGia','Sluongcon','ManhaCC','MaLoai','Ram','img','vga','hedieuhanh','giakm','cpu','baohanh','mota','chuthich')->orderBy('MaSP','DESC')->take(3)->get();

     $banchay = DB::table('sanpham')->select('MaSP','TenSP','DonGia','Sluongcon','ManhaCC','MaLoai','Ram','img','vga','hedieuhanh','giakm','cpu','baohanh','mota','chuthich','Sluongban')->orderBy('Sluongban','DESC')->take(3)->get();
             
       return view('user.motrieu',compact('product','moinhat','banchay'));
    }


    public function chitietdonhangcu($id){
          
            $ten  =  Auth::user();
            $sua = Donhang::find($id);
            return view ('user.chitietdonhangcu',compact('sua','ten'));


    }
}
