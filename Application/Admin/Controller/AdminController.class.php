<?php
// +----------------------------------------------------------------------
// | 权限管理控制器
// +----------------------------------------------------------------------
// | Copyright (c) 2016 http://www.zenghao.cc All rights reserved.
// +----------------------------------------------------------------------
// | Author: isum <http://www.zenghao.cc>
// +----------------------------------------------------------------------
namespace Admin\Controller;
use Common\Controller\AdminBaseController;
class AdminController extends AdminBaseController{

	/**
	 * 管理员列表
	 * @return [type] [description]
	 */
	public function index(){
		$adminUser = D('adminUser');
		$list = $adminUser->relation(true)->select();
		$this->assign('list', $list);
		$this->display();
	}


	/**
	 * 添加管理员
	 */
	public function addUser(){
		if(IS_POST){
			$adminUser = D('adminUser');
			$post = I('post.');
			if(empty($post['username'])) $this->error('用户名不能为空');
			if(empty($post['password'])) $this->error('密码不能为空');
			if($post['password'] != $post['repassword']) $this->error('两次密码不一致');
			$data = array(
				'username' => $post['username'],
				'password' => md5(sha1(md5($post['password']))),
				'lock' => I('lock', 0)
				);
			$_result = $adminUser->where(array('username'=>$data['username']))->find();
			if($_result) $this->error('该用户名已存在', U('admin/addUser'));
			if($user_id = $adminUser->add($data)){
				$data = array(
					'role_id' => I('rid', 0),
					'user_id' => $user_id
					);
				M('role_user')->add($data);
				$this->success('管理员添加成功', U('admin/addUser'));
			}else{
				$this->error('管理员添加失败', U('admin/addUser'));
			}
		}else{
			$this->role = M('role')->select();
			$this->display();
		}
	}

	/**
	 * 编辑管理员
	 * @return [type] [description]
	 */
	public function editUser(){
		if(IS_POST){
			$roleUser = M('roleUser');
			$data = array(
				'user_id' => I('user_id', 0),
				'lock' => I('lock', 0)
				);
			if($_POST['password']) $data['password'] = md5($_POST['password']);
			M('adminUser')->save($data);
			$data = array(
				'role_id' => I('rid'),
				'user_id' => $data['user_id']
				);
            $roleUser->where(array('user_id'=>$data['user_id']))->delete();
			$roleUser->add($data);
			$this->success('管理员编辑成功', U('admin/index'));	
		}else{
			$id = I('id', 0);
			$_result = D('adminUser')->relation(true)->find($id);
			$this->role = M('role')->select();
			$this->assign('data', $_result);
			$this->display();
		}
	}


	/**
	 * 删除管理员
	 * @return [type] [description]
	 */
	public function delUser(){
		$id = I('id', 0);
		$adminUser = M('adminUser');
		$_result = $adminUser->find($id);
		if($_result){
			if($adminUser->delete($id)){
				$this->success('管理员删除成功', U('admin/index'));
			}else{
				$this->error('管理员删除失败', U('admin/index'));
			}
		}else{
			$this->error('指定用户不存在', U('admin/index'));
		}
	}


	/**
	 * 角色列表
	 * @return [type] [description]
	 */
	public function role(){
		$role = M('role')->select();
		$this->assign('role', $role);
		$this->display();
	}


	/**
	 * 添加角色
	 */
	public function addRole(){
		if(IS_POST){
			$post= I('post.');
			if(M('role')->add($post)){
				$this->success('添加成功', U('admin/addrole'));
			}else{
				$this->error('添加失败', U('admin/addrole'));
			}
		}else{
			$this->display();
		}
	}


	/**
	 * 编辑角色
	 * @return [type] [description]
	 */
	public function editRole(){
		if(IS_POST){
			$data = array(
				'id' => $_POST['id'],
				'name' => $_POST['name'],
				'remark' => $_POST['remark'],
				'status' => $_POST['status']
				);
			if(M('role')->save($data)){
				$this->success('角色修改成功', U('admin/role'));
			}else{
				$this->error('角色修改失败', U('admin/role'));
			}
		}else{	
			$rid = I('rid', 0);
			$_result = M('role')->find($rid);
			if($_result){
				$this->assign('data', $_result);
				$this->display();
			}else{
				$this->error('未找到指定的角色', U('admin/role'));
			}			
		}
	}


