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
class PromotionController extends AdminBaseController{

	/**
	 * 抢购
	 * @return [type] [description]
	 */
	public function flash(){
		$flashSale = D('flashSale');
		$keywords = I('keywords', '');
		$where = array();
		if($keywords){
			$where['title'] = array('like', '%'.$keywords.'%');
		}
		$list = $flashSale->getPage($flashSale, $where, 'id desc');
		$this->assign('list', $list);
		$this->display();
	}


	/**
	 * 添加抢购
	 * @return [type] [<description>]
	 */
	public function addFlash(){
		if(IS_POST){
			$post = I('post.');
			$post['start_time'] = $post['start_time'] ? strtotime($post['start_time']) : time();
    		$post['end_time'] = $post['end_time'] ? strtotime($post['end_time']) : time();
    		if($prom_id = M('flash_sale')->add($post)){
    			M('goods')->where("goods_id=".$post['goods_id'])->save(array('prom_id'=>$prom_id,'prom_type'=>1));
    			$this->success('操作成功！', U('promotion/flash'));
    		}else{
    			$this->error('操作失败！', U('promotion/flash'));
    		}
		}else{
			$this->display();
		}
	}


	/**
	 * 编辑抢购
	 * @return [type] [description]
	 */
	public function editFlash(){
		if(IS_POST){
			$post = I('post.');
			$post['start_time'] = $post['start_time'] ? strtotime($post['start_time']) : time();
    		$post['end_time'] = $post['end_time'] ? strtotime($post['end_time']) : time();
    		if($prom_id = M('flash_sale')->save($post)){
    			M('goods')->where("prom_type=1 and prom_id=".$post['id'])->save(array('prom_id'=>0,'prom_type'=>0));
    			M('goods')->where("goods_id=".$post['goods_id'])->save(array('prom_id'=>$post['id'],'prom_type'=>1));
    			$this->success('操作成功！', U('promotion/flash'));
    		}else{
    			$this->error('操作失败！', U('promotion/flash'));
    		}
		}else{
			$id = I('id', 0);
			$_result = M('flash_sale')->find($id);
			$this->assign('data', $_result);
			$this->display();
		}
	}


	/**
	 * 删除抢购
	 * @return [type] [description]
	 */
	public function delFlash(){
		$id = I('id', 0);
    	if($id){
    		M('flash_sale')->where("id=$id")->delete();
    		M('goods')->where("prom_type=1 and prom_id=$id")->save(array('prom_id'=>0,'prom_type'=>0));
    		$this->success('操作成功！', U('promotion/flash'));
    	}else{
    		$this->error('操作失败！', U('promotion/flash'));
    	}
	}





	/**
	 * 商品促销
	 * @return [type] [description]
	 */
	public function prom(){
		$promGoods = D('promGoods');
		$where = array();
		$keywords = I('keywords', '');
		if($keywords){
			$where['name'] = array('like', '%'.$keywords.'%');
		}
		$parse_type = array('0'=>'直接打折','1'=>'减价优惠','2'=>'固定金额出售','3'=>'买就赠优惠券'); 
		$this->assign("parse_type", $parse_type);
		$res = $promGoods->getPage($promGoods, $where, 'id desc');
		$rank = M('userRank')->select();
		if($rank){
			foreach ($rank as $v){
				$lv[$v['rank_id']] = $v['rank_name'];
			}
		}
		if($res['data']){
			foreach ($res['data'] as $val){
				if(!empty($val['group']) && !empty($lv)){
					$val['group'] = explode(',', $val['group']);
					foreach ($val['group'] as $v){
						$val['group_name'] .= $lv[$v].',';
					}
				}
				$prom_list[] = $val;
			}
		}
		$list = array('data'=>$prom_list, 'page'=> $res['page']);
		$this->assign('list', $list);
		$this->display();
	}


