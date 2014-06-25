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
        
        $page = isset($_GET['page']) && $_GET['page'] != '' ? $_GET['page'] : 1;
        $limit = 3;
        $pageSiblingNumber = 2; //so luong trang xung quanh trang hien tai
        $pagination = new Pagination($productModel->getAll(),$limit,$pageSiblingNumber);
        
        $start = ($page-1)*$pagination->getLimit(); //start trong limit $start, $limit
        $data['product'] = $pagination->exec($start);
        
        $data['page'] = $page;
        $data['pagination'] = $pagination;
        $data['template'] = 'product/index';
        $data['title'] = 'Home';
        $this->view('layout/layout',$data);
    }
}