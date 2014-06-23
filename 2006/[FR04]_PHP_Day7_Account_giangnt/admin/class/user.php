<?php
class user extends database
{
	protected $_name;
	protected $_email;
	protected $_address;
	protected $_phone;
	public function __construct()
	{
		$this->connect();
	}
	public function setName($value) {
		$this->_name = $value;
	}
	public function getName()
	{
		return $this->_name;	
	}
	public function setEmail($value) {
		$this->_email = $value;
	}
	public function getEmail()
	{
		return $this->_email;	
	}
	public function setAddress($value) {
		$this->_address = $value;
	}
	public function getAddress()
	{
		return $this->_address;
	}
	public function setPhone($value)
	{
		$this->_phone = $value;
	}
	public function getPhone()
	{
		return $this->_phone;
	}
	public function listUser($sql = "")
	{
		$this->query($sql);
		return $this->fetchAll();	
	}
	public function insertUser()
	{
		$sql = "INSERT tbl_user(name,email,address,phone) VALUES(
			'".$this->getName()."','".$this->getEmail()."','".$this->getAddress()."','".$this->getPhone()."')";	
		$this->query($sql);
	}
	public function deleteUser($sql="")
	{	
		if($sql == '') {
			return false;
		}
		$this->query($sql);
	}
}