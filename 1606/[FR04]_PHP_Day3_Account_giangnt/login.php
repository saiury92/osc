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
function validate($param=array(),&$error=array()){
    if(!$param['username']){
        $error['username']='Vui lòng nhâp username';
    }
    else{
        $error['username']= false;
    }
    if(!$param['password']){
        $error['password']='Vui lòng nhâp password';
    }
    else{
        $error['password']= false;
    }
    if(!$error['username'] && !$error['password'])
        return true;
    return false;
}
if(isset($_POST['submit'])){
    $param = $_REQUEST;
    $error = array();
    if(validate($param,$error)){
        if($param['username'] == 'admin' && $param['password'] == '123456'){
            session_start();
            ob_start();
            $_SESSION['username'] = $param['username'];
            header("Location: admin.php");
            exit();
        }
        else{
            $error['login']='username hoặc password không đúng!';
        }
    }
}
?>
<span class="error"><?php if(isset($error['login'])) echo $error['login'];?></span>
<form action="" method="post">
    <div class="form-gr">
        <label>username</label>
        <input type="text" name="username" value="<?php if(isset($param['username'])) echo $param['username'] ;?>" />
        <span class="error"><?php if(isset($error['username']))echo $error['username'] ;?></span>
    </div>
    <div class="form-gr">
        <label>password</label>
        <input type="password" name="password" />
        <span class="error"><?php if(isset($error['password'])) echo $error['password'];?></span>
    </div>
    <div class="form-gr">
        <input type="submit" name="submit" value="Login" class="btn"/>
    </div>
</form>