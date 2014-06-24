<?php

class student extends session {

    protected $_name;
    protected $_email;
    protected $_address;
    protected $_phone;
    protected $_gender;

  

    public function __construct() {
       
    }

    public function setName($value) {
        $this->_name = $value;
    }

    public function getName() {
        return $this->_name;
    }

    public function setEmail($value) {
        $this->_email = $value;
    }

    public function getEmail() {
        return $this->_email;
    }

    public function setAddress($value) {
        $this->_address = $value;
    }

    public function getAddress() {
        return $this->_address;
    }

    public function setPhone($value) {
        $this->_phone = $value;
    }

    public function getPhone() {
        return $this->_phone;
    }

    public function setGender($value) {
        $this->_gender = $value;
    }

    public function getGender() {
        return $this->_gender;
    }

    public function getAll() {
        return parent::getAll();
    }

    public function get($key) {
        return parent::get($key);
    }

    public function insert() {
        $data = array();
        $data[] = $this->getName(); 
        $data[] = $this->getEmail(); 
        $data[] = $this->getAddress(); 
        $data[] = $this->getPhone(); 
        $data[] = $this->getGender(); 
        debug($data);
        return parent::insert($data);
    }

    public function delete($key) {
        parent::delete($key);
    }

    public function numOfRecord() {
        return parent::numOfRecord();
    }

    public function searchUserName($username) {
        return parent::searchUserName($username);
    }

    public function isExistedInOtherRecord($_key, $username) {
        return parent::isExistedInOtherRecord($_key, $username);
    }
    
    public function edit($key){
        $data = array();
        $data[] = $this->getName(); 
        $data[] = $this->getEmail(); 
        $data[] = $this->getAddress(); 
        $data[] = $this->getPhone(); 
        $data[] = $this->getGender(); 
        parent::edit($key, $data);
    }
}
