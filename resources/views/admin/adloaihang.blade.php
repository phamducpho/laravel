@extends('admin.master')
@section('content')
<div class="col-lg-12">
                        <h1 class="page-header">Category
                            <small>ADD</small>
                        </h1>
                    </div>
 <div class="col-lg-7" style="padding-bottom:120px">
            

                        <form action="{{route('admin.loaihang.getAdd')}}" method="POST">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                <fieldset>
                        
                                     @if(count($errors) >0)
                                       <div class="alert alert-danger">
                                          <ul>
                                            @foreach($errors->all() as $error)
                                            <li>{!! $error!!}</li>
                                                  @endforeach
                                          </ul>
                                          </div>
                                     @endif
                              <div class="form-group">
                                <label>Tên Loại</label>
                                <input class="form-control" name="TenLoai" placeholder="Nhập Tên Sản Người dùng"  required />
                            </div>
                               <label>Mô tả</label>
                             <textarea id="mota" name="mota" cols="80" rows="10" >                       
                               </textarea>                        
                               <script type="text/javascript">                  
                                   CKEDITOR.replace( 'mota',
                                    {
                                        filebrowserBrowseUrl : '../../admin/ckfinder/ckfinder.html',
                                        filebrowserImageBrowseUrl : '../../admin/ckfinder/ckfinder.html?Type=Images',
                                        filebrowserFlashBrowseUrl : '../../admin/ckfinder/ckfinder.html?Type=Flash',
                                        filebrowserUploadUrl : '../../admin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
                                        filebrowserImageUploadUrl : '../../admin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                                        filebrowserFlashUploadUrl : '../../admin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
                                    });
                               </script>  
                             
                          
                              <div class="form-actions">
                                <button type="submit" class="btn btn-primary" name="luu">Lưu</button>
                                <a href="{{ asset('admin/nguoidung/list')}}" class="btn btn-primary">Hủy</a>
                              </div>

                            </fieldset>
                            
                        <form>
                    </div>
                 
@endsection