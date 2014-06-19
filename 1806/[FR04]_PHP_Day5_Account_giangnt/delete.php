<h1>Xác nhận xóa bài đăng</h1>
<?php
if(!isset($_GET['id']) || $_GET['id'] == null){
    header('Location: index.php?module=list');
    exit;
}
$id_get = $_GET['id'];
$result = mysql_query('select * from tbl_new where news_id = "'.$id_get.'"');
if(mysql_num_rows($result) != 1){
    header('Location: index.php?module=list');
    exit;
}

$articl = mysql_fetch_assoc($result);

if(isset($_POST['submit'])){
    $query = 'delete from tbl_new where news_id = "'.$articl['news_id'].'"';
    mysql_query($query);
    $_SESSION['messages'] = 'Xóa thành công';
    header('Location: index.php?module=list');
    exit;
}
?>
<br/><br/>
<div>
    <b>Title: </b><?php echo $articl['news_title'];?>
</div>
<form action="" method="post" >
    <div class="form-gr">
        <input type="submit" name="submit" value="Xóa"  class="btn"/>
        <a href='index.php?module=list' class="btn cancel">Hủy xóa</a>
    </div>
</form>