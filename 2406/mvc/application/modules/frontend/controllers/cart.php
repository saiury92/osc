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
            $_SESSION['cart'][$id]['product'] = $product;
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
            $money += $value['product']['product_price'] * $value['number'];
            
        }
        return array('sum'=>$sum,'money'=>$money);
    }
    public function viewCart(){
        $cart = isset($_SESSION['cart']) && $_SESSION['cart'] != null ? $_SESSION['cart'] : false;
        $data['cart'] = $cart;
        $data['totalCart'] = $this->totalCart();
        $data['template'] = 'cart/viewCart';
        $data['title'] = 'Xem giỏ hàng';
        $this->view('layout/layout',$data);
    }
    public function updateNumberAjax(){
        $id = isset($_REQUEST['id']) && $_REQUEST['id'] != '' ? $_REQUEST['id'] : '';
        $number = isset($_REQUEST['number']) && $_REQUEST['number'] != '' ? $_REQUEST['number'] : '';
        if(!$id || !$number)
            return ;
        $cart = $_SESSION['cart'];
        if(!isset($cart[$id]))
            return ;
        if($number < 0) $number = 0;
        $cartUpdate = $cart[$id];
        $cartUpdate['number'] = $number;
        $priceUpdate = $number * $cartUpdate['product']['product_price'];
        $_SESSION['cart'][$id] = $cartUpdate;
        echo $priceUpdate;
    }
    public function deleteCartAjax(){
        $id = isset($_REQUEST['id']) && $_REQUEST['id'] != '' ? $_REQUEST['id'] : '';
        if(!$id){
            echo 'false';
            return;
        }
        $cart = $_SESSION['cart'];
        if(!isset($cart[$id])){
            echo 'false';
            return;
        }
        unset($_SESSION['cart'][$id]);
        echo 'true';
    }
}