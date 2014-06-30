<?php
/**
 * Class name: user
 * Author: ChungND
 */
class category extends MY_Controller
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
        $usermodel = $this->model("categoryModel");
        $data['listCategory'] = $usermodel->getAll();
        $data['template'] = "category/index";
        $data['title'] = 'Danh sách category';
        $this->view("layout/layout",$data);
    }
    
    public function insertCategory()
    {
        $this->library('Validation');
        $array_param = array('cate_name','cate_order','cate_status');
        $validation = new Validation($array_param);
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
                    $categoryMode = $this->model('categoryModel');
                    $count = $categoryMode->insertcategory($data);
                    if($count>0){
                        $_SESSION['messages'] = 'Thêm thành công';
                        header('Location: '.createUrl('admin', 'category','insertcategory'));
                    }
                    else{
                        $_SESSION['messages'] = 'Lỗi hệ thống';
                    }
                }
            }
        }
        $data['title'] = 'Thêm category';
        $data['template'] = "category/insertcategory";
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