	/**
	 * 删除角色
	 * @return [type] [description]
	 */
	public function delRole(){
		$rid = I('rid', 0);
		$_result = M('role')->find($rid);
		if($_result){
			if(M('role')->delete($rid)){
				// 删除用户表和角色的中间表
				M('role_user')->where('role_id='.$rid)->delete();

				// 删除权限表
				M('access')->where('role_id='.$rid)->delete();

				$this->success('角色删除成功', U('admin/role'));
			}else{
				$this->error('角色删除失败', U('admin/role'));
			}
		}else{
			$this->error('未找到指定的角色', U('admin/role'));
		}
	}


	/**
	 * 节点列表
	 * @return [type] [description]
	 */
	public function node(){
		$node = M('node')->field('id,name,title,pid')->select();
		$this->node = node_merge($node);
		$this->display();
	}


	/**
	 * 添加节点
	 */
	public function addNode(){
		if(IS_POST){
			$post = I('post.');
			if(M('node')->add($post)){
				$this->success('添加成功', U('admin/addNode', array('pid'=>$post['pid'],'level'=>$post['level'])));
			}else{
				$this->error('添加失败', U('admin/addNode', array('pid'=>$post['pid'],'level'=>$post['level'])));
			}
		}else{
			$this->pid = I('pid', 0);
			$this->level = I('level', 1);
			switch ($this->level) {
				case 1:
					$this->type = '应用';
					break;
				case 2:
					$this->type = '控制器';
					break;
				case 3:
					$this->type = '动作方法';
					break;
			}
			$this->display();
		}
	}


	/**
	 * 编辑节点
	 * @return [type] [description]
	 */
	public function editNode(){
		$node = M('node');
		if(IS_POST){
			$post = I('post.');
			if(M('node')->save($post)){
				$this->success('修改成功', U('admin/node'));
			}else{
				$this->error('修改失败', U('admin/node'));
			}
		}else{
			$id = I('id');
			$data = $node->find($id);
			switch ($data['level']) {
				case 1:
					$this->type = '应用';
					break;
				case 2:
					$this->type = '控制器';
					break;
				case 3:
					$this->type = '动作方法';
					break;
			}
			$this->assign('data', $data);
			$this->display();
		}
	}


	/**
	 * 删除节点
	 * @return [type] [description]
	 */
	public function delNode(){
		$id = I('id', 0);
		$_result = M('node')->find($id);
		if($_result){
			if(M('node')->delete($id)){
				$this->success('节点删除成功', U('admin/node'));
			}else{
				$this->error('节点删除失败', U('admin/node'));
			}
		}else{
			$this->error('节点不存在', U('admin/node'));
		}
	}


	/**
	 * 配置权限
	 * @return [type] [description]
	 */
	public function access(){
		$rid = I('rid', 0);
		$node = M('node')->field('id,name,title,pid')->select();
		$access = M('access')->where(array('role_id'=>$rid))->getField('node_id', true);
		$this->node = node_merge($node,$access);
		$this->assign('rid', $rid);
		$this->display();
	}


	/**
	 * 设置权限
	 */
	public function setAccess(){
		$rid = I('rid', 0);
		$access = M('access');
		$access->where(array('role_id' => $rid))->delete();
		$data = array();
		foreach ($_POST['access'] as $value) {
			$tmp = explode('_', $value);
			$data[] = array(
				'role_id' => $rid,
				'node_id' => $tmp[0],
				'level' => $tmp[1]
				);
		}
		if($access->addAll($data)){
			$this->success('修改成功', U('admin/role'));
		}else{
			$this->error('修改失败', U('admin/role'));
		}
	}


}

?>