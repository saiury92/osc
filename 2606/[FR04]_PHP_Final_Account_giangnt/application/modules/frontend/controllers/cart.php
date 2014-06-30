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
        $totalCart = isset($_SESSION['totalCart']) && $_SESSION['totalCart'] != '' ? $_SESSION['totalCart'] : array();
        if(!isset($totalCart['number']) && $totalCart['number'] == null)
            $totalCart['number'] = 0;
        
        if(!isset($totalCart['pro_price']) && $totalCart['pro_price'] == null)
            $totalCart['pro_price'] = 0;
        
        $totalCart['number']++;
        $totalCart['pro_price'] += $_SESSION['cart'][$id]['product']['pro_price'];
        $_SESSION['totalCart'] = $totalCart;
        header('Location: '. createUrl('frontend', 'product'));
    }
    /**
     * 
     */
    public function totalCart(){
        $sum = 0; //number cart
        $money = 0; //money total cart
        if(!isset($_SESSION['cart']) || count($_SESSION['cart']) == 0){
            
        }
            
        else if(!isset($_SESSION['totalCart']) || $_SESSION['totalCart'] == null){
            
        }
        else{
            $cart = $_SESSION['cart'];
            foreach ($cart as $key => $value){
                $sum += $value['number'];
                $money += $value['product']['pro_price'] * $value['number'];
            }
        }
        $_SESSION['totalCart']['number'] = $sum;
        $_SESSION['totalCart']['pro_price'] = $money;
        return array('sum'=>$sum,'money'=>$money);
    }
    public function viewCart(){
        //session_destroy();
        $cart = isset($_SESSION['cart']) && $_SESSION['cart'] != null ? $_SESSION['cart'] : false;
        $data['cart'] = $cart;
        $this->totalCart();
        $data['template'] = 'cart/viewCart';
        $data['title'] = 'Xem giỏ hàng';
        require_once 'category.php';
        $category = new category;
        $data['categoryAll'] = $category->getAllCategory();
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
        $priceUpdate = $number * $cartUpdate['product']['pro_price'];
        $_SESSION['cart'][$id] = $cartUpdate;
        
        $this->totalCart();
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
        $this->totalCart();
    }
    public function totalCartAjax(){
        $result = $this->totalCart();
        echo json_encode($result);
    }
}