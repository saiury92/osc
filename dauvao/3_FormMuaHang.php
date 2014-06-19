<style>
    .info-user label{
        width: 100px;
        display: inline-block;
    }
    .info-user{padding-bottom: 20px;}
    .error{color: red;font-size: 14px;}
    input[type='radio']{margin-right: 30px;}
    .btn{
        text-decoration: none;
        padding: 10px 20px;
        border: 1px aquamarine solid;
        background-color: aquamarine;
        cursor: pointer;
        border-radius: 4px;
    }
    .link{margin-top: 20px;}
    td{padding: 5px;}
</style>
<?php 
if(isset($_POST['submit'])){
    /* check info customer */
    if(isset($_POST['name']) & !empty($_POST['name'])){
        $name = $_POST['name'];
    }
    else{
        $name='';
        $error_name='Thiếu tên khách hàng';
    }
    
    if(isset($_POST['email']) & !empty($_POST['email'])){
        $email = $_POST['email'];
    }
    else{
        $email='';
        $error_email='Thiếu email';
    }
    
    if(isset($_POST['addr']) & !empty($_POST['addr'])){
        $addr = $_POST['addr'];
    }
    else{
        $addr='';
        $error_addr='Thiếu địa chỉ';
    }
    
    if(isset($_POST['phone']) & !empty($_POST['phone'])){
        $phone = $_POST['phone'];
    }
    else{
        $phone='';
        $error_phone='Thiếu điện thoại';
    }    
    if(isset($_POST['gender']) & !empty($_POST['gender'])){
        $gender = $_POST['gender'];
    }
    else{
        $gender='';
        $error_gender='Thiếu giới tính';
    }
    /* //end check info customer */
    
    /* check products */
    if(isset($_POST['numbers'])){
        $numbers = $_POST['numbers'];
    }
    if(isset($_POST['prices'])){
        $prices = $_POST['prices'];
    }
    if(isset($_POST['products'])){
        $products = $_POST['products'];
        $isset_product = false;
        $isset_info_product = false;
        foreach ($products as $key => $value){
            if(!empty($value)){
                $isset_product = true;
                if(empty($numbers[$key]) || empty($prices[$key])){
                    $error_info_product[$key] = "Sản phẩm phải có thông tin về giá và số lượng";
                    $products='';
                }
            }
        }
        if(!$isset_product){
            $error_product = 'Bạn phải nhập ít nhất một sản phẩm';
            $products = '';
        }
    }
    /* //end check products */
    
    /* export info customer */
    if($name && $email && $addr && $phone && $gender && $products){
        echo "<h2>Đon hàng của quý khách</h2>";
        echo "Họ và tên: <b>$name</b><br/>";
        echo "Email: <b>$email</b><br/>";
        echo "Địa chỉ: <b>$addr</b><br/>";
        echo "Điện thoại: <b>$phone</b><br/>";
        echo "Giới tính: <b>";
        if($gender=='man')
            echo 'Nam';
        else
            echo 'Nữ';
        echo "</b><br/>";
        echo "<h4>Sản phẩm</h4>";
        $i = 1;
        echo "<table border='1'cellspacing='0'cellpadding='0'>"
            . "<thead>"
                . "<td>STT</td>"
                . "<td>Tên</td>"
                . "<td>Số lượng</td>"
                . "<td>Đơn giá</td>"
                . "<td>Thành tiền</td>"
            . "</thead>";
        $sum_price = 0;
        $stt = 1;
        foreach ($products as $key =>$value){
            if(!empty($value)){
                echo "<tr>"
                . "<td>$stt</td>"
                . "<td>$value</td>"
                        . "<td>".$numbers[$key]."</td>"
                        . "<td>".$prices[$key]."</td>";
                $price_one = $numbers[$key]*$prices[$key];
                echo "<td>$price_one</td>"
                . "</tr>";
                $sum_price += $price_one;
                $stt++;
            }
        }
        echo "<tr><td colspan='5'>Tổng giá: $sum_price</td><tr>";
        echo "<tr><td colspan='5'>Giảm giá: ";
        if($gender=='woman')
            echo "25%, tương đương giảm  ".($sum_price*0.25);
        else
            echo "0";
        echo "</td></tr>";
        if($gender=='woman')
            $sum_price *= 0.75;
        echo "<tr><td colspan='5' style='background-color: yellow'>Giá đơn hàng: $sum_price</td></tr>";
        echo "</table>";
        echo "<div class='link'><a href='".$_SERVER['REQUEST_URI']."' class='btn'>Quay lại mua hàng</a></div>";
        exit;
    }
    /* //end export info customer */
    
    
}
?>

