<?php

namespace master\lib;

Class App{

    public $config;

    public $request;

    public function run(){

        //注册自动加载器
        $this->registerAutoload();

        //加载配置文件
        $this->loadConfig();

        //获取当前请求参数
        $this->getRequestParams();

        //请求分发
        $this->dispath();
    }

    //核心自动加载方法
    private function autoLoad($class_name){

        switch (self::getNameSpace($class_name)){
            case 'master\lib\\':
                require_once LIB_PATH.self::getControllerName($class_name).'.php';
                break;
            case 'master\app\model\\':
                require_once APP_PATH.'model/'.self::getControllerName($class_name).'.php';
                break;
            default:
                require_once APP_PATH.'controller/'.ucfirst($class_name).'.php';
            break;
        }

    }

    //注册自动加载函数
    private function registerAutoload(){
        spl_autoload_register ([$this,'autoLoad']);
    }

    //加载配置文件(数据库文件)
    private function loadConfig(){
        $config = require APP_PATH.'config/database.php';
        Config::setConfig($config);
    }

    //实例化Requset类
    private function getRequestParams(){
        $controller_name = isset($_GET['c'])?$_GET['c']:'index'.'Controller';
        $action_name = isset($_GET['a'])?$_GET['a']:'index';

        $request = Request::getInstance();
        $request->setConfig('request_controller',ucfirst($controller_name));
        $request->setConfig('request_action',strtolower($action_name));

    }

    //实例化请求
    private function dispath(){

        $request = Request::getInstance();
        $controller_name = $request->getConfig('request_controller');
        $action_name = $request->getConfig('request_action');

        $controller = new $controller_name();
        $controller->$action_name();
    }

    private function getControllerName($origin){
       return end(explode("\\",$origin));
    }

    private function getNameSpace($origin){
        return str_replace(end(explode("\\",$origin)),'',$origin);
    }
}