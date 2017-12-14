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
                    <div class="page-header clearfix">
                        <div class="pull-left">
                            <h4>网站设置</h4>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="table-margin">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab_tongyong" data-toggle="tab">网站信息</a></li>                 
                        </ul>
                        <form action="<?php echo U('system/index');?>" class="form-horizontal" method="post">
                            <div class="tab-content">                     
                                <div class="tab-pane active" id="tab_tongyong">
                                    <table class="table contact-template-form">
                                        <tbody>
                                            <tr>
                                                <td width="20%" align="right">网站备案号：</td>
                                                <td>
                                                    <input type="text" name="web_icp" value="<?php echo ($web["web_icp"]); ?>" class="form-control" placeholder="">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="20%" align="right">网站名称：</td>
                                                <td>
                                                    <input type="text" name="web_name" value="<?php echo ($web["web_name"]); ?>" class="form-control" placeholder="">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="20%" align="right">上传商品图片：</td>
                                                <td>
                                                    <div class="col-sm-3">                                                                              
                                                        <input type="text" value="" name="web_logo" id="web_logo" value="<?php echo ($web["web_logo"]); ?>" class="form-control" style="width:350px;margin-left:-15px;"/>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <input onclick="GetUploadify(1,'web_logo','images');" type="button" class="btn btn-default" value="上传logo"/>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="20%" align="right">网站标题：</td>
                                                <td>
                                                    <input type="text" name="web_title" value="<?php echo ($web["web_title"]); ?>" class="form-control" placeholder="">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="20%" align="right">网站描述：</td>
                                                <td>
                                                    <input type="text" name="web_desc" value="<?php echo ($web["web_desc"]); ?>" class="form-control" placeholder="">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="20%" align="right">网站关键字：</td>
                                                <td>
                                                    <input type="text" name="web_keyword" value="<?php echo ($web["web_keyword"]); ?>" class="form-control" placeholder="">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="20%" align="right">联系人：</td>
                                                <td>
                                                    <input type="text" name="web_contact" value="<?php echo ($web["web_contact"]); ?>" class="form-control" placeholder="">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="20%" align="right">联系电话：</td>
                                                <td>
                                                    <input type="text" name="web_mobile" value="<?php echo ($web["web_mobile"]); ?>" class="form-control" placeholder="">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="20%" align="right">具体地址：</td>
                                                <td>
                                                    <input type="text" name="web_address" value="<?php echo ($web["web_address"]); ?>" class="form-control" placeholder="">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="20%" align="right">客服QQ：</td>
                                                <td>
                                                    <input type="text" name="web_qq" class="form-control" value="<?php echo ($web["web_qq"]); ?>" placeholder="">
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>   
                                </div>
                            </div> 
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
    
    </script>
</body>
</html>