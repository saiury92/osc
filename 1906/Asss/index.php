<?php
require_once 'config.php';
session_start();
ob_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>WEB BÁN HÀNG</title>
<link rel="stylesheet" type="text/css" href="css/style.css" />
<script src="jquery-1.11.0.min.js"></script>
</head>
<body>
	<div id="banner">&nbsp;</div>
    <div id="menu">
    	<ul>
            <li><a href="index.php">Trang chủ</a></li>
            <li><a href="#">Giới thiệu</a></li>
            <li><a href="#">Tin tức</a></li>
            <li><a href="#">Sản phẩm</a></li>
            <li><a href="#">Dịch vụ</a></li>
            <li><a href="#">Khuyến mãi</a></li>
            <li><a href="#">Liên hệ</a></li>
            <li><a href="#" style="border:none;">Sitemap</a></li>
        </ul>
    </div>
    <div id="main">
    	<div id="left">
        	<div class="category">
            	<h1>Danh sách sản phẩm</h1>
                <ul>
    	        	<li><a href="#">Menu item 1</a></li>
                    <li><a href="#">Menu item 2</a></li>
                    <li><a href="#">Menu item 3</a></li>
                    <li><a href="#">Menu item 4</a></li>
                    <li><a href="#">Menu item 5</a></li>
                    <li><a href="#">Menu item 6</a></li>
                    <li><a href="#">Menu item 7</a></li>
                    <li><a href="#">Menu item 8</a></li>
                    <li><a href="#">Menu item 9</a></li>
                    <li><a href="#">Menu item 10</a></li>
	            </ul>
            </div>
            
            <div class="category" id="online">
            	<h1>Quảng cáo</h1>
                <img src="images/product/doitac.jpg" width="198" />
                <hr />
                <img src="images/product/suntech.jpg" width="198" />
            </div>
            
        </div>
            <div id="center">
                <?php
                    if(isset($_GET['module']) && $_GET['module'] != ''){
                        $module = $_GET['module'];
                        switch ($module){
                            case 'list_product': require 'list_product.php';break;
                            case 'product': require 'product.php';break;
                            case 'add_cart': require 'add_cart.php';break;
                            case 'login': require 'login.php';break;
                            default : require 'list_product.php';
                        }
                    }
                    else{
                        require 'list_product.php';;
                    }
                ?>
            </div>
        <div id="right">
            <div class="category">
                <?php
                    if(isset($_SESSION['userid'])){
                        echo '<h1>Danh Giỏ hàng của bạn</h1>';
                        echo '<p><a href="#">Tổng số sản phẩm</a></p>';
                        echo '<p><a href="#">Tổng giá tiền</a></p>';
                        echo '<p><a href="#">Xem giỏ hàng</a></p>';
                    }
                    else{
                        echo '<h1>Login</h1>';
                        echo '<form action="index.php?module=login" method="post">';
                        echo '<p><input type="text" name="username" value="" placeholder="username" class="login-input"/></p>';
                        echo '<p><input type="password" name="password" value="" placeholder="password" class="login-input"/></p>';
                        echo '<p><input type="submit" name="submit" value="login" class="login-input btn"/></p>';
                    }
                ?>
            </ul>
            </div>
            <div class="category" id="news">
            	<h1>Danh sách tin tức</h1>
               	<ul id="ulnew">
                	<li><a href="#" style="font-weight:normal;">Trung tâm hành chính 1.400 tỷ</a></li>
					<li><a href="#" style="font-weight:normal;">Trung tâm hành chính 1.400 tỷ</a></li>
					<li><a href="#" style="font-weight:normal;">Trung tâm hành chính 1.400 tỷ</a></li>
                    <li><a href="#" style="font-weight:normal;">Trung tâm hành chính 1.400 tỷ </a></li>
                    <li><a href="#" style="font-weight:normal;">Trung tâm hành chính 1.400 tỷ </a></li>
                    <li><a href="#" style="font-weight:normal;">Trung tâm hành chính 1.400 tỷ </a></li>
                    <li><a href="#" style="font-weight:normal;">Trung tâm hành chính 1.400 tỷ</a></li>
                    <li><a href="#" style="font-weight:normal;">Trung tâm hành chính 1.400 tỷ</a></li>
                    <li><a href="#" style="font-weight:normal;">Trung tâm hành chính 1.400 tỷ</a></li>
                    <li><a href="#" style="font-weight:normal;">Trung tâm hành chính 1.400 tỷ</a></li>
					<li><a href="#" style="font-weight:normal;">Trung tâm hành chính 1.400 tỷ</a></li>
					<li><a href="#" style="font-weight:normal;">Trung tâm hành chính 1.400 tỷ</a></li>
                    <li><a href="#" style="font-weight:normal;">Trung tâm hành chính 1.400 tỷ </a></li>
                    <li><a href="#" style="font-weight:normal;">Trung tâm hành chính 1.400 tỷ </a></li>
                    <li><a href="#" style="font-weight:normal;">Trung tâm hành chính 1.400 tỷ </a></li>
                    <li><a href="#" style="font-weight:normal;">Trung tâm hành chính 1.400 tỷ</a></li>
                    <li><a href="#" style="font-weight:normal;">Trung tâm hành chính 1.400 tỷ</a></li>
                    <li><a href="#" style="font-weight:normal;">Trung tâm hành chính 1.400 tỷ</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div id="footer">
    	Training PHP Project 
    </div>
<script>
$(document).ready(function(){
    $(document).on('click','.add-cart',function(){
        $productid = $(this).parent().data('productid');
        $.ajax({
            url: 'add_cart.php',
            type: 'post',
            data: 'id='+$productid,
            success: function(data){
                
            }
        });
        return false;
    });
});
</script>
</body>
</html>
