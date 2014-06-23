<?php
class Users extends Database{
    protected $_name;
    protected $_email;
    protected $_address;
    protected $_phone;
    protected $_password;
    protected $_gender;
    protected $_level;

    public function __construct() {
        parent::__construct();
        $this->table = 'tbl_user';
    }
}