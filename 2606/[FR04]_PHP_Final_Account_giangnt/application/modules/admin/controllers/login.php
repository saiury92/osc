<?php
class login extends MY_Controller{
    public function __construct() {
        parent::__construct();
    }
    public function index(){
        if(isset($_SESSION['admin'])){
            header('Location: '.createUrl('admin','user','index'));
            exit;
        }
        if(isset($_POST['submit'])){
            $this->model('userModel');
            $userModel = new userModel;
            $username = $_POST['username'];
            $password = $_POST['password'];
            if($one = $userModel->getAdmin($username, $password)){
                $_SESSION['admin'] = $one['id'];
                header('Location: '.createUrl('admin','user','index'));
                exit;
            }
        }
        $this->view('login');
    }
    public function logout(){
        if(isset($_SESSION['admin'])){
            unset($_SESSION['admin']);
        }
        header('Location: '.createUrl('admin','login','index'));
        exit;
    }
}