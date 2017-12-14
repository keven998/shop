<?php
return array(
    //*************************************附加设置***********************************
	'SHOW_PAGE_TRACE'        => false,                           // 是否显示调试面板
    'URL_CASE_INSENSITIVE'   => true,                            // URL不区分大小写
    'LOAD_EXT_CONFIG'        => 'db,web',                            // 加载网站设置文件
    'TMPL_PARSE_STRING'      => array(                           // 定义常用路径
        '__HOME_CSS__'       => __ROOT__.'/Public/Home/css',
        '__HOME_JS__'        => __ROOT__.'/Public/Home/js',
        '__HOME_IMAGES__'    => __ROOT__.'/Public/Home/images',
        '__ADMIN_CSS__'      => __ROOT__.'/Public/Admin/css',
        '__ADMIN_JS__'       => __ROOT__.'/Public/Admin/js',
        '__ADMIN_IMAGES__'   => __ROOT__.'/Public/Admin/images',
        '__ADMIN_PLUGINS__'  => __ROOT__.'/Public/Admin/plugins',
        '__MOBILE_CSS__'     => __ROOT__.'/Public/Mobile/css',
        '__MOBILE_JS__'      => __ROOT__.'/Public/Mobile/js',
        '__MOBILE_IMAGES__'  => __ROOT__.'/Public/Mobile/images',
        '__COM_JS__'         => __ROOT__.'/Public/COM/js',   
        '__COM_CSS__'        => __ROOT__.'/Public/COM/css',   
        '__COM_IMAGES__'     => __ROOT__.'/Public/COM/images',   
    ),


    'DATA_BACKUP_PATH'       => './Data/',     
    'DATA_BACKUP_PART_SIZE'  => '20971520',
    'DATA_BACKUP_COMPRESS'   =>  1,
    'DATA_BACKUP_COMPRESS_LEVEL' => 9,

    'image_upload_limit_size' => 1024 * 1024 * 5,//上传图片大小限制


    //***********************************表单令牌设置************************************
    'TOKEN_ON'              =>    true,  // 是否开启令牌验证 默认关闭
    'TOKEN_NAME'            =>    '__hash__',    // 令牌验证的表单隐藏字段名称，默认为__hash__
    'TOKEN_TYPE'            =>    'md5',  //令牌哈希验证规则 默认为MD5
    'TOKEN_RESET'           =>    true,  //令牌验证出错后是否重置令牌 默认为true 




    //***********************************URL设置**************************************
    'MODULE_ALLOW_LIST'     => array('Home','Admin','Mobile','Api', 'Wechat'),    //允许访问列表
    'DEFAULT_MODULE'        => 'Home',
    'URL_MODEL'             => 2,



    // ***********************************子域名配置**************************************
    'APP_SUB_DOMAIN_DEPLOY' => 1,
    'APP_SUB_DOMAIN_RULES'  => array(
        'admin'      => 'Admin',
        'm'      => 'Mobile',
        'api'    => 'Api',
        'wx'    => 'Wechat',
    ),
    'URL_DOMAIN_ROOT'        => 'shop.com',

    //***********************************邮件服务器**********************************
    'EMAIL_FROM_NAME'        => '',   // 发件人
    'EMAIL_SMTP'             => '',   // smtp
    'EMAIL_USERNAME'         => '',   // 账号
    'EMAIL_PASSWORD'         => '',   // 密码  注意: 163和QQ邮箱是授权码；不是登录的密码
    'EMAIL_SMTP_SECURE'      => '',   // 链接方式 如果使用QQ邮箱；需要把此项改为  ssl
    'EMAIL_PORT'             => '25', // 端口 如果使用QQ邮箱；需要把此项改为  465


    
    //*********************************微信支付******************************************
    'WEIXINPAY_CONFIG'       => array(
        'APPID'              => 'wx7aadb9138a54e8c6', // 微信支付APPID
        'MCHID'              => '1337571401', // 微信支付MCHID 商户收款账号
        'KEY'                => '3d7de1271f74a2be17b01ebc25cc5322', // 微信支付KEY
        'APPSECRET'          => 'd4624c36b6795d1d99dcf0547af5443d',  //公众帐号secert
        'NOTIFY_URL'         => 'http://m.ksandmen.com/hotel/notify/', // 接收支付状态的连接
        'TOKEN'              =>  'ANTIPHON'
        ),



    //*********************************个推******************************************
    'IGt'                    => array(
        'HOST'               => 'http://sdk.open.api.igexin.com/apiex.htm',
        'APPKEY'             => 'orx6EDffPC9ePo1yvtxj22',
        'APPID'              => '2M7WiJskFn8r1k0EqQuik6',
        'MASTERSECRET'       => 'uAJGMajExZA1LNNUF8KdF3'
        ),
    'ORDER_STATUS' => array(
        0 => '待确认',
        1 => '已确认',
        2 => '已收货',
        3 => '已取消',                
        4 => '已完成',//评价完
        5 => '已作废',
    ),
    'SHIPPING_STATUS' => array(
        0 => '未发货',
        1 => '已发货',
        2 => '部分发货'         
    ),
    'PAY_STATUS' => array(
        0 => '未支付',
        1 => '已支付',
    ),
    'SEX' => array(
        0 => '保密',
        1 => '男',
        2 => '女'
    ),
    'COUPON_TYPE' => array(
        0 => '面额模板',
        1 => '按用户发放',           
        2 => '注册发放',
        3 => '邀请发放',
        4 => '线下发放' 
    ),
    'PROM_TYPE' => array(
        0 => '默认',
        1 => '抢购',
        2 => '团购',
        3 => '优惠'           
    ),
);