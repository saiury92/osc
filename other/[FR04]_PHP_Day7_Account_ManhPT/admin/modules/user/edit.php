<?php
 if(isset($_REQUEST['id']))
     $id = $_REQUEST['id'];
 $student = new student();
  $data = $student->get($id); 
  //debug($data);
  $errorName = $errorEmail = $errorAddress = $errorPhone = false;
?>
<h1>Thêm mới thành viên</h1>
<form action="" method="post">
    <label>Username</label>
    <input type="text" name="name" value="<?php if(isset($_REQUEST['btnEdit']))validation::keepErrorData("name");else echo $data[0] ?>" size="30" />
    <span style="color:red"><?php $errorName = validation::errorMessage("name") ?></span>
    <br />
    <label>Email</label>
    <input type="text" name="email" value="<?php if(isset($_REQUEST['btnEdit']))validation::keepErrorData("email") ;else echo $data[1]?>" size="30" />
    <span style="color:red"><?php $errorEmail = validation::errorMessage("email") ?></span>
    <br />
    <label>Address</label>
    <input type="text" name="address" value="<?php if(isset($_REQUEST['btnEdit']))validation::keepErrorData("address") ;else echo $data[2]?>" size="30" />
    <span style="color:red"><?php $errorAddress = validation::errorMessage("address") ?></span>	
    <br />
    <label>Phone</label>
    <input type="text" name="phone" value="<?php if(isset($_REQUEST['btnEdit']))validation::keepErrorData("phone");else echo $data[3] ?>" size="30" />
    <span style="color:red"><?php $errorPhone = validation::errorMessage("phone") ?></span>	
    <br />  
    <label>Gender</label>
    Male<input type="radio" name="gender" value="Male" size="30" checked/>
    Female<input type="radio" name="gender" value="Female" size="30"<?php if(isset($_REQUEST['btnEdit'])){if (isset($_REQUEST['gender'])) if ($_REQUEST['gender'] == "Female") echo "checked";} else if($data[4]=="Female") echo "checked"?> />
    <span style="color:red"><?php validation::errorMessage("gender") ?></span>	
    <br />   
    <label>&nbsp;</label> 
    <input type="submit" name ="btnEdit" value="Edit" />
    <input type="reset" value="Reset" />                                  
</form>
<?php
if (isset($_REQUEST['btnEdit'])) {
    if (!$errorName && !$errorEmail && !$errorAddress && !$errorPhone) {
        $name = isset($_POST['name']) && $_POST['name'] != "" ? $_POST['name'] : "";
        $email = isset($_POST['email']) && $_POST['email'] != "" ? $_POST['email'] : "";
        $address = isset($_POST['address']) && $_POST['address'] != "" ? $_POST['address'] : "";
        $phone = isset($_POST['phone']) && $_POST['phone'] != "" ? $_POST['phone'] : "";
        $gender = isset($_POST['gender']) && $_POST['gender'] != "" ? $_POST['gender'] : "";


        $obj = new student();
        $obj->setName($name);
        $obj->setEmail($email);
        $obj->setAddress($address);
        $obj->setPhone($phone);
        $obj->setGender($gender);
        $obj->edit($id);
        //if(validation::errorMessage($name))
        header("location:index.php?module=user");
    }
}
?>