<?php
final class Validation{
    private $name;
    private $error;
    public function __construct($array_param) {
        foreach ($array_param as $value){
            $this->name[$value] = '';
            $this->error[$value] = '';
        }
    }
    public function isPost(){
        if(isset($_POST['submit']))
            return true;
        return false;
    }
    public function setParamPost($message_errors = array()){
        foreach ($this->name as $key=>$value){
            if(isset($_POST[$key]) && $_POST[$key]){
                $this->name[$key] = $_POST[$key];
                $this->error[$key] = '';
            }
            else{
                $this->error[$key] = $message_errors[$key];
                $this->name[$key] = '';
            }
        }
    }
    public function setParamArray($arrayData){
        $this->name = $arrayData;
    }
    public function setParamArrayEmpty(){
        foreach ($this->name as $key){
            $name[$key] = '';
        }
    }
    public function setErrorArrayEmpty(){
        foreach ($this->name as $key){
            $this->error[$key] = '';
        }
    }
    public function getErrorArray(){
        return $this->error;
    }
    public function getParamArray(){
        return $this->name;
    }
    public function getError($name){
        return $this->error[$name];
    }
    public function getParam($name){
        return $this->name[$name];
    }
    function setBox($name,$value,$status="checked"){
        $return = "";
        if($this->name[$name] != ''){
            if($this->name[$name] == $value){
                if($status == 'checked'){
                    $return = 'checked';
                }
                else{
                    $return = 'selected';
                }
            }
        }
        return $return;
    }
    public function validate($not_require=array()){
        foreach ($this->name as $key => $value){
            if(in_array($key, $not_require)){
                $this->error[$key] = '';
                continue;
            }            
            else if(!$value){
                return false;
            }
        }
        return true;
    }
    public function isEmail($email){
        if(!preg_match("/^[a-zA-Z0-9_]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+/", $email)){
            return false;
        }
        return true;
    }
}