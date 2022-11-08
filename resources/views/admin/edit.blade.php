@extends('admin.master')
@section('content')
<div class="col-lg-12">
                        <h1 class="page-header">Category
                            <small>Edit</small>
                        </h1>
                    </div>
 <div class="col-lg-7" style="padding-bottom:120px">
            

                        <form action="" method="POST">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                <fieldset>
                        
                           
                              <div class="form-group">
                                <label>Tên Sản Phẩm</label>
                                <input class="form-control" name="TenSP"  value="{!! $sua->TenSP!!}" required />
                            </div>
                               
                              <div class="form-group">
                                <label>Ram</label>
                                <input class="form-control" name="Ram" value="{!! $sua->Ram!!}" required />
                            </div>
                             
                              <div class="form-group">
                                <label>Card Màn hình</label>
                                <input class="form-control" name="vga" value="{!! $sua->vga!!}" required />
                            </div>
                              
                             <div class="form-group">
                                <label>CPU</label>
                                <input class="form-control" name="cpu" value="{!! $sua->cpu!!}" required />
                            </div>
                              <div class="form-group">
                                <label>Hệ điều hành</label>
                                <input class="form-control" name="hedieuhanh" value="{!! $sua->hedieuhanh!!}" required />
                            </div>
                                  <div class="form-group">
                                <label>Gía khuyến mãi</label>
                                <input class="form-control" name="giakm" value="{!! $sua->giakm!!}" required/>
                            </div>
                                 <div class="form-group">
                                <label>Số lượng</label>
                                <input class="form-control" name="Sluongcon" value="{!! $sua->Sluongcon!!}"  required/>
                            </div>
                              <div class="form-group">
                                <label>Gía bán</label>
                                <input class="form-control" name="DonGia" value="{!! $sua->DonGia!!}" required />
                            </div>
                              <div class="control-group">
                                    <img src="{!!asset('admin/img/'.$sua['img']) !!}" width="100" height="60" name="hinh" value="{!! $sua->img!!}">
                                  <label class="control-label" for="fileInput">Hình ảnh</label>
                                  <div class="controls">
                                     <input type="file" min="0" class="form-control" name="hinh" value="{!! $sua->img!!}"   />
                                  </div>
                              </div>
                 <div class="form-group">
                                <label>Bảo hành</label>
                                <input class="form-control" name="baohanh" value="{!! $sua->baohanh!!}" required />
                            </div>                 
                             <div class="form-group">
                                <label>Mã nhà cung cấp</label>
                                <input class="form-control" name="ManhaCC" value="{!! $sua->ManhaCC!!}" required readonly />
                            </div>    
                            <div class="form-group">
                                <label>Mã Loại</label>
                                <input class="form-control" name="MaLoai" value="{!! $sua->MaLoai!!}" required readonly />
                            </div> 
                          <div class="control-group">
                                <label class="control-label" for="focusedInput"><h3>Mô Tả sản phẩm</h3></label>
                              </div>
                                <textarea id="mota" name="mota" cols="80" rows="10" value=" {!! $sua->mota!!}" >   
                                {{$sua->mota}}                    
                               </textarea>                        
                               <script>                  
                                   CKEDITOR.replace( 'mota' );                   
                               </script>  
                              <div class="form-actions">
                                <button type="submit" class="btn btn-primary" name="luu">Lưu</button>
                                <a href="{{ asset('admin/cate/list')}}" class="btn btn-primary">Hủy</a>
                              </div>

                            </fieldset>
                            
                        <form>
                    </div>
                  
@endsection