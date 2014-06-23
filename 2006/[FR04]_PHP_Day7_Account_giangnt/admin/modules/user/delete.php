<h1>Xác nhận xóa sinh viên</h1>

<?php
$users = new Sinhvien;
$id = isset($_GET['id']) && $_GET['id'] != '' ? $_GET['id'] : '';
if($id==''){
    header('Location: index.php?module=user');
}
$users = $users->getUser($id);
if(isset($_POST['submit'])){
    $users->deleteUser($id);
}
?>
<br/>
Name: <?php echo $users->getName();?>
<br/>
<form action="" method="post">
    <div class="form-gr">
        <label>&nbsp;</label>
        <input type="submit" name="submit" value="Xóa" class="btn"/>&nbsp;&nbsp;
    </div>
</form>
