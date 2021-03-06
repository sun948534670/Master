<?php
// +----------------------------------------------------------------------
// | Master [ Just a lite PHP framework ]
// +----------------------------------------------------------------------
// | Author: Chengzhi Sun <948534670@qq.com>
// +----------------------------------------------------------------------
use master\lib\App;
//程序起始文件

//定义基础常量

Define('LIB_PATH',ROOT_PATH.'/lib/'); //定义lib库目录
Define('VENDOR_PATH',ROOT_PATH.'/vendor/'); //定义app目录
Define('APP_PATH',ROOT_PATH.'/app/'); //定义app目录
Define('DATA_PATH',ROOT_PATH.'/data/'); //定义app目录

//加载Vendor目录
require VENDOR_PATH.'autoload.php';
//加载自动加载文件
require LIB_PATH.'App.php';
//运行代码实例
$app = new App();
$app->run();