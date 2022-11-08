@extends('admin.master')
@section('content')

<div class="col-lg-12">
                        <h1 class="page-header">Quản lí
                            <small>Tài khoản</small>
                        </h1>

                    </div>
                            <a href="add"  style="color: green">Thêm Tài khoản</a><br><br>
                            <div class="row">
                          <div class="col-sm-10"></div>
                              <div class="col-sm-2">
                                    @if(session('loi'))
                                      <h5 style="background: #DCCFCF">{{ session('loi')}}</h5>
                                      @endif
                            </div>
                          </div>
                      
                    <div class="box-content">
                    <table class="table table-striped table-bordered bootstrap-datatable datatable">
                      <thead>
                        <tr>
                          <th>Mã người dùng</th>
                          <th>Tên </th>      
                          <th>Cấp độ</th>  
                        </tr>
                      </thead>   
                        <tbody>
                                @foreach($sanpham as $sh)
                                <tr>
                                        <td>{{$sh->MaND}}</td>
                                        <td>{{$sh->HoTen}}</td> 

                                       
                                       <?php
                                              $cc=$sh->MaND;
                                              $lv=$sh->level;
                                              if($cc==12 and $lv==1) {
                                                echo " <td>Admin</td>";
                                              }
                                              elseif($lv==1){
                                                echo "<td>Nhân viên</td>";
                                              }
                                              else{
                                           echo "<td>Người dùng</td>";
                                              }                                              
                                        ?>               
                                          
                                
                                </tr>
                        @endforeach
                        </tbody>
    
                        </table>
                         <div class="example">
       
</div>
                 
        
              

                        <script type="text/javascript">
        function xacnhanxoa(msg) {
            if (window.confirm(msg)) {
                return true;
            }
            return false;
        }
    </script>
@endsection