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
</style>
<?php
function validator(&$param=array(),&$error=array()){
    if(!$param['product_name']){
        $error['product_name']='Vui lòng nhâp tên sản phẩm';
    }
    else{
        $error['product_name']= false;
    }
    
    if(!$param['price']){
        $error['price'] = 'Vui lòng nhập giá sản phẩm';
    }
    else if(!is_numeric($param['price'])){
        $error['price'] = 'Giá sản phẩm phải là số';
    }
    else{
        $error['price'] = false;
    }
    
    if(!$param['order']){
        $error['order'] = 'Vui lòng nhập sô lượng sản phẩm';
    }
    else if(!is_numeric($param['price'])){
        $error['order'] = 'Số lượng sản phẩm phải là số';
    }
    else{
        $error['order'] = false;
    }
    
    if(!$param['color']){
        $error['color']='Vui lòng nhâp màu sản phẩm';
    }
    else{
        $error['color']= false;
    }
    
    if(!$param['size']){
        $error['size']='Vui lòng nhâp kích cỡ sản phẩm';
    }
    else{
        $error['size']= false;
    }
    
    if(!isset($param['category']) || $param['category'] == '-1'){
        $error['category'] = 'Vui lòng chọn Loại sản phẩm';
    }
    else
        $error['category'] = false;
    
    if(!isset($param['description']) || $param['description'] == ''){
        $error['description'] = 'Vui lòng nhập miêu tả sản phẩm';
    }
    else{
        $error['description'] = false;
    }
    if(!$error['category'] && !$error['product_name'] && !$error['price'] && !$error['order'] && !$error['color'] && !$error['size'] && !$error['description'])
        return true;
    return false;
}

if(isset($_POST['submit'])){
    $param = $_REQUEST;
    $error = array();
    var_dump($param);
    if(validator($param,$error)){
    }
}
?>
<form action="" method="POST">
    <div class="form-gr">
        <label>Category<span class="require">*</span></label>
        <select name="category">
            <option value="-1">--select category--</option>
            <option value="1" <?php if(isset($param['category']) && $param['category']=='1' ) echo ' selected '?>>Loại 1</option>
            <option value="2" <?php if(isset($param['category']) && $param['category']=='2' ) echo ' selected '?>>Loại 2</option>
            <option value="3" <?php if(isset($param['category']) && $param['category']=='3' ) echo ' selected '?>>Loại 3</option>
            <option value="4" <?php if(isset($param['category']) && $param['category']=='4' ) echo ' selected '?>>Loại 4</option>
        </select>
        <span class="error"><?php  if(isset($error['category'])) echo $error['category'];?></span>
    </div>
    
    <div class="form-gr">
        <label>Product name<span class="require">*</span></label>
        <input type="text" name="product_name" value="<?php if(isset($param['product_name'])) echo $param['product_name']; ?>" />
        <span class="error"><?php  if(isset($error['product_name'])) echo $error['product_name'];?></span>
    </div>
    
    <div class="form-gr">
        <label>Price<span class="require">*</span></label>
        <input type="text" name="price" value="<?php if(isset($param['price'])) echo $param['price']; ?>" />
        <span class="error"><?php  if(isset($error['price'])) echo $error['price'];?></span>
    </div>
    
    <div class="form-gr">
        <label>Order<span class="require">*</span></label>
        <input type="text" name="order" value="<?php if(isset($param['order'])) echo $param['order']; ?>" />
        <span class="error"><?php  if(isset($error['order'])) echo $error['order'];?></span>
    </div>
    
    <div class="form-gr">
        <label>Color<span class="require">*</span></label>
        <input type="text" name="color" value="<?php if(isset($param['color'])) echo $param['color']; ?>" />
        <span class="error"><?php  if(isset($error['color'])) echo $error['color'];?></span>
    </div>
    
    <div class="form-gr">
        <label>Size<span class="require">*</span></label>
        <input type="text" name="size" value="<?php if(isset($param['size'])) echo $param['size']; ?>" />
        <span class="error"><?php  if(isset($error['size'])) echo $error['size'];?></span>
    </div>
    
    <div class="form-gr">
        <label>Desciption<span class="require">*</span></label>
        <textarea name="description"><?php if(isset($param['description'])) echo $param['description']; ?></textarea>
        <span class="error"><?php  if(isset($error['description'])) echo $error['description'];?></span>
    </div>
    <div class="form-gr">
        <input type="submit" name="submit" value="Confirm" class="btn" />
    </div>
</form>