<?php
if(isset($_POST['submit'])){
    $cart = $_SESSION['cart'];
}
include 'layout.php';

/* khong co id san pham, chua co danh sach san pham, chua co gio hang */
if(!isset($_GET['id']) || $_GET['id'] == null || !isset($_SESSION['product_array']) || !$_SESSION['cart']){
    header('Location: index.php');
    exit;
}

$id=$_GET['id'];
if(isset($_GET['number']))
    $number_cart = $_GET['number'];
else
    $number_cart = 0;
$cart = $_SESSION['cart'];
$exists_id = false;
foreach ($cart as $key => $value){
    if($value == $id){
        $exists_id = true;
        break;
    }
}
if(!$exists_id){
    header('Location: index.php');
    exit;
}

$product = $_SESSION['product_array'][$id];

?>
<h4>Sửa số lượng mặt hàng</h4>
<div style="margin-bottom: 30px;">
<?php
echo "Tên: ".$product['name']."<br/>";
echo "Giá: ".$product['price']."<br/>";
echo "Hãng: ".$product['bran']."<br/>";
?>
</div>
<form action="" method="post">
    <div class="form-gr">
        <label>Số lượng:</label>
        <input type="text" name="number" value="<?php echo $number_cart;?>" />
    </div>
    <div class="form-gr">
        <input type="submit" name="submit" value="Cập nhật" class="btn"/>
    </div>
    
</form>