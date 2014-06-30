<?php
class categoryModel extends MY_Model
{
    protected $_table = "category";
    public function __construct()
    {
        parent::__construct();
    }
    public function getAll(){
        return $this->query_array();
    }
    public function getOne($id){
        $one = $this->where(" cate_id = '{$id}' ")->query_array();
        if(count($one) == 1)
            return $one[0];
        return false;
    }
    public function insertCategory($data){
        return $this->insert($data);
    }
    public function editCategory($data,$id){
         return $this->where(" cate_id = {$id} ")->update($data);
    }
    public function deleteCategory($id){
        return $this->where(" cate_id = {$id} ")->delete();
    }
}