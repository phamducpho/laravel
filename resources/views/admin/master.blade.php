<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Khóa Học Lập Trình Laravel Framework 5.x Tại Khoa Phạm">
    <meta name="author" content="Vu Quoc Tuan">
    <title>Admin </title>

    <!-- Bootstrap Core CSS -->
    <link href="{{ url ('admin/bower_components/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <script type="text/javascript" src="{{url('admin/ckeditor/ckeditor.js')}}"></script>  
    <!-- MetisMenu CSS -->
    <link href="{{url('admin/bower_components/metisMenu/dist/metisMenu.min.css')}}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ url('admin/dist/css/sb-admin-2.css')}}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{url('admin/bower_components/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">

    <!-- DataTables CSS -->
    <link href="{{url('admin/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css')}}" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="{{url('admin/bower_components/datatables-responsive/css/dataTables.responsive.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css">
        <script src="{{url('admin/js/highcharts.js')}}"></script>
        <script src="{{url('admin/js/exporting.js')}}"></script>
  <script type="text/javascript">
                      function xacnhan(msg){
                        if(window.confirm($msg)){
                          return true;
                        }
                        
                          return false;
                      }

                  </script>  


    


</head>

<body>

    <div id="wrapper">
        
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Trang Admin   </a>
            </div>
            <!-- /.navbar-header -->

         
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                       <br>
                        <li>
                            <a href="{!! route('admin.thongke.list') !!}"><i class="fa fa-list-alt"></i>Trang Thống kê</a>
                        </li>
                        <li>
                            <a href="{!! route('admin.cungcap.getAdd') !!}" title="Vào trang nhà cung cấp"><i class="fa fa-truck"></i> Nhà cung cấp</a>
                            
                        </li>
                         <li>
                            <a href="{!! asset('admin/phieunhap/list') !!}" title="Nhập hàng hóa"><i class="fa fa-plus-square"></i> Nhập hàng</a>
                            
                        </li>
                        
                        <li>
                            <a href="{!! asset('admin/cate/list')!!}" title="Quản lí các thao tác với sản  phẩm"><i class="fa fa-bar-chart"></i>Cập nhật sản phẩm</a>

                            
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="{!! asset('admin/loaihang/list')!!}" title="Quản lí các thao tác với sản  phẩm"><i class="fa fa-bar-chart"></i>Danh mục sản phẩm</a>

                            
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="{!! asset('admin/donhang/list')!!}" title="Quản lí đơn hàng"><i class="fa fa-bar-chart" ></i>Đơn hàng</a>
                            
                            <!-- /.nav-second-level -->
                        </li>
                          @can('add')
                                   <li>
                            <a class="dropmenu" href="#"><i class="fa fa-user"></i><span class="hidden-tablet"> Tài khoản</span><span class="label label-important"> 1 </span></a>
                            <ul>
                                <li  style="">
                                     <a href="{!! asset('admin/nguoidung/list')!!}"><i class="fa fa-list-alt"></i>Quản lí tài khoản</a>
                            
                            <!-- /.nav-second-level -->
                                </li>
                                <br>
                                <li  style="">
                                     <a href="{!! asset('admin/nguoidung/capdo')!!}"><i class="fa fa-bar-chart"></i>Danh sách quyền tài khoản</a>
                            
                            <!-- /.nav-second-level -->
                                </li>
                            </ul>   
                        </li>
                             @else
                             <li>
                              <a href="#" onclick="alert('Bạn không phải là admin nên không thể truy cập vào')" t
                              title="Quản lí tài khoản"><i class="fa fa-user"></i>Tài khoản</a>
                         
                            <!-- /.nav-second-level -->
                              </li>
                           @endcan
                             <li>
                             <a href="{!! route('admin.lienhe.list') !!}" title="Xem những ý kiến của khách hàng"><i class="fa fa-file-text"></i>Ý kiến khách hàng</a>
                            
                        </li>
                        @can('nvgh')
                          <li>
                            <a href="{!! asset('admin/donhang/listnv')!!}" title="Quản lí đơn hàng"><i class="fa fa-bar-chart" ></i>Đơn hàng cần giao</a>
                            
                            <!-- /.nav-second-level -->
                        </li>   
                          @endcan             

                        <li>
                            <a href="{{asset('logout')}}"><i class="fa fa-unlock" style="font-size: 20px;"></i>Đăng xuất</a>
                            
                            <!-- /.nav-second-level -->
                        </li>
                       
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    
                    <!-- /.col-lg-12 -->
                        

                                @yield('content')

        




                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    
  
</body>


<script src="{{url('admin/js/jquery-1.9.1.min.js')}}"></script>
    <script src="{{url('admin/js/jquery-migrate-1.0.0.min.js')}}"></script>
    
        <script src="{{url('admin/js/jquery-ui-1.10.0.custom.min.js')}}"></script>
    
        <script src="{{url('admin/js/jquery.ui.touch-punch.js')}}"></script>
    
        <script src="{{url('admin/js/modernizr.js')}}"></script>
    
        <script src="{{url('admin/js/bootstrap.min.js')}}"></script>
    
        <script src="{{url('admin/js/jquery.cookie.js')}}"></script>
    
        <script src="{{url('admin/js/fullcalendar.min.js')}}"></script>
    
        <script src="{{url('admin/js/jquery.dataTables.min.js')}}"></script>

        <script src="{{url('admin/js/excanvas.js')}}"></script>
    <script src="{{url('admin/js/jquery.flot.js')}}"></script>
    <script src="{{url('admin/js/jquery.flot.pie.js')}}"></script>
    <script src="{{url('admin/js/jquery.flot.stack.js')}}"></script>
    <script src="{{url('admin/js/jquery.flot.resize.min.js')}}"></script>
    
        <script src="{{url('admin/js/jquery.chosen.min.js')}}"></script>
    
        <script src="{{url('admin/js/jquery.uniform.min.js')}}"></script>
        
        <script src="{{url('admin/js/jquery.cleditor.min.js')}}"></script>
    
        <script src="{{url('admin/js/jquery.noty.js')}}"></script>
    
        <script src="{{url('admin/js/jquery.elfinder.min.js')}}"></script>
    
        <script src="{{url('admin/js/jquery.raty.min.js')}}"></script>
    
        <script src="{{url('admin/js/jquery.iphone.toggle.js')}}"></script>
    
        <script src="{{url('admin/js/jquery.uploadify-3.1.min.js')}}"></script>
    
        <script src="{{url('admin/js/jquery.gritter.min.js')}}"></script>
    
        <script src="{{url('admin/js/jquery.imagesloaded.js')}}"></script>
    
        <script src="{{url('admin/js/jquery.masonry.min.js')}}"></script>
    
        <script src="{{url('admin/js/jquery.knob.modified.js')}}"></script>
    
        <script src="{{url('admin/js/jquery.sparkline.min.js')}}"></script>
    
        <script src="{{url('admin/js/counter.js')}}"></script>
    
        <script src="{{url('admin/js/retina.js')}}"></script>

        <script src="{{url('admin/js/custom.js')}}"></script>



</html>
