<?php
/**
 * Created by PhpStorm.
 * User: 孙承志
 * Description:
 * Email: 948534670@qq.com
 * Date: 2018/9/11 0011
 * Time: 13:50
 */

namespace  master\app\model;

Class IndexModel extends BaseModel{

    public function getAll(){
        return $this->db->query("select * from honor");
    }
}