	/**
	 * 添加商品促销
	 * @return [type] [<description>]
	 */
	public function addProm(){
		if(IS_POST){
			$data = I('post.');
			$data['start_time'] = strtotime($data['start_time']);
			$data['end_time'] = strtotime($data['end_time']);
			$data['group'] = implode(',', $data['group']);
			if($last_id = M('prom_goods')->add($data)){
				if(is_array($data['goods_id'])){
					$goods_id = implode(',', $data['goods_id']);
					if($prom_id>0){
						M("goods")->where("prom_id=$prom_id and prom_type=3")->save(array('prom_id'=>0,'prom_type'=>0));
					}
					M("goods")->where("goods_id in($goods_id)")->save(array('prom_id'=>$last_id,'prom_type'=>3));
				}
				$this->success('操作成功！', U('promotion/prom'));
			}else{
				$this->error('操作失败！', U('promotion/prom'));
			}
		}else{
			$rank = M('userRank')->select();
			$this->assign('rank',$rank);
			$this->initEditor();
			$this->display();
		}
	}



	/**
	 * 编辑商品促销
	 * @return [type] [description]
	 */
	public function editProm(){
		if(IS_POST){
			$data = I('post.');
			$data['start_time'] = strtotime($data['start_time']);
			$data['end_time'] = strtotime($data['end_time']);
			$data['group'] = implode(',', $data['group']);
			M('prom_goods')->save($data);	
			$prom_id = $data['id'];
			if(is_array($data['goods_id'])){
				$goods_id = implode(',', $data['goods_id']);
				if($prom_id>0){
					M("goods")->where("prom_id=$prom_id and prom_type=3")->save(array('prom_id'=>0,'prom_type'=>0));
				}
				M("goods")->where("goods_id in($goods_id)")->save(array('prom_id'=>$prom_id,'prom_type'=>3));
			}
			$this->success('操作成功！', U('promotion/prom'));
			
		}else{
			$prom_id = I('id', 0);
			$_result = M('promGoods')->find($prom_id);
			$prom_goods = M('goods')->where("prom_id=$prom_id and prom_type=3")->select();
			$rank = M('userRank')->select();
			$this->assign('rank',$rank);
			$this->assign('prom_goods',$prom_goods);
			$this->assign('data', $_result);
			$this->initEditor();
			$this->display();
		}
	}




	/**
	 * 删除商品促销
	 * @return [type] [description]
	 */
	public function delProm(){
		$prom_id = I('id');                
        $order_goods = M('order_goods')->where("prom_type = 3 and prom_id = $prom_id")->find();
        if(!empty($order_goods))
        {
            $this->error("该活动有订单参与不能删除!");    
        }                
		M("goods")->where("prom_id=$prom_id and prom_type=3")->save(array('prom_id'=>0,'prom_type'=>0));
		M('prom_goods')->where("id=$prom_id")->delete();
		$this->success('删除活动成功',U('promotion/prom'));
	}	


	/**
	 * 查看商品促销商品
	 * @return [type] [description]
	 */
	public function getGoods(){
		$prom_id = I('id');
		$goods = D('goods');
		$where = array(
			'prom_id' => $prom_id,
			'prom_type' => 3
			);
    	$goodsList = $goods->getPage($goods, $where, 'goods_id desc');
    	$this->assign('goodsList',$goodsList);
    	$this->display(); 
	}




	/**
	 * 团购
	 * @return [type] [description]
	 */
	public function groupBuy(){
		$groupBuy = D('groupBuy');
		$where = array();
		$list = $groupBuy->getPage($groupBuy, $where, 'id desc');
		$this->assign('list', $list);
		$this->display();
	}


