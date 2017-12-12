<?php
// +----------------------------------------------------------------------
// | 规格项模型
// +----------------------------------------------------------------------
// | Copyright (c) 2016 http://www.zenghao.cc All rights reserved.
// +----------------------------------------------------------------------
// | Author: isum <http://www.zenghao.cc>
// +----------------------------------------------------------------------
namespace Admin\Model;
use Common\Model\BaseModel;
class SpecItemModel extends BaseModel{

	/**
     * 获取 tp_spec_item表 指定规格id的 规格项
     * @param int $spec_id 规格id
     * @return array 返回数组
     */
    public function getSpecItem($spec_id)
    { 
        $model = M('SpecItem');        
        $arr = $model->where("spec_id = $spec_id")->order('id')->select(); 
        $arr = get_id_val($arr, 'id','item');        
        return $arr;
    } 
}
?>