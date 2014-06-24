<?php
/**
 * Class name: Load
 * Author: 
 * Date:
 * Description: load modules, controller and action
 */
 class load
 {
    protected $_params = array();
    public function __construct()
    {
        $this->_params = $_GET;
        $module = isset($this->_params['module']) && 
                        $this->_params['module'] != "" ? 
                $this->_params['module'] : "default";
        $controller = isset($this->_params['controller']) && 
                        $this->_params['controller'] != "" ? 
                $this->_params['controller'] : "welcome";
        $action = isset($this->_params['action']) && 
                        $this->_params['action'] != "" ? 
                $this->_params['action'] : "index";
        require_once("application/modules/{$module}/controllers/{$controller}.php");
        $objController = new $controller;
        $objController->$action();              
    }   
 }