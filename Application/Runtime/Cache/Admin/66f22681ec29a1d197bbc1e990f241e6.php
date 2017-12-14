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
    <script type="text/javascript">
        /*
         * 在线编辑器相 关配置 js 
         *  参考 地址 http://fex.baidu.com/ueditor/
         */
        window.UEDITOR_Admin_URL = "/Public/Admin/plugins/Ueditor/";
        var URL_upload = "<?php echo ($URL_upload); ?>";
        var URL_fileUp = "<?php echo ($URL_fileUp); ?>";
        var URL_scrawlUp = "<?php echo ($URL_scrawlUp); ?>";
        var URL_getRemoteImage = "<?php echo ($URL_getRemoteImage); ?>";
        var URL_imageManager = "<?php echo ($URL_imageManager); ?>";
        var URL_imageUp = "<?php echo ($URL_imageUp); ?>";
        var URL_getMovie = "<?php echo ($URL_getMovie); ?>";
        var URL_home = "<?php echo ($URL_home); ?>";
    </script>
    <script type="text/javascript" charset="utf-8" src="/Public/Admin/plugins/Ueditor/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="/Public/Admin/plugins/Ueditor/ueditor.all.min.js"> </script>
    <script type="text/javascript" charset="utf-8" src="/Public/Admin/plugins/Ueditor/lang/zh-cn/zh-cn.js"></script>
    <script type="text/javascript">  
      
        var editor;
        $(function () {
            //具体参数配置在  editor_config.js  中
            var options = {
                zIndex: 999,
                initialFrameWidth: "95%", //初化宽度
                initialFrameHeight: 400, //初化高度
                focus: false, //初始化时，是否让编辑器获得焦点true或false
                maximumWords: 99999, removeFormatAttributes: 'class,style,lang,width,height,align,hspace,valign'
                , //允许的最大字符数 'fullscreen',
                pasteplain: true, autoHeightEnabled: true,
                autotypeset: {
                    mergeEmptyline: true,        //合并空行
                    removeClass: true,           //去掉冗余的class
                    removeEmptyline: false,      //去掉空行
                    textAlign: "left",           //段落的排版方式，可以是 left,right,center,justify 去掉这个属性表示不执行排版
                    imageBlockLine: 'center',    //图片的浮动方式，独占一行剧中,左右浮动，默认: center,left,right,none 去掉这个属性表示不执行排版
                    pasteFilter: false,          //根据规则过滤没事粘贴进来的内容
                    clearFontSize: false,        //去掉所有的内嵌字号，使用编辑器默认的字号
                    clearFontFamily: false,      //去掉所有的内嵌字体，使用编辑器默认的字体
                    removeEmptyNode: false,      // 去掉空节点
                                                 //可以去掉的标签
                    removeTagNames: {"font": 1},
                    indent: false,               // 行首缩进
                    indentValue: '0em'           //行首缩进的大小
                },
                toolbars: [
                       ['fullscreen', 'source', '|', 'undo', 'redo',
                           '|', 'bold', 'italic', 'underline', 'fontborder',
                           'strikethrough', 'superscript', 'subscript',
                           'removeformat', 'formatmatch', 'autotypeset',
                           'blockquote', 'pasteplain', '|', 'forecolor',
                           'backcolor', 'insertorderedlist',
                           'insertunorderedlist', 'selectall', 'cleardoc', '|',
                           'rowspacingtop', 'rowspacingbottom', 'lineheight', '|',
                           'customstyle', 'paragraph', 'fontfamily', 'fontsize',
                           '|', 'directionalityltr', 'directionalityrtl',
                           'indent', '|', 'justifyleft', 'justifycenter',
                           'justifyright', 'justifyjustify', '|', 'touppercase',
                           'tolowercase', '|', 'link', 'unlink', 'anchor', '|',
                           'imagenone', 'imageleft', 'imageright', 'imagecenter',
                           '|', 'insertimage', 'emotion', 'insertvideo',
                           'attachment', 'map', 'gmap', 'insertframe',
                           'insertcode', 'webapp', 'pagebreak', 'template',
                           'background', '|', 'horizontal', 'date', 'time',
                           'spechars', 'wordimage', '|',
                           'inserttable', 'deletetable',
                           'insertparagraphbeforetable', 'insertrow', 'deleterow',
                           'insertcol', 'deletecol', 'mergecells', 'mergeright',
                           'mergedown', 'splittocells', 'splittorows',
                           'splittocols', '|', 'print', 'preview', 'searchreplace']
                   ]
            };
            editor = new UE.ui.Editor(options);
            editor.render("goods_content");  //  指定 textarea 的  id 为 goods_content

        }); 
    </script>
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
            <!--<li <?php if((strtolower(CONTROLLER_NAME)== 'goods') and (strtolower(ACTION_NAME)== 'brand') ): ?>class="active"<?php endif; ?>>
                <div class="showtitle" style="width:100px;">
                    <img src="/Public/Admin/images/leftimg.png" />品牌列表
                </div>
                <a href="<?php echo U('goods/brand');?>">
                    <span class="sublist-icon glyphicon glyphicon-record"></span>
                    <span class="sub-title">品牌列表</span>
                </a> 
            </li>-->
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
            <!--<li <?php if((strtolower(CONTROLLER_NAME)== 'system') and (strtolower(ACTION_NAME)== 'index') ): ?>class="active"<?php endif; ?>>
                <div class="showtitle" style="width:100px;">
                    <img src="/Public/Admin/images/leftimg.png" />网站设置
                </div>
                <a href="<?php echo U('system/index');?>">
                    <span class="sublist-icon glyphicon glyphicon-record"></span>
                    <span class="sub-title">网站设置</span>
                </a> 
            </li>-->
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
                    <div class="page-header clearfix">
                        <div class="pull-left">
                            <h4>添加商品</h4>     
                            <a href="javascript:history.go(-1)">
                                <button class="btn btn-default"><i class="fa fa-level-up"></i>返回</button>
                            </a> 
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="table-margin">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab_tongyong" data-toggle="tab">通用信息</a></li>
                            <li><a href="#tab_goods_images" data-toggle="tab">商品相册</a></li>
                            <li><a href="#tab_goods_spec" data-toggle="tab">商品规格</a></li>                        
                            <li><a href="#tab_goods_attr" data-toggle="tab">商品属性</a></li>                        
                        </ul>
                        <form action="<?php echo U('goods/editGoods');?>" class="form-horizontal" method="post">
                            <div class="tab-content">                     
                                <div class="tab-pane active" id="tab_tongyong">
                                    <table class="table contact-template-form">
                                        <tbody>
                                            <tr>
                                                <td width="20%" align="right">商品名称：</td>
                                                <td>
                                                    <input type="text" name="goods_name" value="<?php echo ($goodsInfo["goods_name"]); ?>" class="form-control w-300" placeholder="">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="20%" align="right">商品简介：</td>
                                                <td>
                                                    <textarea name="goods_remark" id="" class="form-control w-300"><?php echo ($goodsInfo["goods_remark"]); ?></textarea>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="20%" align="right">商品货号：</td>
                                                <td>
                                                    <input type="text" name="goods_sn" value="<?php echo ($goodsInfo["goods_sn"]); ?>" class="form-control w-300" placeholder="">
                                                </td>
                                            </tr>                                            
                                            <tr>
                                                <td width="20%" align="right">商品分类：</td>
                                                <td>
                                                    <select name="cat_id" id="" class="form-control w-300">
                                                        <option value="0">请选择商品分类</option>
                                                        <?php if(is_array($category)): foreach($category as $key=>$vo): ?><option value="<?php echo ($vo["cat_id"]); ?>" <?php if($vo['cat_id'] == $goodsInfo['cat_id']): ?>selected<?php endif; ?>><?php echo ($vo["html"]); echo ($vo["cat_name"]); ?></option><?php endforeach; endif; ?>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="20%" align="right">商品品牌：</td>
                                                <td>
                                                    <select name="brand_id" id="" class="form-control w-300">
                                                        <option value="0">所有品牌</option>
                                                        <?php if(is_array($brand)): foreach($brand as $key=>$vo): ?><option value="<?php echo ($vo["brand_id"]); ?>" <?php if($vo['brand_id'] == $goodsInfo['brand_id']): ?>selected<?php endif; ?>><?php echo ($vo["brand_name"]); ?></option><?php endforeach; endif; ?>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="20%" align="right">本店售价：</td>
                                                <td>
                                                    <input type="text" value="<?php echo ($goodsInfo["shop_price"]); ?>" name="shop_price" class="form-control" style="width:150px;" onkeyup="this.value=this.value.replace(/[^\d.]/g,'')" onpaste="this.value=this.value.replace(/[^\d.]/g,'')" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="20%" align="right">市场价：</td>
                                                <td>
                                                    <input type="text" value="<?php echo ($goodsInfo["market_price"]); ?>" name="market_price" class="form-control" style="width:150px;" onkeyup="this.value=this.value.replace(/[^\d.]/g,'')" onpaste="this.value=this.value.replace(/[^\d.]/g,'')" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="20%" align="right">上传商品图片：</td>
                                                <td>
                                                    <div class="col-sm-3">                                                                              
                                                        <input type="text"  name="goods_thumb" id="goods_thumb" value="<?php echo ($goodsInfo["goods_thumb"]); ?>" class="form-control" style="width:350px;margin-left:-15px;"/>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <input onclick="GetUploadify(1,'goods_thumb','goods');" type="button" class="btn btn-default" value="上传logo"/>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="20%" align="right">
                                                    商品重量：
                                                </td>
                                                <td>
                                                    <div class="form-inline">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" name="weight" placeholder="商品重量" value="<?php echo ($goodsInfo["weight"]); ?>"> 克 (以克为单位)
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="20%" align="right">
                                                    是否包邮：
                                                </td>
                                                <td>
                                                    <div class="form-inline">
                                                        <div class="form-group">
                                                            <input type="radio" class="form-control" name="is_free_shipping" value="0" <?php if($goodsInfo['is_free_shipping'] == 0): ?>checked<?php endif; ?>> 否
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="radio" class="form-control" name="is_free_shipping" value="1" <?php if($goodsInfo['is_free_shipping'] == 1): ?>checked<?php endif; ?>> 是
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="20%" align="right">库存数量：</td>
                                                <td>
                                                    <input type="text" value="<?php echo ($goodsInfo["goods_number"]); ?>" class="form-control" style="width:150px;" name="goods_number" onkeyup="this.value=this.value.replace(/[^\d.]/g,'')" onpaste="this.value=this.value.replace(/[^\d.]/g,'')" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="20%" align="right">赠送积分：</td>
                                                <td>
                                                    <input type="text" class="form-control" style="width:150px;" value="<?php echo ($goodsInfo["give_integral"]); ?>" name="give_integral" onkeyup="this.value=this.value.replace(/[^\d.]/g,'')" onpaste="this.value=this.value.replace(/[^\d.]/g,'')" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="20%" align="right">商品关键词：</td>
                                                <td>
                                                    <input type="text" class="form-control pull-left" style="width:350px;" value="<?php echo ($goodsInfo["keywords"]); ?>" name="keywords"/>
                                                    <div class="tip-text">用空格分隔</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="20%" align="right">商品详情描述：</td>
                                                <td>
                                                    <textarea class="" name="goods_content" id="goods_content"><?php echo ($goodsInfo["goods_content"]); ?></textarea>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>   
                                </div>
                                <div class="tab-pane" id="tab_goods_images">
                                    <table class="table contact-template-form">
                                        <tbody>
                                            <tr>                                    
                                                <td>                                    
                                                <?php if(is_array($goodsImages)): foreach($goodsImages as $k=>$vo): ?><div style="width:100px; text-align:center; margin: 5px; display:inline-block;" class="goods_xc">
                                                        <input type="hidden" value="<?php echo ($vo['image_url']); ?>" name="goods_images[]">
                                                        <a onclick="" href="<?php echo ($vo['image_url']); ?>" target="_blank"><img width="100" height="100" src="<?php echo ($vo['image_url']); ?>"></a>
                                                        <br>
                                                        <a href="javascript:void(0)" onclick="ClearPicArr2(this,'<?php echo ($vo['image_url']); ?>')">删除</a>
                                                    </div><?php endforeach; endif; ?>
                                                
                                                    <div class="goods_xc" style="width:100px; text-align:center; margin: 5px; display:inline-block;">
                                                        <input type="hidden" name="goods_images[]" value="" />
                                                        <a href="javascript:void(0);" onclick="GetUploadify(10,'','goods','call_back2');"><img src="/Public/Admin/images/add-button.jpg" width="100" height="100" /></a>
                                                        <br/>
                                                        <a href="javascript:void(0)">&nbsp;&nbsp;</a>
                                                    </div>                                        
                                                </td>
                                            </tr>                                              
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane" id="tab_goods_spec">
                                    <table class="table table-hover contact-template-form" id="goods_spec_table">                                
                                        <tr>
                                            <td width="20%" align="right">商品类型:</td>
                                            <td>                                        
                                              <select name="spec_type" id="spec_type" class="form-control" style="width:250px;">
                                                <option value="0">选择商品类型</option>
                                                <?php if(is_array($goodsType)): foreach($goodsType as $k=>$vo): ?><option value="<?php echo ($vo["id"]); ?>"<?php if($goodsInfo[spec_type] == $vo[id]): ?>selected="selected"<?php endif; ?> ><?php echo ($vo["name"]); ?></option><?php endforeach; endif; ?>                                        
                                              </select>
                                            </td>
                                        </tr>     
                                                                   
                                    </table>
                                    <div id="ajax_spec_data"><!-- ajax 返回规格--></div>
                                </div>
                                <div class="tab-pane" id="tab_goods_attr">
                                    <table class="table table-hover contact-template-form" id="goods_attr_table">                                
                                        <tr>
                                            <td width="20%" align="right">商品属性:</td>
                                            <td>                                        
                                              <select name="goods_type" id="goods_type" class="form-control" style="width:250px;">
                                                <option value="0">选择商品属性</option>
                                                <?php if(is_array($goodsType)): foreach($goodsType as $k=>$vo): ?><option value="<?php echo ($vo["id"]); ?>"<?php if($goodsInfo[goods_type] == $vo[id]): ?>selected="selected"<?php endif; ?> ><?php echo ($vo["name"]); ?></option><?php endforeach; endif; ?>                                        
                                              </select>
                                            </td>
                                        </tr>                                
                                    </table>
                                </div>
                            </div> 
                            <input type="hidden" name="goods_id" value="<?php echo ($goodsInfo["goods_id"]); ?>">
                            <button class="btn btn-primary" style="margin-left:20%">提 交</button>         
                        </form>
                    </div>
                </div>       
            </div>
        </div>
    </div>
    <script type="text/javascript" src="/Public/Admin/js/common.js"></script>
    <script>
        /*
         * 以下是图片上传方法
         */
        // 上传商品图片成功回调函数
        function call_back(fileurl_tmp){
            $("#original_img").val(fileurl_tmp);
            $("#original_img2").attr('href', fileurl_tmp);
        }
     
        // 上传商品相册回调函数
        function call_back2(paths){
            
            var  last_div = $(".goods_xc:last").prop("outerHTML");  
            for (i=0;i<paths.length ;i++ )
            {                    
                $(".goods_xc:eq(0)").before(last_div);  // 插入一个 新图片
                    $(".goods_xc:eq(0)").find('a:eq(0)').attr('href',paths[i]).attr('onclick','').attr('target', "_blank");// 修改他的链接地址
                $(".goods_xc:eq(0)").find('img').attr('src',paths[i]);// 修改他的图片路径
                    $(".goods_xc:eq(0)").find('a:eq(1)').attr('onclick',"ClearPicArr2(this,'"+paths[i]+"')").text('删除');
                $(".goods_xc:eq(0)").find('input').val(paths[i]); // 设置隐藏域 要提交的值
            }              
        }
        /*
         * 上传之后删除组图input     
         * @access   public
         * @val      string  删除的图片input
         */
        function ClearPicArr2(obj,path)
        {
            $.ajax({
                type:'GET',
                url:"<?php echo U('Admin/Uploadify/delupload');?>",
                data:{action:"del", filename:path},
                success:function(){
                       $(obj).parent().remove(); // 删除完服务器的, 再删除 html上的图片                
                }
            });
            // 删除数据库记录
            $.ajax({
                type:'GET',
                url:"<?php echo U('Admin/Goods/del_goods_images');?>",
                data:{filename:path},
                success:function(){
                      //         
                }
            });     
        }
     


    /** 以下 商品属性相关 js*/
    $(document).ready(function(){
        // 商品类型切换时 ajax 调用  返回不同的属性输入框
        $("#goods_type").change(function(){        
            var goods_id = $("input[name='goods_id']").val();
            var type_id = $(this).val();
            $.ajax({
                type:'GET',
                data:{goods_id:goods_id,type_id:type_id}, 
                url:"/index.php/admin/Goods/ajaxGetAttrInput",
                success:function(data){                            
                    $("#goods_attr_table tr:gt(0)").remove()
                    $("#goods_attr_table").append(data);
                }        
            });                         
        });
        // 触发商品类型
        $("#goods_type").trigger('change');
    });
     

    // 属性输入框的加减事件
    function addAttr(a)
    {
        var attr = $(a).parent().parent().prop("outerHTML");    
        attr = attr.replace('addAttr','delAttr').replace('+','-');  
        $(a).parent().parent().after(attr);
    }
    // 属性输入框的加减事件
    function delAttr(a)
    {
       $(a).parent().parent().remove();
    }
     

    /** 以下 商品规格相关 js*/
    $(document).ready(function(){
        // 商品类型切换时 ajax 调用  返回不同的属性输入框
        $("#spec_type").change(function(){        
            var goods_id = '<?php echo ($goodsInfo["goods_id"]); ?>';
            var spec_type = $(this).val();
            $.ajax({
                type:'GET',
                data:{goods_id:goods_id,spec_type:spec_type}, 
                url:"<?php echo U('admin/Goods/ajaxGetSpecSelect');?>",
                success:function(data){                            
                    $("#ajax_spec_data").html('')
                    $("#ajax_spec_data").append(data);                   
                    ajaxGetSpecInput();  // 触发完  马上触发 规格输入框
                }
            });                         
        });
        // 触发商品规格
        $("#spec_type").trigger('change'); 
    });
    </script>
</body>
</html>