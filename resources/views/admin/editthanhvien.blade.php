@extends('admin.master')
@section('content')

<div class="col-lg-12">
                        <h1 class="page-header">Category
                            <small>List</small>
                        </h1>
                    </div>
                           <a href="{{route('admin.thongke.list')}}"  style="color: green"><i class="fa fa-arrow-left">Trở Về</i></a><br><br>
                    <div class="box-content">
                    <table class="table table-striped table-bordered bootstrap-datatable">
                      <thead>
                        <tr>
                          <th>STT</th>
                          <th>Họ và tên</th>
                          <th>Ngày tạo</th>
                          <th>Vai trò</th>
                          <th>Trạng thái</th>                          
                        </tr>
                      </thead>   
                        <tbody>
                          <?php 
                              $stt=0;
                        ?>
                                   @foreach($data as $db)

                                        <?php 
                                       $stt++;
                                        ?>
                                <tr>
                                     <td>{{$stt}}</td>
                                     <td>{{$db->HoTen}}</td>
                                     <td>{{$db->created_at}}</td>
                                     <td>{{$db->TaiKhoan}}</td>
                
                                        <td>{{$db->trangthai}}</td>
                                     
                                     
                                
                                </tr>
                        @endforeach
                        </tbody>
    
                        </table>
                    
       
</div>
                 
        
              

                
@endsection