<?php
/**
 * Created by PhpStorm.
 * User: 孙承志
 * Description:数据库引擎接口，所有数据库的实现都必须要实现次接口
 * Email: 948534670@qq.com
 * Date: 2018/9/11 0011
 * Time: 15:07
 */
namespace master\lib\engine;
interface DbEngine
{
    //连接数据库操作
    public function connect($host,$username,$password,$charset);

    //选择数据库
    public function selectDb($db_name);

    //更新
    public function update();

    //新增
    public function insert();

    //查询
    public function select();

    //删除
    public function delete();

    //原生查询
    public function query($sql);
}