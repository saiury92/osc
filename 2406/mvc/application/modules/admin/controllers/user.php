<?php
/**
 * Class name: user
 * Author: ChungND
 */
class user extends MY_Controller
{
    protected $_strname = 2;
    protected $_username;
    protected $_password;
    protected $_email;
    protected $_address;
    protected $_phone;
    protected $_level;
    protected $_error = array();
    
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
        var_dump($_SESSION);
        if($validation->isPost()){
            $validation->getPost($messages_error);
            if($validation->validate()){
                $data = $validation->getParamArray();
                
                unset($data['repassword']);
                $userMode = $this->model('userModel');
                $count = $userMode->insertUser($data);
                echo $userMode->getQuery();
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
        $params = request::getParams();
        $data['id'] = $id = $params['id'];
        $this->loadModel("user_model");
        if(request::is_Post()){
            $dataUser = $this->setValue($params);
            if($this->checkData($params)){
                $objUser = new user_model;
                $objUser->insert_update_user($dataUser,$id);
                redirect("admin","user","index");
            }else{
                $data = $this->_error;
            }    
        }
        $data['editUser'] = $this->_model->GetOnceRecord($id);
        $data['template'] = "user/editUser";
        $this->loadView("layout/layout",$data);
    }
    
    public function deleteUser()
    {
        $id = $_GET['id'];
        $this->loadModel("user_model");
        $this->_model->delete_user($id);
        redirect("admin","user","index");
    }
    
    public function checkData($params = array())
    {
        $flag = true;
        if(!validation::isNull($params['level'])){
            $flag = false;
            $this->_error['errorLevel'] = '<span class="notification-input ni-error">Please select Level!</span>';
        }
        
        if(!validation::isNull($params['username'])){
            $flag = false;
            $this->_error['errorName'] = '<span class="notification-input ni-error">Sorry, try again.</span>';
        }else if(!validation::strLength($params['username'],$this->_strname)){
            $flag = false;
            $this->_error['errorName'] = '<span class="notification-input ni-error">Username must be greater than '.$this->_strname.' characters.</span>';
        }
        
        if($params['action'] == 'insertUser'){
            if(!validation::isNull($params['password'])){
                $flag = false;
                $this->_error['errorPassword'] = '<span class="notification-input ni-error">Sorry, try again.</span>';
            }else if($params['password'] != $params['re-password']){
                    $flag = false;
                    $this->_error['errorPassword'] = '<span class="notification-input ni-error">Two passwords are not the same.</span>';
            }
        }else{
            if($this->getPassword()) {
                if($params['password'] != $params['re-password']){
                    $flag = false;
                    $this->_error['errorPassword'] = '<span class="notification-input ni-error">Two passwords are not the same.</span>';
                }
            }   
        }
        if(!validation::isNull($params['email'])){
            $flag = false;
            $this->_error['errorEmail'] = '<span class="notification-input ni-error">Sorry, try again.</span>';
        }
        
        if(!validation::isNull($params['address'])){
            $flag = false;
            $this->_error['errorAddress'] = '<span class="notification-input ni-error">Sorry, try again.</span>';
        }
        
        if(!validation::isNull($params['phone'])){
            $flag = false;
            $this->_error['errorPhone'] = '<span class="notification-input ni-error">Sorry, try again.</span>';
        }else if(!validation::isNumber($params['phone'])){
            $flag = false;
            $this->_error['errorPhone'] = '<span class="notification-input ni-error">Phone is not a number.</span>';
        }
        return $flag;
    }
    
    public function setValue($params = array())
    {
        //$dataUser = array();
        $this->setLevel($params['level']);
        $this->setName($params['username']);
        $this->setPassword($params['password']);
        $this->setEmail($params['email']);
        $this->setAddress($params['address']);
        $this->setPhone($params['phone']);
        $dataUser = array(
                                "level"   =>$this->getLevel(),
                                "name"    =>$this->getName(),
                                "email"   =>$this->getEmail(),
                                "address" =>$this->getAddress(),
                                "phone"   =>$this->getPhone()
                            );
        if($this->getPassword()){
            $dataUser['password'] = $this->getPassword();
        }
        return $dataUser;
    }
}