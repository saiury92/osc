<?php
	$id = isset($_GET['id']) && $_GET['id'] != "" ? $_GET['id'] : "" ;
	if(!$id){
		return false;
	}
	$sql = "DELETE FROM tbl_user WHERE id='".$id."'";
	$objUser = new user;
	$objUser->deleteUser($sql); 
	header("location:index.php?module=user");