@extends('admin.master')
@section('content')

<div class="col-lg-12">
                        <h1 class="page-header">Quản lí
                            <small>Nhập hàng</small>
                        </h1>

                    </div>
                            <a href="addphieunhap"  style="color: green">Thêm phiếu nhập </a><br><br>
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
                         
                          <th>Mã phiếu nhập </th>
                          <th>Ngày nhập</th>
                          <th>Mã nhà cung cấp</th>
                         <th>Chi tiết</th>
                                  <th>Xóa</th>
                        </tr>
                      </thead>   
                        <tbody>
                                @foreach( $data as $sh)
                                <tr>
                                        <td >{{$sh->IdPN}}</td>
                                        <td>{{$sh->NgNhap}}</td>
                                        <td>{{$sh->ManhaCC}}</td>
                                        
                                                      
                                          <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href=" {!! URL::route('admin.phieunhap.getEdit',$sh['IdPN']) !!}"> Chi tiết</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a onclick="return xacnhanxoa('Bạn Có Chắc Muốn Xóa Không')" href="{!! URL::route('admin.phieunhap.getDelete',$sh['IdPN']) !!}" >Xóa</a></td>
                                           
                                
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