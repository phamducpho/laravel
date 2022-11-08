@extends('admin.master')
@section('content')

<div class="col-lg-12">
                        <h1 class="page-header">Quản lí
                            <small>Đơn hàng</small>
                        </h1>

                    </div>
                           
                    <div class="box-content">
                    <table class="table table-striped table-bordered bootstrap-datatable datatable">
                      <thead>
                        <tr>
                          <th>Mã Đơn Hàng</th>
                          <th>Tên Khách hàng </th>
                          <th>SĐT</th>
                          <th>Ngày đặt</th>
                          <th>Tình trạng</th>
                          <th>Tổng tiền</th>
                          <th>Địa chỉ</th>
                          <th>Chi tiết</th>
                           <th>Xóa</th>
                         
                          
                        </tr>
                      </thead>   
                        <tbody>
                                @foreach( $data as $sh)
                                <tr>
                                      <td>{{$sh->MaDH}}</td>
                                       <td>{{$sh->TenKH}}</td>
                                        <td>{{$sh->sdt}}</td>
                                         <td>{{$sh->NgDat}}</td>
                                         <?php


                                                  $tinhtrang=$sh->TinhTrang;
                                                  if($tinhtrang==1){
                                                    echo "<td><span class='label label-default'>Chưa duyệt</span></td>";
                                                  }
                                                  elseif($tinhtrang==2){
                                                    echo "<td><span class='label label-warning'>Đã Xem</span></td>";
                                                  }
                                                  elseif($tinhtrang==3){
                                                        echo "<td><span class='label label-success'>Đang giao hàng</span></td>";
                                                  }
                                                  elseif($tinhtrang==4){
                                                    echo "<td><span class='label label-danger'>Đã giao/ Đã thanh toán</td>";
                                                  }


                                         ?>







                                          <td>{{$sh->Tongtien}}</td>
                                            <td>{{$sh->DiaChiGH}}</td>
                                                    
                                                  

                                          <td class="center"><a href=" {!! URL::route('admin.donhang.getEdit',$sh['MaDH']) !!}"> <i class="fa fa-pencil fa-fw"></i> </a></td>
                                <td class="center"><a onclick="return xacnhanxoa('Bạn Có Chắc Muốn Xóa Không')" href="{!! URL::route('admin.donhang.getDelete',$sh['MaDH']) !!}" ><i class="fa fa-trash-o  fa-fw"></i></a></td>
                                           
                                
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