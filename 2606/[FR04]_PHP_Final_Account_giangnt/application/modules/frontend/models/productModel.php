<?php
/**
 * Class name; pdoductModel
 * Author: GSD
 * Date:
 * class productModel truy xuất dữ liệu liên quan đến bảng tbl_product
 * 
 */
class productModel extends MY_Model{
    protected $_table = "product";
    public function __construct()
    {
        parent::__construct();
    }
    public function getAll(){
        return $this->query_array();
    }
    public function getAllCategory($id){
        return $this
                ->where(" cate_id={$id} ")
                ->query_array();
    }
    public function getOne($id){
        $one = $this
                ->where(" pro_id = '{$id}' ")
                ->join(" category on {$this->_table}.cate_id = category.cate_id ")
                ->query_array();
        if(count($one) == 1)
            return $one[0];
        else
            return false;
    }
    /**
     * 
     * @return Model voi dieu kien phan trang
     */
    public function getThisCategory($id){
        return $this->where(" cate_id = '{$id}' ")->order(' pro_order ');
    }
    public function getThis(){
        return $this->order(' pro_order ');
    }
}