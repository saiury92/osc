<?php
require_once 'pagination.php';

$query = 'select * from product';
$pagination = new Pagination($query,12,5);
if(isset($_GET['page'])){
    $page = $_GET['page'];
}
else
    $page = 1;
$result = $pagination->query(($page-1)*$pagination->getLimit());
if(mysql_num_rows($result) < 1){
    echo "<div>Không có sản phẩm</div>";
}
else{
    echo '<ul>';
    while($row = mysql_fetch_assoc($result)){

?>
    <li style="margin-left:10px;" data-productid="<?php echo $row['id'];?>">
        <h3><a href="index.php?module=product&id=<?php echo$row['id'];?>" class="view-product"><?php echo $row['name'];?></a></h3>
        <a href="index.php?module=product&id=<?php echo$row['id'];?>" class="view-product"><img src="<?php echo $row['img']; ?>" class="product" /></a>
        <p>Giá: <?php echo $row['price'];?></p>
        <a href="index.php?module=add_cart&id=<?php echo $row['id'];?>" class="add-cart"><img src="images/product/giohang.jpg" />Đặt hàng</a>
    </li>                
<?php
    }//het while san pham
    echo '</ul>';
}//het if else khong co san pham

//hien phan trang
$pagination->print_pagination($page, 'index.php?module=list_product&');
?>
<script>
$(document).ready(function(){
    //$('#center').html();
    $(document).on('click','.view-product',function(e){
        $productid = $(this).parent().data('productid');
        $.ajax({
            url: 'product.php',
            type: 'get',
            data: 'id='+$productid,
            success: function(data){
                $('#center').html(data);
            }
        });
        return false;
    });
});
</script>