	/**
	 * 添加团购
	 * @return [type] [<description>]
	 */
	public function addGroupBuy(){
		if(IS_POST){
			$post = I('post.');
			$post['start_time'] = $post['start_time'] ? strtotime($post['start_time']) : time();
    		$post['end_time'] = $post['end_time'] ? strtotime($post['end_time']) : time();
    		if($post['goods_id']){
    			$goods = M('goods')->find($goods_id);
    			$post['rebate'] = sprintf("%.2f", $post['price'] / $goods['shop_price']) * 10;
    		}
    		if($prom_id = M('group_buy')->add($post)){
    			M('goods')->where("goods_id=".$post['goods_id'])->save(array('prom_id'=>$prom_id,'prom_type'=>2));
    			$this->success('操作成功！', U('promotion/groupBuy'));
    		}else{
    			$this->error('操作失败！', U('promotion/groupBuy'));
    		}
		}else{
			$this->display();
		}
	}


	/**
	 * 编辑抢购
	 * @return [type] [description]
	 */
	public function editGroupBuy(){
		if(IS_POST){
			$post = I('post.');
			$post['start_time'] = $post['start_time'] ? strtotime($post['start_time']) : time();
    		$post['end_time'] = $post['end_time'] ? strtotime($post['end_time']) : time();
    		if($post['goods_id']){
    			$goods = M('goods')->find($goods_id);
    			$post['rebate'] = sprintf("%.2f", $post['price'] / $goods['shop_price']) * 10;
    		}
    		if($prom_id = M('group_buy')->save($post)){
    			M('goods')->where("prom_type=2 and prom_id=".$post['id'])->save(array('prom_id'=>0,'prom_type'=>0));
    			M('goods')->where("goods_id=".$post['goods_id'])->save(array('prom_id'=>$post['id'],'prom_type'=>2));
    			$this->success('操作成功！', U('promotion/groupBuy'));
    		}else{
    			$this->error('操作失败！', U('promotion/groupBuy'));
    		}
		}else{
			$id = I('id', 0);
			$_result = M('group_buy')->find($id);
			$this->assign('data', $_result);
			$this->display();
		}
	}


	/**
	 * 删除抢购
	 * @return [type] [description]
	 */
	public function delGroupBuy(){
		$id = I('id', 0);
    	if($id){
    		M('group_buy')->where("id=$id")->delete();
    		M('goods')->where("prom_type=1 and prom_id=$id")->save(array('prom_id'=>0,'prom_type'=>0));
    		$this->success('操作成功！', U('promotion/groupBuy'));
    	}else{
    		$this->error('操作失败！', U('promotion/groupBuy'));
    	}
	}




	/**
	 * 选择商品
	 * @return [type] [description]
	 */
	public function searchGoods(){
		$category = D('goodsCate')->select();
        $this->assign('categoryList', cateForLevel($category));
        $brand = D('brand')->where('is_show = 1')->select();
        $this->assign('brandList', $brand);

        $goods_id = I('goods_id');
    	$where = ' is_on_sale = 1 and prom_type=0 and goods_number>0 ';//搜索条件
    	if(!empty($goods_id)){
    		$where .= " and goods_id not in ($goods_id) ";
    	}
    	I('intro')  && $where = "$where and ".I('intro')." = 1";
    	if(I('cat_id')){
    		$this->assign('cat_id',I('cat_id'));
    		$grandson_ids = getCatGrandson(I('cat_id'));
    		$where = " $where  and cat_id in(".  implode(',', $grandson_ids).") "; // 初始化搜索条件
    	}
    	if(I('brand_id')){
    		$this->assign('brand_id',I('brand_id'));
    		$where = "$where and brand_id = ".I('brand_id');
    	}
    	if(!empty($_REQUEST['keywords']))
    	{
    		$this->assign('keywords',I('keywords'));
    		$where = "$where and (goods_name like '%".I('keywords')."%' or keywords like '%".I('keywords')."%')" ;
    	}

    	$goods = D('goods');
    	$goodsList = $goods->getPage($goods, $where, 'goods_id desc');
    	$this->assign('goodsList', $goodsList);


		$tpl = I('get.tpl','searchGoods');
    	$this->display($tpl);
	}


