<?php
/**
 * Class name: MY_Controller
 * Author:
 * Date:
 * Controller base, all user controller may extends
 */
class MY_Controller
{
    public function __construct()
    {
    }
    /**
     * function view
     * load view with file $path.phtml
     * @param type $path: string
     * @param type $data: array
     */
    public function view($path = "",$data = array())
    {
        foreach($data as $key=>$value) {
            $$key = $value;
        }
        
        $params = $_GET;
        $module = isset($params['module']) && $params['module'] != "" ? 
                $params['module'] : "default";
        require_once("application/modules/{$module}/views/{$path}.phtml");
    }
    /**
     * function model
     * load model
     * @param type $modelName
     * @return boolean
     */
    public function model($modelName = "")
    {
        if($modelName == "") {
            return false;
        }
        $params = $_GET;
        $module = isset($params['module']) && $params['module'] != "" ? 
                $params['module'] : "default";
        require_once("application/modules/{$module}/models/{$modelName}.php");
        return new $modelName;
    }
    public function library($library)
    {
        require_once "system/library/{$library}.php";
    }
}