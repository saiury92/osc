<?php
/**
 * Class name: user
 * Author: ChungND
 */
class user extends MY_Controller
{
    public function __construct() {
        parent::__construct();
    }
    public function index()
    {
        $usermodel = $this->model("userModel");
        $data['listUser'] = $usermodel->getAll();
        $data['template'] = "user/listUser";
        $data['title'] = 'Danh sách user';
        $this->view("layout/layout",$data);
    }
    
    public function insertUser()
    {
        $this->library('Validation');
        $array_param = array('name','email','address','phone','gender','level','password','repassword');
        $validation = new Validation($array_param);
        $messages_error = array(
            'name'=>'Vui lòng nhập username',
            'email'=>'Vui lòng nhập email',
            'address'=>'Vui lòng nhập address',
            'phone'=>'Vui lòng nhập phone',
            'level'=>'Vui lòng nhập level',
            'password'=>'Vui lòng nhập password',
            'repassword'=>'Vui lòng nhập lại passwrod',
            'gender'=>'Vui lòng chọn giới tính',
        );
        if($validation->isPost()){
            $validation->getPost($messages_error);
            if($validation->validate()){
                $data = $validation->getParamArray();
                
                unset($data['repassword']);
                $userMode = $this->model('userModel');
                $count = $userMode->insertUser($data);
                if($count>0){
                    $_SESSION['messages'] = 'Thêm thành công';
                    header('Location: '.createUrl('admin', 'user','insertUser'));
                }
                else{
                    $_SESSION['messages'] = 'Lỗi hệ thống';
                }
            }
        }
        $data['title'] = 'Thêm user';
        $data['template'] = "user/insertUser";
        $data['validation'] = $validation;
        $this->view("layout/layout",$data);
    }
    
    public function editUser()
    {
        $id = isset($_GET['id']) && $_GET['id'] != '' ? $_GET['id'] : '';
        if(!$id){
            header('Location: '.createUrl('admin', 'user','index'));
            exit;
        }
        $userMode = $this->model('userModel');
        if(! $userone = $userMode->getOne($id)){
            header('Location: '.createUrl('admin', 'user','index'));
            exit;
        }
        
        $this->library('Validation');
        $array_param = array('name','email','address','phone','gender','level','password','repassword');
        $validation = new Validation($array_param);
        $validation->setParamArray($userone);
        $validation->_unset('user_id');
        $messages_error = array(
            'name'=>'Vui lòng nhập username',
            'email'=>'Vui lòng nhập email',
            'address'=>'Vui lòng nhập address',
            'phone'=>'Vui lòng nhập phone',
            'level'=>'Vui lòng nhập level',
            'gender'=>'Vui lòng chọn giới tính',
            'password'=>'',
            'repassword'=>'',
        );
        if($validation->isPost()){
            $validation->getPost($messages_error);
            if($validation->validate(array('password','repassword'))){
                $check_pass = true;
                if($validation->isNull('password')){
                    $validation->_unset('password');
                    $validation->_unset('repassword');
                }
                else {
                    if($validation->isNull('repassword')){
                        $validation->setError('repassword', 'Vui lòng nhập lại password');
                        $check_pass = false;
                    }
                    else {
                        if(!$validation->equal('password', 'repassword')){
                            $validation->setError('repassword', 'Passwrod không khớp');
                            $check_pass= false;
                        }
                    }
                }
                if($check_pass){
                    $data = $validation->getParamArray();
                    $count = $userMode->editUser($data,$id);
                    $_SESSION['messages'] = 'Cập nhật thành công';
                    header('Location: '.createUrl('admin', 'user','editUser'));
                }
            }
        }
        $data['title'] = 'Cập nhật user';
        $data['template'] = "user/editUser";
        $data['validation'] = $validation;
        $this->view("layout/layout",$data);
    }
    
    public function deleteUser()
    {
        $id = isset($_GET['id']) && $_GET['id'] != '' ? $_GET['id'] : '';
        if(!$id){
            header('Location: '.createUrl('admin', 'user','index'));
            exit;
        }
        $userModel = $this->model('userModel');
        if(! $userone = $userModel->getOne($id)){
            header('Location: '.createUrl('admin', 'user','index'));
            exit;
        }
        
        if(isset($_POST['submit'])){
            if($userModel->deleteUser($id) > 0){
                echo '1';
                $_SESSION['messages'] = 'Xóa thành công';
                header('Location: '.createUrl('admin', 'user','index'));
            }
            else {
                $_SESSION['messages'] = 'Xóa thất bại';
            }
        }
        $data['user'] = $userone;
        $data['title'] = 'Xác nhận xóa user';
        $data['template'] = 'user/deleteUser';
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