	/**
	 * 编辑器配置
	 * @return [type] [description]
	 */
	private function initEditor()
    {
    	$this->assign("URL_upload", U('Admin/Ueditor/imageUp',array('savepath'=>'promotion')));
    	$this->assign("URL_fileUp", U('Admin/Ueditor/fileUp',array('savepath'=>'promotion')));
    	$this->assign("URL_scrawlUp", U('Admin/Ueditor/scrawlUp',array('savepath'=>'promotion')));
    	$this->assign("URL_getRemoteImage", U('Admin/Ueditor/getRemoteImage',array('savepath'=>'promotion')));
    	$this->assign("URL_imageManager", U('Admin/Ueditor/imageManager',array('savepath'=>'promotion')));
    	$this->assign("URL_imageUp", U('Admin/Ueditor/imageUp',array('savepath'=>'promotion')));
    	$this->assign("URL_getMovie", U('Admin/Ueditor/getMovie',array('savepath'=>'promotion')));
    	$this->assign("URL_Home", "");
    }




    /**
     * 订单促销
     * @return [type] [description]
     */
    public function order(){
    	$promOrder = D('promOrder');
		$where = array();
		$keywords = I('keywords', '');
		if($keywords){
			$where['name'] = array('like', '%'.$keywords.'%');
		}
		$parse_type = array('0'=>'直接打折','1'=>'减价优惠','2'=>'固定金额出售','3'=>'买就赠优惠券'); 
		$this->assign("parse_type", $parse_type);
		$res = $promOrder->getPage($promOrder, $where, 'id desc');
		$rank = M('userRank')->select();
		if($rank){
			foreach ($rank as $v){
				$lv[$v['rank_id']] = $v['rank_name'];
			}
		}
		if($res['data']){
			foreach ($res['data'] as $val){
				if(!empty($val['group']) && !empty($lv)){
					$val['group'] = explode(',', $val['group']);
					foreach ($val['group'] as $v){
						$val['group_name'] .= $lv[$v].',';
					}
				}
				$prom_list[] = $val;
			}
		}
		$list = array('data'=>$prom_list, 'page'=> $res['page']);
		$this->assign('list', $list);
		$this->display();
    }




    /**
     * 添加订单促销
     * @return [type] [<description>]
     */
    public function addOrder(){
    	if(IS_POST){
    		$data = I('post.');
			$data['start_time'] = strtotime($data['start_time']);
			$data['end_time'] = strtotime($data['end_time']);
			$data['group'] = implode(',', $data['group']);
			if(M('promOrder')->add($data)){
				$this->success('操作成功！', U('promotion/prom'));
				adminLog("管理员添加了商品促销 ".I('name'));
			}else{
				$this->error('操作失败！', U('promotion/prom'));
			}
    	}else{
    		$rank = M('userRank')->select();
			$this->assign('rank',$rank);
			$this->initEditor();
    		$this->display();
    	}
    }



    /**
     * 编辑订单促销
     * @return [type] [description]
     */
    public function editOrder(){
    	if(IS_POST){
    		$data = I('post.');
			$data['start_time'] = strtotime($data['start_time']);
			$data['end_time'] = strtotime($data['end_time']);
			$data['group'] = implode(',', $data['group']);
			if(M('promOrder')->save($data)){
				$this->success('操作成功！', U('promotion/prom'));
				adminLog("管理员修改了商品促销 ".I('name'));
			}else{
				$this->error('操作失败！', U('promotion/prom'));
			}
    	}else{
    		$rank = M('userRank')->select();
			$this->assign('rank',$rank);
			$id = I('id', 0);
			$_result = M('promOrder')->find($id);
			$this->assign('data', $_result);
			$this->initEditor();
    		$this->display();
    	}
    }


    /**
     * 删除订单促销
     * @return  [type] [<description>]
     */
    public function delOrder(){
    	$prom_id = I('id');                                
        $order = M('order')->where("order_prom_id = $prom_id")->find();
        if(!empty($order))
        {
            $this->error("该活动有订单参与不能删除!");    
        }              
		M('prom_order')->where("id=$prom_id")->delete();
		adminLog("管理员删除了商品促销 ".I('name'));
		$this->success('删除活动成功',U('Promotion/prom_order_list'));
    }



