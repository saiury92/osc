<?php
if(!isset($_GET['id']) || !$_GET['id']){
    header('Location: getSV.php');
}
 else {
    $masv_get = $_GET['id'];
}
$sinhvien = file('sinhvien.txt');

$sv_id = null;
$key_file = '';
/* tim sv co ma id */
foreach ($sinhvien as $key => $value){
    $line = explode('|', $value);
    if($line[0] == $masv_get){
        $sv_id = $line;
        $key_file = $key;
        break;
    }
}
if(isset($_POST['submit'])){
    unset($sinhvien[$key_file]);
    file_put_contents('sinhvien.txt', $sinhvien);
    header("Location: getSV.php");
}
/*Khong tim thay sv co ma phu hop*/
if(!$sv_id){
    header('Location: getSV.php');
    exit;
}
include 'layout.php';
?>
<h3>Xác nhận xóa sinh viên</h3>
<?php
echo '<b>Ma:</b>'.$sv_id[0].'<br/>';
echo '<b>Ten:</b>'.$sv_id[1].'<br/>';
echo '<b>Email:</b>'.$sv_id[2].'<br/>';
echo '<b>Phone:</b>'.$sv_id[3].'<br/>';
echo '<b>Dia chi:</b>'.$sv_id[4].'<br/>';
echo '<b>Gioi tinh:</b>'.$sv_id[5].'<br/>';
?>
<form action="" method="post">
    <input type="submit" name="submit" value="đòng ý xóa" class="btn" />
    <input type="hidden" name="id" value="<?php echo $masv_get;?>" /
</form>