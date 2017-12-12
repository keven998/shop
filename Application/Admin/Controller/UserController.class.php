<?php
// +----------------------------------------------------------------------
// | 会员控制器
// +----------------------------------------------------------------------
// | Copyright (c) 2016 http://www.zenghao.cc All rights reserved.
// +----------------------------------------------------------------------
// | Author: isum <http://www.zenghao.cc>
// +----------------------------------------------------------------------
namespace Admin\Controller;
use Common\Controller\AdminBaseController;
class UserController extends AdminBaseController{


	/**
	 * 会员列表
	 * @return [type] [description]
	 */
	public function index(){
		$where = array();
		if(IS_GET){
			$data = I('get.');
			if($data['nickname']){
				$where['nickname'] = array('like', '%'.$data['nickname'].'%');
			}

			if($data['mobile']){
				$where['mobile'] = array('like', '%'.$data['mobile'].'%');
			}

			if($data['idcard']){
				$where['idcard'] = array('like', '%'.$data['idcard'].'%');
			}

			if($data['lock'] != 'S'){
				if($data['lock'] == 'Z'){
					$where['is_lock'] = 0;
				}
				if($data['lock'] == 'D'){
					$where['is_lock'] = 1;
				}
			}
		}

		$users = D('users');
		$list = $users->getPage($users, $where, 'user_id desc');
		// p($list);
		$this->assign('list', $list);
		$this->display();
	}



	/**
	 * 添加会员
	 */
	public function addUser(){
		if(IS_POST){
			$post = I('post.');
			$res = D('users')->addUser($post);
			if($res['status']){
				$this->success($res['msg'], U('user/index'));
			}else{
				$this->error($res['msg']);
			}
		}else{
			$this->display();
		}
	}


	/**
	 * 编辑会员
	 * @return [type] [description]
	 */
	public function detail(){
		$users = D('users');
		if(IS_POST){
			$post = I('post.');
			$res = D('users')->editUser($post);
			if($res['status']){
				$this->success($res['msg'], U('user/index'));
			}else{
				$this->error($res['msg']);
			}
		}else{
			$user_id = I('user_id', 0);
			if(empty($user_id)) $this->error('找不到指定会员');
			$_result = $users->find($user_id);
			if(empty($_result)) $this->error('找不到指定会员');
			$this->assign('data', $_result);
			$this->display();
		}
	}


	/**
	 * 收货地址
	 * @return [type] [description]
	 */
	public function address(){
		$user_id = I('get.user_id');
        $list = D('usersAddress')->where(array('user_id'=>$user_id))->select();
        $regionList = M('Region')->getField('id,name');
        $this->assign('regionList',$regionList);
        $this->assign('list',$list);
        $this->display();
	}


	/**
	 * 删除会员
	 * @return [type] [description]
	 */
	public function delUser(){
		$users = D('users');
		$user_id = I('user_id', 0);
		if(empty($user_id)) $this->error('找不到指定会员');
		$_result = $users->find($user_id);
		if(empty($_result)) $this->error('找不到指定会员');
		if($users->delete($user_id)){
			$this->success('会员删除成功！', U('user/index'));
		}else{
			$this->error('会员删除失败！', U('user/index'));
		}
	}



	/**
	 * 账目流水
	 * @return [type] [description]
	 */
	public function account(){
		$user_id = I('user_id', 0);
		$account_type = I('account_type', '');
		$accountLog = D('accountLog');
		$where = array();
		$where['user_id'] = $user_id;
		if($account_type){
			$where[$account_type] = array('neq',0);
		}
		$list = $accountLog->getPage($accountLog,$where,'change_time desc');
		$this->assign('list', $list);
		$this->display();
	}


	/**
	 * 调节会员账户
	 */
	public function addAccount(){
		$user_id = I('get.user_id');
		if(!$user_id > 0)
            $this->error("参数有误");
		if(IS_POST){
			 //获取操作类型
            $m_op_type = I('post.money_act_type');
            $use_money = I('post.use_money');
            $use_money =  $m_op_type ? $use_money : 0 - $use_money;

            $p_op_type = I('post.point_act_type');
            $pay_points = I('post.pay_points');
            $pay_points =  $p_op_type ? $pay_points : 0 - $pay_points;

            $f_op_type = I('post.frozen_act_type');
            $frozen_money = I('post.frozen_money');
            $frozen_money =  $f_op_type ? $frozen_money : 0 - $frozen_money;

            $change_desc = I('post.change_desc');
            if(!$change_desc)
                $this->error("请填写操作说明");
            if(accountLog($user_id,$use_money,$frozen_money,$pay_points,$change_desc,$change_type)){
                $this->success("操作成功",U("Admin/User/account",array('user_id'=>$user_id)));
            }else{
                $this->error("操作失败");
            }
            exit;
		}else{
			$this->assign('user_id',$user_id);
			$this->display();
		}
	}


	/**
	 * 会员等级
	 * @return [type] [description]
	 */
	public function rank(){
		$userRank = D('userRank');
		$list = $userRank->getPage($userRank, '', 'rank_id asc');
		$this->assign('list', $list);
		$this->display();
	}


