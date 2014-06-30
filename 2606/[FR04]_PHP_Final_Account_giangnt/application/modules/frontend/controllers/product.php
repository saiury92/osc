<?php
/**
 * Class name: product
 * author: GSD
 * Date:
 * class pdoruct
 */
class product extends MY_Controller{
    public function index(){
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
        $pagination = new Pagination($productModel->getThis(),$limit,$pageSiblingNumber);
        
        $start = ($page-1)*$pagination->getLimit(); //start trong limit $start, $limit
        $data['product'] = $pagination->exec($start);
        
        $data['page'] = $page;
        $data['pagination'] = $pagination;
        
        $data['template'] = 'product/index';
        $data['title'] = 'Danh sách sản phẩm';
        
        require_once 'category.php';
        $category = new category;
        $data['categoryAll'] = $category->getAllCategory();
        $this->view('layout/layout',$data);
    }
    public function viewProduct(){
        $id = isset($_GET['id']) && $_GET['id'] ? $_GET['id'] : '';
        if(!$id){
            header('Location: '.createUrl('frontend', 'product','index'));
            exit;
        }
        $this->model('productModel');
        $productModel = new productModel;
        if(! $product = $productModel->getOne($id)){
            header('Location: '.createUrl('frontend', 'product','index'));
            exit;
        }
        $data['template'] = 'product/viewProduct';
        $data['product'] = $product;
        require_once 'category.php';
        $category = new category;
        $data['categoryAll'] = $category->getAllCategory();
        $this->view('layout/layout',$data);
    }
}