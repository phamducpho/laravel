@extends('admin.master')
@section('content')
<div class="col-lg-12">
                        <h1 class="page-header">Phiếu nhập
                            <small>ADD</small>
                        </h1>
                    </div>
 <div class="col-lg-7" style="padding-bottom:120px">
            

                        <form action="" method="POST">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                <fieldset>
                        
                           
                              <div class="form-group">
                                <label>Tên Nhà Cung Cấp</label>
                                <select class="form-control" name="nhacungcap">
                                             @foreach( $nhacungcap as $sh)
                                    <option value="{{$sh->ManhaCC}}" >{{ $sh->TennhaCC}}</option>
                                            @endforeach
                                </select>
                            </div>
                               
                             
                        <div class='form-group'>
                      <?php 
                        date_default_timezone_set("Asia/Ho_Chi_Minh");
                        $now = getdate(); 
                        $currentDate = $now["mday"] . "/" . $now["mon"] . "/" . $now["year"]."(".$now["hours"] . ":" . $now["minutes"] . ":" . $now["seconds"].")
                        ";
                      ?>
                      <input type='text' value='<?php echo  $currentDate ;?>' name='ngnhap' readonly class='form-control' >
                    </div>
                              
                             
                              <div class="form-actions">
                                <button type="submit" class="btn btn-primary" name="luu">Lưu</button>
                                <a href="{!! route('admin.phieunhap.getList') !!}" class="btn btn-primary">Hủy</a>
                              </div>

                            </fieldset>
                            
                        <form>
                    </div>
                 
@endsection