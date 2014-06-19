<?php
include 'config.php';
if(isset($_GET['id']) && $_GET['id'] != ''){
    $id = $_GET['id'];
}
else{
    //header('location: index.php?module=list_product');
    //exit;
    echo 'Không có sản phẩm';
}
$query = 'select product.id as id, product.name as name'
        . ', price, info, img, category.name as category_name from product'
        . ' join category on product.category_id = category.id'
        . ' where product.id = "'.$id.'"';
$result = mysql_query($query);
if(mysql_num_rows($result) != 1){
    echo 'Không có sản phẩm';
}
else{
$row = mysql_fetch_assoc($result);
?>
<div class="product-img">
    <img src="<?php echo $row['img'];?>" />
</div>
<div class="product-desc">
    <p><h2>Tên sản phẩm: <?php echo $row['name'];?></h2></p>
    <p>Giá: <?php echo $row['price'];?></p>
    <p>Loại: <?php echo $row['category_name'];?></p>
    <p data-productid='<?php echo $row['id']; ?>'><a href="index.php?module=add_cart&id=<?php echo $row['id'];?>" class="add-cart"><img src="images/product/giohang.jpg" /></a></p>
</div>
<div class="product-info">
    <?php
    echo $row['info'];
    ?>
</div>
<?php
}
?>