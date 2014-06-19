<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html" />
	<meta name="author" content="KHOIPC" />
	<title>Untitled 3</title>
    <style>
        label{
            float: left;
            width: 120px;
        }
        input{
            margin-bottom: 5px;
        }
        .error{
            color:red;
        }
    </style>
</head>
<body>
    <?php
        $name = $country = $email = $address = $phone = $gender = $info = "";  
        if(isset($_POST['btnok'])) {
            //Country validation
            if($_POST['country'] == "") {
                $errorCountry = "Vui long chon quoc gia";
            }else{
                $country = $_POST['country'];
            }  
            //Name validation
            if($_POST['txtname'] == "") {
                $errorName = "Vui long nhap ten";
            }else{
                $name = $_POST['txtname'];
            } 
            //Email validation
            if($_POST['txtemail'] == "") {
                $errorEmail = "Vui long nhap email";
            }else{
                $email = $_POST['txtemail'];
            } 
            //Phone validation
            if($_POST['txtphone'] == "") {
                $errorPhone = "Vui long nhap so dien thoai";
            }else if(!is_numeric($_POST['txtphone'])){
                $errorPhone = "Sai format";
            } else{
                $phone = $_POST['txtphone'];
            }
            //Address validation
            if($_POST['txtaddress'] == "") {
                $errorAddress = "Vui long nhap dia chi";
            }else {
                $address = $_POST['txtaddress'];
            } 
            // Gender validation
            if(!isset($_POST['gender'])) {
                $errorGender = "Vui long chon gioi tinh";
            } else{
                $gender = $_POST['gender'];
            }
            if($_POST['info'] != null) {
                $info = $_POST['info'];
            }
            if($name && $email && $address && $phone && $gender && $country) {
                $newGender = $gender == 1 ? "Nu" : "Nam";
                switch($country) {
                    case 1: $countryNew = "Viet Nam"; break;
                    case 2: $countryNew = "Lao"; break;
                    case 3: $countryNew = "Thai Lan"; break;
                    default: $countryNew = "Trung Quoc"; break;
                }
                echo '<h3>Name'.$name.'</h3>';
                echo '<h3>Email'.$email.'</h3>';
                echo '<h3>Address '.$address.'</h3>';
                echo '<h3>Phone'.$phone.'</h3>';
                echo '<h3>Country'.$countryNew.'</h3>';
                echo '<h3>Gender'.$newGender.'</h3>';
                if($info != "") {
                    echo '<p>'.$info.'</p>';
                }
            }      
        }
    ?>
    <form action="" method="post">
        <label>Quoc gia</label>
        <select name="country">
            <option value="">Select Country</option>
            <option value="1" <?php echo $country == 1 ? "selected='selected'" : "" ; ?>>Viet Nam</option>
            <option value="2" <?php echo $country == 2 ? "selected='selected'" : "" ; ?>>Lao</option>
            <option value="3" <?php echo $country == 3 ? "selected='selected'" : "" ; ?>>Thai Lan</option>
            <option value="4" <?php echo $country == 4 ? "selected='selected'" : "" ; ?>>Trung Quoc</option>
        </select>
         <span class="error">
            <?php echo isset($errorCountry) ? $errorCountry :""; ?>
        </span>
        <br />
        <label>Ten sinh vien</label>
        <input type="text" name="txtname" value="<?php echo $name != "" ? $name :  ""; ?>" size="35" />
        <span class="error">
            <?php echo isset($errorName) ? $errorName :""; ?>
        </span>
        <br />
        <label>Dia chi email</label>
        <input type="text" name="txtemail" value="" size="35" />
        <span class="error">
            <?php echo isset($errorEmail) ? $errorEmail :""; ?>
        </span>
        <br />
        <label>So dien thoai</label>
        <input type="text" name="txtphone" value="" size="35" />
        <span class="error">
            <?php echo isset($errorPhone) ? $errorPhone :""; ?>
        </span>
        <br />
        <label>Que quan</label>
        <input type="text" name="txtaddress" value="" size="35" />
        <span class="error">
            <?php echo isset($errorAddress) ? $errorAddress :""; ?>
        </span>
        <br />
        <label>Gioi tinh</label>
        Nam &nbsp;<input type="radio" name="gender" value="2" size="35" <?php echo $gender == 2 ? "checked='checked'" : "" ; ?> />
        Nu &nbsp;<input type="radio" name="gender" value="1" size="35"  <?php echo $gender == 1 ? "checked='checked'" : "" ; ?> />
        <span class="error">
            <?php echo isset($errorGender) ? $errorGender :""; ?>
        </span> 
        <br />
        <label>Thong tin khac</label>
        <textarea name="info"></textarea>
        <br />
        <label>&nbsp;</label>
        <input type="submit" name="btnok" value="getInfo" />
    </form>
</body>
</html>