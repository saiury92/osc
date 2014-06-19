<h1>Danh sách user</h1>
<?php
require 'pagination.php';
$query = 'select id,username,fullname,email,phone,address,if(gender=1,"Nam","Nữ") as gender from users';
$pagination = new Pagination($query,3,5);

if(isset($_GET['page'])){
    $page = $_GET['page'];
}
else
    $page = 1;
$result = $pagination->query(($page-1)*$pagination->getLimit());
if(mysql_num_rows($result) < 1){
    echo "<div>Không có user</div>";
    exit;
}
?>
<table cellspacing="0" cellpadding="0" width="1000">
    <thead>
        <td>STT</td>
        <td>username</td>
        <td>Họ và tên</td>
        <td>Email</td>
        <td>Phone</td>
        <td>Địa chỉ</td>
        <td>Giới tính</td>
    </thead>
<?php
    $stt=($page-1)*$pagination->getLimit() + 1;
    while($row = mysql_fetch_assoc($result)){
        echo '<tr>';
        echo '<td>'.$stt++.'</td>';
        echo '<td>'.$row['username'].'</td>';
        echo '<td>'.$row['fullname'].'</td>';
        echo '<td>'.$row['email'].'</td>';
        echo '<td>'.$row['phone'].'</td>';
        echo '<td>'.$row['address'].'</td>';
        echo '<td>'.$row['gender'].'</td>';
        echo '<td><a href="userpage.php?module=edit_user&id='.$row['id'].'">Sửa</a></td>';
        echo '<td><a href="userpage.php?module=delete_user&id='.$row['id'].'">Xóa</a></td>';
        echo '</tr>';
    }
?>
</table>
<?php
$pagination->print_pagination($page, 'userpage.php?module=list_user&');
/*
//neu hon 2 trang moi hien phan trang
if($pagination->getTotalPage()>1){
    
?>
<div id="pagination">
    <ul>
    <?php
    //Hien first
    if($page > 1){
    ?>
        <li><a href="userpage.php?module=list_user&page=1">First</a></li>
    <?php
    } //het hien first
    ?>
    <?php 
    //hien pre
    if($page > 1){
    ?>
        <li><a href="userpage.php?module=list_user&page=<?php echo $page-1;?>">pre</a></li>
    <?php 
    }//het hien pre
    ?>
    <?php
    //hien ... neu pre co nhieu
    if($page-$pagination->getPageSiblingNumber()>1){
        echo '<li><a>...</a></li>';
    }
    ?>
    <?php
    // Hien sibling pre
    for($i = $pagination->getPageSiblingNumber() ; $i >= 1 ; $i--){
        if($page - $i >= 1){    
    ?>
        <li><a href="userpage.php?module=list_user&page=<?php echo ($page-$i);?>"><?php echo ($page-$i);?></a></li>
    <?php
        }//het if
    } //het hien sibling pre
    ?>
    <?php //current page ?>
        <li class="page-current"><a href="userpage.php?module=list_user&page=<?php echo $page;?>"><?php echo $page;?></a></li>
        
    <?php
    // Hien sibling next
    for($i = 1 ; $i <= $pagination->getPageSiblingNumber() ; $i++){
        if($page + $i <= $pagination->getTotalPage()){
    ?>
        <li><a href="userpage.php?module=list_user&page=<?php echo ($page+$i);?>"><?php echo ($page+$i);?></a></li>
    <?php
        }//het if
    } //het hien sibling next
    ?>
    
    <?php
    //hien ... neu next co nhieu
    if($page+$pagination->getPageSiblingNumber()<$pagination->getTotalPage()){
        echo '<li><a>...</a></li>';
    }
    ?>
        
    <?php 
    //hien next
    if($page < $pagination->getTotalPage()){
    ?>
        <li><a href="userpage.php?module=list_user&page=<?php echo $page+1;?>">next</a></li>
    <?php 
    }//het hien pre
    ?>    
    
    <?php
    //Hien last
    if($page < $pagination->getTotalPage()){
    ?>
        <li><a href="userpage.php?module=list_user&page=<?php echo $pagination->getTotalPage();?>">Last</a></li>
    <?php
    } //het hien first
    ?>
    </ul>
</div>
<?php 
}
     * 
     */
?>