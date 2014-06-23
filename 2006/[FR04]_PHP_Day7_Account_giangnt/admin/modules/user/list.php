<h1>Danh sách thành viên</h1>
<?php
$users = new SinhVien;
$list = $users->listUser();
if(!$list){
    echo 'Không có sinh viên nào!!!';
}
else{
    echo '<div id="control">
            <a href="index.php?module=user&action=insert">Insert</a>
        </div>';
    echo $list;
}
?>