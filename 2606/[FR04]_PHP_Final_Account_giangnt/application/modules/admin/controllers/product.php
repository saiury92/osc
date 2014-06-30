<?php
/**
 * Class name: user
 * Author: ChungND
 */
class product extends MY_Controller
{
    public function __construct() {
        parent::__construct();
        if(!isset($_SESSION['admin'])){
            header('Location: '.createUrl('admin','login','index'));
            exit;
        }
    }
    public function index()
    {
        $productModel = $this->model("productModel");
        $data['listProduct'] = $productModel->getAll();
        $data['template'] = "product/index";
        $data['title'] = 'Danh sách product';
        $this->view("layout/layout",$data);
    }
    
    public function insertProduct()
    {
        $this->library('Validation');
        $array_param = array('pro_name','pro_img','pro_price','pro_info','cate_id','pro_order');
        $validation = new Validation($array_param);
        $messages_error = array(
            'pro_name'=>'Vui lòng nhập tên',
            'pro_img'=>'Vui lòng chọn ảnh',
            'pro_price'=>'Vui lòng nhập giá',
            'pro_info'=>'',
            'cate_id'=>'Vui lòng chọn loại sản phẩm',
            'pro_order'=>'Vui lòng nhập sắp xếp',
        );
        if($validation->isPost()){
            $validation->getPost($messages_error);
            $this->library('UploadFile');
            $uploadFile = new UploadFile('pro_img');
            $uploadFile->upload('','product/');
            var_dump($uploadFile->upload('','product/'));exit;
            if($pro_img = $uploadFile->upload('','product/')){
                $validation->setParam('pro_img', $pro_img);
            }
            if($validation->validate(array('pro_info'))){
                $check_price = true;
                if(!$validation->isNumber('pro_price')){
                    $validation->setError('pro_price', 'Phải là số');
                    $check_price = false;
                }
                $check_order = true;
                if(!$validation->isNumber('pro_order')){
                    $validation->setError('pro_order', 'Phải là số');
                    $check_order = false;
                }
                if($check_price & $check_order){
                    $data = $validation->getParamArray();                
                    $productModel = $this->model('productModel');
                    $count = $productModel->insertProduct($data);
                    if($count>0){
                        $_SESSION['messages'] = 'Thêm thành công';
                        header('Location: '.createUrl('admin', 'product','insertProduct'));
                    }
                    else{
                        $_SESSION['messages'] = 'Lỗi hệ thống';
                    }
                }
            }
        }
        $categoryModel = $this->model('categoryModel');
        $data['category'] = $categoryModel->getAll();
        $data['title'] = 'Thêm Product';
        $data['template'] = "product/insertProduct";
        $data['validation'] = $validation;
        $this->view("layout/layout",$data);
    }
    
    public function editCategory()
    {
        $id = isset($_GET['id']) && $_GET['id'] != '' ? $_GET['id'] : '';
        if(!$id){
            header('Location: '.createUrl('admin', 'category','index'));
            exit;
        }
        $categoryModel = $this->model('categoryModel');
        if(! $categoryOne = $categoryModel->getOne($id)){
            header('Location: '.createUrl('admin', 'category','index'));
            exit;
        }
        
        $this->library('Validation');
        $array_param = array('cate_name','cate_order','cate_status');
        $validation = new Validation($array_param);
        $validation->setParamArray($categoryOne);
        $messages_error = array(
            'cate_name'=>'Vui lòng nhập tên',
            'cate_order'=>'Vui lòng nhập vị trí',
            'cate_status'=>'Vui lòng chọn status',
        );
        if($validation->isPost()){
            $validation->getPost($messages_error);
            if($validation->validate()){
                $check_order = true;
                if(!$validation->isNumber('cate_order')){
                    $validation->setError('cate_order', 'Phải là số');
                    $check_order = false;
                }
                if($check_order){
                    $data = $validation->getParamArray();                
                    $count = $categoryModel->editCategory($data,$id);                    
                    $_SESSION['messages'] = 'Cập nhật thành công';
                    header('Location: '.createUrl('admin', 'category','index'));
                    
                }
            }
        }
        $data['title'] = 'Cập nhật category';
        $data['template'] = "category/editCategory";
        $data['validation'] = $validation;
        $this->view("layout/layout",$data);
    }
    
    public function deleteCategory()
    {
        $id = isset($_GET['id']) && $_GET['id'] != '' ? $_GET['id'] : '';
        if(!$id){
            header('Location: '.createUrl('admin', 'user','index'));
            exit;
        }
        $categoryModel = $this->model('categoryModel');
        if(! $categoryOne = $categoryModel->getOne($id)){
            header('Location: '.createUrl('admin', 'category','index'));
            exit;
        }
        
        if(isset($_POST['submit'])){
            if($categoryModel->deleteCategory($id) > 0){
                $_SESSION['messages'] = 'Xóa thành công';
                header('Location: '.createUrl('admin', 'category','index'));
            }
            else {
                $_SESSION['messages'] = 'Xóa thất bại';
            }
        }
        $data['category'] = $categoryOne;
        $data['title'] = 'Xác nhận xóa category';
        $data['template'] = 'category/deleteCategory';
        $this->view('layout/layout',$data);
    }
    public function deleteUserAjax(){
        $id = isset($_POST['id']) && $_POST['id'] != '' ? $_POST['id'] : '';
        if(!$id){
            echo 'false';
            return '';
        }
        $userModel = $this->model('userModel');
        if(! $userone = $userModel->getOne($id)){
            echo 'false';
            return '';
        }
        
        if($userModel->deleteUser($id) > 0)
            echo 'true';
    }
}