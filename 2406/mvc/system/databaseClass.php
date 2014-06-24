<?php
/**
 * Class name
 * Author:
 * Date 
 */
 class databaseClass
 {
    protected $_connect;
	protected $_result;
	
	public function connect()
	{
		$this->_connect = mysql_connect(database::hostname,database::username,database::password) or die("Server disconnect");
		mysql_select_db(database::dbname,$this->_connect);
	}
	public function query($sql = "")
	{
		if($sql == "" ){
			return false;	
		}	
		if(!$this->_connect) {
			die("Error connect database action query");
		}
		$this->_result = mysql_query($sql);
	}
	public function numRows()
	{
		if(!$this->_result){
			die("Error result action numRow");
		}
		return mysql_num_rows($this->_result);			
	}

	public function fetch()
	{
		$data = array();
		if(!$this->_result){
			die("Error result action fetch");
		}
		$data = mysql_fetch_assoc($this->_result);
		return $data;
	}
	public function fetchAll()
	{
		$data = array();
		if(!$this->_result){
			die("Error result action fetchAll");
		}
		while($row = mysql_fetch_assoc($this->_result)) {
			$data[] = $row;
		}
		return $data;
	}
 }