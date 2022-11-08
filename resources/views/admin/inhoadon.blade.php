<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
     <link href="{{url('admin/bower_components/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
     <link href="{{url('admin/css/inhoadon.css')}}" rel="stylesheet" type="text/css">   
</head>
<body onload="window.print();">
<div id="page" class="page">
    <div class="header">
        <div class="logo"><img src="{!!asset('admin/images/CHShop.png') !!}" width="60px;" height="50px" alt=""></div>
        <div class="company">Cửa hàng CH-SHOP</div>
    </div>
  <br/>
  <div class="title">
        HÓA ĐƠN THANH TOÁN
        <br/>
        -------oOo-------
  </div>
  <br/>
  <br/>
         <table class="table table-striped table-bordered bootstrap-datatable datatable">
                      <thead>
                        <tr>
                          <th>STT</th>
                          <th>Mã đơn hàng</th>
                          <th>Tên hàng</th>              
                          <th>Số lượng  </th>
                          <th>Đơn giá</th>
                          <th>Thành tiền</th>
                          
                         
                          
                   
                      </thead>   
                        <tbody>
                                    
                                 <?php 
                                               $cc=$in->MaDH; 
                                               $stt=0;
                                                 $chitiet=DB::table('chitietdh')->select('MaDH','MaSP','GiaSP','Soluong')->where('MaDH',$cc)->get();

                                       ?>
                                       @foreach($chitiet as $ct)
                                             <?php 
                                           $stt++;
                                          $cc=$ct->MaSP;
                                           $tensanpham=DB::table('sanpham')->select('MaSP','TenSP')->where('MaSP',$cc)->first();
                                           $sl=$ct->Soluong;
                                           $dg=$ct->GiaSP;


                                           $thanhtien=$sl*$dg;
                                           $tongtien=$thanhtien* 1.1;
                                             ?>
                                        <tr>
                                        <td>{{$stt}}</td>
                                       <td>{{$ct->MaDH}}</td>
                                        <td><option value="{{$ct->MaSP}}">{{$tensanpham->TenSP}}</option></td>
                                        <td>{{$ct->Soluong}}</td>
                                           <td>{{$ct->GiaSP}}</td>
                                           <td>{{$thanhtien}}</td>
                                   
                                          

                                           </tr>
                                        @endforeach  

           
                                               
                             
                      <tr>
                      <td class='center'><h3><p></p>Thuế GTGT</h3></td>
                      <td class='center'></td>
                      <td class='center'></td>
                      <td class='center'></td>
                      <td class='center'><h3><p></p>12.1%</h3></td>
                      <td class='center'></td>
                    </tr>
                     <tr>
                      <td class='center'><h4><p>Tổng tiền</p></h3></td>
                      <td class='center'></td>
                      <td class='center'></td>
                      <td class='center'></td>
                      <td class='center'><h3><p>{{$tongtien}}</p></h3></td>
                      <td class='center'></td>
                    </tr>  
                            
                       
                        </tbody>

                        </table>
                        <?php 
                        date_default_timezone_set("Asia/Ho_Chi_Minh");
                        $now = getdate(); 
                        $ngay = $now["mday"];
                        $thang = $now["mon"];
                        $nam = $now["year"];
                        
                      ?>
  <div class="footer-left">Đà Nẵng, NGÀY <?php  echo " $ngay";?> THÁNG <?php  echo " $thang";?> NĂM <?php  echo " $nam";?>     <br/>
    Khách hàng </div>
  <div class="footer-left">Đà Nẵng, NGÀY <?php  echo " $ngay";?> THÁNG <?php  echo " $thang";?> NĂM <?php  echo " $nam";?>     <br/>
    Nhân viên </div>
</div>
</body>
</html>