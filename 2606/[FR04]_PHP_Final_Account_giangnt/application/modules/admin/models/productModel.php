<?php
class productModel extends MY_Model
{
    protected $_table = "product";
    public function __construct()
    {
        parent::__construct();
    }
    public function getAll(){
        return $this
                ->join(' category on category.cate_id = product.cate_id')
                ->query_array();
    }
    public function getOne($id){
        $one = $this
                ->join(' category on category.cate_id = product.cate_id')
                ->where(" pro_id = '{$id}' ")
                ->query_array();
        if(count($one) == 1)
            return $one[0];
        return false;
    }
    public function insertProduct($data){
        return $this->insert($data);
    }
    public function editProduct($data,$id){
         return $this->where(" pro_id = {$id} ")->update($data);
    }
    public function deleteProduct($id){
        return $this->where(" pro_id = {$id} ")->delete();
    }
}