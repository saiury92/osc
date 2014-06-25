<?php
session_start();
ob_start();
    require_once ("system/load.php");
    
    require_once ("system/MY_Controller.php");
    require_once ("application/config/db.php");
    require_once ("application/config/config.php");
    require_once ("system/Database.php");
    require_once ("system/MY_Model.php");
    require_once ("system/helper.php");
    $objLoad = new load;