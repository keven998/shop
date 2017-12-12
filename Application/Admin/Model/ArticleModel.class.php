<?php
// +----------------------------------------------------------------------
// | 文章模型
// +----------------------------------------------------------------------
// | Copyright (c) 2016 http://www.zenghao.cc All rights reserved.
// +----------------------------------------------------------------------
// | Author: isum <http://www.zenghao.cc>
// +----------------------------------------------------------------------
namespace Admin\Model;
use Common\Model\BaseModel;
class ArticleModel extends BaseModel{
	protected $_link = array(
        'article_cat' => array(
            'mapping_type'      =>  self::BELONGS_TO,
            'class_name'        => 'article_cat',
            'foreign_key'       => 'cat_id',
            'as_fields'         => 'cat_name',
            )
    );
}

?>