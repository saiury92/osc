<style>
    .info-user label{
        width: 100px;
        display: inline-block;
    }
    .info-user{padding-bottom: 20px;}
    .error{color: red;font-size: 14px;}
    input[type='radio']{margin-right: 30px;}
    .btn{
        text-decoration: none;
        padding: 10px 20px;
        border: 1px aquamarine solid;
        background-color: aquamarine;
        cursor: pointer;
        border-radius: 4px;
    }
    .link{margin-top: 20px;}
</style>
<a href="4_SinhVien_Them.php" class="btn">Thêm sinh viên</a>
<?php 
session_start();
require ('SinhVien.php');
?>
<h1>Danh sách sinh viên</h1>
<?php
if(isset($_SESSION['sinhvien'])){
    $sinhvien = $_SESSION['sinhvien'];
    var_dump($sinhvien);exit;
    if(sizeof($sinhvien) == 0)
        echo "Chưa có sinh viên trong danh sách";
    else{
        $sinhvien->listUser();
    }
}
else{
    echo "Chưa có sinh viên trong danh sách";
}
?>
