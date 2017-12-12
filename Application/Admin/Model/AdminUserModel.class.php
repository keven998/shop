<?php
// +----------------------------------------------------------------------
// | 管理员模型
// +----------------------------------------------------------------------
// | Copyright (c) 2016 http://www.zenghao.cc All rights reserved.
// +----------------------------------------------------------------------
// | Author: isum <http://www.zenghao.cc>
// +----------------------------------------------------------------------
namespace Admin\Model;
use Common\Model\BaseModel;
class AdminUserModel extends BaseModel{
	protected $_link = array(
        'role' => array(
            'mapping_type'      =>  self::MANY_TO_MANY,
            'class_name'        => 'role',
            'foreign_key'       => 'user_id',
            'relation_foreign_key'  =>  'role_id',
            'relation_table'    =>  'h_role_user'
            )
    );
}
?>