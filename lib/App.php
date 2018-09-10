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

    private function autoLoad($class_name){
        //定义内部基础类库
        $baseClass = array(
            'master\lib\Config' =>LIB_PATH.'Config.php',//配置项类库,
            'master\lib\Request'=>LIB_PATH.'Request.php'//配置请求库
        );

        //引用内部基础类库
        if(isset($baseClass[$class_name])){
            require_once $baseClass[$class_name];
        }else{
            $class_name = self::getControllerName($class_name);
            //引用Controller层
            require_once APP_PATH.'controller/'.ucfirst($class_name).'.php';
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

}