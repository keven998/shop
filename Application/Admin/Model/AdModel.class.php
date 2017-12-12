<?php
// +----------------------------------------------------------------------
// | 广告模型
// +----------------------------------------------------------------------
// | Copyright (c) 2016 http://www.zenghao.cc All rights reserved.
// +----------------------------------------------------------------------
// | Author: isum <http://www.zenghao.cc>
// +----------------------------------------------------------------------
namespace Admin\Model;
use Common\Model\BaseModel;
class AdModel extends BaseModel{
	protected $_link = array(
        'adPosition' => array(
            'mapping_type'      =>  self::BELONGS_TO,
            'class_name'        => 'adPosition',
            'foreign_key'       => 'pid',
            'as_fields'			=> 'position_name:positionName'
            )
    );
}
?>