<?php
class configModel extends MY_Model{
    protected $_table = "config";
    public function __construct()
    {
        parent::__construct();
    }
    public function getFirst(){
        $one = $this->query_array();
        if(count($one) > 0)
            return $one[0];
        else
            return false;
    }
}