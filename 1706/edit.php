<?php
if(!isset($_GET['id']) || !$_GET['id']){
    header('Location: getSV.php');
}
 else {
    $masv_get = $_GET['id'];
}
include 'layout.php';
require 'validate.php';
?>

<?php
$array_post = array('id','name','email','phone','address','gender');
$param = _contructArray($array_post);
$error = _contructArray($array_post);
$sinhvien = file('sinhvien.txt');

$sv_id = null;
$key_sv = '';
/* tim sv co ma id */
foreach ($sinhvien as $key => $value){
    $line = explode('|', $value);
    if($line[0] == $masv_get){
        $sv_id = $line;
        $key_sv=$key;
        break;
    }
}
/*Khong tim thay sv co ma phu hop*/
if(!$sv_id){
    header('Location: getSV.php');
}
unset($sv_id[6]);
$param['id'] = $sv_id[0];
$param['name'] = $sv_id[1];
$param['email'] = $sv_id[2];
$param['phone'] = $sv_id[3];
$param['address'] = $sv_id[4];
$param['gender'] = $sv_id[5];

//$param = array_combine($param, $sv_id);
//var_dump($param);
//var_dump($sv_id);
//exit;
if(isPost()){
    $param['name'] = getParams('name');
    $error['name'] = validateMessages('name', 'Vui long nhap ten');
    $param['id'] = getParams('id');
    $error['id'] = validateMessages('id', 'Vui long nhap mã sinh viên');
    $param['email'] = getParams('email');
    $error['email'] = validateMessages('email', 'Vui long nhap email');
    $param['phone'] = getParams('phone');
    $error['phone'] = validateMessages('phone', 'Vui long nhap điện thoại');
    $param['address'] = getParams('address');
    $error['address'] = validateMessages('address', 'Vui long nhap dia chi');
    $param['gender'] = getParams('gender');
    $error['gender'] = validateMessagesRadio('gender', 'Vui long chon gioi tinh');
    
    if(validate($param)){
        $string_sv = implode('|', $param).'|';
        $sinhvien[$key_sv] = $string_sv;
        file_put_contents('sinhvien.txt', $sinhvien);
        header('Location: getSV.php');
        exit;
    }
}
?>
<form action="" method="post">
    
    <div class="form-gr">
        <label>Ma sinh vien</label>
        <input type="text" name="id" value="<?php echo $param['id'];  ?>" size="35" />
        <span class="error">
            <?php  echo $error['id'];?>
        </span>
    </div>

    <div class="form-gr">
        <label>Ten sinh vien</label>
        <input type="text" name="name"  value="<?php echo $param["name"];  ?>" size="35" />
        <span class="error">
            <?php echo $error['name'] ?>
        </span>
    </div>

    <div class="form-gr">
        <label>Email</label>
        <input type="text" name="email" value="<?php echo $param["email"]; ?>" size="35" />
        <span class="error">
            <?php echo $error['email'] ?>
        </span>
    </div>

    <div class="form-gr">
        <label>Phone</label>
        <input type="text" name="phone" value="<?php echo $param["phone"]; ?>" size="35" />
        <span class="error">
            <?php  echo $error['phone'];?>
        </span>
    </div>

    <div class="form-gr">
        <label>Dia chi</label>
        <input type="text" name="address" value="<?php echo $param["address"]; ?>" size="35" />
        <span class="error">
            <?php  echo $error['address'];?>
        </span>
    </div>

    <div class="form-gr">
        <label>Gioi tinh</label>
        Nam &nbsp;<input type="radio" name="gender" value="Nam" size="35" <?php if(isPost()) setBox("gender",'Nam');else if ($param['gender'] == 'Nam') echo 'checked';?>  />
         &nbsp;&nbsp;&nbsp;&nbsp;Nu &nbsp;<input type="radio" name="gender"  value="Nu" size="35" <?php if(isPost()) setBox("gender",'Nu');else if ($param['gender'] == 'Nu') echo 'checked';?>  />
        <span class="error">
            <?php echo $error['gender']; ?>
        </span> 
    </div>

    <label>&nbsp;</label>
    <input type="submit" name="submit" value="Luu" class="btn"/>&nbsp;&nbsp;
</form>