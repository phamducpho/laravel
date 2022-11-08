          

<!DOCTYPE html>                 
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Trang chủ | LAPSTORE</title>
    <link rel="icon" href="{{url ('user/images/laptop.png')}}">
    <link href="{{url ('user/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{url ('user/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{url ('user/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{url ('user/css/price-range.css')}}" rel="stylesheet">
      <link href="{{url ('user/css/font-awesome.min.css')}}" rel="stylesheet">
  	<link href="{{url ('user/css/main.css')}}" rel="stylesheet">
    <link href="{{url ('user/css/responsive.css')}}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       

    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{url ('user/images/ico/apple-touch-icon-144-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{url ('user/images/ico/apple-touch-icon-114-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{url ('user/images/ico/apple-touch-icon-72-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" href="{{url ('user/images/ico/apple-touch-icon-57-precomposed.png')}}">
</head><!--/head-->

<body>
    <header id="header"><!--header-->
        <div class="header_top"><!--header_top-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="contactinfo">
                            <ul class="nav nav-pills">
                                <li><a href="#"><i class="fa fa-phone"></i> +0965600364</a></li>
                                <li><a href="#"><i class="fa fa-envelope"></i> phamducpho14t1@gmail.com</a></li>
                            </ul>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div><!--/header_top-->
        
          <div class="header-middle"><!--header-middle-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        
                        <div class="mainmenu pull-left">
                            <ul class="nav navbar-nav collapse navbar-collapse">
                               <li> <a href="{!! route('CHshop') !!}"><img src="{{url ('user/images/laptop.png')}}" style="width: 20px; height: 20px;"></a></li>
                                <li ><a href="{!! route('CHshop') !!}">Lap Store</a></li> 

                                   
                                 
                                <li class='dropdown'>
                                                    <a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'>
                                                       Sản phẩm
                                                    <ul class='dropdown-menu'>                     

                                                    <li style="padding-left: 17px"><a href="{!! route('motrieu') !!}">Từ 1->2 triệu</a></li><br>
                                                      <li><a href="{!! route('haitrieu') !!}">Từ 2->3 triệu</a></li><br>
                                                      <li><a href="{!! route('batrieu') !!}">Trên 3 triệu</a></li>
                                                    </ul>
                                                  </li>
                                <li><a href="{!! route('lienhe') !!}">Liên hệ</a></li>
                               
                                <div class="col-sm-3">
                                     <div class="search_box pull-right-1">
                                 <form method="post" action="{!! route('timkiem') !!}">
                                   <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                   <input type="text" name="timkiem" placeholder="Tìm kiếm"/>

                                </form>
                            </div> 
                            </div>                     
                            </ul>
                        </div>
                    </div>
                    
                    <div class="col-sm-4">
                        <div class="shop-menu pull-right">

                            <ul class="nav navbar-nav">


                                
                                
                                <li><a href="{!!route('giohang') !!}"><i class="fa fa-shopping-cart"></i>(<?php
                                   $dem= Cart::content()->count();
                                   echo $dem;
                                    ?>)Món trong giỏ</a></li>
                                            
                            <?php 
                                  if(Auth::check()){
                                    $users=Auth::user();

                            ?>

                                <li class='dropdown'>
                                                    <a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'>
                                                    <i class='fa fa-user'></i> {{$users->HoTen}} <span class='caret'></span></a>
                                                    <ul class='dropdown-menu'>
                                                      <li><a href="">Thông tin</a></li><br>
                                                      <li><a href="">Đơn hàng cũ</a></li><br>
                                                      <li><a href="{{asset('thoat')}}">Đăng xuất</a></li>
                                                    </ul>
                                                  </li>
                               <?php
                           }
                            else{

                               ?>


                                <li><a href="{!! route('dangnhap1') !!}"><i  class="fa fa-lock "></i>Đăng nhập</a></li>

                                  <li><a href="{!! route('dangki') !!}"><i  class="fa fa-user" ></i>Đăng kí</a></li><?php

                                 }
                                 ?>
                                 
                          
                                 
                          


                                
                                
                 
                                
                                
                                
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header-middle-->
      <div class="header-bottom"><!--header-bottom-->
            <div class="container">
                <div class="row">
                    
                    <div class="col-sm-9">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                  <span class="icon-bar"></span>
                            </button>
                        </div>
                        
                    </div>
                   
                </div>
            </div>
        </div><!--/header-bottom-->
    </header><!--/header-->
    
    <div class="header-bottom"><!--header-bottom-->
		
		</div><!--/header-bottom-->
	</header><!--/header-->
	 
	 <div id="contact-page" class="container">
    	<div class="bg">
	    	
    		<div class="row">  	
	    		<div class="col-sm-8">
	    			<div class="contact-form">
	    				<h2 class="title text-center">Quý khách vui lòng để lại thông tin liên hệ và phản ánh để chúng tôi phục vụ tốt hơn</h2>
	    				<div class="status alert alert-success" style="display: none"></div>
				    	<form id="main-contact-form" class="contact-form row" name="contact-form" method="post" action="">
				    	 <input type="hidden" name="_token" value="{{ csrf_token() }}" />
				          
				            <div class="form-group col-md-12">
				                <input type="text" name="hoten" class="form-control" required="required" placeholder="Họ tên">
				            </div>
				              <div class="form-group col-md-12">
				                <input type="text" name="cty" class="form-control" required="required" placeholder="Công ty">
				            </div>
				              <div class="form-group col-md-12">
				                <input type="text" name="email" class="form-control" required="required" placeholder="Email">
				            </div>
				              <div class="form-group col-md-12">
				                <input type="text" name="dienthoai" class="form-control" required="required" placeholder="Số điện thoại">
				            </div>
				              <div class="form-group col-md-12">
				                <input type="text" name="diachi" class="form-control" required="required" placeholder="Địa chỉ">
				            </div>
				              <div class="form-group col-md-12">
				                <input type="text" name="fax" class="form-control" required="required" placeholder="Fax ">
				            </div>
				            <div class="form-group col-md-12">
				                <textarea name="noidung" id="message" required="required" class="form-control" rows="8" placeholder="Your Message Here"></textarea>
								            </div>
						 <div class="form-group col-md-12">		            
								            <?php 
					                        date_default_timezone_set("Asia/Ho_Chi_Minh");
					                        $now = getdate(); 
					                        $currentDate = $now["mday"] . "/" . $now["mon"] . "/" . $now["year"]."(".$now["hours"] . ":" . $now["minutes"] . ":" . $now["seconds"].")
					                        ";
					                      ?>    
						 <input type='text' value='<?php echo  $currentDate ;?>' name='ngaylienhe' readonly class='form-control' >							
					                      </div>                    
				            <div class="form-group col-md-12">
				                <input type="submit" name="submit" class="btn btn-primary pull-right" value="Submit">
				            </div>
				        </form>
	    			</div>
	    		</div>
	    		<div class="col-sm-4">
	    			<div class="contact-info">
	    				<h2 class="title text-center">Hãy liên hệ với chúng tôi</h2>
	    				<address>
	    					<p>CH-Shop.</p>
							<p>31 Trần Phú, Hải Châu 1 , Đà Nẵng</p>
							<p>Form: Việt Nam </p>
							<p>Mobile: +840965600364</p>
							<p>Fax: 1-714-252-0026</p>
							<p>Email: phamducpho14t1@gmail.com</p>
	    				</address>
	    				<div class="social-networks">
	    					<h2 class="title text-center">Social Networking</h2>
							<ul>
								<li>
									<a href="https://www.facebook.com/NguHoHung"><i class="fa fa-facebook"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-twitter"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-google-plus"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-youtube"></i></a>
								</li>  
                                                                                         <br><br><br> 
                                                                                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3833.784137241054!2d108.21187591408312!3d16.076687638876315!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xd4058cb259787dac!2sDa+Nang+College+Of+Technology!5e0!3m2!1sen!2s!4v1494491811283" width="400" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
                                							</ul>
	    				</div>
	    			</div>
    			</div>    			
	    	</div>  
    	</div>	
    </div><!--/#contact-page-->
  
    
     
<footer id="footer"><!--Footer-->
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-sm-2">
                        <div class="companyinfo">
                            <h2><span>c</span>HShop</h2>
                            <p>Nơi đáng tin cậy để mua sản phẩm chính hãng với chất lưọng tốt nhất </p>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="address">
                            
                            <p>505 S Atlantic Ave Virginia Beach, VA(Virginia)</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="footer-widget">
         
        </div>
        
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <p class="pull-left">Copyright © 2013 E-SHOPPER Inc. All rights reserved.</p>
                    <p class="pull-right">Designed by <span><a target="_blank" href="http://www.themeum.com">Themeum</a></span></p>
                </div>
            </div>
        </div>
        
    </footer><!--/Footer-->
    

  
    <script src="{{url ('user/js/jquery.js')}}"></script>
    <script src="{{url ('user/js/bootstrap.min.js')}}"></script>
    <script src="{{url ('user/js/jquery.scrollUp.min.js')}}"></script>
    <script src="{{url ('user/js/price-range.js')}}"></script>
    <script src="{{url ('user/js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{url ('user/js/main.js')}}"></script>
</body>
</html>
