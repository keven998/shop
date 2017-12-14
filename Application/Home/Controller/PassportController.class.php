<?php
//+----------------------------------------------------------------------
// | 登录、注册、忘记密码
//+----------------------------------------------------------------------
// | Copyright (c) 2017  http://www.zenghao.cc All rightsreserved.
//+----------------------------------------------------------------------
// | Author: zenghao <isum36@gmail.com>
//+----------------------------------------------------------------------
namespace Home\Controller;
use Common\Controller\HomeBaseController;
class PassportController extends HomeBaseController{

    /**
     * 登录页面
     * @author: zenghao <isum36@gmail.com>
     */
    public function index()
    {
        $this->display();
    }


    /**
     * 注册页面
     * @author: zenghao <isum36@gmail.com>
     */
    public function register()
    {
        $this->display();
    }



}


