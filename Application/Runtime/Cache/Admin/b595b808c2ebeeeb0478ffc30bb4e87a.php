<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <link rel="shortcut icon" href="/Public/Admin/images/favicon.png" type="image/x-icon">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1, user-scalable=no">
<link href="/Public/Admin/css/bootstrap.min.css" title="" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="/Public/COM/css/font-awesome.min.css">
<link title="blue" href="/Public/Admin/css/dermadefault.css" rel="stylesheet" type="text/css"/>
<link href="/Public/Admin/css/templatecss.css" rel="stylesheet" title="" type="text/css" />
<link title="" href="/Public/Admin/css/style.css" rel="stylesheet" type="text/css"  />
<script src="/Public/Admin/js/jquery-1.10.2.js"></script>
<script src="/Public/Admin/js/bootstrap.min.js" type="text/javascript"></script>
<script type="text/javascript" src="/Public/COM/js/layer.js"></script>
<title>管理控制台</title>
</head>
<body>
    <nav class="nav navbar-default navbar-mystyle navbar-fixed-top">
    <div class="navbar-header">
        <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> 
            <span class="icon-bar"></span> 
            <span class="icon-bar"></span> 
            <span class="icon-bar"></span> 
        </button>
        <a class="navbar-brand mystyle-brand li-border" href="http://www.<?php echo (C("URL_DOMAIN_ROOT")); ?>" target="_blank"><span class="glyphicon glyphicon-home"></span></a>
    </div>
    <div class="collapse navbar-collapse">
        <ul class="nav navbar-nav">
            <li class="li-border topbar-home-link"><a class="mystyle-color" href="<?php echo U('Admin/Index/index');?>">管理控制台</a></li>
        </ul>
        <ul class="nav navbar-nav pull-right">
            <li class="li-border">
                <a href="#" class="mystyle-color">
                    <span class="glyphicon glyphicon-bell"></span>
                    <span class="topbar-num">0</span>
                </a>
            </li>
            <li class="dropdown li-border"><a href="#" class="dropdown-toggle mystyle-color" data-toggle="dropdown">您好，<?php echo ($admin["username"]); ?><span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="<?php echo U('public/logout');?>">退出</a></li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
    <div class="down-main">
        <div class="left-main left-full">
            <div class="sidebar-fold"><span class="glyphicon glyphicon-menu-hamburger"></span></div>
            <div class="subNavBox">
    <div class="sBox">
        <div class="subNav <?php if(strtolower(CONTROLLER_NAME)== 'admin' ): ?>sublist-up<?php else: ?>sublist-down<?php endif; ?>">
            <span class="title-icon glyphicon <?php if(strtolower(CONTROLLER_NAME)== 'admin' ): ?>glyphicon-chevron-down<?php else: ?>glyphicon-chevron-right<?php endif; ?>"></span>
            <span class="sublist-title">管理管理</span>
        </div>
        <ul class="navContent" <?php if(strtolower(CONTROLLER_NAME)== 'admin' ): ?>style="display:block"<?php else: ?>style="display:none"<?php endif; ?>>
            <li <?php if((strtolower(CONTROLLER_NAME)== 'admin') and (strtolower(ACTION_NAME)== 'index') ): ?>class="active"<?php endif; ?>>
                <div class="showtitle" style="width:100px;">
                    <img src="/Public/Admin/images/leftimg.png" />管理员列表
                </div>
                <a href="<?php echo U('admin/index');?>">
                    <span class="sublist-icon glyphicon glyphicon-record"></span>
                    <span class="sub-title">管理员列表</span>
                </a> 
            </li>
            <!--<li <?php if((strtolower(CONTROLLER_NAME)== 'admin') and (strtolower(ACTION_NAME)== 'role') ): ?>class="active"<?php endif; ?>>
                <div class="showtitle" style="width:100px;">
                    <img src="/Public/Admin/images/leftimg.png" />角色管理
                </div>
                <a href="<?php echo U('admin/role');?>">
                    <span class="sublist-icon glyphicon glyphicon-record"></span>
                    <span class="sub-title">角色管理</span>
                </a> 
            </li>
            <li <?php if((strtolower(CONTROLLER_NAME)== 'admin') and (strtolower(ACTION_NAME)== 'node') ): ?>class="active"<?php endif; ?>>
                <div class="showtitle" style="width:100px;">
                    <img src="/Public/Admin/images/leftimg.png" />节点管理
                </div>
                <a href="<?php echo U('admin/node');?>">
                    <span class="sublist-icon glyphicon glyphicon-record"></span>
                    <span class="sub-title">节点管理</span>
                </a> 
            </li>-->
        </ul>
    </div>
    <div class="sBox">
        <div class="subNav <?php if(strtolower(CONTROLLER_NAME)== 'user' ): ?>sublist-up<?php else: ?>sublist-down<?php endif; ?>">
            <span class="title-icon glyphicon <?php if(strtolower(CONTROLLER_NAME)== 'user' ): ?>glyphicon-chevron-down<?php else: ?>glyphicon-chevron-right<?php endif; ?>"></span>
            <span class="sublist-title">会员管理</span>
        </div>
        <ul class="navContent" <?php if(strtolower(CONTROLLER_NAME)== 'user' ): ?>style="display:block"<?php else: ?>style="display:none"<?php endif; ?>>
            <li <?php if((strtolower(CONTROLLER_NAME)== 'user') and (strtolower(ACTION_NAME)== 'index') ): ?>class="active"<?php endif; ?>>
                <div class="showtitle" style="width:100px;">
                    <img src="/Public/Admin/images/leftimg.png" />会员列表
                </div>
                <a href="<?php echo U('user/index');?>">
                    <span class="sublist-icon glyphicon glyphicon-record"></span>
                    <span class="sub-title">会员列表</span>
                </a> 
            </li>
            <li <?php if((strtolower(CONTROLLER_NAME)== 'user') and (strtolower(ACTION_NAME)== 'rank') ): ?>class="active"<?php endif; ?>>
                <div class="showtitle" style="width:100px;">
                    <img src="/Public/Admin/images/leftimg.png" />会员等级
                </div>
                <a href="<?php echo U('user/rank');?>">
                    <span class="sublist-icon glyphicon glyphicon-record"></span>
                    <span class="sub-title">会员等级</span>
                </a> 
            </li>
            <li <?php if((strtolower(CONTROLLER_NAME)== 'user') and (strtolower(ACTION_NAME)== 'recharge') ): ?>class="active"<?php endif; ?>>
                <div class="showtitle" style="width:100px;">
                    <img src="/Public/Admin/images/leftimg.png" />充值记录
                </div>
                <a href="<?php echo U('user/recharge');?>">
                    <span class="sublist-icon glyphicon glyphicon-record"></span>
                    <span class="sub-title">充值记录</span>
                </a> 
            </li>
            <li <?php if((strtolower(CONTROLLER_NAME)== 'user') and (strtolower(ACTION_NAME)== 'withdraw') ): ?>class="active"<?php endif; ?>>
                <div class="showtitle" style="width:100px;">
                    <img src="/Public/Admin/images/leftimg.png" />提现申请
                </div>
                <a href="<?php echo U('user/withdraw');?>">
                    <span class="sublist-icon glyphicon glyphicon-record"></span>
                    <span class="sub-title">提现申请</span>
                </a> 
            </li>
            <li <?php if((strtolower(CONTROLLER_NAME)== 'user') and (strtolower(ACTION_NAME)== 'remittance') ): ?>class="active"<?php endif; ?>>
                <div class="showtitle" style="width:100px;">
                    <img src="/Public/Admin/images/leftimg.png" />汇款记录
                </div>
                <a href="<?php echo U('user/remittance');?>">
                    <span class="sublist-icon glyphicon glyphicon-record"></span>
                    <span class="sub-title">汇款记录</span>
                </a> 
            </li>
        </ul>
    </div>
    <div class="sBox">
        <div class="subNav <?php if(strtolower(CONTROLLER_NAME)== 'goods' ): ?>sublist-up<?php else: ?>sublist-down<?php endif; ?>">
            <span class="title-icon glyphicon <?php if(strtolower(CONTROLLER_NAME)== 'goods' ): ?>glyphicon-chevron-down<?php else: ?>glyphicon-chevron-right<?php endif; ?>"></span>
            <span class="sublist-title">商品管理</span>
        </div>
        <ul class="navContent" <?php if(strtolower(CONTROLLER_NAME)== 'goods' ): ?>style="display:block"<?php else: ?>style="display:none"<?php endif; ?>>
            <li <?php if((strtolower(CONTROLLER_NAME)== 'goods') and (strtolower(ACTION_NAME)== 'category') ): ?>class="active"<?php endif; ?>>
                <div class="showtitle" style="width:100px;">
                    <img src="/Public/Admin/images/leftimg.png" />商品分类
                </div>
                <a href="<?php echo U('goods/category');?>">
                    <span class="sublist-icon glyphicon glyphicon-record"></span>
                    <span class="sub-title">商品分类</span>
                </a> 
            </li>
            <li <?php if((strtolower(CONTROLLER_NAME)== 'goods') and (strtolower(ACTION_NAME)== 'index') ): ?>class="active"<?php endif; ?>>
                <div class="showtitle" style="width:100px;">
                    <img src="/Public/Admin/images/leftimg.png" />商品列表
                </div>
                <a href="<?php echo U('goods/index');?>">
                    <span class="sublist-icon glyphicon glyphicon-record"></span>
                    <span class="sub-title">商品列表</span>
                </a> 
            </li>
            <li <?php if((strtolower(CONTROLLER_NAME)== 'goods') and (strtolower(ACTION_NAME)== 'goodstypelist') ): ?>class="active"<?php endif; ?>>
                <div class="showtitle" style="width:100px;">
                    <img src="/Public/Admin/images/leftimg.png" />商品类型
                </div>
                <a href="<?php echo U('goods/goodsTypeList');?>">
                    <span class="sublist-icon glyphicon glyphicon-record"></span>
                    <span class="sub-title">商品类型</span>
                </a> 
            </li>
            <li <?php if((strtolower(CONTROLLER_NAME)== 'goods') and (strtolower(ACTION_NAME)== 'speclist') ): ?>class="active"<?php endif; ?>>
                <div class="showtitle" style="width:100px;">
                    <img src="/Public/Admin/images/leftimg.png" />商品规格
                </div>
                <a href="<?php echo U('goods/specList');?>">
                    <span class="sublist-icon glyphicon glyphicon-record"></span>
                    <span class="sub-title">商品规格</span>
                </a> 
            </li>
            <li <?php if((strtolower(CONTROLLER_NAME)== 'goods') and (strtolower(ACTION_NAME)== 'goodsattributelist') ): ?>class="active"<?php endif; ?>>
                <div class="showtitle" style="width:100px;">
                    <img src="/Public/Admin/images/leftimg.png" />商品属性
                </div>
                <a href="<?php echo U('goods/goodsAttributeList');?>">
                    <span class="sublist-icon glyphicon glyphicon-record"></span>
                    <span class="sub-title">商品属性</span>
                </a> 
            </li>
            <li <?php if((strtolower(CONTROLLER_NAME)== 'goods') and (strtolower(ACTION_NAME)== 'brand') ): ?>class="active"<?php endif; ?>>
                <div class="showtitle" style="width:100px;">
                    <img src="/Public/Admin/images/leftimg.png" />品牌列表
                </div>
                <a href="<?php echo U('goods/brand');?>">
                    <span class="sublist-icon glyphicon glyphicon-record"></span>
                    <span class="sub-title">品牌列表</span>
                </a> 
            </li>
            <li <?php if((strtolower(CONTROLLER_NAME)== 'goods') and (strtolower(ACTION_NAME)== 'comment') ): ?>class="active"<?php endif; ?>>
                <div class="showtitle" style="width:100px;">
                    <img src="/Public/Admin/images/leftimg.png" />商品评论
                </div>
                <a href="<?php echo U('goods/comment');?>">
                    <span class="sublist-icon glyphicon glyphicon-record"></span>
                    <span class="sub-title">商品评论</span>
                </a> 
            </li>
        </ul>
    </div>
    <div class="sBox">
        <div class="subNav <?php if(strtolower(CONTROLLER_NAME)== 'order' ): ?>sublist-up<?php else: ?>sublist-down<?php endif; ?>">
            <span class="title-icon glyphicon <?php if(strtolower(CONTROLLER_NAME)== 'order' ): ?>glyphicon-chevron-down<?php else: ?>glyphicon-chevron-right<?php endif; ?>"></span>
            <span class="sublist-title">订单管理</span>
        </div>
        <ul class="navContent" <?php if(strtolower(CONTROLLER_NAME)== 'order' ): ?>style="display:block"<?php else: ?>style="display:none"<?php endif; ?>>
            <li <?php if((strtolower(CONTROLLER_NAME)== 'order') and (strtolower(ACTION_NAME)== 'index') ): ?>class="active"<?php endif; ?>>
                <div class="showtitle" style="width:100px;">
                    <img src="/Public/Admin/images/leftimg.png" />订单列表
                </div>
                <a href="<?php echo U('order/index');?>">
                    <span class="sublist-icon glyphicon glyphicon-record"></span>
                    <span class="sub-title">订单列表</span>
                </a> 
            </li>
            <li <?php if((strtolower(CONTROLLER_NAME)== 'order') and (strtolower(ACTION_NAME)== 'delivery') ): ?>class="active"<?php endif; ?>>
                <div class="showtitle" style="width:100px;">
                    <img src="/Public/Admin/images/leftimg.png" />发货单
                </div>
                <a href="<?php echo U('order/delivery');?>">
                    <span class="sublist-icon glyphicon glyphicon-record"></span>
                    <span class="sub-title">发货单</span>
                </a> 
            </li>
            <li <?php if((strtolower(CONTROLLER_NAME)== 'order') and (strtolower(ACTION_NAME)== 'returnlist') ): ?>class="active"<?php endif; ?>>
                <div class="showtitle" style="width:100px;">
                    <img src="/Public/Admin/images/leftimg.png" />退货单
                </div>
                <a href="<?php echo U('order/returnList');?>">
                    <span class="sublist-icon glyphicon glyphicon-record"></span>
                    <span class="sub-title">退货单</span>
                </a> 
            </li>
        </ul>
    </div>
    <div class="sBox">
        <div class="subNav <?php if(strtolower(CONTROLLER_NAME)== 'promotion' ): ?>sublist-up<?php else: ?>sublist-down<?php endif; ?>">
            <span class="title-icon glyphicon <?php if(strtolower(CONTROLLER_NAME)== 'promotion' ): ?>glyphicon-chevron-down<?php else: ?>glyphicon-chevron-right<?php endif; ?>"></span>
            <span class="sublist-title">促销管理</span>
        </div>
        <ul class="navContent" <?php if(strtolower(CONTROLLER_NAME)== 'promotion' ): ?>style="display:block"<?php else: ?>style="display:none"<?php endif; ?>>
            <li <?php if((strtolower(CONTROLLER_NAME)== 'promotion') and (strtolower(ACTION_NAME)== 'flash') ): ?>class="active"<?php endif; ?>>
                <div class="showtitle" style="width:100px;">
                    <img src="/Public/Admin/images/leftimg.png" />抢购管理
                </div>
                <a href="<?php echo U('promotion/flash');?>">
                    <span class="sublist-icon glyphicon glyphicon-record"></span>
                    <span class="sub-title">抢购管理</span>
                </a> 
            </li>
            <li <?php if((strtolower(CONTROLLER_NAME)== 'promotion') and (strtolower(ACTION_NAME)== 'prom') ): ?>class="active"<?php endif; ?>>
                <div class="showtitle" style="width:100px;">
                    <img src="/Public/Admin/images/leftimg.png" />商品促销
                </div>
                <a href="<?php echo U('promotion/prom');?>">
                    <span class="sublist-icon glyphicon glyphicon-record"></span>
                    <span class="sub-title">商品促销</span>
                </a> 
            </li>
            <li <?php if((strtolower(CONTROLLER_NAME)== 'promotion') and (strtolower(ACTION_NAME)== 'groupbuy') ): ?>class="active"<?php endif; ?>>
                <div class="showtitle" style="width:100px;">
                    <img src="/Public/Admin/images/leftimg.png" />团购管理
                </div>
                <a href="<?php echo U('promotion/groupBuy');?>">
                    <span class="sublist-icon glyphicon glyphicon-record"></span>
                    <span class="sub-title">团购管理</span>
                </a> 
            </li>
            <li <?php if((strtolower(CONTROLLER_NAME)== 'promotion') and (strtolower(ACTION_NAME)== 'order') ): ?>class="active"<?php endif; ?>>
                <div class="showtitle" style="width:100px;">
                    <img src="/Public/Admin/images/leftimg.png" />订单促销
                </div>
                <a href="<?php echo U('promotion/order');?>">
                    <span class="sublist-icon glyphicon glyphicon-record"></span>
                    <span class="sub-title">订单促销</span>
                </a> 
            </li>
            <li <?php if((strtolower(CONTROLLER_NAME)== 'promotion') and (strtolower(ACTION_NAME)== 'coupon') ): ?>class="active"<?php endif; ?>>
                <div class="showtitle" style="width:100px;">
                    <img src="/Public/Admin/images/leftimg.png" />代金券管理
                </div>
                <a href="<?php echo U('promotion/coupon');?>">
                    <span class="sublist-icon glyphicon glyphicon-record"></span>
                    <span class="sub-title">代金券管理</span>
                </a> 
            </li>
        </ul>
    </div>
    <div class="sBox">
        <div class="subNav <?php if(strtolower(CONTROLLER_NAME)== 'ad' ): ?>sublist-up<?php else: ?>sublist-down<?php endif; ?>">
            <span class="title-icon glyphicon <?php if(strtolower(CONTROLLER_NAME)== 'ad' ): ?>glyphicon-chevron-down<?php else: ?>glyphicon-chevron-right<?php endif; ?>"></span>
            <span class="sublist-title">广告管理</span>
        </div>
        <ul class="navContent" <?php if(strtolower(CONTROLLER_NAME)== 'ad' ): ?>style="display:block"<?php else: ?>style="display:none"<?php endif; ?>>
            <li <?php if((strtolower(CONTROLLER_NAME)== 'ad') and (strtolower(ACTION_NAME)== 'index') ): ?>class="active"<?php endif; ?>>
                <div class="showtitle" style="width:100px;">
                    <img src="/Public/Admin/images/leftimg.png" />广告列表
                </div>
                <a href="<?php echo U('ad/index');?>">
                    <span class="sublist-icon glyphicon glyphicon-record"></span>
                    <span class="sub-title">广告列表</span>
                </a> 
            </li>
            <li <?php if((strtolower(CONTROLLER_NAME)== 'ad') and (strtolower(ACTION_NAME)== 'position') ): ?>class="active"<?php endif; ?>>
                <div class="showtitle" style="width:100px;">
                    <img src="/Public/Admin/images/leftimg.png" />广告位置
                </div>
                <a href="<?php echo U('ad/position');?>">
                    <span class="sublist-icon glyphicon glyphicon-record"></span>
                    <span class="sub-title">广告位置</span>
                </a> 
            </li>
        </ul>
    </div>
    <div class="sBox">
        <div class="subNav <?php if(strtolower(CONTROLLER_NAME)== 'article' ): ?>sublist-up<?php else: ?>sublist-down<?php endif; ?>">
            <span class="title-icon glyphicon <?php if(strtolower(CONTROLLER_NAME)== 'article' ): ?>glyphicon-chevron-down<?php else: ?>glyphicon-chevron-right<?php endif; ?>"></span>
            <span class="sublist-title">内容管理</span>
        </div>
        <ul class="navContent" <?php if(strtolower(CONTROLLER_NAME)== 'article' ): ?>style="display:block"<?php else: ?>style="display:none"<?php endif; ?>>
            <li <?php if((strtolower(CONTROLLER_NAME)== 'article') and (strtolower(ACTION_NAME)== 'index') ): ?>class="active"<?php endif; ?>>
                <div class="showtitle" style="width:100px;">
                    <img src="/Public/Admin/images/leftimg.png" />内容管理
                </div>
                <a href="<?php echo U('article/index');?>">
                    <span class="sublist-icon glyphicon glyphicon-record"></span>
                    <span class="sub-title">内容管理</span>
                </a> 
            </li>
            <li <?php if((strtolower(CONTROLLER_NAME)== 'article') and (strtolower(ACTION_NAME)== 'category') ): ?>class="active"<?php endif; ?>>
                <div class="showtitle" style="width:100px;">
                    <img src="/Public/Admin/images/leftimg.png" />文章分类
                </div>
                <a href="<?php echo U('article/category');?>">
                    <span class="sublist-icon glyphicon glyphicon-record"></span>
                    <span class="sub-title">文章分类</span>
                </a> 
            </li>
        </ul>
    </div>
    <div class="sBox">
        <div class="subNav <?php if(strtolower(CONTROLLER_NAME)== 'wechat' ): ?>sublist-up<?php else: ?>sublist-down<?php endif; ?>">
            <span class="title-icon glyphicon <?php if(strtolower(CONTROLLER_NAME)== 'wechat' ): ?>glyphicon-chevron-down<?php else: ?>glyphicon-chevron-right<?php endif; ?>"></span>
            <span class="sublist-title">微信管理</span>
        </div>
        <ul class="navContent" <?php if(strtolower(CONTROLLER_NAME)== 'wechat' ): ?>style="display:block"<?php else: ?>style="display:none"<?php endif; ?>>
            <li <?php if((strtolower(CONTROLLER_NAME)== 'wechat') and (strtolower(ACTION_NAME)== 'menu') ): ?>class="active"<?php endif; ?>>
                <div class="showtitle" style="width:100px;">
                    <img src="/Public/Admin/images/leftimg.png" />菜单管理
                </div>
                <a href="<?php echo U('wechat/menu');?>">
                    <span class="sublist-icon glyphicon glyphicon-record"></span>
                    <span class="sub-title">菜单管理</span>
                </a> 
            </li>
            <li <?php if((strtolower(CONTROLLER_NAME)== 'wechat') and (strtolower(ACTION_NAME)== 'text') ): ?>class="active"<?php endif; ?>>
                <div class="showtitle" style="width:100px;">
                    <img src="/Public/Admin/images/leftimg.png" />关键词回复
                </div>
                <a href="<?php echo U('wechat/text');?>">
                    <span class="sublist-icon glyphicon glyphicon-record"></span>
                    <span class="sub-title">关键词回复</span>
                </a> 
            </li>
        </ul>
    </div>
    <div class="sBox">
        <div class="subNav <?php if(strtolower(CONTROLLER_NAME)== 'system' ): ?>sublist-up<?php else: ?>sublist-down<?php endif; ?>">
            <span class="title-icon glyphicon <?php if(strtolower(CONTROLLER_NAME)== 'system' ): ?>glyphicon-chevron-down<?php else: ?>glyphicon-chevron-right<?php endif; ?>"></span>
            <span class="sublist-title">系统设置</span>
        </div>
        <ul class="navContent" <?php if(strtolower(CONTROLLER_NAME)== 'system' ): ?>style="display:block"<?php else: ?>style="display:none"<?php endif; ?>>
            <li <?php if((strtolower(CONTROLLER_NAME)== 'system') and (strtolower(ACTION_NAME)== 'index') ): ?>class="active"<?php endif; ?>>
                <div class="showtitle" style="width:100px;">
                    <img src="/Public/Admin/images/leftimg.png" />网站设置
                </div>
                <a href="<?php echo U('system/index');?>">
                    <span class="sublist-icon glyphicon glyphicon-record"></span>
                    <span class="sub-title">网站设置</span>
                </a> 
            </li>
            <li <?php if((strtolower(CONTROLLER_NAME)== 'system') and (strtolower(ACTION_NAME)== 'friendlink') ): ?>class="active"<?php endif; ?>>
                <div class="showtitle" style="width:100px;">
                    <img src="/Public/Admin/images/leftimg.png" />友情链接
                </div>
                <a href="<?php echo U('system/friendlink');?>">
                    <span class="sublist-icon glyphicon glyphicon-record"></span>
                    <span class="sub-title">友情链接</span>
                </a> 
            </li>
            <li <?php if((strtolower(CONTROLLER_NAME)== 'system') and (strtolower(ACTION_NAME)== 'region') ): ?>class="active"<?php endif; ?>>
                <div class="showtitle" style="width:100px;">
                    <img src="/Public/Admin/images/leftimg.png" />区域管理
                </div>
                <a href="<?php echo U('system/region');?>">
                    <span class="sublist-icon glyphicon glyphicon-record"></span>
                    <span class="sub-title">区域管理</span>
                </a> 
            </li>
            <li <?php if((strtolower(CONTROLLER_NAME)== 'system') and (strtolower(ACTION_NAME)== 'payment') ): ?>class="active"<?php endif; ?>>
                <div class="showtitle" style="width:100px;">
                    <img src="/Public/Admin/images/leftimg.png" />支付方式
                </div>
                <a href="<?php echo U('system/payment');?>">
                    <span class="sublist-icon glyphicon glyphicon-record"></span>
                    <span class="sub-title">支付方式</span>
                </a> 
            </li>
            <li <?php if((strtolower(CONTROLLER_NAME)== 'system') and (strtolower(ACTION_NAME)== 'shipping') ): ?>class="active"<?php endif; ?>>
                <div class="showtitle" style="width:100px;">
                    <img src="/Public/Admin/images/leftimg.png" />配送方式
                </div>
                <a href="<?php echo U('system/shipping');?>">
                    <span class="sublist-icon glyphicon glyphicon-record"></span>
                    <span class="sub-title">配送方式</span>
                </a> 
            </li>
        </ul>
    </div>
    <div class="sBox">
        <div class="subNav <?php if(strtolower(CONTROLLER_NAME)== 'database' ): ?>sublist-up<?php else: ?>sublist-down<?php endif; ?>">
            <span class="title-icon glyphicon <?php if(strtolower(CONTROLLER_NAME)== 'database' ): ?>glyphicon-chevron-down<?php else: ?>glyphicon-chevron-right<?php endif; ?>"></span>
            <span class="sublist-title">数据管理</span>
        </div>
        <ul class="navContent" <?php if(strtolower(CONTROLLER_NAME)== 'database' ): ?>style="display:block"<?php else: ?>style="display:none"<?php endif; ?>>
            <li <?php if((strtolower(CONTROLLER_NAME)== 'database') and (strtolower(ACTION_NAME)== 'index') ): ?>class="active"<?php endif; ?>>
                <div class="showtitle" style="width:100px;">
                    <img src="/Public/Admin/images/leftimg.png" />数据备份
                </div>
                <a href="<?php echo U('database/index');?>">
                    <span class="sublist-icon glyphicon glyphicon-record"></span>
                    <span class="sub-title">数据备份</span>
                </a> 
            </li>
            <li <?php if((strtolower(CONTROLLER_NAME)== 'database') and (strtolower(ACTION_NAME)== 'restore') ): ?>class="active"<?php endif; ?>>
                <div class="showtitle" style="width:100px;">
                    <img src="/Public/Admin/images/leftimg.png" />数据还原
                </div>
                <a href="<?php echo U('database/restore');?>">
                    <span class="sublist-icon glyphicon glyphicon-record"></span>
                    <span class="sub-title">数据还原</span>
                </a> 
            </li>
        </ul>
    </div>
    <div class="sBox">
        <div class="subNav <?php if(strtolower(CONTROLLER_NAME)== 'report' ): ?>sublist-up<?php else: ?>sublist-down<?php endif; ?>">
            <span class="title-icon glyphicon <?php if(strtolower(CONTROLLER_NAME)== 'report' ): ?>glyphicon-chevron-down<?php else: ?>glyphicon-chevron-right<?php endif; ?>"></span>
            <span class="sublist-title">统计报表</span>
        </div>
        <ul class="navContent" <?php if(strtolower(CONTROLLER_NAME)== 'report' ): ?>style="display:block"<?php else: ?>style="display:none"<?php endif; ?>>
            <li <?php if((strtolower(CONTROLLER_NAME)== 'report') and (strtolower(ACTION_NAME)== 'index') ): ?>class="active"<?php endif; ?>>
                <div class="showtitle" style="width:100px;">
                    <img src="/Public/Admin/images/leftimg.png" />销售概况
                </div>
                <a href="<?php echo U('report/index');?>">
                    <span class="sublist-icon glyphicon glyphicon-record"></span>
                    <span class="sub-title">销售概况</span>
                </a> 
            </li>
            <li <?php if((strtolower(CONTROLLER_NAME)== 'report') and (strtolower(ACTION_NAME)== 'saletop') ): ?>class="active"<?php endif; ?>>
                <div class="showtitle" style="width:100px;">
                    <img src="/Public/Admin/images/leftimg.png" />销售排行
                </div>
                <a href="<?php echo U('report/saletop');?>">
                    <span class="sublist-icon glyphicon glyphicon-record"></span>
                    <span class="sub-title">销售排行</span>
                </a> 
            </li>
            <li <?php if((strtolower(CONTROLLER_NAME)== 'report') and (strtolower(ACTION_NAME)== 'user') ): ?>class="active"<?php endif; ?>>
                <div class="showtitle" style="width:100px;">
                    <img src="/Public/Admin/images/leftimg.png" />会员统计
                </div>
                <a href="<?php echo U('report/user');?>">
                    <span class="sublist-icon glyphicon glyphicon-record"></span>
                    <span class="sub-title">会员统计</span>
                </a> 
            </li>
            <li <?php if((strtolower(CONTROLLER_NAME)== 'report') and (strtolower(ACTION_NAME)== 'finance') ): ?>class="active"<?php endif; ?>>
                <div class="showtitle" style="width:100px;">
                    <img src="/Public/Admin/images/leftimg.png" />财务统计
                </div>
                <a href="<?php echo U('report/finance');?>">
                    <span class="sublist-icon glyphicon glyphicon-record"></span>
                    <span class="sub-title">财务统计</span>
                </a> 
            </li>
        </ul>
    </div>
