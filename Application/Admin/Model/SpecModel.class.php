<?php
// +----------------------------------------------------------------------
// | 规格模型
// +----------------------------------------------------------------------
// | Copyright (c) 2016 http://www.zenghao.cc All rights reserved.
// +----------------------------------------------------------------------
// | Author: isum <http://www.zenghao.cc>
// +----------------------------------------------------------------------
namespace Admin\Model;
use Common\Model\BaseModel;
class SpecModel extends BaseModel{
	protected $_link = array(
        'goodsType' => array(
            'mapping_type'      =>  self::BELONGS_TO,
            'class_name'        => 'goodsType',
            'foreign_key'       => 'type_id',
            'as_fields'			=> 'name:typeName',
            )
    );

    /**
     * 后置操作方法
     * 自定义的一个函数 用于数据保存后做的相应处理操作, 使用时手动调用
     * @param int $id 规格id
     */
    public function updateSpecItem($id, $data){
        
        $model = M("specItem"); // 实例化User对象
        $post_items = explode(PHP_EOL, $data['items']);        
        foreach ($post_items as $key => $val)  // 去除空格
        {
            $val = str_replace('_', '', $val); // 替换特殊字符
            $val = str_replace('@', '', $val); // 替换特殊字符
            
            $val = trim($val);
            if(empty($val)) 
                unset($post_items[$key]);
            else                     
                $post_items[$key] = $val;
        }
        $db_items = $model->where("spec_id = $id")->getField('id,item');
        // 两边 比较两次
        
        /* 提交过来的 跟数据库中比较 不存在 插入*/
        foreach($post_items as $key => $val)
        {
            if(!in_array($val, $db_items))            
                $dataList[] = array('spec_id'=>$id,'item'=>$val);            
        }
        // 批量添加数据
        $dataList && $model->addAll($dataList);
        
        /* 数据库中的 跟提交过来的比较 不存在删除*/
        foreach($db_items as $key => $val)
        {
            if(!in_array($val, $post_items))       
            {       
                //  SELECT * FROM `tp_spec_goods_price` WHERE `key` REGEXP '^11_' OR `key` REGEXP '_13_' OR `key` REGEXP '_21$'
                M("SpecGoodsPrice")->where("`key` REGEXP '^{$key}_' OR `key` REGEXP '_{$key}_' OR `key` REGEXP '_{$key}$' or `key` = '{$key}'")->delete(); // 删除规格项价格表
                $model->where('id='.$key)->delete(); // 删除规格项
            }
        }        
    }  


    /**
     * 获取 tp_spec_item表 指定规格id的 规格项
     * @param int $spec_id 规格id
     * @return array 返回数组
     */
    public function getSpecItem($spec_id)
    { 
        $model = M('specItem');        
        $arr = $model->where("spec_id = $spec_id")->order('id')->select(); 
        $arr = get_id_val($arr, 'id','item');        
        return $arr;
    } 
}

?>