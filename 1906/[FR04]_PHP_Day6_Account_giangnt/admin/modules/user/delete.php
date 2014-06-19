<h1>Xác nhận xóa user</h1>
<?php
if(!isset($_GET['id']) || $_GET['id'] == null){
    header('Location: index.php?module=user&action=list');
    exit;
}
$id_get = $_GET['id'];
$result = getData('users', '*', array('id'=>"$id_get"));
if(mysql_num_rows($result) != 1){
    header('Location: index.php?module=user&action=list');
    exit;
}
$user = mysql_fetch_assoc($result);

if(isset($_POST['submit'])){
    $result = deleteData('users', $id_get);
    $_SESSION['messages'] = 'Xóa thành công';
    header('Location: index.php?module=user');
    exit;
}
?>
<br/><br/>
<div>
    <b>username: </b><?php echo $user['username'];?>
</div>
<form action="" method="post" >
    <div class="form-gr">
        <input type="submit" name="submit" value="Xóa"  class="btn"/>
        <a href='index.php?module=user&action=list' class="btn cancel">Hủy xóa</a>
    </div>
</form>