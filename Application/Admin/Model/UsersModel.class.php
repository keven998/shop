<?php
// +----------------------------------------------------------------------
// | 会员模型
// +----------------------------------------------------------------------
// | Copyright (c) 2016 http://www.zenghao.cc All rights reserved.
// +----------------------------------------------------------------------
// | Author: isum <http://www.zenghao.cc>
// +----------------------------------------------------------------------
namespace Admin\Model;
use Common\Model\BaseModel;
class UsersModel extends BaseModel{

	protected $_link = array(
        'rank' => array(
            'mapping_type'      =>  self::BELONGS_TO,
            'class_name'        => 'userRank',
            'foreign_key'       => 'rank_id',
            'as_fields'			=> 'rank_name:rankName',
            )
    );


	/**
	 * 会员添加
	 */
	public function addUser($user){
		if(empty($user['mobile'])) return array('status' => 0, 'msg' => '手机号不能为空！'); 
		if(empty($user['password'])) return array('status' => 0, 'msg' => '密码不能为空！');
		if(empty($user['idcard'])) return array('status' => 0, 'msg' => '身份证号码不能为空！');
		$_result = $this->where(array('idcard'=>$user['idcard']))->find();
		if($_result) return array('status' => 0 ,'msg' => '该身份证号已被注册，请更换其他身份证号！'); 

		$_result = $this->where(array('mobile'=>$user['mobile']))->find();
		if($_result) return array('status' => 0 ,'msg' => '该手机号已被注册，请更换其他手机号！'); 

		$user['reg_time'] = time();
		$user['password'] = md5(sha1($user['password']));
		if($this->add($user)){
			return array('status' => 1, 'msg' => '会员添加成功！');
		}else{
			return array('status' => 0, 'msg' => '添加用户失败！');
		}
	}


	/**
	 * 会员编辑
	 * @param  [type] $user [description]
	 * @return [type]       [description]
	 */
	public function editUser($user){
		if(empty($user['mobile'])) return array('status' => 0, 'msg' => '手机号不能为空！'); 
		if(empty($user['idcard'])) return array('status' => 0, 'msg' => '身份证号码不能为空！');
		if($user['password']){
			if($user['password'] != $user['repassword']) return array('status' => 0, 'msg' => '两次密码不一致！');
			$user['password'] = md5(sha1($user['password']));
		}else{
			unset($user['password']);
		}
		unset($user['repassword']);
		$_result = $this->where(array('idcard'=>$user['idcard']))->find();
		if($_result && $_result['user_id'] != $user['user_id']) return array('status' => 0 ,'msg' => '该身份证号已被注册，请更换其他身份证号！'); 

		$_result = $this->where(array('mobile'=>$user['mobile']))->find();
		if($_result && $_result['user_id'] != $user['user_id']) return array('status' => 0 ,'msg' => '该手机号已被注册，请更换其他手机号！'); 
		if($this->save($user)){
			return array('status' => 1, 'msg' => '修改成功');
		}else{
			return array('status' => 0, 'msg' => '未作内容修改或修改失败');
		}
	}

}

?>