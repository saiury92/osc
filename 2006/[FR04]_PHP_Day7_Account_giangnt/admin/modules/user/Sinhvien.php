<?php
class Sinhvien{
    private $name;
    private $email;
    private $address;
    private $phone;
    private $gender;
    
    public function __construct($name=null,$email=null,$address=null,$phone=null,$gender=null) {
        $this->name=$name;
        $this->email=$email;
        $this->address=$address;
        $this->phone=$phone;
        $this->gender=$gender;
    }
    public function setName($name){
        $this->name=$name;
    }
    public function setEmail($email){
        $this->email=$email;
    }
    public function setAddress($address){
        $this->address=$address;
    }
    public function setPhone($phone){
        $this->phone = $phone;
    }
    public function setGender($gender){
        $this->gender = $gender;
    }
    public function getName(){
        return $this->name;
    }
    public function getEmail(){
        return $this->email;
    }
    public function getAddress(){
        return $this->address;
    }
    public function getPhone(){
        return $this->phone;
    }
    public function getGender(){
        return $this->gender;
    }
    public function listUser(){
        if(!isset($_SESSION['users']) || !$_SESSION['users']){
            return false;
        }
        $users = unserialize($_SESSION['users']);
        if(sizeof($users) == 0)
            return false;
        $display = '';
        $display .= '<table width="700" border="1" cellpadding="0" cellspacing="0" id="list" style="clear:both;">'
                        .'<tr>'
                            . '<td class="header">ID</td>'
                            . '<td class="header">Name</td>'
                            . '<td class="header">Email</td>'
                            . '<td class="header">Phone</td>'
                            . '<td class="header">Address</td>'
                            . '<td class="header">Gender</td>'
                            . '<td class="header">Edit</td>'
                            . '<td class="header">Delete</td>'
                        . '</tr>';
        foreach ($users as $key => $value){
            $display .= '<tr>'
                            . '<td>'.$key.'</td>'
                            . '<td>'.$value->getName().'</td>'
                            . '<td>'.$value->getEmail().'</td>'
                            . '<td>'.$value->getPhone().'</td>'
                            . '<td>'.$value->getAddress().'</td>'
                            . '<td>'.($value->getGender()=='1'?'Nam':'Nữ').'</td>'
                            .  '<td><a href=index.php?module=user&action=edit&id='.$key.'>Edit</a></td>'
                            .  '<td><a href=index.php?module=user&action=delete&id='.$key.'>Delete</a></td>'
                        .'</tr>';
        }
        $display .= '</table>';
        return $display;
    }
    public function insertUser(&$error = array()){
        $users = (isset($_SESSION['users']) && $_SESSION['users']) ? unserialize($_SESSION['users']) : array();
        $param = $_POST;
        if($this->validate($param, $error)){
            $users[] = $this;
            $_SESSION['users'] = serialize($users);
            $_SESSION['messages'] = 'Thêm thành công';
            return true;
        }
        else{
            return false;
        }
    }
    public function getUser($id){
        $users = (isset($_SESSION['users']) && $_SESSION['users']) ? unserialize($_SESSION['users']) : array();
        //var_dump(key_exists($id, $users));exit;
        if(key_exists($id, $users)){
            return $users[$id];
        }
        else{
            header('Location: index.php?module=user&action=list');
            return false;
        
        }
    }
    public function editUser($id,&$error = array()){
        $users = (isset($_SESSION['users']) && $_SESSION['users']) ? unserialize($_SESSION['users']) : array();
        $param = $_POST;
        //$user_edit = $users[$id];
        if($this->validate($param, $error)){
            $users[$id] = $this;
            $_SESSION['users'] = serialize($users);
            $_SESSION['messages'] = 'Cập nhật thành công';
            header('Location: index.php?module=user');
        }
        else{
            return false;
        }
    }
    public function deleteUser($id){
        $users = (isset($_SESSION['users']) && $_SESSION['users']) ? unserialize($_SESSION['users']) : array();
        //$user_edit = $users[$id];
        unset($users[$id]);
        $_SESSION['users'] = serialize($users);
        $_SESSION['messages'] = 'Xóa thành công';
        header('Location: index.php?module=user');
    }
    
    public function validate($param=array(),&$error = array()){
        $this->name = $this->getParams('name');
        $error['name'] = $this->getError($this->name,'Vui lòng nhập tên');
        
        $this->email = $this->getParams('email');
        $error['email'] = $this->getError($this->email,'Vui lòng nhập email');
        
        $this->address = $this->getParams('address');
        $error['address'] = $this->getError($this->address,'Vui lòng nhập địa chỉ');
        
        $this->phone = $this->getParams('phone');
        $error['phone'] = $this->getError($this->phone,'Vui lòng nhập phone');
        
        $this->gender = $this->getParams('gender');
        $error['gender'] = $this->getError($this->gender,'Vui lòng nhập giới tính');
        
        $check_after_name = true;
        if($this->name && strlen($this->name) < 2){
            $check_after_name = false;
            $error['name'] = 'Tên phải lớn hơn 2 ký tự';
        }
        
        $check_after_email = true;
        if(!preg_match("/^[a-zA-Z0-9_]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+/", $this->email)){
            $check_after_email = false;
            $error['email'] = 'Email phải đúng định dạng';
        }
        
        $check_after_phone = true;
        if($this->phone){
            if(!is_numeric($this->phone)){
                $check_after_phone = false; 
                $error['phone'] = 'Phone phải là số';
            }
            else if(strlen($this->phone) > 11 || strlen($this->phone) < 10){
                $check_after_phone = false;
                $error['phone'] = 'Phone không được lớn hơn 11 ký tự và nhỏ hơn 10 ký tự ';
            }
        }
        
        if($this->name && $this->email && $this->address && $this->phone && $this->gender
                && $check_after_name && $check_after_phone && $check_after_email){
            return true;
        }
        else{
            return false;
        }
        
    }
    private function getParams($name){
        $value = false;
        if(isset($_REQUEST[$name]) && $_REQUEST[$name]) {
            $value = $_REQUEST[$name];
        }
        return $value;
    }
    private function getError($name,$messages=''){
        if($name)
            return '';
        else 
            return $messages;
    }
}