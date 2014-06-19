<?php
session_start();
ob_start();
//session_destroy();
$product_array = array(
    array(
        'name' => 'Asus vx 351',
        'price' => 10000000,
        'bran' => 'Asus',
    ),
    array(
        'name' => 'Asus sd 13',
        'price' => 325555,
        'bran' => 'Asus',
    ),
    array(
        'name' => 'Asus fv 76',
        'price' => 3800000,
        'bran' => 'Asus',
    ),
    array(
        'name' => 'Nokia 1280',
        'price' => 4300000,
        'bran' => 'Nokia',
    ),
    array(
        'name' => 'Nokia X2',
        'price' => 7500000,
        'bran' => 'Nokia',
    ),
    array(
        'name' => 'Nokia',
        'price' => 630000,
        'bran' => 'Nokia',
    ),
    array(
        'name' => 'Nokia Lumia 650',
        'price' => 650000,
        'bran' => 'Nokia',
    ),
    array(
        'name' => 'Nokia Lumia 550',
        'price' => 1200000,
        'bran' => 'Nokia',
    ),
    array(
        'name' => 'Acer 12 ws',
        'price' => 65000,
        'bran' => 'Acer',
    ),
    array(
        'name' => 'Acer 54hj',
        'price' => 320000,
        'bran' => 'Acer',
    ),
);
$_SESSION['product_array'] = $product_array;
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Gio hang</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css"/>
    </head>
    <body>    
<div id="header">
    <div class="menu">
        <a href="index.php">Danh sách sản phẩm</a>
        <a href="#" style="float: right;">Số sản phẩm trong giỏ hàng: 
            <?php 
                if(!isset($_SESSION['cart'])) 
                    echo '0';
                else 
                    echo sizeof($_SESSION['cart']);
            ?></a>
        <a href="cart.php" style="float: right;">Vào giỏ hàng</a>
        
    </div>
</div>
    