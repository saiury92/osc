<h1>Thêm user</h1>
<?php
require 'validate.php';

$array_post = array('username','fullname','email','phone','address','gender','level','password','repassword');
$param = _contructArray($array_post);
$error = _contructArray($array_post);

if(isPost()){
    $param['username'] = getParams('username');
    $error['username'] = validateMessages('username', 'Vui lòng nhập username');
    
    $param['fullname'] = getParams('fullname');
    $error['fullname'] = validateMessages('fullname', 'Vui lòng nhập họ và tên user');
    
    $param['email'] = getParams('email');
    $error['email'] = validateMessages('email', 'Vui lòng nhập email');
    
    $param['phone'] = getParams('phone');
    $error['phone'] = validateMessages('phone', 'Vui long nhập điện thoại');
    
    $param['address'] = getParams('address');
    $error['address'] = validateMessages('address', 'Vui lòng nhập địa chỉ');
    
    $param['level'] = getParams('level');    
    $error['level'] = validateMessages('level', 'Vui lòng nhập phân quyền');    
    
    $param['password'] = getParams('password');    
    $error['password'] = validateMessages('password', 'Vui lòng nhập password');
    
    $param['repassword'] = getParams('repassword');    
    $error['repassword'] = validateMessages('repassword', 'Vui lòng nhập lại password');
    
    
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
        
        else if( strlen($param['phone']) < 10 || strlen($param['phone']) > 11 ){
            $error['phone'] = 'số điên thoại phải từ 10 đến 11 số';
            $check_after['phone'] = false;
        }
        else
            $check_after['phone'] = true;
        
        if($param['password'] != $param['repassword']){
            $error['repassword'] ='Không khớp mật khẩu';
            $check_after['password'] = false;
        }
        else
            $check_after['password'] = true;
        if($check_after['username'] && $check_after['phone'] && $check_after['password']){
            $query = 'insert into users (username, password, fullname, email, phone'
                    . ', address, gender, level) values ('
                    . '"'.$param['username'].'",'
                    . '"'.$param['password'].'",'
                    . '"'.$param['fullname'].'",'
                    . '"'.$param['email'].'",'
                    . '"'.$param['phone'].'",'
                    . '"'.$param['address'].'",'
                    . '"'.$param['gender'].'",'
                    . '"'.$param['level'].'"'
                    . ')';
            mysql_query($query);
            if(mysql_affected_rows() == 1){
                echo "<p style='color: blue'>Thêm thành công</p>";
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
        <label>Họ và tên</label>
        <input type="text" name="fullname"  value="<?php echo $param["fullname"];  ?>" size="35" />
        <span class="error">
            <?php echo $error['fullname'] ?>
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
        Nam &nbsp;<input type="radio" name="gender" value="1" size="35" <?php if(isPost()) setBox("gender",'1');else if ($param['gender'] == 'Nam') echo 'checked';?>  />&nbsp;&nbsp;&nbsp;&nbsp;
        Nữ &nbsp;<input type="radio" name="gender"  value="2" size="35" <?php if(isPost()) setBox("gender",'2');else if ($param['gender'] == 'Nữ') echo 'checked';?>  />
        <span class="error">
            <?php echo $error['gender']; ?>
        </span> 
    </div>
    
    <div class="form-gr">
        <label>Phân quyền</label>
        <select name="level">
            <option value="">--chọn phân quyền</option>
            <option value="1" <?php setBox('level', '1','selected') ?>>admin</option>
            <option value="2" <?php setBox('level', '2','selected') ?>>user</option>
        </select>
        <span class="error">
            <?php  echo $error['level'];?>
        </span>
    </div>
    
    <div class="form-gr">
        <label>Password</label>
        <input type="text" name="password" value="" size="35" />
        <span class="error">
            <?php  echo $error['password'];?>
        </span>
    </div>
    
    <div class="form-gr">
        <label>Repassword</label>
        <input type="text" name="repassword" value='' size="35" />
        <span class="error">
            <?php  echo $error['repassword'];?>
        </span>
    </div>

    <label>&nbsp;</label>
    <input type="submit" name="submit" value="Lưu" class="btn"/>&nbsp;&nbsp;
    <input type="reset" name="reset" value="reset" class="btn"/>&nbsp;&nbsp;
</form>