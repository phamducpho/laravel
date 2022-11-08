@extends('admin.master')
@section('content')

<div class="col-lg-12">
                        <h1 class="page-header">Quản lí
                            <small>Danh mục</small>
                        </h1>
                      
                    </div>
                            <a href="add"  style="color: green">Thêm danh mục</a><br><br>
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
                          <th>Mã  Loại hàng</th>
                          <th>Tên </th>
                          <th>Mô tả</th>
             
                          <th>Xóa</th>
            
                        </tr>
                      </thead>   
                        <tbody>
                                @foreach( $data as $sh)
                                <tr>
                                        <td>{{$sh->MaLoai}}</td>
                                        <td>{{$sh->TenLoai}}</td>
                                        <td>{{$sh->mota}}</td>
                               
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a onclick="return xacnhanxoa('Bạn Có Chắc Muốn Xóa Không')" href="{!! URL::route('admin.loaihang.getDelete',$sh['MaLoai']) !!}" >Xóa</a></td>
                                           
                                
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