<?php
if(isset($_SESSION['messages'])){
    echo "<p style='color: blue'>".$_SESSION['messages']."</p><br/>";
    session_destroy();
}
require '../library/pagination.php';
?>
﻿<h1>Danh sách thành viên</h1>
<?php
if(isset($_GET['page'])){
    $page = $_GET['page'];
}
else
    $page = 1;
$pagination = new Pagination(3,2);

$start = ($page-1)*$pagination->getLimit();
$result = $pagination->query('users', $start );
if(mysql_num_rows($result) < 1){
    echo 'Không có dữ liệu';
}
else{

?>
<table width="700" border="1" cellpadding="0" cellspacing="0" id="list" style="clear:both;">
    <tr>
        <td class="header">ID</td>
        <td class="header">username</td>
        <td class="header">Email</td>
        <td class="header">Phone</td>
        <td class="header">Address</td> 
        <td class='header'>Gender</td>
        <td class="header">Edit</td>
        <td class="header">Delete</td>                                                                                            
    </tr>
<?php
    while ($row = mysql_fetch_assoc($result)){
?>
    <tr>
        <td><?php echo $row['id'];?></td>
        <td><?php echo $row['username'];?></td>
        <td><?php echo $row['email'];?></td>
        <td><?php echo $row['phone'];?></td>
        <td><?php echo $row['address'];?></td>  
        <td><?php echo $row['gender']==1 ? "Nam" : "Nữ";?></td>  
        <td><a href='index.php?module=user&action=edit&id=<?php echo $row['id']; ?>'>edit</a></td>
        <td><a href='index.php?module=user&action=delete&id=<?php echo $row['id']; ?>'>delete</a></td>
    </tr>

<?php
    }//het while get data
    echo '</table>';
}//het if else khong co du lieu

//in phan trang
$pagination->print_pagination($page, 'index.php?module=user&action=list&');
?>