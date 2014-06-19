<?php
include 'layout.php';
require 'validate.php';
?>

<?php
$array_post = array('id','name','email','phone','address','gender');
$param = _contructArray($array_post);
$error = _contructArray($array_post);
$sinhvien = file('sinhvien.txt');

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
        $exists_id = false;
        //var_dump($param);
        foreach ($sinhvien as $value){
            $line = explode('|', $value);
            if($line[0] == $param['id']){
                $error['id'] = 'Ma da ton tai';
                $exists_id = true;
                break;
            }
        }
        if(!$exists_id){
            $sinhvien[] = implode('|', $param).'|';
            file_put_contents('sinhvien.txt', $sinhvien);
            header('Location: getSV.php');
        }
        /*$string_sv = implode('|', $param).'|';
        $sinhvien[$key_sv] = $string_sv;
        file_put_contents('sinhvien.txt', $sinhvien);
        header('Location: getSV.php');
        exit;
         * 
         */
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