<?php
class home extends MY_Controller{
    public function index(){
        require_once 'user.php';
        $user = new user;
        $user->index();
    }
}