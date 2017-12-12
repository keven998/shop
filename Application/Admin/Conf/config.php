<?php
return array(

	// ====================Rbac权限控制配置==========================
	'RBAC_SUPERADMIN'	=> 'admin',			// 超级管理员名称
	'ADMIN_AUTH_KEY'	=> 'superadmin',	// 超级管理员识别
	'USER_AUTH_ON'		=> true,			// 是否开启验证
	'USER_AUTH_TYPE'	=> 2, 				// 验证类型 1：登录验证，2：时时验证
	'USER_AUTH_KEY' 	=> 'uid',  			// 用户认证识别号
	'NOT_AUTH_MODULE' 	=> 'Index,Public', 				// 无需认证的控制器
	'NOT_AUTH_ACTION' 	=> 'savePassword', 				// 无需认证的方法
	'RBAC_ROLE_TABLE' 	=> 'h_role', 		// 角色表名称
	'RBAC_USER_TABLE' 	=> 'h_role_user', 	// 角色与用户的中间表名称
	'RBAC_ACCESS_TABLE' => 'h_access', 		// 权限表名称
	'RBAC_NODE_TABLE' 	=> 'h_node', 		// 节点表名称



	'PAYMENT_PLUGIN_PATH' =>  PLUGIN_PATH.'payment',
    'LOGIN_PLUGIN_PATH' =>  PLUGIN_PATH.'login',
    'SHIPPING_PLUGIN_PATH' => PLUGIN_PATH.'shipping',
    'FUNCTION_PLUGIN_PATH' => PLUGIN_PATH.'function',


    // 伪静态设置
    'URL_HTML_SUFFIX'	=> '',
    //默认错误跳转对应的模板文件
	'TMPL_ACTION_ERROR' => 'Public:error',
	//默认成功跳转对应的模板文件
	'TMPL_ACTION_SUCCESS' => 'Public:success',
);