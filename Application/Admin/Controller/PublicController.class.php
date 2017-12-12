<?php
// +----------------------------------------------------------------------
// | 登录控制器
// +----------------------------------------------------------------------
// | Copyright (c) 2016 http://www.zenghao.cc All rights reserved.
// +----------------------------------------------------------------------
// | Author: isum <http://www.zenghao.cc>
// +----------------------------------------------------------------------
namespace Admin\Controller;
use Think\Controller;
class PublicController extends Controller{

	public function login(){
//	    p($_SESSION);
		if(IS_POST){
			$post = I('post.');
			$adminUser = M('adminUser');
			if(empty($post['username'])) $this->ajaxReturn(array('error'=>1, 'msg'=>'用户名不能为空'));
			if(empty($post['password'])) $this->ajaxReturn(array('error'=>1, 'msg'=>'密码不能为空'));
			if(empty($post['code'])) $this->ajaxReturn(array('error'=>1, 'msg'=>'验证码不能为空'));
			if(!check_verify($post['code'])) $this->ajaxReturn(array('error'=>1, 'msg'=>'验证码错误'));
			$_result = $adminUser->where(array('username'=>$post['username']))->find();
			if($_result){
				if($_result['password'] == md5(sha1(md5($post['password'])))){
					$_result['last_login'] = time();
					$_result['last_ip'] = get_client_ip();
                    session('admin.user_id', $_result['user_id']);
                    session('admin.username', $_result['username']);
					$adminUser->save($_result);
					$this->ajaxReturn(array('status'=>0, 'msg'=>'登录成功'));
				}else{
					$this->ajaxReturn(array('error'=>1, 'msg'=>'用户名或密码不正确'));
				}
			}else{
				$this->ajaxReturn(array('error'=>1, 'msg'=>'会员不存在'));
			}
		}else{
			$this->display();
		}
	}

    /**
     * 验证码
     * @author: zenghao <isum36@gmail.com>
     */
    public function verify()
    {
        show_verify();
	}

	public function logout(){
		session('admin', null);
		$this->redirect('public/login');
	}
}

?>