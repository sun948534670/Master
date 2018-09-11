<?php
/**
 * Created by PhpStorm.
 * User: 孙承志
 * Email: 948534670@qq.com
 * Date: 2018/9/6 0006
 * Time: 14:03
 */
use master\app\model\IndexModel;

Class IndexController extends BaseController {

    public function __construct()
    {
        //调用父类构造方法
        parent::__construct();
    }

    public function index(){
        $index_model = new IndexModel();
    }
}