<?php
session_start();
ob_clean();
ob_start();

require_once ("../config/config.php");
require_once ("../library/Database.php");

require_once("layout/top.php");

if(isset($_SESSION['messages'])){
    echo "<p style='color: blue'>".$_SESSION['messages']."</p><br/><br/>";
    unset($_SESSION['messages']);
}

$module = isset($_GET['module']) && $_GET['module'] != "" ? $_GET['module'] : "";
switch($module) {
    case "user": require_once("modules/user/controller.php");break;
    default : require_once 'modules/user/controller.php';
}
require_once("layout/footer.php");


