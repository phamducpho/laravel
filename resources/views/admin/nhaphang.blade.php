@extends('admin.master')
@section('content')
<div class="col-lg-12">
                        <h1 class="page-header">Nhà cung cấp
                            <small>ADD</small>
                        </h1>
                    </div>
 <div class="col-lg-7" style="padding-bottom:120px">
            

                        <form action="" method="POST">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                <fieldset>
                        
                           
                              <div class="form-group">
                                <label>Tên Nhà Cung Cấp</label>
                                <input class="form-control" name="TennhaCC" placeholder="Nhập Tên Nhà cung cấp"  required />
                            </div>
                               
                              <div class="form-group">
                                <label>Số điện thoại</label>
                                <input class="form-control" name="SDT" placeholder="Nhập Số điện thoại" required />
                            </div>
                              <div class="form-group">
                                <label>Địa chỉ</label>
                              <textarea id="mota" name="Diachi" cols="80" rows="10"  >                       
                               </textarea>                        
                               <script>                  
                                   CKEDITOR.replace( 'mota' );                   
                               </script> 
                                </div>
    
                             
                              <div class="form-actions">
                                <button type="submit" class="btn btn-primary" name="luu">Lưu</button>
                                <a href="{!! route('admin.cungcap.getAdd') !!}" class="btn btn-primary">Hủy</a>
                              </div>

                            </fieldset>
                            
                        <form>
                    </div>
                 
@endsection