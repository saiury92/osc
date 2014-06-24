<?php
/**
 * 
 */
class cart extends MY_Controller{
    public function index(){
        
    }
    /**
     * Them san pham vao gio hang
     * no action
     */
    public function addCart(){
        $id = isset($_GET['id']) && $_GET['id'] != '' ? $_GET['id'] : '';
        if($id == ''){
            header('Location: '. createUrl('frontend', 'product'));
            exit;
        }
        $productModel = $this->model('productModel');
        $product = $productModel->getOne($id);
        if(!$product){
            header('Location: '. createUrl('frontend', 'product'));
            exit;
        }
        if(!isset($_SESSION['cart'][$id])){
            $_SESSION['cart'][$id]['number'] = 0;
            $_SESSION['cart'][$id]['price'] = $product['product_price'];
        }
        $_SESSION['cart'][$id]['number']++;
        header('Location: '. createUrl('frontend', 'product'));
    }
    /**
     * 
     */
    public function totalCart(){
        if(!isset($_SESSION['cart']) || count($_SESSION['cart']) == 0)
            return array('sum'=>0,'money'=>0);
        $cart = $_SESSION['cart'];
        $sum = 0; //number cart
        $money = 0; //money total cart
        foreach ($cart as $key => $value){
            $sum += $value['number'];
            $money += $value['price'] * $sum;
            
        }
        return array('sum'=>$sum,'money'=>$money);
    }
    public function view(){
        
    }
}