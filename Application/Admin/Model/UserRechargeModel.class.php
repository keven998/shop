<?php
// +----------------------------------------------------------------------
// | 会员充值模型
// +----------------------------------------------------------------------
// | Copyright (c) 2016 http://www.zenghao.cc All rights reserved.
// +----------------------------------------------------------------------
// | Author: isum <http://www.zenghao.cc>
// +----------------------------------------------------------------------
namespace Admin\Model;
use Common\Model\BaseModel;
class UserRechargeModel extends BaseModel{
	protected $_link = array(
        'users' => array(
            'mapping_type'      =>  self::BELONGS_TO,
            'class_name'        => 'users',
            'foreign_key'       => 'user_id',
            'as_fields'			=> 'nickname,mobile',
            )
    );
}

?>