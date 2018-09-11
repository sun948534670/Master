<?php
/**
 * Created by PhpStorm.
 * User: 孙承志
 * Email: 948534670@qq.com
 * Date: 2018/9/6 0006
 * Time: 10:31
 */

namespace master\lib;


//引用Smarty

Class Smarty{

    public static $smarty = null;

    private function __construct()
    {
    }

    public static function loadTemplate(){

        if(!self::$smarty instanceof self){
            self::$smarty = new \Smarty();
            self::setConfig();
        }
        //配置相关操作
        return self::$smarty;
    }

    /*
     * 设置基本的Smarty配置文件与目录
     */
    private static function setConfig(){

        self::$smarty->template_dir = APP_PATH.'view/'; //定义模板文件
        self::$smarty->compile_dir = DATA_PATH.'compile/'; //定义编译
        self::$smarty->left_delimiter = '<{'; //定义左限定符
        self::$smarty->right_delimiter = '}>'; //定义右限定符
    }
}