<?php
/**
 * Created by PhpStorm.
 * User: 孙承志
 * Description:
 * Email: 948534670@qq.com
 * Date: 2018/9/11 0011
 * Time: 15:10
 */

namespace master\lib\engine;

class Mysql implements DbEngine
{
    public $connect ;
    public function connect($host,$username,$password)
    {
        $this->connect = mysql_connect($host,$username,$password);
    }

    public function select()
    {
        // TODO: Implement select() method.
    }

    public function update()
    {
        // TODO: Implement update() method.
    }

    public function insert()
    {
        // TODO: Implement insert() method.
    }

    public function delete()
    {
        // TODO: Implement delete() method.
    }

    public function query($sql)
    {
       return mysql_query($sql);
    }
}