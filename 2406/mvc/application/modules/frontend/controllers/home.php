<?php
class home extends MY_Controller{
    public function index(){
        require_once 'product.php';
        $productController = new product;
        return $productController->index();
    }
}