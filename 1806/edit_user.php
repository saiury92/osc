<h1>Sửa user</h1>
<?php
if(!isset($_GET['id']) || $_GET['id'] == null){
    header('Location: userpage.php');
    exit;
}
$id_get = $_GET['id'];
$result = mysql_query('select * from users where id = "'.$id_get.'"');
if(mysql_num_rows($result) != 1){
    header('Location: userpage.php');
    exit;
}
$user = mysql_fetch_assoc($result);
require 'validate.php';

$array_post = array('username','fullname','email','phone','address','gender','level','password','repassword');
//$param = _contructArray($array_post);
$error = _contructArray($array_post);
$param = $user;

if(isPost()){
    $param = _contructArray($array_post);
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
        
    $param['gender'] = getParams('gender');
    $error['gender'] = validateMessagesRadio('gender', 'Vui lòng chọn giới tính');
    
    
    if(validate($param,array('password','repassword'))){
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
        
        $check_after['password'] = true;
        if($param['password']){
            $param['repassword'] = getParams('repassword');
            $error['repassword'] = validateMessages('repasword', 'Vui lòng nhập lại password');    
            if($param['repassword']){
                if($param['repassword'] != $param['password']){
                    $error['repassword'] ='Không khớp mật khẩu';
                    $check_after['password'] = false;
                }
                else
                    $check_after['password'] = true;
            }
            else
                $check_after['password'] = false;
               
        }
        
        if($check_after['username'] && $check_after['phone'] && $check_after['password']){
            $query = 'update users set '
                    . 'username = "'.$param['username'].'",'
                    . 'fullname = "'.$param['fullname'].'",'
                    . 'email = "'.$param['email'].'",'
                    . 'phone = "'.$param['phone'].'",'
                    . 'address = "'.$param['address'].'",'
                    . 'gender = "'.$param['gender'].'",'
                    . 'level = "'.$param['level'].'"';
            if($param['password']){
                $query .= ', password = "'.$param['password'].'"';
            }
            $query .= ' where id = "'.$id_get.'"';
            mysql_query($query);
            if(mysql_affected_rows() == 1){
                echo "<p style='color: blue'>Update thành công</p>";
            }
            else{
                echo "<p class='error'>Không cập nhật được</p>";
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
        Nam &nbsp;<input type="radio" name="gender" value="1" size="35" <?php if(isPost()) setBox("gender",'1');else if ($param['gender'] == '1') echo 'checked';?>  />&nbsp;&nbsp;&nbsp;&nbsp;
        Nữ &nbsp;<input type="radio" name="gender"  value="2" size="35" <?php if(isPost()) setBox("gender",'2');else if ($param['gender'] == '2') echo 'checked';?>  />
        <span class="error">
            <?php echo $error['gender']; ?>
        </span> 
    </div>
    
    <div class="form-gr">
        <label>Phân quyền</label>
        <select name="level">
            <option value="">--chọn phân quyền</option>
            <option value="1" 
                <?php if(isPost()) setBox('level', '1','selected'); else if( $param['level'] == 1) echo 'selected'; ?>>admin</option>
            <option value="2" <?php if(isPost()) setBox('level', '2','selected'); else if( $param['level'] == 2) echo 'selected';  ?>>user</option>
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
        <input type="text" name="repassword" value="" size="35" />
        <span class="error">
            <?php  echo $error['repassword'];?>
        </span>
    </div>

    <label>&nbsp;</label>
    <input type="submit" name="submit" value="Lưu" class="btn"/>&nbsp;&nbsp;
    <input type="reset" name="reset" value="reset" class="btn"/>&nbsp;&nbsp;
</form>