	/**
	 * 添加会员等级
	 * @return [type] [<description>]
	 */
	public function addRank(){
		if(IS_POST){
			$post = I('post.');
			if(M('userRank')->add($post)){
				$this->success('操作成功！', U('user/rank'));
			}else{
				$this->error('操作失败！', U('user/rank'));
			}
		}else{
			$this->display();
		}
	}



	/**
	 * 编辑会员等级
	 * @return [type] [description]
	 */
	public function editRank(){
		$userRank = D('userRank');
		if(IS_POST){
			$post = I('post.');
			if($userRank->save($post)){
				$this->success('操作成功！', U('user/rank'));
			}else{
				$this->error('数据没有更新或者操作失败！', U('user/rank'));
			}
		}else{
			$rank_id = I('rank_id', 0);
			$_result = $userRank->find($rank_id);
			$this->assign('data', $_result);
			$this->display();
		}
	}

	/**
	 * 删除会员等级
	 * @return [type] [description]
	 */
	public function delRank(){
		$rank_id = I('rank_id', 0);
		if(M('userRank')->delete($rank_id)){
			$this->success('操作成功！', U('user/rank'));
		}else{
			$this->error('操作失败！', U('user/rank'));
		}
	}



	/**
	 * 会员充值
	 * @return [type] [description]
	 */
	public function recharge(){
		$where = array();
		if(IS_GET){
			$pay_status = I('pay_status');
        	$user_id = I('user_id');
        	if($pay_status === '0' || $pay_status > 0) $where['pay_status'] = $pay_status;
        	if($user_id) $where['user_id'] = $user_id;
		}
		$userRecharge = D('userRecharge');
		$list = $userRecharge->relation(true)->getPage($userRecharge, $where, 'add_time desc');
		$this->assign('list', $list);
		$this->display();
	}



	/**
	 * 会员提现
	 * @return [type] [description]
	 */
	public function withdraw(){
		$where = array();
		if(IS_GET){
			$pay_status = I('pay_status');
        	$user_id = I('user_id');
        	if($pay_status === '0' || $pay_status > 0) $where['pay_status'] = $pay_status;
        	if($user_id) $where['user_id'] = $user_id;
		}
		$userWithdraw = D('userWithdraw');
		$list = $userWithdraw->relation(true)->getPage($userWithdraw, $where, 'add_time desc');
		$this->assign('list', $list);
		$this->display();
	}



	/**
	 * 编辑提现申请
	 * @return [type] [description]
	 */
	public function editWithdraw(){
		$id = I('id');
        $userWithdraw = D("userWithdraw");
        $withdraw = $userWithdraw->find($id);
        $user = M('users')->find($withdraw['user_id']);

        if(IS_POST)
        {
        	$post = I('post.');
            // 如果是已经给用户转账 则生成转账流水记录
            if($post['status'] == 1 && $withdraw['status'] != 1)
            {
                if($user['frozen_money'] < $withdraw['money'])
                {
                    $this->error("用户余额不足{$withdraw['money']}，不够提现");
                }
                accountLog($withdraw['user_id'], 0, ($withdraw['money'] * -1), 0 ,"平台提现", 1);

                $remittance = array(
                    'user_id' => $withdraw['user_id'],
                    'bank_name' => $withdraw['bank_name'],
                    'account_bank' => $withdraw['account_bank'],
                    'account_name' => $withdraw['account_name'],
                    'money' => $withdraw['money'],
                    'status' => 1,
                    'add_time' => time(),
                    'admin_id' => session(C('USER_AUTH_KEY')),
                    'withdraw_id' => $withdraw['id'],
                    'remark'=>$post['remark'],
                );
                M('remittance')->add($remittance);
            }
            $userWithdraw->save($post);
            $this->success("操作成功！",U('user/remittance'));
        }

        if($user['nickname'])
            $withdraw['user_name'] = $user['nickname'];
        elseif($user['email'])
            $withdraw['user_name'] = $user['email'];
        elseif($user['mobile'])
            $withdraw['user_name'] = $user['mobile'];

        $this->assign('user',$user);
        $this->assign('data',$withdraw);
        $this->display();
	}


	/**
	 * 删除提现申请记录
	 * @return [type] [description]
	 */
	public function delWithdraw(){
		$id = I('get.id');
		if(D('userWithdraw')->delete($id)){
			$this->success('删除成功！');
		}else{
			$this->error('删除失败！');
		}
	}



	/**
	 * 转账汇款记录
	 * @return [type] [description]
	 */
	public function remittance(){
		$where = array();
		$user_id = I('user_id', 0);
		$account_bank = I('account_bank', '');
		$account_name = I('account_name', '');
		if($user_id) $where['user_id'] = $user_id;
		if($account_bank) $where['account_bank'] = array('like', '%'.$account_bank.'%');
		if($account_name) $where['account_name'] = array('like', '%'.$account_name.'%');
		$remittance = D('remittance');
		$list = $remittance->getPage($remittance, $where, 'add_time desc');
		$this->assign('list', $list);
		$this->display();
	}
}
?>