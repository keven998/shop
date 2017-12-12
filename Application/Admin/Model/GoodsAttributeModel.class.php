<?php
// +----------------------------------------------------------------------
// | 商品属性模型
// +----------------------------------------------------------------------
// | Copyright (c) 2016 http://www.zenghao.cc All rights reserved.
// +----------------------------------------------------------------------
// | Author: isum <http://www.zenghao.cc>
// +----------------------------------------------------------------------
namespace Admin\Model;
use Common\Model\BaseModel;
class GoodsAttributeModel extends BaseModel{
	protected $_link = array(
        'goodsType' => array(
            'mapping_type'      =>  self::BELONGS_TO,
            'class_name'        => 'goodsType',
            'foreign_key'       => 'type_id',
            'as_fields'			=> 'name:typeName',
            )
    );
}
?>