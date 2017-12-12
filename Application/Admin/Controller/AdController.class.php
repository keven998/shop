<?php
// +----------------------------------------------------------------------
// | 登录控制器
// +----------------------------------------------------------------------
// | Copyright (c) 2016 http://www.zenghao.cc All rights reserved.
// +----------------------------------------------------------------------
// | Author: isum <http://www.zenghao.cc>
// +----------------------------------------------------------------------
namespace Admin\Controller;
use Common\Controller\AdminBaseController;
class AdController extends AdminBaseController{

	/**
	 * 广告列表
	 * @return [type] [description]
	 */
	public function index(){
		$ad = D('ad');
		$where = array();
		$keywords = I('keywords', '');
		$pid = I('pid', 0);
		if($keywords){
			$where['ad_name'] = array('like', '%'.$keywords.'%');
		}
		if($pid){
			$where['pid'] = $pid;
		}
		$list = $ad->getPage($ad, $where, 'pid desc');
		$ad_position_list = M('AdPosition')->getField("position_id,position_name,is_open");                        
        $this->assign('ad_position_list',$ad_position_list);
		$this->assign('list', $list);
		$this->display();
	}


	/**
	 * 添加广告
	 * @return  [type] [<description>]
	 */
	public function addAd(){
		if(IS_POST){
			$data = I('post.');
	    	$data['start_time'] = $data['start_time'] ? strtotime($data['start_time']) : time();
	    	$data['end_time'] = $data['end_time'] ? strtotime($data['end_time']) : time();
	    	if(M('ad')->add($data)){
	    		$this->success('操作成功！', U('ad/index'));
	    	}else{
	    		$this->error('操作失败！');
	    	}
		}else{
			$ad_position_list = M('AdPosition')->getField("position_id,position_name,is_open");                        
        	$this->assign('ad_position_list',$ad_position_list);
			$this->display();
		}
	}


	/**
	 * 编辑广告
	 * @return [type] [description]
	 */
	public function editAd(){
		$ad = D('ad');
		if(IS_POST){
			$data = I('post.');
	    	$data['start_time'] = $data['start_time'] ? strtotime($data['start_time']) : time();
	    	$data['end_time'] = $data['end_time'] ? strtotime($data['end_time']) : time();
	    	if($ad->save($data)){
	    		$this->success('操作成功！', U('ad/index'));
	    	}else{
	    		$this->error('数据没有更新或操作失败！');
	    	}
		}else{
			$ad_id = I('ad_id', 0);
			$_result = $ad->find($ad_id);
			$ad_position_list = M('AdPosition')->getField("position_id,position_name,is_open");                        
        	$this->assign('ad_position_list',$ad_position_list);
        	$this->assign('data', $_result);
			$this->display();
		}
	}


	/**
	 * 删除广告
	 * @return [type] [description]
	 */
	public function delAd(){
		$ad_id = I('ad_id', 0);
		if(M('ad')->delete($ad_id)){
			$this->success('操作成功！', U('ad/index'));
		}else{
			$this->error('操作失败！', U('ad/index'));
		}
	}






	/**
	 * 广告位置
	 * @return [type] [description]
	 */
	public function position(){
		$adPosition = D('adPosition');
		$list = $adPosition->getPage($adPosition, '', 'position_id desc');
		$this->assign('list', $list);
		$this->display();
	}



	/**
	 * 添加广告位
	 * @return [type] [description]
	 */
	public function addPosition(){
		if(IS_POST){
			$post = I('post.');
			if(M('adPosition')->add($post)){
				$this->success('操作成功！', U('ad/position'));
			}else{
				$this->error('操作失败！');
			}
		}else{
			$this->display();
		}
	}


	/**
	 * 编辑广告位
	 * @return [type] [description]
	 */
	public function editPosition(){
		$adPosition = D('adPosition');
		if(IS_POST){
			$post = I('post.');
			if($adPosition->save($post)){
				$this->success('操作成功！', U('ad/position'));
			}else{
				$this->error('数据没有更新或操作失败！');
			}
		}else{
			$pid = I('pid', 0);
			$_result = $adPosition->find($pid);
			$this->assign('data', $_result);
			$this->display();
		}
	}


	/**
	 * 删除广告位
	 * @return [type] [description]
	 */
	public function delPosition(){
		$pid = I('pid', 0);
		if(M('ad')->where('pid='.$pid)->count()>0){
    		$this->error("此广告位下还有广告，请先清除",U('Admin/Ad/position'));
    	}else{
    		$_result = M('ad_position')->where('position_id='.$data['position_id'])->delete();
    		if($_result){
    			$this->success('操作成功！');
    		}else{
    			$this->error('操作失败！');
    		}
    	}
	}

}
?>