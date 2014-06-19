<?php 
session_start();
ob_start();
if(!isset($_SESSION['username'])){
    header("Location: login.php");
    exit;
}
?>

<style>
    .btn{
        border: 1px #0033ff solid;
        background-color: #0033ff;
        padding: 10px 20px;
        color: white;
        border-radius: 5px;
        border-bottom: 10px #3366ff solid;
        cursor: pointer;
    }
    .btn:hover{ background-color: #3366ff}
    label{
        float: left;
        width: 100px;
    }
    .label-sub{
        
    }
    .form-gr{
        margin-bottom: 20px;
    }
    .error,.require{
        color: red;
    }
    td{padding: 5px;}
    #header{
        border: 1px solid #cccccc;
        background-color: #cccccc;
        margin-bottom: 10px;
        text-align: right;
        padding-right: 10px;
    }
    a{
        text-decoration: none;
        color: #0033ff;
    }
</style>
<div id="header">
    Hello&nbsp; <?php echo $_SESSION['username']?> &nbsp; | <a href="logout.php">Logout</a>
</div>
<?php
function validate($param=array(),&$error=array()){
    //validate quoc gia
    if(!isset($param['country']) || $param['country'] == ''){
        $error['country'] = 'Vui lòng chọn quốc gia';
    }
    else
        $error['country'] = false;
    
    //validate ma sinh vien
    if(!isset($param['id'])){
        $error['id'] = 'Vui lòng nhập mã sinh viên';
    }
    else if(strlen($param['id']) < 3 || strlen($param['id']) > 5)
        $error['id'] = 'Mã sinh viên không được nhỏ hơn 3 và lơn hơn 5 ký tự';
    else
        $error['id'] = false;
    //validate name
    if(!$param['name']){
        $error['name']='Vui lòng nhâp tên sinh viên';
    }
    else if(strlen($param['name'] < 2 )){
        $error['name']= 'Tên sinh viên không được nhỏ hơn 2 ký tự';
    }
    else
        $error['name']= false;
    
    //validate email
    if(!$param['email']){
        $error['email'] = 'Vui lòng nhập mail';
    }
    else
        $error['email'] = false;
    //validate dia chi
    if(!$param['address']){
        $error['address'] = 'Vui lòng nhập địa chỉ';
    }
    else
        $error['address'] = false;
    //validate dien thoai
    if(!$param['phone']){
        $error['phone'] = 'Vui lòng nhập số điện thoại';
    }
    else if(!is_numeric($param['phone'])){
        $error['phone'] = 'Định dạng phải là số';
    }
    else{
        $error['phone'] = false;
    }
    //validate gioi tinh
    if(!isset($param['gender'])){
        $error['gender'] = 'Vui lòng chọn giới tính';
    }
    else
        $error['gender'] = false;
    
    
    if(!$error['id'] && !$error['name'] && !$error['email'] && !$error['address'] && !$error['phone'] && !$error['gender'] && !$error['country'])
        return true;
    return false;
}
function print_data($param){
        echo '<div>';
        echo '<b>Mã sinh viên</b>: '.$param['id'].'<br/>';
	echo '<b>Tên sv</b>: '.$param['name'].'<br/>';
	echo '<b>Email</b>: '.$param['email'].'<br/>';
	echo '<b>Địa chỉ</b>: '.$param['address'].'<br/>';
	echo '<b>Điện thoại</b>: '.$param['phone'].'<br/>';
	echo '<b>Giới tính</b>: '.$param['gender'].'<br/>';
	echo '<b>Quốc gia</b>: '.$param['country'].'<br/>';
        echo '</div>';
}

if(isset($_POST['submit'])){
    $param = $_POST;
    $error=array();
    if(validate($param,$error)){
        $check=true;
    }
    
}
?>
<form action='' method="POST">
    <div class="form-gr">
        <label>Quốc gia<span class="require">*</span></label>
        <select name="country">
            <option value=''>--select country--</option>
            <option value="Việt Nam" <?php if(isset($param['country']) && $param['country'] == 'Việt Nam') echo ' selected '; ?>>Việt Nam</option>
            <option value='Lào' <?php if(isset($param['country']) && $param['country'] == 'Lào') echo ' selected '; ?>>Lào</option>
            <option value='Campuchia' <?php if(isset($param['country']) && $param['country'] == 'Campuchia') echo ' selected '; ?>>Campuchia</option>
            <option value='Thái Lan' <?php if(isset($param['country']) && $param['country'] == 'Thái Lan') echo ' selected '; ?>>Campuchia</option>
            <option value='Myanma' <?php if(isset($param['country']) && $param['country'] == 'Myanma') echo ' selected '; ?>>Campuchia</option>
        </select>
        &nbsp; &nbsp;<span class="error"><?php if(isset($error['country'])) echo $error['country'] ?></span>
    </div>
    
    <div class="form-gr">
        <label>Mã sinh viên<span class="require">*</span></label>
        <input type="text" name="id" value="<?php if(isset($param['id'])) echo $param['id']; ?>" placeholder="Mã sinh viên" />
        &nbsp; &nbsp;<span class="error"><?php if(isset($error['id'])) echo $error['id'] ?></span>
    </div>
    
    <div class="form-gr">
        <label>Tên sinh viên<span class="require">*</span></label>
        <input type="text" name="name" value="<?php if(isset($param['name'])) echo $param['name'] ?>" placeholder="Tên sinh viên" />
        &nbsp; &nbsp;<span class="error"><?php if(isset($error['name'])) echo $error['name'] ?></span>
    </div>
    
    <div class="form-gr">
        <label>Email<span class="require">*</span></label>
        <input type="text" name="email" value="<?php if(isset($param['email'])) echo $param['email'] ?>" placeholder="email" />
        &nbsp; &nbsp;<span class="error"><?php if(isset($error['email'])) echo $error['email'] ?></span>
    </div>
    
    <div class="form-gr">
        <label>Địa chỉ<span class="require">*</span></label>
        <input type="text" name="address" value="<?php if(isset($param['address'])) echo $param['address'] ?>" placeholder="Địa chỉ" />
        &nbsp; &nbsp;<span class="error"><?php if(isset($error['address'])) echo $error['address'] ?></span>
    </div>
    
    <div class="form-gr">
        <label>Phone<span class="require">*</span></label>
        <input type="text" name="phone" value="<?php if(isset($param['phone'])) echo $param['phone'] ?>" placeholder="phone" />
        &nbsp; &nbsp;<span class="error"><?php if(isset($error['phone'])) echo $error['phone']; ?></span>
    </div>
    
    <div class="form-gr">
        <label>Giới tính<span class="require">*</span></label>
        Nam &nbsp;<input type="radio" name="gender" value="Nam" <?php if(isset($param['gender']) && $param['gender']=='Nam') echo ' checked ' ?>/>&nbsp; &nbsp; &nbsp;
        Nữ &nbsp;<input type="radio" name="gender" value="Nữ" <?php if(isset($param['gender']) && $param['gender']=='Nữ') echo ' checked ' ?>/>
        &nbsp; &nbsp;<span class="error"><?php if(isset($error['gender'])) echo $error['gender'] ?></span>
    </div>
    
    <div class='form-gr'>
        <input type='submit' name='submit' value="Xác nhận" class="btn"/>
    </div>
</form>
<?php 
if(isset($check))
    if($check){
        echo '<h3>Thông tin sinh viên vừa nhập</h3>';
        print_data($param);
    }
?>