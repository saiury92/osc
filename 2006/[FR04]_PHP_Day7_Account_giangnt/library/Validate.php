<?php
final class Validation{
    private $name;
    private $error;
    public function __construct($array_name) {
        foreach ($array_name as $value){
            $name[$value] = '';
            $error[$value] = '';
        }
    }
    public function isPost(){
        if(isset($_POST['submit']))
            return true;
        return false;
    }
    public function setParamPost($message_errors = array()){
        foreach ($this->name as $key){
            if(isset($_POST[$key]) && $_POST[$key]){
                $this->name[$key] = $_POST[$key];
                $this->error[$key] = $message_errors[$key];
            }
            else{
                $this->name[$key] = '';
                $this->error[$key] = '';
            }
        }
    }
    public function setParamArray($arrayData){
        $this->name = $arrayData;
    }
    public function setParamEmpty(){
        foreach ($this->name as $key){
            $name[$key] = '';
        }
    }
    public function getError(){
        return $this->error;
    }
    public function getParam(){
        return $this->name;
    }
    function setBox($name,$value,$status="checked"){
        $return = "";
        if(isset($_POST[$name]) && $_POST[$name] == $value ){
            if($status == "checked") {
                $return = "checked";
            }else{
                $return = "selected";
            }
        } 
        return $return;
    }
    public function isTrue($not_require=array()){
        foreach ($this->name as $key => $value){
            if(in_array($key, $not_require)){
                continue;
            }            
            else if(!$value){
                return false;
            }
        }
        return true;
    }
}