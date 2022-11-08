@extends('admin.master')
@section('content')
<div class="col-lg-12">
                        <h1 class="page-header">Category
                            <small>ADD</small>
                        </h1>
                    </div>
 <div class="col-lg-7" style="padding-bottom:120px">
            

                        <form action="" method="POST">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                <fieldset>
                        
                         
                              <div class="form-group">
                                <label>Mã sản phẩm</label>
                                   <select class=" form-control" name="MaSP">
                                       @foreach($sanpham as $sp)
                                               <option class="form-control" value="{{$sp->MaSP}}">{{ $sp->TenSP  }}</option>
                                       @endforeach
                                   </select>

                            </div>
                               
                               <div class="controls">
                                      <label>Ngày nhập</label>                           
                                           <input class="form-control" name="NgNhap" placeholder="Tên đăng nhập"  value="{{$sua->NgNhap}}" readonly/>                           
                                </div>
                              <div class="form-group">
                                <label>Đơn gía</label>
                                <input class="form-control" name="dongia" placeholder="Email"  >
                            </div>
                             
                              <div class="form-group">
                                <label>Số lưọng</label>
                                <input class="form-control" name="Soluong" placeholder="Số điện thoại" />
                            </div>
                              
                           
                                  <div class="form-group">
                                <label>Nhà cung cấp</label>
                                 <input class="form-control" name="TaiKhoan" placeholder="Tên đăng nhập"  value="{{$sua->ManhaCC}}" readonly/>                           
                                
                            </div>
                              
                              <div class="form-actions">
                                <button type="submit" class="btn btn-primary" name="luu">Lưu</button>
                                <a href="{{ asset('admin/phieunhap/list')}}" class="btn btn-primary">Hủy</a>
                              </div>

                            </fieldset>
                            
                        <form>
                    </div>
                 
@endsection