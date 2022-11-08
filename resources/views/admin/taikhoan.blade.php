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
                          <th>Giới tính</th>
                          <th>Số điện thoại</th>
                          <th>Địa chỉ</th>
                          <th>Tài khoản</th>
                          <th>level</th>
                          <th>Xóa</th>
                           <th>Sửa</th>
                          
                        </tr>
                      </thead>   
                        <tbody>
                                @foreach( $data as $sh)
                                <tr>
                                        <td>{{$sh->MaND}}</td>
                                        <td>{{$sh->HoTen}}</td>
                                        <td>{{$sh->Gioitinh}}</td>
                                        <td>{{$sh->SDT}}</td>                     
                                        <td>{{$sh->DiaChi}}</td>      
                                            <td>{{$sh->TaiKhoan}}</td> 
                                              <td>{{$sh->level}}</td>                      
                                          <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href=" {!! URL::route('admin.nguoidung.getEdit',$sh['MaND']) !!}"> Sửa</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a onclick="return xacnhanxoa('Bạn Có Chắc Muốn Xóa Không')" href="{!! URL::route('admin.nguoidung.getDelete',$sh['MaND']) !!}" >Xóa</a></td>
                                           
                                
                                </tr>
                        @endforeach
                        </tbody>
    
                        </table>
                         <div class="example">
       <div class="pagination pull-right">
            <div class="row" >
                <ul class="list-inline">
                    @if($data->currentPage()!=1)
                        <li ><a href="{{ str_replace('/?','?',$data->url($data->currentPage()-1) )}}">Prew</a></li> 
              @endif
              @for ($i=1;$i<=$data->lastPage();$i=$i+1)
              
              <li class="{{ $data->currentPage()==$i}} ? ' active' ' '">
                <a href="{{ str_replace('/?','?',$data->url($i))}}">{{ $i}}</a>
              </li> 
              @endfor
                @if($data->currentPage()!=$data->lastPage())
                        <li><a href="{{ str_replace('/?','?',$data->url($data->currentPage()+1) ) }}">Next</a></li>
                        @endif
                        </ul>
                </ul>
            </div>
        </div>
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