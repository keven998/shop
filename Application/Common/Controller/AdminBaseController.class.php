<?php
namespace Common\Controller;
use Common\Controller\BaseController;
/**
 * Admin 基类控制器
 */
class AdminBaseController extends BaseController{
	/**
	 * 初始化方法
	 */
	public function _initialize(){
	    $user_id = session('admin.user_id');
		// 判断用户是否登录
        if(!isset($user_id)){
            $this->redirect('public/login');
        }

        $admin = M('adminUser')->find($user_id);
        $this->assign('admin', $admin);
	}
}