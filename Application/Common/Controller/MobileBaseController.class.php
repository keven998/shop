<?php
namespace Common\Controller;
use Common\Controller\BaseController;
/**
 * Mobile 基类控制器
 */
class MobileBaseController extends BaseController{
	/**
	 * 初始化方法
	 */
	public function _initialize(){
        if(!is_mobile()){
            header("Location: http://www.".C('URL_DOMAIN_ROOT'));
        }
	}
}