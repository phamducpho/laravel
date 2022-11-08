@extends('admin.master')
@section('content')

<div class="col-lg-12">
                        <h1 class="page-header">Liên hệ
                            <small>List</small>
                        </h1>
                    </div>
                         
                    <div class="box-content">
                    <table class="table table-striped table-bordered bootstrap-datatable datatable">
                      <thead>
                        <tr>
                          <th>id liên hệ</th>
                          <th>Họ tên</th>
                          <th>Công ty liên hệ</th>
                          <th>Email</th>
                          <th>Điện thoại</th>
                          
                          <th>Địa chỉ</th>
                         
                            <th>Chi tiêt</th>
                            <th>Xóa</th>
                          
                        </tr>
                      </thead>   
                        <tbody>
                                @foreach( $data as $sh)
                                <tr>
                                        <td>{{$sh->id_lienhe}}</td>
                                        <td>{{$sh->hoten}}</td>
                                        <td>{{$sh->cty}}</td>
                                         <td>{{$sh->email}}</td>
                                        <td>{{$sh->dienthoai}}</td>         
                                           
                                        <td>{{$sh->diachi}}</td>               
                                       
                               
                                  <td class="center"><i class="fa fa-pencil fa-fw"></i> <a   href="{!! URL::route('admin.lienhe.getEdit',$sh['id_lienhe']) !!}" >Chi tiết</a></td>
                                           
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a  onclick="return xacnhanxoa('Bạn Có Chắc Muốn Xóa Không')" href="{!! URL::route('admin.lienhe.getDeletes',$sh['id_lienhe']) !!}" >Xóa</a></td>
                                           
                                
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