<?php
// +----------------------------------------------------------------------
// | 退货模型
// +----------------------------------------------------------------------
// | Copyright (c) 2016 http://www.zenghao.cc All rights reserved.
// +----------------------------------------------------------------------
// | Author: isum <http://www.zenghao.cc>
// +----------------------------------------------------------------------
namespace Admin\Model;
use Common\Model\BaseModel;
class ReturnGoodsModel extends BaseModel{
	protected $_link = array(
        'goods' => array(
            'mapping_type'      =>  self::BELONGS_TO,
            'class_name'        => 'goods',
            'foreign_key'       => 'goods_id',
            'as_fields'			=> 'goods_name',
            )
    );
}



?>