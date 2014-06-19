<?php
require 'validate.php';
if(isset($_POST['submit'])){
    $username = getParams('username');
    $password = getParams('password');
    if($username && $password){
        $_SESSION['userid'] = $username;
        header('Location: index.php?module=list_product');
        exit;
    }
}
?>
<h1>Login</h1>
<form action="" method="post" style='margin-top: 20px;'>
    <div class="form-gr">
        <label>username</label>
        <input type="text" name="username" value="" placeholder="username"/>
    </div>
    <div class="form-gr">
        <label>password</label>
        <input type="password" name="password" value="" placeholder="password"/>
    </div>
    <div class="form-gr">
        <input type="submit" name="submit" value="login" class="btn"/>
    </div>
</form>