<?php
/**
 * Created by PhpStorm.
 * User: 孙承志
 * Email: 948534670@qq.com
 * Date: 2018/9/10 0010
 * Time: 14:28
 */

namespace master\lib;

Class Config{

    public static $instance = null;

    private static $config =array();

    //私有化构造方法，不运行实例化
    private function __construct(){}

    public static function getInstance(){
        if(!self::$instance instanceof self){
            self::$instance = new self();
        }
        return self::$instance;
    }

    public static function setConfig($config){
        self::$config = array_merge(self::$config,$config);
    }

    public static function getConfig(){
        return self::$config;
    }
}