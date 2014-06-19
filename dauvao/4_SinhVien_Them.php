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
<div>
    <a href="4_SinhVien.php" class="btn">Danh sách sinh viên</a>
    <a href="4_SinhVien_Them.php" class="btn">Thêm sinh viên</a>
</div>
<?php 
session_start();
require('SinhVien.php');
if(isset($_POST['submit'])){
    /* check info student */
    if(isset($_POST['name']) & !empty($_POST['name'])){
        $name = $_POST['name'];
    }
    else{
        $name='';
        $error_name='Thiếu tên sinh viên';
    }
    
    if(isset($_POST['email']) & !empty($_POST['email'])){
        $email = $_POST['email'];
    }
    else{
        $email='';
        $error_email='Thiếu email';
    }
    
    if(isset($_POST['addr']) & !empty($_POST['addr'])){
        $addr = $_POST['addr'];
    }
    else{
        $addr='';
        $error_addr='Thiếu địa chỉ';
    }
    
    if(isset($_POST['phone']) & !empty($_POST['phone'])){
        $phone = $_POST['phone'];
    }
    else{
        $phone='';
        $error_phone='Thiếu điện thoại';
    }    
    if(isset($_POST['gender']) & !empty($_POST['gender'])){
        $gender = $_POST['gender'];
    }
    else{
        $gender='';
        $error_gender='Thiếu giới tính';
    }
    /* //end check info student */
    
    /* export info student */
    if($name && $email && $addr && $phone && $gender){
        echo "<br/>";
        echo "Đã thêm sinh viên thành công<br/>";
        echo "Họ và tên: <b>$name</b><br/>";
        echo "Email: <b>$email</b><br/>";
        echo "Địa chỉ: <b>$addr</b><br/>";
        echo "Điện thoại: <b>$phone</b><br/>";
        echo "Giới tính: <b>";
        if($gender=='man')
            echo "Nam";
        else
            echo "Nữ";
        if(isset($_SESSION['sinhvien'])){
            $sinhvien = $_SESSION['sinhvien'];
            session_destroy();
        }
        else{
            $sinhvien = new SinhVien();
        }
        $sinhvien->insertUser($name, $email, $addr, $phone, $gender);
        $_SESSION['sinhvien'] = $sinhvien;
        echo "</b><br/>";
        exit;
    }
    /* //end export info student */
    
    
}
?>
<br/>
<h1>Thêm Sinh viên</h1>
<form action="" method="post">
    <div class="info-user">
        <label>Họ và tên</label>
        <input type="text" name="name" placeholder="Họ và tên" 
            <?php if(isset($_POST['name'])) echo 'value="'.$_POST['name'].'"';?>/>
        <?php if(isset($error_name)){?>
            <span class="error"><?php echo $error_name;?></span>
        <?php }?>
    </div>
    <div class="info-user">
        <label>Email</label>
        <input type="text" name="email" placeholder="email"
               <?php if(isset($_POST['email'])) echo 'value="'.$_POST['email'].'"';?>/>
        <?php if(isset($error_email)){?>
            <span class="error"><?php echo $error_email;?></span>
        <?php }?>
    </div>
    <div class="info-user">
        <label>Địa chỉ</label>
        <input type="text" name="addr" placeholder="Địa chỉ"
               <?php if(isset($_POST['addr'])) echo 'value="'.$_POST['addr'].'"';?> />
        <?php if(isset($error_addr)){?>
            <span class="error"><?php echo $error_addr;?></span>
        <?php }?>
    </div>
    <div class="info-user">
        <label>Điện thoại</label>
        <input type="text" name="phone" placeholder="Điện thoại"
               <?php if(isset($_POST['phone'])) echo 'value="'.$_POST['phone'].'"';?>/>
        <?php if(isset($error_phone)){?>
            <span class="error"><?php echo $error_phone;?></span>
        <?php }?>
    </div>
    <div class="info-user">
        <label>Giới tính</label>
        Nam<input type="radio" name="gender" value="man"
                  <?php if(isset($_POST['gender']))
                            if($_POST['gender'] == 'man')
                                echo 'checked';?> />
        Nữ<input type="radio" name="gender" value="woman"/>
        <?php if(isset($error_gender)){?>
            <span class="error"><?php echo $error_gender;?></span>
        <?php }?>
    </div>
    <div>
        <input type="submit" name="submit" value="Thêm sinh viên"/>
    </div>
</form>