<form action="" method="post">
    <div class="info-user">
        <label>Họ và tên</label>
        <input type="text" name="name" placeholder="Họ và tên" 
            <?php if(isset($_POST['name'])) echo 'value="'.$_POST['name'].'"';?>/>
        <?php if(isset($error_name)){?>
            <span class="error"><?php echo $error_name;?></span>
        <?php }?>
    </div>
    <div class="info-user">
        <label>Email</label>
        <input type="text" name="email" placeholder="email"
               <?php if(isset($_POST['email'])) echo 'value="'.$_POST['email'].'"';?>/>
        <?php if(isset($error_email)){?>
            <span class="error"><?php echo $error_email;?></span>
        <?php }?>
    </div>
    <div class="info-user">
        <label>Địa chỉ</label>
        <input type="text" name="addr" placeholder="Địa chỉ"
               <?php if(isset($_POST['addr'])) echo 'value="'.$_POST['addr'].'"';?> />
        <?php if(isset($error_addr)){?>
            <span class="error"><?php echo $error_addr;?></span>
        <?php }?>
    </div>
    <div class="info-user">
        <label>Điện thoại</label>
        <input type="text" name="phone" placeholder="Điện thoại"
               <?php if(isset($_POST['phone'])) echo 'value="'.$_POST['phone'].'"';?>/>
        <?php if(isset($error_phone)){?>
            <span class="error"><?php echo $error_phone;?></span>
        <?php }?>
    </div>
    <div class="info-user">
        <label>Giới tính</label>
        Nam<input type="radio" name="gender" value="man"
                  <?php if(isset($_POST['gender']))
                            if($_POST['gender'] == 'man')
                                echo 'checked';?> />
        Nữ<input type="radio" name="gender" value="woman"/>
        <?php if(isset($error_gender)){?>
            <span class="error"><?php echo $error_gender;?></span>
        <?php }?>
    </div>
    
    <div class="products">
        <div class="title">Thông tin đơn hàng</div>
    <?php
        for($i = 0 ; $i < 5 ; $i++){
    ?>
        <div class="info-user">
            <label>Sản phẩm <?php echo $i+1?></label>
            <input type="text" name="products[]" placeholder="Tên sản phẩm"
                   <?php if(isset($_POST['products'][$i]))
                           if(!empty($_POST['products'][$i]))
                       echo " value='".$_POST['products'][$i]."'"?>/>
            <input type="text" name="numbers[]" placeholder="Số lượng" 
                   <?php if(isset($_POST['numbers'][$i]))
                           if(!empty($_POST['numbers'][$i]))
                       echo " value='".$_POST['numbers'][$i]."'"?>/>
            <input type="texy" name="prices[]" placeholder="Giá"
                   <?php if(isset($_POST['prices'][$i]))
                           if(!empty($_POST['prices'][$i]))
                       echo " value='".$_POST['prices'][$i]."'"?>/>
            <?php if(isset($error_info_product[$i])){ ?>
                <span class="error"><?php echo $error_info_product[$i];?></span>
            <?php } ?>
        </div>
        <?php } //end list form products?>
    </div>
    <?php if(isset($error_product)){?>
        <div class="error"><?php echo $error_product;?></div>
    <?php }?>
    <div>
        <input type="submit" name="submit" value="Mua hàng" class="btn"/>
    </div>
</form>