    /**
     * 代金券管理
     * @return [type] [description]
     */
    public function coupon(){
    	$coupon = D('coupon');
    	$where = array();
    	$keywords = I('keywords', '');
    	if($keywords){
    		$where['name'] = array('like', '%'.$keywords.'%');
    	}
    	$list = $coupon->getPage($coupon, $where, 'add_time desc');
    	$this->assign('coupons',C('COUPON_TYPE'));
    	$this->assign('list', $list);
    	$this->display();
    }


    /**
     * 添加优惠券
     * @return [type] [<description>]
     */
    public function addCoupon(){
    	if(IS_POST){
    		$data = I('post.');
    		$data['send_start_time'] = strtotime($data['send_start_time']);
            $data['send_end_time'] = strtotime($data['send_end_time']);
            $data['use_end_time'] = strtotime($data['use_end_time']);
            $data['use_start_time'] = strtotime($data['use_start_time']);
            if($data['send_start_time'] > $data['send_end_time']){
                $this->error('发放日期填写有误');
            }
            $data['add_time'] = time();
            if(M('coupon')->add($data)){
            	$this->success('操作成功！', U('promotion/coupon'));
            }else{
            	$this->error('操作失败！', U('promotion/coupon'));
            }
    	}else{
    		$this->display();
    	}
    }



    /**
     * 编辑优惠券
     * @return [type] [description]
     */
    public function editCoupon(){
    	$coupon = D('coupon');
    	if(IS_POST){
    		$data = I('post.');
    		$data['send_start_time'] = strtotime($data['send_start_time']);
            $data['send_end_time'] = strtotime($data['send_end_time']);
            $data['use_end_time'] = strtotime($data['use_end_time']);
            $data['use_start_time'] = strtotime($data['use_start_time']);
            if($data['send_start_time'] > $data['send_end_time']){
                $this->error('发放日期填写有误');
            }
            if(M('coupon')->save($data)){
            	$this->success('操作成功！', U('promotion/coupon'));
            }else{
            	$this->error('数据没有更新或操作失败！', U('promotion/coupon'));
            }
    	}else{
    		$id = I('id', 0);
    		$_result = $coupon->find($id);
    		$this->assign('data', $_result);
    		$this->display();
    	}
    }


    /**
     * 删除优惠券
     * @return [type] [description]
     */
    public function delCoupon(){
        $id = I('get.id');
        //查询是否存在优惠券
        if(M('coupon')->delete($id)){
            //删除此类型下的优惠券
            M('couponList')->where(array('cid'=>$id))->delete();
            $this->success("删除成功");
        }else{
            $this->error("删除失败");
        }
    }



    /**
     * 查看会员领取优惠券
     * @return [type] [description]
     */
    public function couponList(){
    	$id = I('id', 0);
    	$_result = M('coupon')->find($id);
    	if(empty($_result)) $this->error('不存在该类型优惠券', U('promotion/coupon'));
    	$couponList = D('couponList');
    	$where['cid'] = $id;
    	$list = $couponList->relation(true)->getPage($couponList, $where);
    	p($list);
    	$this->assign('list', $list);
    	$this->assign('coupon_type',C('COUPON_TYPE'));
    	$this->display();
    }



