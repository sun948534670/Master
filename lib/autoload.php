<?php
/**
 * Created by PhpStorm.
 * User: 孙承志
 * Email: 948534670@qq.com
 * Date: 2018/9/7 0007
 * Time: 15:41
 */
//自动加载文件，用来实例化所需的Controller

function my_autoloader($class) {

    require_once APP_PATH.'controller/'.ucfirst($class).'.php';

}

spl_autoload_register(__NAMESPACE__ .'\my_autoloader');