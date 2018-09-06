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

Class SmartyInit{

    public $smarty;

    public function __construct(\Smarty $smarty)
    {
        $this->smarty = $smarty;

        self::setConfig();

        return $this->smarty;
    }

    /*
     * 设置基本的Smarty配置文件与目录
     */
    private function setConfig(){

        $this->smarty->template_dir = APP_PATH.'view/'; //定义模板文件
        $this->smarty->cache = DATA_PATH.'cache/'; //定义缓存
        $this->smarty->compile_dir = DATA_PATH.'compile/'; //定义编译
        $this->smarty->left_delimiter = '<{'; //定义左限定符
        $this->smarty->right_delimiter = '}>'; //定义右限定符

    }
}