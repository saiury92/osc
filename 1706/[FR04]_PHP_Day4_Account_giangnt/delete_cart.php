<?php
session_start();
ob_start();
/* khong co id san pham, chua co danh sach san pham, chua co gio hang */
if(!isset($_GET['id']) || $_GET['id'] == null || !isset($_SESSION['product_array']) || !$_SESSION['cart']){
    header('Location: index.php');
    exit;
}

$id=$_GET['id'];
$cart = $_SESSION['cart'];

foreach ($cart as $key => $value){
    if($value == $id){
        unset($cart[$key]);
    }
}
/*xoa san pham mua boi id*/
$_SESSION['cart'] = $cart;
header('Location: index.php');
?>