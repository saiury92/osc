<?php
/**
 * Class name: product
 * author: GSD
 * Date:
 * class pdoruct
 */
class product extends MY_Controller{
    public function index(){
        $this->model('productModel');
        $productModel = new productModel;
        $data['product'] = $productModel->getAll();
        $data['template'] = 'product/index';
        $data['title'] = 'Home';
        $this->view('layout/layout',$data);
    }
}