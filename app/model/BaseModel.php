<?php
/**
 * Created by PhpStorm.
 * User: 孙承志
 * Description:基础Model层类库，CURD实例化操作
 * Email: 948534670@qq.com
 * Date: 2018/9/11 0011
 * Time: 13:39
 */

namespace master\app\model;
use master\lib\Db;

class BaseModel
{
    protected $db;

    public function __construct()
    {
        $this->db = Db::getInstance();
        $this->db->connect();
        $this->db->selectDb();
    }
}