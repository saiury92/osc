<h1>Insert user</h1>

<?php
$users = new SinhVien;
$error = array('name'=>'','email'=>'','address'=>'','phone'=>'','gender'=>'');
if(isset($_POST['submit'])){
    if($users->insertUser($error)){
        header('Location: index.php?module=user&action=insert');
    }
}
?>
<form action="" method="post">
    <div class="form-gr">
        <label>Name</label>
        <input type="text" name="name" value="<?php echo $users->getName();  ?>" size="35" />
        <span class="error">
            <?php  echo $error['name'];?>
        </span>
    </div>

    <div class="form-gr">
        <label>Email</label>
        <input type="text" name="email" value="<?php echo $users->getEmail(); ?>" size="35" />
        <span class="error">
            <?php echo $error['email'] ?>
        </span>
    </div>

    <div class="form-gr">
        <label>Phone</label>
        <input type="text" name="phone" value="<?php echo $users->getPhone(); ?>" size="35" />
        <span class="error">
            <?php  echo $error['phone'];?>
        </span>
    </div>

    <div class="form-gr">
        <label>Địa chỉ</label>
        <input type="text" name="address" value="<?php echo $users->getAddress(); ?>" size="35" />
        <span class="error">
            <?php  echo $error['address'];?>
        </span>
    </div>

    <div class="form-gr">
        <label>Giới tính</label>
        Nam &nbsp;<input type="radio" name="gender" value="1" size="35" <?php if($users->getGender() == '1') echo 'checked';?>  />&nbsp;&nbsp;&nbsp;&nbsp;
        Nữ &nbsp;<input type="radio" name="gender"  value="2" size="35" <?php if($users->getGender() == '2') echo 'checked';?>  />
        <span class="error">
            <?php echo $error['gender']; ?>
        </span> 
    </div>
    
    <div class="form-gr">
        <label>&nbsp;</label>
        <input type="submit" name="submit" value="Thêm" class="btn"/>&nbsp;&nbsp;
    </div>
</form>
