<style>
    .btn{
        border: 1px #0033ff solid;
        background-color: #0033ff;
        padding: 10px 20px;
        color: white;
        border-radius: 5px;
        border-bottom: 10px #3366ff solid;
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
    .error{
        color: red;
    }
	td{padding: 5px;}
</style>
<?php
//$name=$email=$address=$phone=$gender=$country=$info='';
function validator(&$param=array(),&$error=array()){
    if(!$param['name']){
        $error['name']='Vui lòng nhâp tên';
    }
    else{
        $error['name']= false;
    }
    if(!$param['email']){
        $error['email'] = 'Vui lòng nhập mail';
    }
    else
        $error['email'] = false;
    if(!$param['address']){
        $error['address'] = 'Vui lòng nhập địa chỉ';
    }
    else
        $error['address'] = false;
    if(!$param['phone']){
        $error['phone'] = 'Vui lòng nhập số điện thoại';
    }
    else if(!is_numeric($param['phone'])){
        $error['phone'] = 'Nhập sai định dạng';
    }
    else{
        $error['phone'] = false;
    }
    if(!isset($param['gender'])){
        $error['gender'] = 'Vui lòng chọn giới tính';
    }
    else
        $error['gender'] = false;
    if(!isset($param['country']) || $param['country'] == ''){
        $error['country'] = 'Vui lòng chọn quốc gia';
    }
    else
        $error['country'] = false;
    
    if(!isset($param['info'])){
        $param['info']='';
    }
	$products_number = $param['products_number'];
	$exists_products = false;
	$no_error_product_info = false;
	for($i = 0 ; $i < $products_number; $i++){
		if($param['products'][$i]){
			$exists_products = true;
			if($param['numbers'][$i] && $param['prices'][$i]){
				$no_error_product_info = true;
			}
			else{
				$no_error_product_info = false;
				$error['product_info'][$i] = 'Sản phẩm cần có giá và số lượng';
			}
		}	
	}
	if(!$exists_products)
		$error['products'] = 'Vui lòng nhập ít nhất một sản phẩm';
	else
		$error['products'] = false;
    if(!$error['name'] && !$error['email'] && !$error['address'] && !$error['phone'] && !$error['gender'] && !$error['country'] && !$error['products'] && $no_error_product_info)
        return true;
    return false;
}
function print_data($param){
	echo '<b>Name</b>: '.$param['name'].'<br/>';
	echo '<b>Email</b>: '.$param['email'].'<br/>';
	echo '<b>Adress</b>: '.$param['address'].'<br/>';
	echo '<b>Phone</b>: '.$param['phone'].'<br/>';
	echo '<b>Giới tính</b>: '.$param['gender'].'<br/>';
	echo '<b>Quốc gia</b>: '.$param['country'].'<br/>';
	echo '<b>Thông tin</b>: '.$param['info'].'<br/>';
	echo '<h3>Đơn hàng</h3>';
	echo '<table cellpadding="0" cellspacing="0" border="1">';
	echo '<thead>';
	echo '<td>STT</td>';
	echo '<td>Tên sản phẩm</td>';
	echo '<td>Giá</td>';
	echo '<td>Số lượng</td>';
	echo '<td>Thành tiền</td>';
	echo '</thead>';
	$sum = 0;
	for($i=0 ; $i < $param['products_number'] ; $i++){
		if($param['products'][$i]){
			echo '<tr>';
			echo '<td>'.($i+1).'</td>';
			echo '<td>'.$param['products'][$i].'</td>';
			echo '<td>'.$param['prices'][$i].'</td>';
			echo '<td>'.$param['numbers'][$i].'</td>';
			$sum_one = $param['prices'][$i] * $param['numbers'][$i];
			$sum += $sum_one;
			echo '<td>'.$sum_one.'</td>';
			echo '</tr>';
		}
	}
	echo '<tr><td colspan="5">Tổng đơn hàng: <b>'.$sum.'</b></td></tr>';
	echo '</table>';
	exit;
}

if(isset($_POST['submit'])){
    $param = $_POST;
    $error=array();
    if(validator($param,$error)){
        print_data($param);
    }
    
}
?>
<form action='' method="POST">
    <div class="form-gr">
        <label>Name</label>
        <input type="text" name="name" value="<?php if(isset($param['name'])) echo $param['name'] ?>" placeholder="name" />
        &nbsp; &nbsp;<span class="error"><?php if(isset($error['name'])) echo $error['name'] ?></span>
    </div>
    
    <div class="form-gr">
        <label>Email</label>
        <input type="text" name="email" value="<?php if(isset($param['email'])) echo $param['email'] ?>" placeholder="email" />
        &nbsp; &nbsp;<span class="error"><?php if(isset($error['email'])) echo $error['email'] ?></span>
    </div>
    
    <div class="form-gr">
        <label>Address</label>
        <input type="text" name="address" value="<?php if(isset($param['address'])) echo $param['address'] ?>" placeholder="address" />
        &nbsp; &nbsp;<span class="error"><?php if(isset($error['address'])) echo $error['address'] ?></span>
    </div>
    
    <div class="form-gr">
        <label>Phone</label>
        <input type="text" name="phone" value="<?php if(isset($param['phone'])) echo $param['phone'] ?>" placeholder="phone" />
        &nbsp; &nbsp;<span class="error"><?php if(isset($error['phone'])) echo $error['phone']; ?></span>
    </div>
    
    <div class="form-gr">
        <label>gender</label>
        Nam &nbsp;<input type="radio" name="gender" value="man" <?php if(isset($param['gender']) && $param['gender']=='man') echo ' checked ' ?>/>&nbsp; &nbsp; &nbsp;
        Nữ &nbsp;<input type="radio" name="gender" value="woman" <?php if(isset($param['gender']) && $param['gender']=='woman') echo ' checked ' ?>/>
        &nbsp; &nbsp;<span class="error"><?php if(isset($error['gender'])) echo $error['gender'] ?></span>
    </div>
    
    <div class="form-gr">
        <label>Quốc gia</label>
        <select name="country">
            <option value=''>--select country--</option>
            <option value="Việt Nam" <?php if(isset($param['country']) && $param['country'] == 'Việt Nam') echo ' selected '; ?>>Việt Nam</option>
            <option value='Lào' <?php if(isset($param['country']) && $param['country'] == 'Lào') echo ' selected '; ?>>Lào</option>
            <option value='Campuchia' <?php if(isset($param['country']) && $param['country'] == 'Campuchia') echo ' selected '; ?>>Campuchia</option>
        </select>
        &nbsp; &nbsp;<span class="error"><?php if(isset($error['country'])) echo $error['country'] ?></span>
    </div>
    
    <div class="form-gr">
        <label>Thông tin</label>
        <textarea name='info'><?php if(isset($param['info'])) echo $param['info'];?></textarea>
        <span class="error"></span>
    </div>
    
    <div class="products">
        <div class="title"><h2>Thông tin đơn hàng</h2></div>
    <?php
        for($i = 0 ; $i < 5 ; $i++){
    ?>
        <div class="form-gr">
            <label>Sản phẩm <?php echo $i+1?></label>
            <input type="text" name="products[]" placeholder="Tên sản phẩm"
                   value='<?php if(isset($param['products'][$i])) echo $param['products'][$i]?>'/>
            <input type="text" name="numbers[]" placeholder="Số lượng" 
                   value='<?php if(isset($param['numbers'][$i])) echo $param['numbers'][$i]?>'/>
            <input type="texy" name="prices[]" placeholder="Giá"
                   value='<?php if(isset($param['prices'][$i])) echo $param['prices'][$i]?>'/>
            <?php if(isset($error['product_info'][$i])){ ?>
                <span class="error"><?php echo $error['product_info'][$i];?></span>
            <?php } ?>
        </div>
        <?php } //end list form products?>
        <span class="error"><?php if(isset($error['products'])) echo $error['products'] ;?></span>
		<input type='hidden' name='products_number' value='5' />
    </div>
    
    <div class='form-gr'>
        <input type='submit' name='submit' value="Xác nhận" class="btn"/>
    </div>
</form>