    /**
     * 线下发放优惠券
     * @return [type] [description]
     */
    public function makeCoupon(){
    	//获取优惠券ID
        $cid = I('get.id');
        $type = I('get.type');
        //查询是否存在优惠券
        $data = M('coupon')->where(array('id'=>$cid))->find();
        $remain = $data['createnum'] - $data['send_num'];//剩余派发量
    	if($remain<=0) $this->error($data['name'].'已经发放完了');
        if(!$data) $this->error("优惠券类型不存在");
        if($type != 4) $this->error("该优惠券类型不支持发放");
        if(IS_POST){
            $num  = I('post.num');
            if($num>$remain) $this->error($data['name'].'发放量不够了');
            if(!$num > 0) $this->error("发放数量不能小于0");
            $add['cid'] = $cid;
            $add['type'] = $type;
            $add['send_time'] = time();
            for($i=0;$i<$num; $i++){
                do{
                    $code = get_rand_str(8,0,1);//获取随机8位字符串
                    $check_exist = M('coupon_list')->where(array('code'=>$code))->find();
                }while($check_exist);
                $add['code'] = $code;
                M('coupon_list')->add($add);
            }
            M('coupon')->where("id=$cid")->setInc('send_num',$num);
            adminLog("发放".$num.'张'.$data['name']);
            $this->success("发放成功",U('promotion/Coupon'));
            exit;
        }
        $this->assign('coupon',$data);
        $this->display();
    }


    /**
     * 
     * @return [type] [description]
     */
    public function sendCoupon(){
    	$cid = I('cid');    	
    	if(IS_POST){
    		$level_id = I('level_id');
    		$user_id = I('user_id');
    		$insert = '';
    		$coupon = M('coupon')->where("id=$cid")->find();
    		if($coupon['createnum']>0){
    			$remain = $coupon['createnum'] - $coupon['send_num'];//剩余派发量
    			if($remain<=0) $this->error($coupon['name'].'已经发放完了');
    		}
    		
    		if(empty($user_id) && $level_id>=0){
    			if($level_id==0){
    				$user = M('users')->where("is_lock=0")->select();
    			}else{
    				$user = M('users')->where("is_lock=0 and level_id=$level_id")->select();
    			}
    			if($user){
    				$able = count($user);//本次发送量
    				if($coupon['createnum']>0 && $remain<$able){
    					$this->error($coupon['name'].'派发量只剩'.$remain.'张');
    				}
    				foreach ($user as $k=>$val){
    					$user_id = $val['user_id'];
    					$time = time();
    					$gap = ($k+1) == $able ? '' : ',';
    					$insert .= "($cid,1,$user_id,$time)$gap";
    				}
    			}
    		}else{
    			$able = count($user_id);//本次发送量
    			if($coupon['createnum']>0 && $remain<$able){
    				$this->error($coupon['name'].'派发量只剩'.$remain.'张');
    			}
    			foreach ($user_id as $k=>$v){
    				$time = time();
    				$gap = ($k+1) == $able ? '' : ',';
    				$insert .= "($cid,1,$v,$time)$gap";
    			}
    		}
			$sql = "insert into __PREFIX__coupon_list (`cid`,`type`,`uid`,`send_time`) VALUES $insert";
			M()->execute($sql);
			M('coupon')->where("id=$cid")->setInc('send_num',$able);
			adminLog("发放".$able.'张'.$coupon['name']);
			$this->success("发放成功");
			exit;
    	}
    	$rank = M('userRank')->select();
    	$this->assign('rank',$rank);
    	$this->assign('cid',$cid);
    	$this->display();
    }


    /**
     * 获取用户列表
     * @return [type] [description]
     */
    public function ajax_get_user(){
    	//搜索条件
    	$condition = array();
    	I('mobile') ? $condition['mobile'] = I('mobile') : false;
    	$nickname = I('nickname');
    	if(!empty($nickname)){
    		$condition['nickname'] = array('like',"%$nickname%");
    	}
    	$model = M('users');
    	$count = $model->where($condition)->count();
    	$Page  = new \Think\AjaxPage($count,10);
    	foreach($condition as $key=>$val) {
    		$Page->parameter[$key] = urlencode($val);
    	}
    	$show = $Page->show();
    	$userList = $model->where($condition)->order("user_id desc")->limit($Page->firstRow.','.$Page->listRows)->select();
        
        $rank = M('userRank')->getField('rank_id,rank_name',true);       
        $this->assign('rank',$rank);
    	$this->assign('userList',$userList);
    	$this->assign('page',$show);
    	$this->display();
    }

}

?>