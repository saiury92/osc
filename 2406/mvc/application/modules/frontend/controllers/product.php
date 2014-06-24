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
        require_once 'cart.php';
        $cart = new cart;
        $data['totalCart'] = $cart->totalCart();
        $this->view('layout/layout',$data);
    }
}