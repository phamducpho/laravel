<?php
  include("connect.php");
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
<!-- start: Meta -->
    <meta charset="utf-8">
    <title></title>
    <meta name="description" content="Bootstrap Metro Dashboard">
    <meta name="author" content="Dennis Ji">
    <meta name="keyword" content="Metro, Metro UI, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <!-- end: Meta -->
    
    <!-- start: Mobile Specific -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- end: Mobile Specific -->
    
    <!-- start: CSS -->
    <link id="bootstrap-style" href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.min.css" rel="stylesheet">
    <link id="base-style" href="css/style.css" rel="stylesheet">
    <link id="base-style-responsive" href="css/style-responsive.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>
    <!-- end: CSS -->
    

    <!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <link id="ie-style" href="css/ie.css" rel="stylesheet">
    <![endif]-->
    
    <!--[if IE 9]>
        <link id="ie9style" href="css/ie9.css" rel="stylesheet">
    <![endif]-->
        
    <!-- start: Favicon -->
    <link rel="shortcut icon" href="img/favicon.ico">
    <!-- end: Favicon -->
    
    
        
</head>

<body>

<div class="row-fluid sortable">        
            <div class="box span12">
                       <table class="table table-bordered" width="1000px">
                            <thead>
                                <tr>
                                   
                                    <th align="center">Mã Đơn Hàng</th>
                                    <th>Mã Thành Viên</th>
                                    <th>Họ Và Tên</th>
                                    <th>Địa Chỉ</th>
                                    <th>Ngày Đặt</th>
                                    <th>Ngày Thanh Toán</th>
                                    <th>Nhân Viên Thanh Toán</th>
                                    <th>Tổng Tiền</th>
                                    <th>Ghi Chú</th>                                          
                                </tr>
                            </thead>   
                            <tbody>
                        <?php
                        $qr="SELECT * FROM donhang";
                        $rs=mysqli_query($con,$qr);
                      //  $tinhtrang="";
                        $i=0;
                        while($row=mysqli_fetch_array($rs)){
                            $i=$i+1;
                            if($row['MaND']==null){
                                $MaND="không có";
                            }else{
                                $MaND=$row['MaND'];
                            }
                            
                        echo"
                                <tr>

                                    <td >{$row['MaDH']}</td>
                                    <td >{$MaND}</td>
                                    <td >{$row['TenKH']}</td>
                                    <td >{$row['DiaChiGH']}</td>
                                    <td >{$row['NgDat']}</td>
                                    <td >{$row['NgTT']}</td>
                                    <td >{$row['NhanVienTT']}</td>
                                    <td >{$row['Tongtien']}</td>
                                    <td ></td>                                       
                                </tr>";
                        }
                        ?>
                            </tbody>
                        </table>  
                        
                    </div>
       
        </div><!--/span-->
</body>
</html>