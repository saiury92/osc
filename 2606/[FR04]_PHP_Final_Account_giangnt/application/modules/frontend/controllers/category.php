<?php
class category extends MY_Controller{
    public function index(){
        $id = isset($_GET['id']) && $_GET['id'] != '' ? $_GET['id'] : '';
        if(!$id){
            header('Location: index.php');
            exit;
        }
        $categoryModel = $this->model('categoryModel');
        if(!$categoryModel->getOne($id)){
            header('Location: index.php');
            exit;
        }
        $this->library('Pagination');
        $this->model('productModel');
        $productModel = new productModel;
        $this->model('configModel');
        $configModel = new configModel;
        $limit = 15;
        if($first = $configModel->getFirst()){
            $limit = $first['page'];
        }
        
        $page = isset($_GET['page']) && $_GET['page'] != '' ? $_GET['page'] : 1;
        $pageSiblingNumber = 2; //so luong trang xung quanh trang hien tai
        $pagination = new Pagination($productModel->getThisCategory($id),$limit,$pageSiblingNumber);
        
        $start = ($page-1)*$pagination->getLimit(); //start trong limit $start, $limit
        $data['product'] = $pagination->exec($start);
        
        $data['page'] = $page;
        $data['pagination'] = $pagination;
        
        $data['template'] = 'product/index';
        $data['title'] = 'Danh sách sản phẩm';
        
        
        $data['categoryAll'] = $this->getAllCategory();
        $this->view('layout/layout',$data);
    }
    public function getAllCategory(){
        $categoryModel = $this->model('categoryModel');
        $category = $categoryModel->getAll();
        return $category;
    }
}