<?php
class Node{
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
    public function getGetder(){
        return $this->gender;
    }
}
class SinhVien{
    public $sinhvien;
    private $size;
    public function __construct(){
        $this->sinhvien=array();
        $this->size=0;
    }
    public function listUser(){
        echo "<table cellspacing='0'cellpadding='0' border='1'>"
        . "<thead>"
                . "<td>STT</td>"
                . "<td>Tên</td>"
                . "<td>Địa chỉ</td>"
                . "<td>Điện thoại</td>"
                . "<td>Giới tính</td>"
        . "</thead>";
        for($i = 0 ; $i < $this->size ; $i++){
            echo "<tr>"
                    . "<td>$i</td>"
                    . "<td>".$this->sinhvien[$i]->getName()."</td>"
                    . "<td>".$this->sinhvien[$i]->getEmail()."</td>"
                    . "<td>".$this->sinhvien[$i]->getAddress()."</td>"
                    . "<td>";
            if($this->sinhvien[$i]->getGetder() == 'man')
                echo "Nam";
            else
                echo "Nữ";
            echo "</td>"
            . "</tr>";
        }
        echo "</table>";
    }
    public function insertUser($name,$email,$address,$phone,$gender){
        $new_node = new Node($name, $email, $address, $phone, $gender);
        array_push($this->sinhvien, $new_node);
    }
    public function editUser($id,$name,$email,$address,$phone,$gender){
        $new_node = new Node($name, $email, $address, $phone, $gender);
        $this->sinhvien[$id] = $new_node;
    }
    public function delete($id){
        $this->sinhvien[$id] = null;
    }
    public function getSize(){
        return $this->size;
    }
}