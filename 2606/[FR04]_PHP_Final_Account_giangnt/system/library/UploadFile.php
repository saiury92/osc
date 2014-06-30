<?php
class UploadFile{
    private $_name;
    private $_link;
    public function __construct($name = '') {
        $this->_name = $name;
        $this->_link = BASE_URL.'/public/upload';
    }
    public function upload($newname='', $link=''){
        if(!isset($_FILES[$this->_name])){
            return false;
        }        
        $file = $_FILES[$this->_name];
        if($newname != ''){
            $name = $newname;
        }
        else{
            $name = $file['name'];
        }
        move_uploaded_file($file['tmp_name'], $this->_link.'/'.$link.$name);
        return ($link.$name);
    }
}