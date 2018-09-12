<?php
/**
 * Created by PhpStorm.
 * User: 孙承志
 * Description:数据库基类，定义了所有的数据库操作请求
 * Email: 948534670@qq.com
 * Date: 2018/9/11 0011
 * Time: 14:33
 */
namespace master\lib;

use master\lib\engine\Mysql;

Class Db{

    public static $instance = null;//数据库连接实例

    private static $engine = null;//数据库驱动实例

    private static $hostname = '';

    private static $database = '';

    private static $username = '';

    private static $password = '';

    private static $hostport = '';


    //构造函数私有化
    private function __construct()
    {

        $config = Config::getConfig();
        self::$hostname = $config['hostname'];
        self::$database = $config['database'];
        self::$username = $config['username'];
        self::$password = $config['password'];
        self::$hostport = $config['hostport'];

        //TODO:: 需要修改成动态加载的,但是现在动态加载会报错Class Not Found
        self::$engine = new Mysql();
    }

    public static function getInstance(){
        if(!self::$instance instanceof self){
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function connect(){
        self::$engine->connect(self::$hostname,self::$username,self::$password);
    }

    public function selectDb(){
        self::$engine->selectDb(self::$database);
    }

    public function query($sql){
        return self::$engine->query($sql);
    }


}