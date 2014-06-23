<h1>Insert user</h1>

<?php
require_once '../library/Validation.php';

$array_post = array('name','email','address','phone','gender','country');
$validate = new Validation($array_post);

if($validate->isPost()){
    $message_error = array(
        'name'=>'Vui lòng nhập name',
        'email'=>'Vui lòng nhập mail',
        'phone'=>'Vui lòng nhập phone',
        'address'=>'Vui lòng nhập địa chỉ',
        'gender'=>'Vui lòng chọn giới tính',
        'country' => 'Vui lòng chọn quốc gia'
    );    
    $validate->setParamPost($message_error);
    if($validate->validate()){        
        $users = new Users;
        if($users->insert($validate->getParamArray()) > 0){
            $_SESSION['messages'] = 'Thêm thành công';
            header('Location: index.php?module=user&action=insert');
        }
        else{
            $_SESSION['messages'] = 'Lỗi hệ thống';
        }
    }
}
?>
<form action="" method="post">
    <div class="form-gr">
        <label>Username</label>
        <input type="text" name="name" value="<?php echo $validate->getParam('name');  ?>" size="35" />
        <span class="error">
            <?php  echo $validate->getError('name');?>
        </span>
    </div>

    <div class="form-gr">
        <label>Email</label>
        <input type="text" name="email" value="<?php echo $validate->getParam('email'); ?>" size="35" />
        <span class="error">
            <?php echo $validate->getError('email'); ?>
        </span>
    </div>

    <div class="form-gr">
        <label>Phone</label>
        <input type="text" name="phone" value="<?php echo $validate->getParam('phone'); ?>" size="35" />
        <span class="error">
            <?php  echo $validate->getError('phone');?>
        </span>
    </div>

    <div class="form-gr">
        <label>Địa chỉ</label>
        <input type="text" name="address" value="<?php echo $validate->getParam('address'); ?>" size="35" />
        <span class="error">
            <?php  echo $validate->getError('address');?>
        </span>
    </div>

    <div class="form-gr">
        <label>Giới tính</label>
        Nam &nbsp;<input type="radio" name="gender" value="1" size="35" <?php echo $validate->setBox('gender', '1');?>  />&nbsp;&nbsp;&nbsp;&nbsp;
        Nữ &nbsp;<input type="radio" name="gender"  value="2" size="35" <?php echo $validate->setBox('gender', '2');?>  />
        <span class="error">
            <?php echo $validate->getError('gender'); ?>
        </span> 
    </div>
    
    <div class="form-gr">
        <label>Quốc gia</label>
        <select name="country">
            <option value=''>--select country--</option>
            <option value="Việt Nam" <?php echo $validate->setBox('country', 'Việt Nam','selected'); ?>>Việt Nam</option>
        </select>
        &nbsp; &nbsp;
        <span class="error">
            <?php echo $validate->getError('country'); ?>
        </span>
    </div>
    
    <div class="form-gr">
        <label>&nbsp;</label>
        <input type="submit" name="submit" value="Lưu" class="btn"/>&nbsp;&nbsp;
    </div>
</form>
