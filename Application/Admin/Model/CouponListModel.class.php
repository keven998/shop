<?php
// +----------------------------------------------------------------------
// | 优惠券发放列表模型
// +----------------------------------------------------------------------
// | Copyright (c) 2016 http://www.zenghao.cc All rights reserved.
// +----------------------------------------------------------------------
// | Author: isum <http://www.zenghao.cc>
// +----------------------------------------------------------------------
namespace Admin\Model;
use Common\Model\BaseModel;
class CouponListModel extends BaseModel{
	protected $_link = array(
        'order' => array(
            'mapping_type'      =>  self::BELONGS_TO,
            'class_name'        => 'order',
            'foreign_key'       => 'order_id',
            'as_fields'			=> 'order_sn'
            ),
       	'user' => array(
            'mapping_type'      =>  self::BELONGS_TO,
            'class_name'        => 'users',
            'foreign_key'       => 'uid',
            'as_fields'			=> 'nickname,mobile'
            ),
        'coupon' => array(
            'mapping_type'      =>  self::BELONGS_TO,
            'class_name'        => 'coupon',
            'foreign_key'       => 'cid',
            'as_fields'          => 'type,name'
            )
    );
}

?>