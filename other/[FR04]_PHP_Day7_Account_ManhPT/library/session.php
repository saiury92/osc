<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

session_start();
ob_start();

class session {

    protected $_result;
    
    public function getAll() {
        $this->_result = $_SESSION[config::name];
        return $this->_result;
    }

    public function get($key) {
        $this->_result = $_SESSION[config::name][$key];
        return $this->_result;
    }

    public function insert($data = array()) {
        $_SESSION[config::name][] = $data;
    }

    public function delete($key) {
        unset($_SESSION[config::name][$key]);
    }

    public function numOfRecord() {
        $this->_result = count($_SESSION[config::name]);
        return $this->_result;
    }

    public function searchUserName($username) {
        $flag = false;
        foreach ($_SESSION[config::name] as $key => $value) {
            if ($value['username'] == $username) {
                $flag = true;
                break;
            }
        }
        return $flag;
    }

    public function isExistedInOtherRecord($_key, $username) {
        $flag = false;
        foreach ($_SESSION[config::name] as $key => $value) {
            if ($value['username'] == $username && $_key != $key) {
                $flag = true;
                break;
            }
        }
        return $flag;
    }
    
    public function edit($key,$data){
           $_SESSION[config::name][$key][0]=$data[0]; 
           $_SESSION[config::name][$key][1]=$data[1]; 
           $_SESSION[config::name][$key][2]=$data[2]; 
           $_SESSION[config::name][$key][3]=$data[3]; 
           $_SESSION[config::name][$key][4]=$data[4]; 
    }
}
