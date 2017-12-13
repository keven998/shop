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
        <div class="right-product right-full">
            <div class="container-fluid">
                <div class="info-center">
                    <div class="page-header">
                        <div class="pull-left">
                            <h4>添加管理员</h4>     
                            <a href="javascript:history.go(-1)">
                                <button class="btn btn-default"><i class="fa fa-level-up"></i>返回</button>
                            </a> 
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="table-margin">
                        <form action="<?php echo U('admin/addUser');?>" class="form-horizontal" method="post">
                            <table class="table table-hover contact-template-form">
                                <tbody>
                                    <tr>
                                        <td width="20%" align="right">用户名：</td>
                                        <td>
                                            <input type="text" name="username" class="form-control w-300" placeholder="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="20%" align="right">登录密码：</td>
                                        <td>
                                            <input type="password" name="password" class="form-control w-300" placeholder="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="20%" align="right">确认密码：</td>
                                        <td>
                                            <input type="password" name="repassword" class="form-control w-300" placeholder="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="20%" align="right">所属角色：</td>
                                        <td>
                                            <select class="form-control w-300" name="rid">
                                                <?php if(is_array($role)): $i = 0; $__LIST__ = $role;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["remark"]); ?>(<?php echo ($vo["name"]); ?>)</option><?php endforeach; endif; else: echo "" ;endif; ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="20%" align="right">账户状态：</td>
                                        <td>
                                            <label class="radio-inline">
                                                <input type="radio" name="lock" id="inlineRadio1" value="0" checked> 正常
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="lock" id="inlineRadio2" value="1"> 冻结
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="20%"></td>
                                        <td>
                                            <button class="btn btn-primary">提 交</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>    
                        </form>
                    </div>
                </div>       
            </div>
        </div>
    </div>
    <script type="text/javascript" src="/Public/Admin/js/common.js"></script>
</body>
</html>