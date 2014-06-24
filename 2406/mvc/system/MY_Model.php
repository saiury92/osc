<?php
/**
 * Class name
 * Author:
 * Date:
 */
class MY_Model extends Database
{
    protected $_select = "*";
    protected $_where;
    protected $_order;
    protected $_limit;
    
    public function __construct()
    {
        parent::__construct();
    }
}