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
    public function getAll(){
        return $this->query_array();
    }
    public function getOne($id){
        $one = $this->where(" product_id = {$id} ")->query_array();
        if(count($one) == 1)
            return $one[0];
        else
            return false;
    }
    /**
     * 
     * @return Model voi dieu kien phan trang
     */
    public function getThis(){
        return $this;
    }
}