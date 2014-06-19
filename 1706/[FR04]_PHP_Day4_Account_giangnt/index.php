<?php
include 'layout.php';
?>
<h3>Danh sách các sản phẩm</h3>
<?php
foreach ($product_array as $key => $value){
?>
<div class="product">
    <div class="name">
        Tên sản phẩm: <?php echo $value['name'];?>
    </div>
    <div class="price">
        Giá:<?php echo $value['price'];?>
    </div>
    <div class="bran">
        Hãng: <?php echo $value['bran'];?>
    </div>
    <div class="buy">
        <a href='buy.php?id=<?php echo $key ;?>'>mua</a>
    </div>
</div>
<?php
}
?>