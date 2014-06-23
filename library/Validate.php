<?php
function isPost(){
    if(isset($_POST['submit']))
        return true;
    return false;
}
function getParams($name){
    $value = false;
    if(isset($_REQUEST[$name]) && $_REQUEST[$name]) {
        $value = $_REQUEST[$name];
    }
    return $value;
}
function setBox($name,$value,$status="checked"){
    $return = "";
    if(isset($_POST[$name]) && $_POST[$name] == $value ) {
        if($status == "checked") {
            $return = "checked='checked'";
        }else{
            $return = "selected='selected'";
        }
    } 
    echo $return;
}
function validateMessages($name,$messages=''){
    if($_POST[$name])
        return '';
    else 
        return $messages;
    
}
function validateMessagesRadio($name,$messages=null){
    if(!isset($_POST[$name]))
        return $messages;
    else
        return '';
}
function _contructArray($array =  array()){
    $array_contruct = array();
    foreach ($array as $key){
        $array_contruct[$key] = '';
    }
    return $array_contruct;
}
function validate($param=array(),  $not_require=array()){
    foreach ($param as $key => $value){
        if(in_array($key, $not_require) == true){
            continue;
        }            
        else if(!$value){
            return false;
        }
    }
    return true;
}