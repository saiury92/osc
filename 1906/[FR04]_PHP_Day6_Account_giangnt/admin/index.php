<?php
require '../config/config.php';
require '../library/activeRecord.php';
session_start();
ob_start();
	require_once("layout/top.php");
	$module = isset($_GET['module']) && $_GET['module'] != "" ? $_GET['module'] : "";
	switch($module) {
		case "user": require_once("modules/user/controller.php");break;
		default: require_once("modules/user/controller.php");
	}
	require_once("layout/footer.php");
        		
       
