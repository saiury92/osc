<?php
class categoryModel extends MY_Model{
    protected $_table = "category";
    public function getAll(){
        return $this
                ->where(" cate_status='1' ")
                ->order(' cate_order ')
                ->query_array();
    }
    public function getOne($id){
        $one = $this
                ->where(" cate_id = '{$id}' ")
                ->query_array();
        if(count($one) == 1)
            return $one[0];
        else
            return false;
    }
}