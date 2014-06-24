<?php
/**
 * Class name: helper
 * Author: ChungND
 */
    function redirect($module = "",$controller= "",$action = "") {
        if($module == "")
        {
                return false;
        }
        if($action == ""){
                header("location:index.php?module=$module&controller=$controller");
        }else{
            header("location:index.php?module=$module&controller=$controller&action=$action");
        }
    }
    function createUrl($module,$controller,$action=''){
        return "index.php?module=$module&controller=$controller&action=$action";
    }
