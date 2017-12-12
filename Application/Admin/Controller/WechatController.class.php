<?php
// +----------------------------------------------------------------------
// | 微信控制器
// +----------------------------------------------------------------------
// | Copyright (c) 2016 http://www.zenghao.cc All rights reserved.
// +----------------------------------------------------------------------
// | Author: isum <http://www.zenghao.cc>
// +----------------------------------------------------------------------
namespace Admin\Controller;
use Common\Controller\AdminBaseController;
class WechatController extends AdminBaseController{


	/**
	 * 微信菜单管理
	 * @return [type] [description]
	 */
	public function menu(){
		$menu = M('wechatMenu')->select();
		$this->assign('menu', menuForLevel($menu));
		$this->display();
	}



	/**
	 * 添加微信菜单
	 * @return [type] [<description>]
	 */
	public function addMenu(){
		if(IS_POST){
			$post = I('post.');
			$where = array(
				'pid' => $post['pid']
				);
			$count = M('wechatMenu')-> where($where)->count();
			if($post['pid'] == 0){				
				if($count>=3){
					$this->error('一级菜单最多添加三个', U('wechat/addMenu'), 1);
				}
			}else{
				if($count>=5){
					$this->error('二级菜单最多添加五个', U('wechat/addMenu'), 1);
				}
			}
			if(M('wechatMenu')->add($post)){
				$this->success('操作成功！', U('wechat/menu',array('level'=>$post['level'])));
			}else{
				$this->error('操作失败！', U('wechat/menu',array('level'=>$post['level'])));
			}
		}else{
			$this->menu = M('wechatMenu')-> where(array('pid'=>0))->select();
			$this->display();
		}
	}


	/**
	 * 编辑微信菜单
	 * @return [type] [description]
	 */
	public function editMenu(){
		$wechatMenu = M('wechatMenu');
		if(IS_POST){
			$post = I('post.');
			if($wechatMenu->save($post)){
				$this->success('操作成功！', U('wechat/menu'));
			}else{
				$this->error('数据没有更新或操作失败！', U('wechat/menu'));
			}
		}else{
			$id = I('id', 0);
			$_result = $wechatMenu->find($id);
			$this->menu = $wechatMenu-> where(array('pid'=>0))->select();
			$this->assign('data', $_result);
			$this->display();
		}
	}


	/**
	 * 删除微信菜单
	 * @return [type] [description]
	 */
	public function delMenu(){
		$wechatMenu = M('wechatMenu');
		$id = I('id', 0);
		$_result = $wechatMenu->find($id);
		if($_result){
			$count = $wechatMenu->where('pid='.$id)->count();
			if($count>0) $this->error('抱歉，该菜单下存在子菜单', U('wechat/menu'));
			if($wechatMenu->delete($id)){
				$this->success('操作成功！', U('wechat/menu'));
			}else{
				$this->error('操作失败！', U('wechat/menu'));
			}
		}else{
			$this->error('菜单不存在', U('wechat/menu'));
		}
	}


	/**
	 * 更新菜单
	 * @return [type] [description]
	 */
	public function upMenu(){
		$menu = M('wechatMenu')->select();
		$menu = menuForLayer($menu, 'sub_button');
		vendor('Wechat.Wechat');
		$wechat = new \Wechat('123','wx7aadb9138a54e8c6','d4624c36b6795d1d99dcf0547af5443d');
		echo $wechat->createMenu(urldecode(json_encode(array('button'=>$menu))));
	}


	/**
	 * 文本回复
	 * @return [type] [description]
	 */
	public function text(){
		$wechatKey = D('wechatKey');
		$list = $wechatKey->getPage($wechatKey,'', 'id desc');
		$this->assign('list', $list);
		$this->display();
	}


	/**
	 * 添加关键词
	 * @return [type] [<description>]
	 */
	public function addText(){
		if(IS_POST){
			$data = I('post.');
			if(M('wechatKey')->add($data)){
				$this->success('操作成功！', U('wechat/text'));
			}else{
				$this->error('操作失败！', U('wechat/text'));
			}
		}else{
			$this->display();
		}
	}



	/**
	 * 编辑关键词回复
	 * @return [type] [description]
	 */
	public function editText(){
		if(IS_POST){
			$data = I('post.');
			if(M('wechatKey')->save($data)){
				$this->success('编辑成功', U('wechat/text'));
			}else{
				$this->error('数据没有更新或操作失败！', U('wechat/text'));
			}
		}else{
			$id = I('id', 0);
			$_result = M('wechatKey')->find($id);
			if($_result){
				$this->assign('data', $_result);
				$this->display();
			}else{
				$this->error('找不到指定关键词', U('wechat/text'));
			}
		}
	}


	/**
	 * 删除关键词回复
	 * @return [type] [description]
	 */
	public function delText(){
		$id = I('id', 0);
		$_result = M('wechatKey')->find($id);
		if($_result){
			if(M('wechatKey')->delete($id)){
				$this->success('操作成功！', U('wechat/text'));
			}else{
				$this->error('操作失败！', U('wechat/text'));
			}
		}else{
			$this->error('找不到指定关键词', U('wechat/text'));
		}
	}



	/**
	 * 图文回复
	 * @return [type] [description]
	 */
	public function img(){

	}
}
?>