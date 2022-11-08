@extends('admin.master')
@section('content')

<div class="col-lg-12">
                        <h1 class="page-header">Category
                            <small>List</small>
                        </h1>
                    </div>
                            <a href="add"  style="color: green">Thêm Sản phẩm</a><br><br>
                    <div class="box-content">
                    <table class="table table-striped table-bordered bootstrap-datatable datatable">
                      <thead>
                        <tr>
                        
                          <th>Mã sản phẩm</th>
                          <th>Tên sản phẩm</th>
                          <th>Đơn Gía</th>
                          <th>Sluongcon</th>
                          <th>Hình ảnh</th>
                          <th>Ram</th>
                          <th>Bảo hành</th>
                          <th>Xóa</th>
                           <th>Sửa</th>
                          
                        </tr>
                      </thead>   
                        <tbody>
                                @foreach( $data as $sh)
                                <tr>
                                        <td>{{$sh->MaSP}}</td>
                                        <td>{{$sh->TenSP}}</td>
                                        <td>{{$sh->DonGia}}</td>
                                        <td>{{$sh->Sluongcon}}</td>                     
                                <td><img src="{!!asset('admin/img/'.$sh['img']) !!}" width="60px;" height="50px" alt=""></td>             
                                    <td>{{$sh->Ram}}</td>
                                         <td>{{$sh->baohanh}}</td>                                 
                                          <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href=" {{route('admin.cate.getEdit',$sh['MaSP'])}}"> Sửa</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a onclick="return xacnhanxoa('Bạn Có Chắc Muốn Xóa Không')" href="{!! URL::route('admin.cate.getDelete',$sh['MaSP']) !!}" >Xóa</a></td>
                                           
                                
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