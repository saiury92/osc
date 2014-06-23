<?php
$action = isset($_GET['action']) && $_GET['action'] != "" ? $_GET['action'] : "";

require_once 'modules/user/Users.php';
switch($action) {
    case "insert": require_once("insert.php"); break;
    case "edit": require_once("edit.php"); break;
    case "delete": require_once("delete.php"); break;
    default: require_once("list.php"); break;
}