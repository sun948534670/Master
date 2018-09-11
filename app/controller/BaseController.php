<?php
/**
 * Created by PhpStorm.
 * User: 孙承志
 * Description:控制器基类,所有Controller都必须继承此控制器
 * Email: 948534670@qq.com
 * Date: 2018/9/11 0011
 * Time: 9:30
 */
use master\lib\Smarty;

Class BaseController{

    protected $smarty;

    public function __construct()
    {
        //加载Smarty模板引擎
        $this->loadTemplateEngine();
    }


    //加载模板引擎
    public function loadTemplateEngine(){
        $this->smarty = Smarty::loadTemplate();
    }

    //封装display方法
    protected function display($template = null, $cache_id = null, $compile_id = null, $parent = null){
        $this->smarty->display($template,$cache_id,$compile_id,$parent);
    }

    //封装assign方法
    protected function assign($tpl_var, $value = null, $nocache = false){
        $this->smarty->assign($tpl_var,$value,$nocache);
    }



}