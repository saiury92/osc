<?php
include 'layout.php';

if(isset($_GET['module']) && $_GET['module'] != null){
    $module = $_GET['module'];
    switch ($module){
        case 'insert_user': require 'insert_user.php';break;
        case 'edit_user': require 'edit_user.php';break;
        case 'delete_user': require 'delete_user.php';break;
        default : require 'list_user.php';
    }
}
else{
    require 'list_user.php';
}
?>
