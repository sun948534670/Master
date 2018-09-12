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

    public function connect($host,$username,$password,$charset='utf8')
    {
        $this->connect = mysql_connect($host,$username,$password);
        //自动设置编码格式
        self::setCharset($charset);
    }

    public function selectDb($db_name)
    {
        mysql_select_db($db_name,$this->connect);
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
       return $this->toArray(mysql_query($sql));
    }

    private function toArray($query,$array_type = MYSQL_ASSOC){
        $result = array();
        while ($row = mysql_fetch_array($query,$array_type)){
            $result[] = $row;
        }
        return $result;
    }

    public function affectRows(){
        return mysql_affected_rows();
    }

    public static function setCharset($charset){
        mysql_query("set names '{$charset}'");
    }


}