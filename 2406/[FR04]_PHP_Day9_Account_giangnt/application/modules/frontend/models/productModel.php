<?php
/**
 * Class name; pdoductModel
 * Author: GSD
 * Date:
 * class productModel truy xuất dữ liệu liên quan đến bảng tbl_product
 * 
 */
class productModel extends MY_Model{
    protected $_table = "tbl_product";
    public function __construct()
    {
        parent::__construct();
    }
    /**
     * 
     * @return Model voi dieu kien phan trang
     */
    public function getAll(){
        return $this;
    }
}