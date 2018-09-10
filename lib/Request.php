<?php
/**
 * Created by PhpStorm.
 * User: 孙承志
 * Email: 948534670@qq.com
 * Date: 2018/9/10 0010
 * Time: 14:28
 */

namespace master\lib;

Class Request{

    public static $instance = null;

    private $request =array();

    //私有化构造方法，不运行实例化
    private function __construct(){}

    public static function getInstance(){
        if(!self::$instance instanceof self){
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function setConfig($key,$config){
       $this->request[$key] = $config;
    }

    public function getConfig($param = ''){
        if(empty($param)){
            return $this->request;
        }else{
            return $this->request[$param];
        }
    }
}