<?php
namespace Common\Controller;
use Common\Controller\BaseController;
/**
 * Home 基类控制器
 */
class HomeBaseController extends BaseController{
	/**
	 * 初始化方法
	 */
	public function _initialize(){
        if(is_mobile()){
            header("Location: http://m.".C('URL_DOMAIN_ROOT'));
        }
	}
}