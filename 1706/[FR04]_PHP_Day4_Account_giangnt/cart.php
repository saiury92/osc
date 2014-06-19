<?php
include 'layout.php';
?>
<h3>Các sản phẩm đã mua</h3>
<?php
$session = $_SESSION;
if(!isset($session['cart']) || sizeof($session['cart']) == 0){
    echo "Chưa mua sản phẩm nào";
    exit;
}
$cart_tem = array();

foreach ($session['cart'] as $value){
    $cart_tem[$value]=0;
}
foreach ($session['cart'] as $key => $value){
    $cart_tem[$value]++;
}
foreach ($cart_tem as $key =>  $value){
?>
<div class="list-cart">
    <div class="cart-name">
        Tên: <?php echo $product_array[$key]['name'];?>
    </div>
    
    <div class="cart-price">
        Giá: <?php echo $product_array[$key]['price'];?>
    </div>
    
    <div class="cart-bran">
        Hãng: <?php echo $product_array[$key]['bran'];?>
    </div>
    <div class="cart-num">
        Số lượng: <?php echo $value;?>
        <span class="cart-update-num"><a href="edit_number.php?id=<?php echo $key;?>&number=<?php echo $value; ?>">sửa số lượng</a></span>
    </div>
    <span class="delete"><a href="delete_cart.php?id=<?php echo $key;?>">delete</a></span>
</div>
    
<?php 
}
?>