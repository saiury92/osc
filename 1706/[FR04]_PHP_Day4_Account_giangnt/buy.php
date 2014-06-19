<?php
session_start();
ob_start();
//var_dump($_SESSION['product_array']);
/* khong co id san pham, chua co danh sach san pham */
if(!isset($_GET['id']) || $_GET['id'] == null){
    //var_dump($_GET);
    header('Location: index.php');
    exit;
}

$id=$_GET['id'];
$product_array = $_SESSION['product_array'];
/* neu id san pham khong ton tai trong danh sach san pham*/
if(!isset($product_array[$id])){
    header('Location: index.php');
    exit;
}

/*luu san pham mua boi id*/
$_SESSION['cart'][] = $id;
header('Location: index.php');
?>