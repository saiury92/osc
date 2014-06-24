<?php
        require("../config/config.php");
	require("../library/session.php");
        //session_destroy();
        if(!isset($_SESSION[config::name]))
        $_SESSION[config::name]=array();
        //$_SESSION[config::name][]=array("name"=>"Pham Tien Manh","email"=>"ManhPT01365@fpt.edu.vn","address"=>"Ha Noi","phone"=> "01657593215","gender"=>"Nam");
        //$_SESSION[config::name][]=array("name"=>"Pham Tien Manh","email"=>"ManhPT01365@fpt.edu.vn","address"=>"Ha Noi","phone"=> "01657593215","gender"=>"Nam");
        //debug($_SESSION[config::sessionName]);
	require("../library/validation.php");
        
	require("class/student.php");
	require_once("layout/top.php");
	$module = isset($_GET['module']) && $_GET['module'] != "" ? $_GET['module'] : "";
	switch($module) {
		case "user": require_once("modules/user/controller.php");break;
		case "category": require_once("modules/category/controller.php");break;
		case "product": require_once("modules/product/controller.php");break;
                default: require_once("modules/user/controller.php"); break;
	}
	require_once("layout/footer.php");
        		
       