</div>
        </div>
        <div class="right-product my-index right-full">
            <div class="container-fluid">
                <div class="info-center">
                    <div class="info-title clearfix">
                        <div class="pull-left">
                            <h4 style="padding-top: 20px;"><strong><?php echo ($admin["username"]); ?>，欢迎您登录管理系统！</strong></h4>
                        </div>
                        <div class="time-title pull-right">
                            <div class="year-month pull-left">
                                <p class="week"><?php echo ($sys_info["week"]); ?></p>
                                <p><span><?php echo ($sys_info["year"]); ?></span>年<em><?php echo ($sys_info["month"]); ?></em></p>
                            </div>
                            <div class="hour-minute pull-right">
                                <strong><?php echo ($sys_info["time"]); ?></strong>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="content-list">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="content">
                                    <div class="w30 left-icon pull-left">
                                        <span class="glyphicon glyphicon-file blue"></span>
                                    </div>
                                    <div class="w70 right-title pull-right">
                                        <div class="title-content">
                                            <p>今天新增订单数</p>
                                            <h3 class="number">0</h3>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="content">
                                    <div class="w30 left-icon pull-left">
                                        <span class="glyphicon glyphicon-file orange"></span>
                                    </div>
                                    <div class="w70 right-title pull-right">
                                        <div class="title-content">
                                            <p>今日新增会员数</p>
                                            <h3 class="number">?</h3>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="content">
                                    <div class="w30 left-icon pull-left">
                                        <span class="glyphicon glyphicon-file green"></span>
                                    </div>
                                    <div class="w70 right-title pull-right">
                                        <div class="title-content">
                                            <p>今日待审核评论数</p>
                                            <h3 class="number">?</h3>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="content">
                                    <div class="w30 left-icon pull-left">
                                        <span class="glyphicon glyphicon-file violet"></span>
                                    </div>
                                    <div class="w70 right-title pull-right">
                                        <div class="title-content">
                                            <p>今日访问量</p>
                                            <h3 class="number">?</h3>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row mtop-10">
                            <div class="col-md-3 section_select">
                                <a href="">
                                    <i class="ice ice_y"></i>
                                    <div class="t">待处理订单</div>
                                    <span class="number">5</span>
                                </a>
                            </div>

                            <div class="col-md-3 section_select">
                                <a href="">
                                    <i class="ice ice_q"></i>
                                    <div class="t">商品数量</div>
                                    <span class="number">5</span>
                                </a>
                            </div>
                            <div class="col-md-3 section_select">
                                <a href="">
                                    <i class="ice ice_w"></i>
                                    <div class="t">文章数量</div>
                                    <span class="number">5</span>
                                </a>
                            </div>
                            <div class="col-md-3 section_select">
                                <a href="">
                                    <i class="ice ice_f"></i>
                                    <div class="t">会员总数</div>
                                    <span class="number">5</span>
                                </a>
                            </div>
                        </div>
                        <!-------信息列表------->
                        <div class="row newslist" style="margin-top:20px;">
                            <div class="col-md-8">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        操作日志
                                    </div>
                                    <?php if(is_array($action_log["action"])): foreach($action_log["action"] as $key=>$vo): ?><div class="panel-body">
                                        <div class="w50 pull-left text-left"><?php echo ($vo["log_info"]); ?></div>
                                        <div class="w25 pull-left text-center"><?php echo (date("Y年m月d日 H:i:s",$vo["log_time"])); ?></div>
                                        <div class="w25 pull-left text-right"><?php echo ($vo["log_ip"]); ?></div>
                                    </div><?php endforeach; endif; ?>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        登录记录
                                    </div>
                                    <?php if(is_array($action_log["login"])): foreach($action_log["login"] as $key=>$vo): ?><div class="panel-body">
                                        <div class="w50 pull-left text-left"><?php echo (date("Y年m月d日 H:i:s",$vo["log_time"])); ?></div>
                                        <div class="w50 pull-left text-right"><?php echo ($vo["log_ip"]); ?></div>
                                    </div><?php endforeach; endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="row newslist">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">版本信息</div>
                                    <div class="panel-body">
                                        <div class="w20 pull-left">程序版本:</div>
                                        <div class="w30 pull-left"><?php echo ($sys_info["version"]); ?></div>
                                        <div class="w20 pull-left">更新时间:</div>
                                        <div class="w30 pull-left">2017-09-30</div>
                                    </div>
                                    <div class="panel-body">
                                        <div class="w20 pull-left">程序开发:</div>
                                        <div class="w30 pull-left"><a href="https://www.zenghao.cc" target="_blank">Mr Jack</a></div>
                                        <div class="w20 pull-left">版本所有:</div>
                                        <div class="w30 pull-left">盗版必究</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row newslist">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        系统信息
                                    </div>
                                    <div class="panel-body">
                                        <div class="w20 pull-left">服务器操作系统:</div>
                                        <div class="w30 pull-left"><?php echo ($sys_info["os"]); ?></div>
                                        <div class="w20 pull-left">服务器域名/IP:</div>
                                        <div class="w30 pull-left"><span class="text-green-main"><?php echo ($sys_info["domain"]); ?> [ <?php echo ($sys_info["ip"]); ?> ]</span></div>
                                    </div>
                                    <div class="panel-body">
                                        <div class="w20 pull-left">服务器环境:</div>
                                        <div class="w30 pull-left"><?php echo ($sys_info["web_server"]); ?></div>
                                        <div class="w20 pull-left">PHP 版本:</div>
                                        <div class="w30 pull-left"><?php echo ($sys_info["phpv"]); ?></div>
                                    </div>
                                    <div class="panel-body">
                                        <div class="w20 pull-left">Mysql 版本:</div>
                                        <div class="w30 pull-left"><?php echo ($sys_info["mysql_version"]); ?></div>
                                        <div class="w20 pull-left">GD 版本:</div>
                                        <div class="w30 pull-left"><?php echo ($sys_info["gdinfo"]); ?></div>
                                    </div>
                                    <div class="panel-body">
                                        <div class="w20 pull-left">文件上传限制:</div>
                                        <div class="w30 pull-left"><?php echo ($sys_info["fileupload"]); ?></div>
                                        <div class="w20 pull-left">最大占用内存:</div>
                                        <div class="w30 pull-left"><?php echo ($sys_info["memory_limit"]); ?></div>
                                    </div>
                                    <div class="panel-body">
                                        <div class="w20 pull-left">最大执行时间:</div>
                                        <div class="w30 pull-left"><?php echo ($sys_info["set_time_limit"]); ?></div>
                                        <div class="w20 pull-left">安全模式:</div>
                                        <div class="w30 pull-left"><?php echo ($sys_info["safe_mode"]); ?></div>
                                    </div>
                                    <div class="panel-body">
                                        <div class="w20 pull-left">Zlib支持:</div>
                                        <div class="w30 pull-left"><?php echo ($sys_info["zlib"]); ?></div>
                                        <div class="w20 pull-left">Curl支持</div>
                                        <div class="w30 pull-left"><?php echo ($sys_info["curl"]); ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="/Public/Admin/js/common.js"></script>
    <script type="text/javascript">
        setInterval(function(){
            var myDate = new Date();
            //获取当前年
            var year=myDate.getFullYear();
            //获取当前月
            var month=myDate.getMonth()+1;
            //获取当前日
            var date=myDate.getDate();
            //获取当前小时数(0-23)
            var h = myDate.getHours();
            //获取当前分钟数(0-59)
            var m = myDate.getMinutes();
            //获取当前秒数(0-59)
            var s = myDate.getSeconds();
            var today = new Array('星期日','星期一','星期二','星期三','星期四','星期五','星期六');
            var week = today[myDate.getDay()];
            $('.year-month span').html(year);
            $('.year-month em').html(padZero(month)+'月'+padZero(date)+'日');
            $('.year-month .week').html(week);
            $('.hour-minute strong').html(padZero(h) +':'+ padZero(m) +':' + padZero(s));
        },1000);

        function padZero(num){
            return num < 10 ? '0'+ num : num;
        }
    </script>
</body>
</html>