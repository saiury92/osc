<?php
if(isset($_SESSION['messages'])){
    echo '<div style="color: blue;margin-bottom: 20px;">'. $_SESSION['messages'].'</div>';
    session_destroy();
}
?>

<h1>Danh sách bài đăng</h1>
<?php
$result = mysql_query('select * from tbl_new');
$row = mysql_fetch_array($result);
var_dump($row);
exit;
if(mysql_num_rows($result) < 1){
    echo "<div>Không có bài đăng</div>";
}
else{
?>
<table cellspacing="0" cellpadding="0" width="100%">
    <thead>
        <td>STT</td>
        <td>Title</td>
        <td>Miêu tả</td>
        <td>Thông tin chi tiết</td>
    </thead>
<?php
    $stt=1;
    while($row = mysql_fetch_assoc($result)){
        echo '<tr>';
        echo '<td>'.$stt++.'</td>';
        echo '<td>'.$row['news_title'].'</td>';
        echo '<td>'.$row['news_desc'].'</td>';
        echo '<td>'.$row['news_info'].'</td>';
        echo '<td><a href="index.php?module=edit&id='.$row['news_id'].'">Sửa</a></td>';
        echo '<td><a href="index.php?module=delete&id='.$row['news_id'].'">Xóa</a></td>';
        echo '</tr>';
    }
?>
</table>
<?php }?>