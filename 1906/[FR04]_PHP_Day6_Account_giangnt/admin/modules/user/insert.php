<?php
if(isset($_SESSION['messages'])){
    echo "<p style='color: blue'>".$_SESSION['messages']."</p><br/>";
    session_destroy();
}
?>
<h1>Thêm user</h1>
<?php
require '../library/validate.php';

$array_post = array('username','email','address','phone','gender');
$param = _contructArray($array_post);
$error = _contructArray($array_post);

if(isPost()){
    $param['username'] = getParams('username');
    $error['username'] = validateMessages('username', 'Vui lòng nhập username');
    
    $param['email'] = getParams('email');
    $error['email'] = validateMessages('email', 'Vui lòng nhập email');
    
    $param['phone'] = getParams('phone');
    $error['phone'] = validateMessages('phone', 'Vui long nhập điện thoại');
    
    $param['address'] = getParams('address');
    $error['address'] = validateMessages('address', 'Vui lòng nhập địa chỉ');
    
    $param['gender'] = getParams('gender');
    $error['gender'] = validateMessagesRadio('gender', 'Vui lòng chọn giới tính');
    
    
    if(validate($param)){
        
        $check_after=array();
        $result = mysql_query('select id from users where username="'.$param['username'].'"');
        if(mysql_num_rows($result) > 0){
            $error['username'] = 'username đã tồn tại';
            $check_after['username'] = false;
        }
        else
            $check_after['username'] = true;
        
        if(!is_numeric($param['phone'])){
            $error['phone'] = 'Điện thoại phải là số';
            $check_after['phone'] =false;
        }        
        else if( strlen($param['phone']) < 10 || strlen($param['phone']) > 12 ){
            $error['phone'] = 'số điên thoại phải từ 10 đến 12 số';
            $check_after['phone'] = false;
        }
        else
            $check_after['phone'] = true;
        
        if($check_after['username'] && $check_after['phone']){
            $result = insertData('users', $param);
            if(mysql_affected_rows() == 1){
                $_SESSION['messages'] = 'Thêm thành công';
                header('Location: index.php?module=user&action=insert');
                exit;
            }
            else{
                echo "<p class='error'>lỗi hệ thống</p>";
            }
            echo '<br/><br/>';
        }
    }
}
?>
<form action="" method="post">
    <div class="form-gr">
        <label>Username</label>
        <input type="text" name="username" value="<?php echo $param['username'];  ?>" size="35" />
        <span class="error">
            <?php  echo $error['username'];?>
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
        <label>Địa chỉ</label>
        <input type="text" name="address" value="<?php echo $param["address"]; ?>" size="35" />
        <span class="error">
            <?php  echo $error['address'];?>
        </span>
    </div>

    <div class="form-gr">
        <label>Giới tính</label>
        Nam &nbsp;<input type="radio" name="gender" value="1" size="35" <?php if(isPost()) setBox("gender",'1');else if ($param['gender'] == 'Nam') echo 'checked';?>  />&nbsp;&nbsp;&nbsp;&nbsp;
        Nữ &nbsp;<input type="radio" name="gender"  value="2" size="35" <?php if(isPost()) setBox("gender",'2');else if ($param['gender'] == 'Nữ') echo 'checked';?>  />
        <span class="error">
            <?php echo $error['gender']; ?>
        </span> 
    </div>
    <div class="form-gr">
        <label>&nbsp;</label>
        <input type="submit" name="submit" value="Lưu" class="btn"/>&nbsp;&nbsp;
    </div>
</form>