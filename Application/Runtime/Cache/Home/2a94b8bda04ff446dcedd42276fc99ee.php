<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo ($WEB_NAME); ?> - 首页</title>
    <link rel="stylesheet" href="/Public/Home/css/idangerous.swiper.css">
<link rel="icon" href="http://m.miniso.cn/public/app/site/statics/favicon.ico" type="image/x-icon" />
<link rel="shortcut icon" href="http://m.miniso.cn/public/app/site/statics/favicon.ico" type="image/x-icon" />
<link rel="stylesheet" href="/Public/Home/css/app.css">
<link rel="stylesheet" href="/Public/Home/css/styles.css">
<script src="/Public/Home/js/jquery-1.8.3.min.js"></script>
<script src="/Public/Home/js/idangerous.swiper.min.js"></script>
<script src="/Public/Home/js/plugins/Modal.js"></script>
</head>
<body>
    <div class="xheader">
    <div class="headerTop">
        <div class="x-main">
            <div class="topLeft">
                <span>名创优选 - 超越严选的品质</span>
            </div>
            <div class="topRight">
                <div class="login topLogin">
                    <span>
                        <a href="<?php echo U('passport/index');?>">登录</a>
                    </span>
                    <span>
                        <a href="<?php echo U('passport/register');?>">注册</a>
                    </span>
                </div>
                <div class="userBoard x-hide topLoginMember">
                    <div class="vip"></div>
                    <div class="userID">
                        <span id="topNickname" onclick="location.href='/member.html'"></span>
                        <div class="more">
                            <a href="javascript:;">
                                <div class="userGuide">
                                    <ul class="center" id="topUCenterMenu">
                                        <li class="active" onclick="(function (){location.href='/member-index.html';})()">个人信息</li>
                                        <li onclick="(function (){location.href='/member-orders.html';})()">订单管理</li>
                                        <li onclick="(function (){location.href='/member-receiver.html';})()">地址管理</li>
                                        <li onclick="(function (){location.href='/member-coupon.html';})()">优惠管理</li>
                                        <li onclick="(function (){location.href='/member-favorite.html';})()">收藏夹</li>
                                        <li onclick="(function (){location.href='/passport-logout.html';})()">退出登录</li>
                                    </ul>
                                    <div class="bottom"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <ul>
                    <li>
                        <div></div>
                        <a href="/member-orders.html" target="_blank">订单管理</a>
                    </li>
                    <li>
                        <div></div>
                        <a href="http://p.qiao.baidu.com/im/index?siteid=11018217&amp;ucid=22851248&amp;cw=170918135943703" target="_blank">在线客服</a>
                    </li>
                    <li>
                        <div></div>
                        <a href="/article-index_question-i-13.html" target="_blank">帮助中心</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="headerBottom">
        <div class="x-main x-main-x">
            <div class="rel">
                <div class="logo"><a href="/index.html"><img src="http://s2.hgcang.com/bsimg/ec/public/images/ba/c7/bac73f16daf0d8ba9c628b63c507acbf.png?x-oss-process=style/high" alt=""></a></div>
                <div class="x-floor x-floor-x">
                    <div class="search">
                        <form action="/search-result.html" method="post" id="searchbar_331" async="false">
                            <button class="searchBtn"></button>
                            <input type="text" name="search_keywords" placeholder="输入关键词寻找宝贝" value="" autocomplete="off">
                        </form>
                        <script>
                            $('#searchbar_'+'331').on('submit',function(){
                                var keywords = $("input[name='search_keywords']").val();
                                if(keywords=='')
                                {
                                    Modal.alert({content:"关键词不能为空",title:'标题'}); return false;
                                }
                            })
                        </script>
                        <div class="searchBoard x-hide">
                            <div class="recommend">
                                <h1 class="x-gray">大家都在搜索</h1>
                                <li><a href="/gallery.html?is_search=1&amp;scontent=n,西餐套装">西餐套装</a></li>
                                <li><a href="/gallery.html?is_search=1&amp;scontent=n,小夜灯">小夜灯</a></li>
                                <li><a href="/gallery.html?is_search=1&amp;scontent=n,多功能便携风扇">多功能便携风扇</a></li>
                            </div>
                        </div>
                        <script>
                            $(function () {
                                var $inp = $('.search').find('input');
                                var $board = $('.searchBoard');
                                $inp.focus(function () {
                                    $board.removeClass('x-hide');
                                })
                                $board.mouseout(function () {
                                    $board.addClass('x-hide');
                                })
                                $board.mouseover(function () {
                                    $board.removeClass('x-hide');
                                })
                            })
                            function clickHistoryWord(words) {
                                $('#searchbar_331').find('input[name="search_keywords"]').val(words);
                                $('#searchbar_331').submit();
                            }

                            $('#ms-jsCloseHistory').on('click', function (e) {

                                if ($('.searchBoard .recommend').html() != '') {
                                    $('.searchBoard').find('.recent').remove();
                                    $('#ms-jsCloseHistory').remove();
                                } else {
                                    $('.searchBoard').remove();
                                }

                                $.ajax({
                                    url : '/search-clear_history_search.html',
                                    success : function () {

                                    }
                                });
                            })
                        </script>
                    </div>
                </div>
                <div class="cart" id="topMinCart"><!-- 购物车数量 -->
                    <div class="news">0</div>
                </div>
                <script>
                    function getTopMinCart(isShow) {
                        var isShow = isShow === false ? false : true;
                        $.post("/cart-view.html",{},function (d) {
                            $('#topMinCart').html(d);
                            $('#topMinCartHide').html(d);
                            if (isShow) {
                                var floatBar = $('.x-floatHeader')
                                var flag  = floatBar.hasClass('floatDown')
                                if(!flag){
                                    $('#topMinCart').children('.cartBoard').removeClass('x-hide');
                                    setTimeout(function () {
                                        $('#topMinCart').children('.cartBoard').addClass('x-hide');
                                    }, 2000);
                                }else{
                                    $('#topMinCartHide').children('.cartBoard').removeClass('x-hide');
                                    setTimeout(function () {
                                        $('#topMinCartHide').children('.cartBoard').addClass('x-hide');
                                    }, 2000);
                                }
                            }
                        });
                    }
                    $(document).on('click', '#topMinCart', function(e) {
                        if ('topMinCart' == e.target.getAttribute('id')) {
                            location.href='/cart.html'
                        }
                    });

                    $(document).on('click', '#topMinCartHide', function(e) {
                        if ('topMinCartHide' == e.target.getAttribute('id')) {
                            location.href='/cart.html'
                        }
                    });

                    $(document).on('click', '.topMinCartDeleted', function (e) {
                        //删除商品
                        $.post($(this).data('href'),{},function (d) {
                            $('#topMinCart').html(d);
                            $('#topMinCartHide').html(d);
                            var floatBar = $('.x-floatHeader')
                            var flag  = floatBar.hasClass('floatDown')
                            if(!flag){
                                $('#topMinCart').children('.cartBoard').removeClass('x-hide');
                            }else{
                                $('#topMinCartHide').children('.cartBoard').removeClass('x-hide');
                            }
                        });
                    });
                    getTopMinCart(false);
                    //setInterval(getTopMinCart, 5000);
                </script>
            </div>
            <div class="nav nav8">
                <div class="x-floor">

                    <ul class="navLeft" id="topCatMenu">
                        <li>

                            <a href="/index.html">首页</a>

                        </li>


                        <li id="parent_cat_id_16">
                            <a href="/category-channel-16-16.html">居家</a>
                            <div class="secMenu">
                                <div class="x-main">

                                    <div class="menuBox" onclick="location.href ='/category-channel-16-36.html#cid36'">
                                        <div class="imgbox">
                                            <img src="http://s1.hgcang.com/bsimg/ec/public/images/e8/77/e8774700c28a9bd652fcd2a932cd89cb.png?x-oss-process=style/high" alt="">
                                        </div>
                                        <p>拖鞋</p>
                                    </div>
                                    <div class="menuBox" onclick="location.href ='/category-channel-16-48.html#cid48'">
                                        <div class="imgbox">
                                            <img src="http://s2.hgcang.com/bsimg/ec/public/images/7d/17/7d17d26d75b30d2399327cbdc844e803.png?x-oss-process=style/high" alt="">
                                        </div>
                                        <p>清洁保鲜</p>
                                    </div>
                                    <div class="menuBox" onclick="location.href ='/category-channel-16-51.html#cid51'">
                                        <div class="imgbox">
                                            <img src="http://s2.hgcang.com/bsimg/ec/public/images/3d/6d/3d6d3e4cbd7dbba4be986ce7b2bc6b37.png?x-oss-process=style/high" alt="">
                                        </div>
                                        <p>家饰</p>
                                    </div>
                                    <div class="menuBox" onclick="location.href ='/category-channel-16-55.html#cid55'">
                                        <div class="imgbox">
                                            <img src="http://s1.hgcang.com/bsimg/ec/public/images/30/82/30826bdc5bd0d6a03e443d3f0e9e92fa.png?x-oss-process=style/high" alt="">
                                        </div>
                                        <p>收纳</p>
                                    </div>
                                    <div class="menuBox" onclick="location.href ='/category-channel-16-56.html#cid56'">
                                        <div class="imgbox">
                                            <img src="http://s1.hgcang.com/bsimg/ec/public/images/23/e9/23e95cd68ee4ddc09a960f9356655c9f.png?x-oss-process=style/high" alt="">
                                        </div>
                                        <p>浴室用品</p>
                                    </div>
                                    <div class="menuBox" onclick="location.href ='/category-channel-16-59.html#cid59'">
                                        <div class="imgbox">
                                            <img src="http://s1.hgcang.com/bsimg/ec/public/images/68/07/68073ff759dab562b5c743094d663933.png?x-oss-process=style/high" alt="">
                                        </div>
                                        <p>布艺软装</p>
                                    </div>

                                </div>
                            </div>
                        </li>
                        <li id="parent_cat_id_14">
                            <a href="/category-channel-14-14.html">餐厨</a>
                            <div class="secMenu">
                                <div class="x-main">

                                    <div class="menuBox" onclick="location.href ='/category-channel-14-15.html#cid15'">
                                        <div class="imgbox">
                                            <img src="http://s1.hgcang.com/bsimg/ec/public/images/ca/3a/ca3aca05172fcb5b9f0c1fd3acf6546c.png?x-oss-process=style/high" alt="">
                                        </div>
                                        <p>杯壶</p>
                                    </div>
                                    <div class="menuBox" onclick="location.href ='/category-channel-14-35.html#cid35'">
                                        <div class="imgbox">
                                            <img src="http://s1.hgcang.com/bsimg/ec/public/images/5a/29/5a2982231560ac1a2bb6bc93ff69f390.png?x-oss-process=style/high" alt="">
                                        </div>
                                        <p>餐具</p>
                                    </div>
                                    <div class="menuBox" onclick="location.href ='/category-channel-14-53.html#cid53'">
                                        <div class="imgbox">
                                            <img src="http://s1.hgcang.com/bsimg/ec/public/images/5f/58/5f58f1406c0495dcdc706ac69530dcba.png?x-oss-process=style/high" alt="">
                                        </div>
                                        <p>功能厨具</p>
                                    </div>

                                </div>
                            </div>
                        </li>
                        <li id="parent_cat_id_20">
                            <a href="/category-channel-20-20.html">服装</a>
                            <div class="secMenu">
                                <div class="x-main">

                                    <div class="menuBox" onclick="location.href ='/category-channel-20-21.html#cid21'">
                                        <div class="imgbox">
                                            <img src="http://s2.hgcang.com/bsimg/ec/public/images/de/ca/deca7090242243346ff945524f96de82.png?x-oss-process=style/high" alt="">
                                        </div>
                                        <p>T恤</p>
                                    </div>
                                    <div class="menuBox" onclick="location.href ='/category-channel-20-23.html#cid23'">
                                        <div class="imgbox">
                                            <img src="http://s1.hgcang.com/bsimg/ec/public/images/4e/f2/4ef214b4d837f76d029e237c753bce5c.png?x-oss-process=style/high" alt="">
                                        </div>
                                        <p>内衣</p>
                                    </div>
                                    <div class="menuBox" onclick="location.href ='/category-channel-20-45.html#cid45'">
                                        <div class="imgbox">
                                            <img src="http://s2.hgcang.com/bsimg/ec/public/images/6b/9f/6b9f7eda29a6ad0fb5f8f90deab61c27.png?x-oss-process=style/high" alt="">
                                        </div>
                                        <p>丝袜</p>
                                    </div>
                                    <div class="menuBox" onclick="location.href ='/category-channel-20-26.html#cid26'">
                                        <div class="imgbox">
                                            <img src="http://s1.hgcang.com/bsimg/ec/public/images/e6/cc/e6cc448cfbf9f9710b89b3800e5047a7.png?x-oss-process=style/high" alt="">
                                        </div>
                                        <p>袜子</p>
                                    </div>
                                    <div class="menuBox" onclick="location.href ='/category-channel-20-29.html#cid29'">
                                        <div class="imgbox">
                                            <img src="http://s1.hgcang.com/bsimg/ec/public/images/33/df/33dfee385249917f6f11907a986cc3f0.png?x-oss-process=style/high" alt="">
                                        </div>
                                        <p>内裤</p>
                                    </div>
                                    <div class="menuBox" onclick="location.href ='/category-channel-20-58.html#cid58'">
                                        <div class="imgbox">
                                            <img src="http://s1.hgcang.com/bsimg/ec/public/images/32/c8/32c85c60ca62bc31c8426223857aac5d.png?x-oss-process=style/high" alt="">
                                        </div>
                                        <p>服饰配件</p>
                                    </div>

                                </div>
                            </div>
                        </li>
                        <li id="parent_cat_id_18">
                            <a href="/category-channel-18-18.html">美护</a>
                            <div class="secMenu">
                                <div class="x-main">

                                    <div class="menuBox" onclick="location.href ='/category-channel-18-19.html#cid19'">
                                        <div class="imgbox">
                                            <img src="http://s2.hgcang.com/bsimg/ec/public/images/d3/ba/d3bab8cad77b7b2182921a60be4bdfff.png?x-oss-process=style/high" alt="">
                                        </div>
                                        <p>美妆</p>
                                    </div>
                                    <div class="menuBox" onclick="location.href ='/category-channel-18-52.html#cid52'">
                                        <div class="imgbox">
                                            <img src="http://s1.hgcang.com/bsimg/ec/public/images/ca/e0/cae04bde18981a7d1d2445417c179e0c.png?x-oss-process=style/high" alt="">
                                        </div>
                                        <p>身体护理</p>
                                    </div>
                                    <div class="menuBox" onclick="location.href ='/category-channel-18-32.html#cid32'">
                                        <div class="imgbox">
                                            <img src="http://s1.hgcang.com/bsimg/ec/public/images/01/9b/019b25cfce32eba0e105d43d8d00716a.png?x-oss-process=style/high" alt="">
                                        </div>
                                        <p>口腔护理</p>
                                    </div>
                                    <div class="menuBox" onclick="location.href ='/category-channel-18-41.html#cid41'">
                                        <div class="imgbox">
                                            <img src="http://s2.hgcang.com/bsimg/ec/public/images/ff/ff/ffff95659fd8e6a927dfc7bb75d0f8f8.png?x-oss-process=style/high" alt="">
                                        </div>
                                        <p>洗发护发</p>
                                    </div>
                                    <div class="menuBox" onclick="location.href ='/category-channel-18-33.html#cid33'">
                                        <div class="imgbox">
                                            <img src="http://s1.hgcang.com/bsimg/ec/public/images/1f/d1/1fd1716bbdd74ed25266cf6a1c9b73b6.png?x-oss-process=style/high" alt="">
                                        </div>
                                        <p>美护工具</p>
                                    </div>

                                </div>
                            </div>
                        </li>
                        <li id="parent_cat_id_27">
                            <a href="/category-channel-27-27.html">出行</a>
                            <div class="secMenu">
                                <div class="x-main">

                                    <div class="menuBox" onclick="location.href ='/category-channel-27-28.html#cid28'">
                                        <div class="imgbox">
                                            <img src="http://s2.hgcang.com/bsimg/ec/public/images/2f/2a/2f2a172c62799a95994a79dd4f53cf57.png?x-oss-process=style/high" alt="">
                                        </div>
                                        <p>旅行用品</p>
                                    </div>
                                    <div class="menuBox" onclick="location.href ='/category-channel-27-54.html#cid54'">
                                        <div class="imgbox">
                                            <img src="http://s1.hgcang.com/bsimg/ec/public/images/ba/d1/bad1705e6c2e70b27d41ce599bf76a52.png?x-oss-process=style/high" alt="">
                                        </div>
                                        <p>箱包</p>
                                    </div>

                                </div>
                            </div>
                        </li>
                        <li id="parent_cat_id_37">
                            <a href="/category-channel-37-37.html">电器</a>
                            <div class="secMenu">
                                <div class="x-main">

                                    <div class="menuBox" onclick="location.href ='/category-channel-37-17.html#cid17'">
                                        <div class="imgbox">
                                            <img src="http://s1.hgcang.com/bsimg/ec/public/images/47/85/4785ed6cca6bf5c3ab9cc2bd7bc8d6cd.png?x-oss-process=style/high" alt="">
                                        </div>
                                        <p>生活电器</p>
                                    </div>
                                    <div class="menuBox" onclick="location.href ='/category-channel-37-39.html#cid39'">
                                        <div class="imgbox">
                                            <img src="http://s2.hgcang.com/bsimg/ec/public/images/9e/c0/9ec0640fbf4112a48ded4689656f2be5.png?x-oss-process=style/high" alt="">
                                        </div>
                                        <p>数码</p>
                                    </div>

                                </div>
                            </div>
                        </li>
                        <li id="parent_cat_id_49">
                            <a href="/category-channel-49-49.html">系列</a>
                            <div class="secMenu">
                                <div class="x-main">

                                    <div class="menuBox" onclick="location.href ='/category-channel-49-50.html#cid50'">
                                        <div class="imgbox">
                                            <img src="http://s1.hgcang.com/bsimg/ec/public/images/12/5c/125cbbb8c10f3da24b6b084a1cf80369.png?x-oss-process=style/high" alt="">
                                        </div>
                                        <p>粉红豹</p>
                                    </div>

                                </div>
                            </div>
                        </li>
                    </ul>

                </div>
                <ul class="navRight">
                    <li id="topTopicMenu"><a href="/topic.html">专题</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="x-floor">
    <div class="x-floatHeader x-whiteBox">
        <div class="x-main" style="position: initial;">
            <div class="pic">
                <img src="./images/logo_69.png" alt="">
            </div>
            <ul class="nav" id="topCatMenuHide">
                <li>
                    <a href="/index.html">首页</a>
                </li>
                <li id="parent_cat_id_16">
                    <a href="/category-channel-16-16.html">居家</a>
                    <div class="secMenu" style="opacity: 0;">
                        <div class="x-main">
                            <div class="menuBox" onclick="location.href ='/category-channel-16-36.html#cid36'">
                                <div class="imgbox">
                                    <img src="http://s1.hgcang.com/bsimg/ec/public/images/e8/77/e8774700c28a9bd652fcd2a932cd89cb.png?x-oss-process=style/high" alt="">
                                </div>
                                <p>拖鞋</p>
                            </div>
                            <div class="menuBox" onclick="location.href ='/category-channel-16-48.html#cid48'">
                                <div class="imgbox">
                                    <img src="http://s2.hgcang.com/bsimg/ec/public/images/7d/17/7d17d26d75b30d2399327cbdc844e803.png?x-oss-process=style/high" alt="">
                                </div>
                                <p>清洁保鲜</p>
                            </div>
                            <div class="menuBox" onclick="location.href ='/category-channel-16-51.html#cid51'">
                                <div class="imgbox">
                                    <img src="http://s2.hgcang.com/bsimg/ec/public/images/3d/6d/3d6d3e4cbd7dbba4be986ce7b2bc6b37.png?x-oss-process=style/high" alt="">
                                </div>
                                <p>家饰</p>
                            </div>
                            <div class="menuBox" onclick="location.href ='/category-channel-16-55.html#cid55'">
                                <div class="imgbox">
                                    <img src="http://s1.hgcang.com/bsimg/ec/public/images/30/82/30826bdc5bd0d6a03e443d3f0e9e92fa.png?x-oss-process=style/high" alt="">
                                </div>
                                <p>收纳</p>
                            </div>
                            <div class="menuBox" onclick="location.href ='/category-channel-16-56.html#cid56'">
                                <div class="imgbox">
                                    <img src="http://s1.hgcang.com/bsimg/ec/public/images/23/e9/23e95cd68ee4ddc09a960f9356655c9f.png?x-oss-process=style/high" alt="">
                                </div>
                                <p>浴室用品</p>
                            </div>
                            <div class="menuBox" onclick="location.href ='/category-channel-16-59.html#cid59'">
                                <div class="imgbox">
                                    <img src="http://s1.hgcang.com/bsimg/ec/public/images/68/07/68073ff759dab562b5c743094d663933.png?x-oss-process=style/high" alt="">
                                </div>
                                <p>布艺软装</p>
                            </div>
                        </div>
                    </div>
                </li>
                <li id="parent_cat_id_14">
                    <a href="/category-channel-14-14.html">餐厨</a>
                    <div class="secMenu" style="opacity: 0;">
                        <div class="x-main">
                            <div class="menuBox" onclick="location.href ='/category-channel-14-15.html#cid15'">
                                <div class="imgbox">
                                    <img src="http://s1.hgcang.com/bsimg/ec/public/images/ca/3a/ca3aca05172fcb5b9f0c1fd3acf6546c.png?x-oss-process=style/high" alt="">
                                </div>
                                <p>杯壶</p>
                            </div>
                            <div class="menuBox" onclick="location.href ='/category-channel-14-35.html#cid35'">
                                <div class="imgbox">
                                    <img src="http://s1.hgcang.com/bsimg/ec/public/images/5a/29/5a2982231560ac1a2bb6bc93ff69f390.png?x-oss-process=style/high" alt="">
                                </div>
                                <p>餐具</p>
                            </div>
                            <div class="menuBox" onclick="location.href ='/category-channel-14-53.html#cid53'">
                                <div class="imgbox">
                                    <img src="http://s1.hgcang.com/bsimg/ec/public/images/5f/58/5f58f1406c0495dcdc706ac69530dcba.png?x-oss-process=style/high" alt="">
                                </div>
                                <p>功能厨具</p>
                            </div>
                        </div>
                    </div>
                </li>
                <li id="parent_cat_id_20">
                    <a href="/category-channel-20-20.html">服装</a>
                    <div class="secMenu" style="opacity: 0;">
                        <div class="x-main">
                            <div class="menuBox" onclick="location.href ='/category-channel-20-21.html#cid21'">
                                <div class="imgbox">
                                    <img src="http://s2.hgcang.com/bsimg/ec/public/images/de/ca/deca7090242243346ff945524f96de82.png?x-oss-process=style/high" alt="">
                                </div>
                                <p>T恤</p>
                            </div>
                            <div class="menuBox" onclick="location.href ='/category-channel-20-23.html#cid23'">
                                <div class="imgbox">
                                    <img src="http://s1.hgcang.com/bsimg/ec/public/images/4e/f2/4ef214b4d837f76d029e237c753bce5c.png?x-oss-process=style/high" alt="">
                                </div>
                                <p>内衣</p>
                            </div>
                            <div class="menuBox" onclick="location.href ='/category-channel-20-45.html#cid45'">
                                <div class="imgbox">
                                    <img src="http://s2.hgcang.com/bsimg/ec/public/images/6b/9f/6b9f7eda29a6ad0fb5f8f90deab61c27.png?x-oss-process=style/high" alt="">
                                </div>
                                <p>丝袜</p>
                            </div>
                            <div class="menuBox" onclick="location.href ='/category-channel-20-26.html#cid26'">
                                <div class="imgbox">
                                    <img src="http://s1.hgcang.com/bsimg/ec/public/images/e6/cc/e6cc448cfbf9f9710b89b3800e5047a7.png?x-oss-process=style/high" alt="">
                                </div>
                                <p>袜子</p>
                            </div>
                            <div class="menuBox" onclick="location.href ='/category-channel-20-29.html#cid29'">
                                <div class="imgbox">
                                    <img src="http://s1.hgcang.com/bsimg/ec/public/images/33/df/33dfee385249917f6f11907a986cc3f0.png?x-oss-process=style/high" alt="">
                                </div>
                                <p>内裤</p>
                            </div>
                            <div class="menuBox" onclick="location.href ='/category-channel-20-58.html#cid58'">
                                <div class="imgbox">
                                    <img src="http://s1.hgcang.com/bsimg/ec/public/images/32/c8/32c85c60ca62bc31c8426223857aac5d.png?x-oss-process=style/high" alt="">
                                </div>
                                <p>服饰配件</p>
                            </div>
                        </div>
                    </div>
                </li>
                <li id="parent_cat_id_18">
                    <a href="/category-channel-18-18.html">美护</a>
                    <div class="secMenu" style="opacity: 0;">
                        <div class="x-main">
                            <div class="menuBox" onclick="location.href ='/category-channel-18-19.html#cid19'">
                                <div class="imgbox">
                                    <img src="http://s2.hgcang.com/bsimg/ec/public/images/d3/ba/d3bab8cad77b7b2182921a60be4bdfff.png?x-oss-process=style/high" alt="">
                                </div>
                                <p>美妆</p>
                            </div>
                            <div class="menuBox" onclick="location.href ='/category-channel-18-52.html#cid52'">
                                <div class="imgbox">
                                    <img src="http://s1.hgcang.com/bsimg/ec/public/images/ca/e0/cae04bde18981a7d1d2445417c179e0c.png?x-oss-process=style/high" alt="">
                                </div>
                                <p>身体护理</p>
                            </div>
                            <div class="menuBox" onclick="location.href ='/category-channel-18-32.html#cid32'">
                                <div class="imgbox">
                                    <img src="http://s1.hgcang.com/bsimg/ec/public/images/01/9b/019b25cfce32eba0e105d43d8d00716a.png?x-oss-process=style/high" alt="">
                                </div>
                                <p>口腔护理</p>
                            </div>
                            <div class="menuBox" onclick="location.href ='/category-channel-18-41.html#cid41'">
                                <div class="imgbox">
                                    <img src="http://s2.hgcang.com/bsimg/ec/public/images/ff/ff/ffff95659fd8e6a927dfc7bb75d0f8f8.png?x-oss-process=style/high" alt="">
                                </div>
                                <p>洗发护发</p>
                            </div>
                            <div class="menuBox" onclick="location.href ='/category-channel-18-33.html#cid33'">
                                <div class="imgbox">
                                    <img src="http://s1.hgcang.com/bsimg/ec/public/images/1f/d1/1fd1716bbdd74ed25266cf6a1c9b73b6.png?x-oss-process=style/high" alt="">
                                </div>
                                <p>美护工具</p>
                            </div>
                        </div>
                    </div>
                </li>
                <li id="parent_cat_id_27">
                    <a href="/category-channel-27-27.html">出行</a>
                    <div class="secMenu" style="opacity: 0;">
                        <div class="x-main">
                            <div class="menuBox" onclick="location.href ='/category-channel-27-28.html#cid28'">
                                <div class="imgbox">
                                    <img src="http://s2.hgcang.com/bsimg/ec/public/images/2f/2a/2f2a172c62799a95994a79dd4f53cf57.png?x-oss-process=style/high" alt="">
                                </div>
                                <p>旅行用品</p>
                            </div>
                            <div class="menuBox" onclick="location.href ='/category-channel-27-54.html#cid54'">
                                <div class="imgbox">
                                    <img src="http://s1.hgcang.com/bsimg/ec/public/images/ba/d1/bad1705e6c2e70b27d41ce599bf76a52.png?x-oss-process=style/high" alt="">
                                </div>
                                <p>箱包</p>
                            </div>
                        </div>
                    </div>
                </li>
                <li id="parent_cat_id_37">
                    <a href="/category-channel-37-37.html">电器</a>
                    <div class="secMenu" style="opacity: 0;">
                        <div class="x-main">
                            <div class="menuBox" onclick="location.href ='/category-channel-37-17.html#cid17'">
                                <div class="imgbox">
                                    <img src="http://s1.hgcang.com/bsimg/ec/public/images/47/85/4785ed6cca6bf5c3ab9cc2bd7bc8d6cd.png?x-oss-process=style/high" alt="">
                                </div>
                                <p>生活电器</p>
                            </div>
                            <div class="menuBox" onclick="location.href ='/category-channel-37-39.html#cid39'">
                                <div class="imgbox">
                                    <img src="http://s2.hgcang.com/bsimg/ec/public/images/9e/c0/9ec0640fbf4112a48ded4689656f2be5.png?x-oss-process=style/high" alt="">
                                </div>
                                <p>数码</p>
                            </div>
                        </div>
                    </div>
                </li>
                <li id="parent_cat_id_49">
                    <a href="/category-channel-49-49.html">系列</a>
                    <div class="secMenu" style="opacity: 0;">
                        <div class="x-main">
                            <div class="menuBox" onclick="location.href ='/category-channel-49-50.html#cid50'">
                                <div class="imgbox">
                                    <img src="http://s1.hgcang.com/bsimg/ec/public/images/12/5c/125cbbb8c10f3da24b6b084a1cf80369.png?x-oss-process=style/high" alt="">
                                </div>
                                <p>粉红豹</p>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
            <div class="rel newrightnav">
                <div class="login topLogin">
                    <span><a href="/passport.html">登录</a></span>
                    <span><a href="/passport-signup.html">注册</a></span>
                </div>
                <div class="more topLoginMember x-hide">
                    <div class="rel">
                        <div class="userGuide" style="opacity: 0;">
                            <ul class="center" id="topUCenterMenuHide">
                                <li class="active" onclick="(function (){location.href='/member-index.html';})()">个人信息</li>
                                <li onclick="(function (){location.href='/member-orders.html';})()">订单管理</li>
                                <li onclick="(function (){location.href='/member-receiver.html';})()">地址管理</li>
                                <li onclick="(function (){location.href='/member-coupon.html';})()">优惠管理</li>
                                <li onclick="(function (){location.href='/member-favorite.html';})()">收藏夹</li>
                                <li onclick="(function (){location.href='/passport-logout.html';})()">退出登录</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="cart" id="topMinCartHide"><!-- 购物车数量 -->
                    <div class="news">0</div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $('#topCatMenuHide').html($('#topCatMenu').html());
        $('#topUCenterMenuHide').html($('#topUCenterMenu').html());

        $(function () {
            var $box = $('.x-floatHeader');
            var $secMenu = $box.find('.secMenu');
            var $userGuide = $box.find('.userGuide');
            var $cartBoard = $box.find('.cartBoard');

            $(window).scroll(function () {
                var num = $(this).scrollTop();
                if (num > 239) {
                    $box.addClass('floatDown');
                    opa1($secMenu);
                    opa1($userGuide);
                    opa1($cartBoard);
                } else {
                    $box.removeClass('floatDown');
                    opa0($secMenu);
                    opa0($userGuide);
                    opa0($cartBoard);
                }
            })

            function opa0(element) {
                element.css('opacity', '0');
            }
            function opa1(element) {
                element.css('opacity', '1');
            }

            // 购物车弹窗显示与消失
            $('.cart').mouseover(function () {
                $(this).children('.cartBoard').removeClass('x-hide')
            })
            $('.cart').mouseout(function () {
                $(this).children('.cartBoard').addClass('x-hide')
            })
        });
        $.post("/passport-get_login_member.html",{},function (d) {
            //已经登录
            var d=eval('('+d+')');
            if(typeof(d.data) == 'object') {
                var nickname = d.data.nickname || d.data.login_mobile;
                nickname = nickname.length > 11 ? nickname.slice(0, 11) + '...' : nickname;
                $('#topNickname').text(nickname);
                $('.topLoginMember').removeClass('x-hide');
                $('.topLogin').addClass('x-hide');
            }else {
                $('.topLoginMember').addClass('x-hide');
                $('.topLogin').removeClass('x-hide');
            }
        });
    </script>
</div>
    <div class="x-floor">
        <div class="x-banner ">
            <div class="banner-container">
                <div class="swiper-wrapper">
                    <div class="swiper-slide"><a href="/activity-20171101.html"  style="background-image: url('http://s1.hgcang.com/bsimg/ec/public/images/16/57/165793f80574e455b6754607f8cd7188.jpg?1510302438#w');"></a></div>
                    <div class="swiper-slide"><a href="http://m.miniso.cn/category-channel-49-49.html"  style="background-image: url('http://s1.hgcang.com/bsimg/ec/public/images/14/25/14257c662d7a858b703ea6c630f7c073.jpg?1509595164#w');"></a></div>
                    <div class="swiper-slide"><a href="http://m.miniso.cn/activity-20171206.html"  style="background-image: url('http://s2.hgcang.com/bsimg/ec/public/images/a5/80/a580570368459209ca9bc8e503dfe87d.jpg?x-oss-process=style/high');"></a></div>
                </div>
                <div class="swiper-pagination"></div>
                <div class="x-m1194">
                    <div class="button-next"></div>
                    <div class="button-prev"></div>
                </div>
            </div>
        </div>

        <script>
            $(function () {
                var swiperA = new Swiper('.banner-container', {
                    pagination: '.swiper-pagination',
                    loop: true,
                    simulateTouch: true,
                    autoplay: 3000,


                    grabCursor: true,
                    paginationClickable: true,
                })

                $('.banner-container .button-prev').on('click', function (e) {
                    e.preventDefault()
                    swiperA.swipePrev()
                })
                $('.banner-container .button-next').on('click', function (e) {
                    e.preventDefault()
                    swiperA.swipeNext()
                })
            })
        </script>
    </div>
    <div class="x-floor">
        <div class="x-whiteBoard x-space60">
            <div class="x-main">
                <div class="x-channelTitle">
                    <h1>新品首发</h1>
                    <span>每周上新，特惠不停</span>
                    <a class="x-pt15" href="/new.html">更多首发&nbsp;&#62;</a>
                </div>
            </div>
            <div class="swiper-container product-container">
                <div class="swiper-wrapper">
                    <div class="swiper-slide x-itemCenter">
                        <div class="itemList">
                            <div class="item">
                                <a class="imgbox" href="/product-713.html">
                                    <img class="imgbox x-holder" src="http://s1.hgcang.com/bsimg/ec/public/images/06/33/0633cd731a69ce80cd662134459eea0a.png?x-oss-process=style/high">
                                </a>
                                <div class="tagBox">
                                </div>
                                <a class="title" href="/product-713.html">独立装牙线棒50支</a>
                                <span>&yen;9.9</span>
                            </div>
                            <div class="item">
                                <a class="imgbox" href="/product-711.html">
                                    <img class="imgbox x-holder" src="http://s2.hgcang.com/bsimg/ec/public/images/a4/fd/a4fd71a9e9fa5e4fe63f040acae883f6.png?x-oss-process=style/high">
                                    <div class="x-Ptag">两色可选</div>                            </a>
                                <div class="tagBox">
                                </div>
                                <a class="title" href="/product-711.html">大容量英文字母休闲购物袋</a>
                                <span>&yen;19.9</span>
                            </div>
                            <div class="item">
                                <a class="imgbox" href="/product-701.html">
                                    <img class="imgbox x-holder" src="http://s2.hgcang.com/bsimg/ec/public/images/38/46/38462b743eadc4460f7e21ece1ecc1cc.png?x-oss-process=style/high">
                                </a>
                                <div class="tagBox">
                                </div>
                                <a class="title" href="/product-701.html">MINISO榴莲干</a>
                                <span>&yen;9.9</span>
                            </div>
                            <div class="item">
                                <a class="imgbox" href="/product-700.html">
                                    <img class="imgbox x-holder" src="http://s2.hgcang.com/bsimg/ec/public/images/c8/31/c831850a2f80dc80640f9e8c47c82872.png?x-oss-process=style/high">
                                </a>
                                <div class="tagBox">
                                </div>
                                <a class="title" href="/product-700.html">MINISO香辣味鸭翅</a>
                                <span>&yen;14.9</span>
                            </div>

                        </div>
                    </div>
                    <div class="swiper-slide x-itemCenter">
                        <div class="itemList">
                            <div class="item">
                                <a class="imgbox" href="/product-699.html">
                                    <img class="imgbox x-holder" src="http://s1.hgcang.com/bsimg/ec/public/images/04/e8/04e8d417edde6b9ea61a5d2ecd361154.png?x-oss-process=style/high">
                                </a>
                                <div class="tagBox">
                                </div>
                                <a class="title" href="/product-699.html">MINISO香辣味小鸡腿</a>
                                <span>&yen;14.9</span>
                            </div>
                            <div class="item">
                                <a class="imgbox" href="/product-698.html">
                                    <img class="imgbox x-holder" src="http://s2.hgcang.com/bsimg/ec/public/images/d6/60/d660cd3f387279c28325b38302ae05e5.png?x-oss-process=style/high">
                                </a>
                                <div class="tagBox">
                                </div>
                                <a class="title" href="/product-698.html">三层磨砂桌面收纳盒</a>
                                <span>&yen;19.9</span>
                            </div>
                            <div class="item">
                                <a class="imgbox" href="/product-697.html">
                                    <img class="imgbox x-holder" src="http://s1.hgcang.com/bsimg/ec/public/images/05/cb/05cbacf3b167cc70592f5396f580eb6b.png?x-oss-process=style/high">
                                </a>
                                <div class="tagBox">
                                </div>
                                <a class="title" href="/product-697.html">磨砂长方桌面收纳盒三件套</a>
                                <span>&yen;14.9</span>
                            </div>
                            <div class="item">
                                <a class="imgbox" href="/product-696.html">
                                    <img class="imgbox x-holder" src="http://s2.hgcang.com/bsimg/ec/public/images/0f/30/0f30b605110293b4de0288638444cfa6.png?x-oss-process=style/high">
                                </a>
                                <div class="tagBox">
                                </div>
                                <a class="title" href="/product-696.html">MINISO香辣味鸭脖120g</a>
                                <span>&yen;14.9</span>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide x-itemCenter">
                        <div class="itemList">
                            <div class="item">
                                <a class="imgbox" href="/product-695.html">
                                    <img class="imgbox x-holder" src="http://s1.hgcang.com/bsimg/ec/public/images/17/39/1739e37634abd4a719ea588d27bd07b1.png?x-oss-process=style/high">
                                </a>
                                <div class="tagBox">
                                </div>
                                <a class="title" href="/product-695.html">透明磨砂带盖化妆盒</a>
                                <span>&yen;14.9</span>
                            </div>
                            <div class="item">
                                <a class="imgbox" href="/product-689.html">
                                    <img class="imgbox x-holder" src="http://s2.hgcang.com/bsimg/ec/public/images/80/8f/808f5a6f124a2c88932e4cca898f39ca.png?x-oss-process=style/high">
                                    <div class="x-Ptag">3种口味</div>                            </a>
                                <div class="tagBox">
                                </div>
                                <a class="title" href="/product-689.html">MINISO港烧牛肉</a>
                                <span>&yen;14.9</span>
                            </div>
                            <div class="item">
                                <a class="imgbox" href="/product-683.html">
                                    <img class="imgbox x-holder" src="http://s2.hgcang.com/bsimg/ec/public/images/f4/25/f425511c6afa1331773fedfbbc102d1b.png?x-oss-process=style/high">
                                </a>
                                <div class="tagBox">
                                    <span class="tag" style="background:#c4061a; color:#ffffff">买赠</span>
                                </div>
                                <a class="title" href="/product-683.html">经典菱形家居地毯</a>
                                <span>&yen;89.9</span>
                            </div>
                            <div class="item">
                                <a class="imgbox" href="/product-677.html">
                                    <img class="imgbox x-holder" src="http://s2.hgcang.com/bsimg/ec/public/images/8a/9f/8a9f0250e87f50ba928e656a036ec6ee.png?x-oss-process=style/high">
                                </a>
                                <div class="tagBox">
                                    <span class="tag" style="background:#c4061a; color:#ffffff">买赠</span>
                                </div>
                                <a class="title" href="/product-677.html">日式简约质感家居地毯</a>
                                <span>&yen;89.9</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="btnBar">
                    <div class="button-next"></div>
                    <div class="button-prev"></div>
                </div>
            </div>
        </div>
        <script>
            $(function () {
                var swiperProduct = new Swiper('.product-container');
                $('.product-container .button-prev').on('click', function (e) {
                    e.preventDefault()
                    swiperProduct.swipePrev()
                })
                $('.product-container .button-next').on('click', function (e) {
                    e.preventDefault()
                    swiperProduct.swipeNext()
                })
            })
        </script>
    </div>
    <div class="x-row x-space60">
        <div class="x-main clearfix">
            <div class="x-channelTitle">
                <h1>人气推荐</h1>
                <a class="x-pt15" href="/hotact.html">更多推荐&nbsp;></a>
            </div>
            <div class="itemList popularity">
                <div class="item firstItem">
                    <a class="imgbox" href="/product-487.html">
                        <img src="http://s2.hgcang.com/bsimg/ec/public/images/ae/3c/ae3ca2e8f02a6c3cd948424338a1a2fd.png?x-oss-process=style/high" alt="持久保湿香体喷雾">
                        <div class="x-Ptag">3种香味</div>                </a>
                    <div class="tagBox">
                    </div>
                    <a class="title" href="/product-487.html">持久保湿香体喷雾</a>
                    <span>&yen;9.9</span>
                </div>
                <div class="item">
                    <a class="imgbox" href="/product-372.html">
                        <img src="http://s1.hgcang.com/bsimg/ec/public/images/dc/a3/dca3e6b1e325ce8503f7830f00e3ca4e.png?x-oss-process=style/high" alt="舒适脚感家居拖鞋">
                        <div class="x-Ptag">三色可选</div>                </a>
                    <div class="tagBox">
                    </div>
                    <a class="title" href="/product-372.html">舒适脚感家居拖鞋</a>
                    <span>&yen;29.9</span>
                </div>
                <div class="item">
                    <a class="imgbox" href="/product-318.html">
                        <img src="http://s2.hgcang.com/bsimg/ec/public/images/58/48/58480c02b18a9122e702dfedee926d0c.png?x-oss-process=style/high" alt="免水洗发喷雾50ml">
                        <div class="x-Ptag">2款可选</div>                </a>
                    <div class="tagBox">
                    </div>
                    <a class="title" href="/product-318.html">免水洗发喷雾50ml</a>
                    <span>&yen;9.9</span>
                </div>
                <div class="item">
                    <a class="imgbox" href="/product-636.html">
                        <img src="http://s2.hgcang.com/bsimg/ec/public/images/88/6a/886a7d8f53cc7327d35b7340f2f8be59.png?x-oss-process=style/high" alt="MINISO炭烧猪肉脯80g">
                        <div class="x-Ptag">3味可选</div>                </a>
                    <div class="tagBox">
                    </div>
                    <a class="title" href="/product-636.html">MINISO炭烧猪肉脯80g</a>
                    <span>&yen;9.9</span>
                </div>
                <div class="item">
                    <a class="imgbox" href="/product-86.html">
                        <img src="http://s2.hgcang.com/bsimg/ec/public/images/98/a8/98a8d51e5b2c4b6e806ec6a73a79f38a.png?x-oss-process=style/high" alt="持久不脱妆自动眉笔">
                        <div class="x-Ptag">4色可选</div>                </a>
                    <div class="tagBox">
                    </div>
                    <a class="title" href="/product-86.html">持久不脱妆自动眉笔</a>
                    <span>&yen;9.9</span>
                </div>
                <div class="item">
                    <a class="imgbox" href="/product-608.html">
                        <img src="http://s2.hgcang.com/bsimg/ec/public/images/b7/cf/b7cf7063138738867fbee19632513ecc.png?x-oss-process=style/high" alt="MINISO有机甘栗仁120g">
                    </a>
                    <div class="tagBox">
                    </div>
                    <a class="title" href="/product-608.html">MINISO有机甘栗仁120g</a>
                    <span>&yen;9.9</span>
                </div>
                <div class="item">
                    <a class="imgbox" href="/product-409.html">
                        <img src="http://s2.hgcang.com/bsimg/ec/public/images/5b/4d/5b4d2727ba355451b76a5ebac3fdfd0e.png?x-oss-process=style/high" alt="粉红豹 慵懒款毛绒公仔">
                        <div class="x-Ptag">2款可选</div>                </a>
                    <div class="tagBox">
                    </div>
                    <a class="title" href="/product-409.html">粉红豹 慵懒款毛绒公仔</a>
                    <span>&yen;39.9</span>
                </div>
            </div>
        </div>
    </div>
    <div class="x-whiteBoard">
        <div class="x-main clearfix">
            <div class="x-pb60">
                <div class="x-channelTitle x-categoryList">
                    <h1>居家</h1>
                    <ul>
                        <li>
                            <div></div><a href="/category-channel-16-59.html#cid59">布艺软装</a>
                        </li>
                        <li>
                            <div></div><a href="/category-channel-16-48.html#cid48">清洁保鲜</a>
                        </li>
                        <li>
                            <div></div><a href="/category-channel-16-36.html#cid36">拖鞋</a>
                        </li>
                        <li>
                            <div></div><a href="/category-channel-16-51.html#cid51">家饰</a>
                        </li>
                        <li>
                            <div></div><a href="/category-channel-16-56.html#cid56">浴室用品</a>
                        </li>
                        <li>
                            <div></div><a href="/category-channel-16-55.html#cid55">收纳</a>
                        </li>
                    </ul>
                    <a class="x-pt15" href="/category-channel-16.html">查看更多&nbsp;></a>
                </div>
                <div class="banner2">
                    <a href="http://m.miniso.cn/product-588.html"><img src="http://s2.hgcang.com/bsimg/ec/public/images/b1/28/b1283f394d7d9ace1cd62862c5ee8d37.jpg?x-oss-process=style/high" alt=""></a>
                </div>
                <div class="itemList clearfix">
                    <div class="item">
                        <a class="imgbox" href="/product-282.html">
                            <img src="http://s2.hgcang.com/bsimg/ec/public/images/ba/6d/ba6ded9d1051f512d8a7c986f8c6fdd7.png?x-oss-process=style/high" alt="舒适防滑家居拖鞋">
                            <div class="x-Ptag">2色可选</div>    </a>
                        <div class="tagBox">
                        </div>
                        <a class="title" href="/product-282.html">舒适防滑家居拖鞋</a>
                        <span>&yen;14.9</span>
                    </div>
                    <div class="item">
                        <a class="imgbox" href="/product-372.html">
                            <img src="http://s2.hgcang.com/bsimg/ec/public/images/dc/a3/dca3e6b1e325ce8503f7830f00e3ca4e.png?x-oss-process=style/high" alt="舒适脚感家居拖鞋">
                            <div class="x-Ptag">三色可选</div>    </a>
                        <div class="tagBox">
                        </div>
                        <a class="title" href="/product-372.html">舒适脚感家居拖鞋</a>
                        <span>&yen;29.9</span>
                    </div>
                    <div class="item">
                        <a class="imgbox" href="/product-290.html">
                            <img src="http://s1.hgcang.com/bsimg/ec/public/images/30/e1/30e13443268ce9bf353ffabbb67b2ea5.png?x-oss-process=style/high" alt="吸湿发热情侣款家居半包保暖棉拖">
                            <div class="x-Ptag">4色可选</div>    </a>
                        <div class="tagBox">
                        </div>
                        <a class="title" href="/product-290.html">吸湿发热情侣款家居半包保暖棉拖</a>
                        <span>&yen;29.9</span>
                    </div>
                    <div class="item">
                        <a class="imgbox" href="/product-185.html">
                            <img src="http://s1.hgcang.com/bsimg/ec/public/images/f2/5d/f25d5f9667f265ae31899cb31c3da4fa.png?x-oss-process=style/high" alt="和风物语手帕纸18包">
                        </a>
                        <div class="tagBox">
                        </div>
                        <a class="title" href="/product-185.html">和风物语手帕纸18包</a>
                        <span>&yen;9.9</span>
                    </div>
                </div>
            </div>
            <div class="x-pb60">
                <div class="x-channelTitle x-categoryList">
                    <h1>餐厨</h1>
                    <ul>
                        <li>
                            <div></div><a href="/category-channel-14-53.html#cid53">功能厨具</a>
                        </li>
                        <li>
                            <div></div><a href="/category-channel-14-35.html#cid35">餐具</a>
                        </li>
                        <li>
                            <div></div><a href="/category-channel-14-15.html#cid15">杯壶</a>
                        </li>
                    </ul>
                    <a class="x-pt15" href="/category-channel-14.html">查看更多&nbsp;></a>
                </div>
                <div class="banner2">
                    <a href="http://m.miniso.cn/product-649.html"><img src="http://s2.hgcang.com/bsimg/ec/public/images/33/b6/33b66b3ec28c76410b5fc9fc3c34feb2.jpg?x-oss-process=style/high" alt=""></a>
                </div>
                <div class="itemList clearfix">
                    <div class="item">
                        <a class="imgbox" href="/product-176.html">
                            <img src="http://s2.hgcang.com/bsimg/ec/public/images/9c/ec/9cec2847267a347cf0bf7488bd1d4140.png?x-oss-process=style/high" alt="保龄球手提杯250ml">
                            <div class="x-Ptag">4色可选</div>    </a>
                        <div class="tagBox">
                        </div>
                        <a class="title" href="/product-176.html">保龄球手提杯250ml</a>
                        <span>&yen;9.9</span>
                    </div>
                    <div class="item">
                        <a class="imgbox" href="/product-61.html">
                            <img src="http://s2.hgcang.com/bsimg/ec/public/images/fd/0b/fd0b892927eae0ff82a422da072bee4b.png?x-oss-process=style/high" alt="便携简约经典保温杯300ml">
                            <div class="x-Ptag">3色可选</div>    </a>
                        <div class="tagBox">
                        </div>
                        <a class="title" href="/product-61.html">便携简约经典保温杯300ml</a>
                        <span>&yen;24.9</span>
                    </div>
                    <div class="item">
                        <a class="imgbox" href="/product-239.html">
                            <img src="http://s1.hgcang.com/bsimg/ec/public/images/18/ee/18ee569f9d21f43bcf6dfbe0c8a604d5.png?x-oss-process=style/high" alt="高级西餐餐具套装">
                        </a>
                        <div class="tagBox">
                            <span class="tag" style="background:#c4061a; color:#ffffff">买赠</span>
                        </div>
                        <a class="title" href="/product-239.html">高级西餐餐具套装</a>
                        <span>&yen;39.9</span>
                    </div>
                    <div class="item">
                        <a class="imgbox" href="/product-50.html">
                            <img src="http://s1.hgcang.com/bsimg/ec/public/images/43/c3/43c3113ee40f0aecab10c45e128c0021.png?x-oss-process=style/high" alt="12小时长效时尚超轻量保温杯">
                            <div class="x-Ptag">3色可选</div>    </a>
                        <div class="tagBox">
                        </div>
                        <a class="title" href="/product-50.html">12小时长效时尚超轻量保温杯</a>
                        <span>&yen;49.9</span>
                    </div>
                </div>
            </div>
            <div class="x-pb60">
                <div class="x-channelTitle x-categoryList">
                    <h1>服装</h1>
                    <ul>
                        <li>
                            <div></div><a href="/category-channel-20-21.html#cid21">T恤</a>
                        </li>
                        <li>
                            <div></div><a href="/category-channel-20-23.html#cid23">内衣</a>
                        </li>
                        <li>
                            <div></div><a href="/category-channel-20-45.html#cid45">丝袜</a>
                        </li>
                        <li>
                            <div></div><a href="/category-channel-20-26.html#cid26">袜子</a>
                        </li>
                        <li>
                            <div></div><a href="/category-channel-20-29.html#cid29">内裤</a>
                        </li>
                        <li>
                            <div></div><a href="/category-channel-20-58.html#cid58">服饰配件</a>
                        </li>
                    </ul>
                    <a class="x-pt15" href="/category-channel-20.html">查看更多&nbsp;></a>
                </div>
                <div class="banner2">
                    <a href="http://m.miniso.cn/product-307.html"><img src="http://s2.hgcang.com/bsimg/ec/public/images/7b/59/7b59e4658a847a8375f3e3867974aee6.jpg?x-oss-process=style/high" alt=""></a>
                </div>
                <div class="itemList clearfix">
                    <div class="item">
                        <a class="imgbox" href="/product-345.html">
                            <img src="http://s2.hgcang.com/bsimg/ec/public/images/f3/10/f3105ddec9d5ea579478b1eb05d21241.png?x-oss-process=style/high" alt="2条装强·15D超密莱卡包芯丝棉裆丝袜">
                            <div class="x-Ptag">3色可选</div>    </a>
                        <div class="tagBox">
                        </div>
                        <a class="title" href="/product-345.html">2条装强·15D超密莱卡包芯丝棉裆丝袜</a>
                        <span>&yen;29.9</span>
                    </div>
                    <div class="item">
                        <a class="imgbox" href="/product-232.html">
                            <img src="http://s1.hgcang.com/bsimg/ec/public/images/ea/ee/eaee86b896f287d4a5a09d06896a969b.png?x-oss-process=style/high" alt="升温男士长袖圆领打底衣">
                            <div class="x-Ptag">2色可选</div>    </a>
                        <div class="tagBox">
                        </div>
                        <a class="title" href="/product-232.html">升温男士长袖圆领打底衣</a>
                        <span>&yen;49.9</span>
                    </div>
                    <div class="item">
                        <a class="imgbox" href="/product-334.html">
                            <img src="http://s2.hgcang.com/bsimg/ec/public/images/fd/6d/fd6d6fc943040d5d1fa5246158c8eb58.png?x-oss-process=style/high" alt="3双装 小撞色女士浅口短袜">
                            <div class="x-Ptag">5色可选</div>    </a>
                        <div class="tagBox">
                        </div>
                        <a class="title" href="/product-334.html">3双装 小撞色女士浅口短袜</a>
                        <span>&yen;29.9</span>
                    </div>
                    <div class="item">
                        <a class="imgbox" href="/product-331.html">
                            <img src="http://s1.hgcang.com/bsimg/ec/public/images/ba/03/ba036ccdd87e1dc082b357ddbbbc8f47.png?x-oss-process=style/high" alt="3双装 日式条纹女士浅口短袜">
                            <div class="x-Ptag">3色可选</div>    </a>
                        <div class="tagBox">
                        </div>
                        <a class="title" href="/product-331.html">3双装 日式条纹女士浅口短袜</a>
                        <span>&yen;29.9</span>
                    </div>
                </div>
            </div>
            <div class="x-pb60">
                <div class="x-channelTitle x-categoryList">
                    <h1>美护</h1>
                    <ul>
                        <li>
                            <div></div><a href="/category-channel-18-19.html#cid19">美妆</a>
                        </li>
                        <li>
                            <div></div><a href="/category-channel-18-52.html#cid52">身体护理</a>
                        </li>
                        <li>
                            <div></div><a href="/category-channel-18-32.html#cid32">口腔护理</a>
                        </li>
                        <li>
                            <div></div><a href="/category-channel-18-41.html#cid41">洗发护发</a>
                        </li>
                        <li>
                            <div></div><a href="/category-channel-18-33.html#cid33">美护工具</a>
                        </li>
                    </ul>
                    <a class="x-pt15" href="/category-channel-18.html">查看更多&nbsp;></a>
                </div>
                <div class="banner2">
                    <a href="http://m.miniso.cn/product-567.html"><img src="http://s1.hgcang.com/bsimg/ec/public/images/03/42/0342b719039c646db5f3fa6633ee9314.jpg?x-oss-process=style/high" alt=""></a>
                </div>
                <div class="itemList clearfix">
                    <div class="item">
                        <a class="imgbox" href="/product-487.html">
                            <img src="http://s2.hgcang.com/bsimg/ec/public/images/ae/3c/ae3ca2e8f02a6c3cd948424338a1a2fd.png?x-oss-process=style/high" alt="持久保湿香体喷雾">
                            <div class="x-Ptag">3种香味</div>    </a>
                        <div class="tagBox">
                        </div>
                        <a class="title" href="/product-487.html">持久保湿香体喷雾</a>
                        <span>&yen;9.9</span>
                    </div>
                    <div class="item">
                        <a class="imgbox" href="/product-318.html">
                            <img src="http://s2.hgcang.com/bsimg/ec/public/images/58/48/58480c02b18a9122e702dfedee926d0c.png?x-oss-process=style/high" alt="免水洗发喷雾50ml">
                            <div class="x-Ptag">2款可选</div>    </a>
                        <div class="tagBox">
                        </div>
                        <a class="title" href="/product-318.html">免水洗发喷雾50ml</a>
                        <span>&yen;9.9</span>
                    </div>
                    <div class="item">
                        <a class="imgbox" href="/product-86.html">
                            <img src="http://s1.hgcang.com/bsimg/ec/public/images/98/a8/98a8d51e5b2c4b6e806ec6a73a79f38a.png?x-oss-process=style/high" alt="持久不脱妆自动眉笔">
                            <div class="x-Ptag">4色可选</div>    </a>
                        <div class="tagBox">
                        </div>
                        <a class="title" href="/product-86.html">持久不脱妆自动眉笔</a>
                        <span>&yen;9.9</span>
                    </div>
                    <div class="item">
                        <a class="imgbox" href="/product-567.html">
                            <img src="http://s1.hgcang.com/bsimg/ec/public/images/8b/91/8b917bbeb727961e97eb56a0138a9cfc.png?x-oss-process=style/high" alt="mini poni水感丝滑雾面唇釉">
                            <div class="x-Ptag">6色可选</div>    </a>
                        <div class="tagBox">
                        </div>
                        <a class="title" href="/product-567.html">mini poni水感丝滑雾面唇釉</a>
                        <span>&yen;24.9</span>
                    </div>
                </div>
            </div>
            <div class="x-pb60">
                <div class="x-channelTitle x-categoryList">
                    <h1>出行</h1>
                    <ul>
                        <li>
                            <div></div><a href="/category-channel-27-54.html#cid54">箱包</a>
                        </li>
                        <li>
                            <div></div><a href="/category-channel-27-28.html#cid28">旅行用品</a>
                        </li>
                    </ul>
                    <a class="x-pt15" href="/category-channel-27.html">查看更多&nbsp;></a>
                </div>
                <div class="banner2">
                    <a href="http://m.miniso.cn/product-627.html"><img src="http://s2.hgcang.com/bsimg/ec/public/images/f9/af/f9af2d9fc100849139778fd32aa02fd0.jpg?x-oss-process=style/high" alt=""></a>
                </div>
                <div class="itemList clearfix">
                    <div class="item">
                        <a class="imgbox" href="/product-181.html">
                            <img src="http://s2.hgcang.com/bsimg/ec/public/images/2a/72/2a72c18b80b70ce5988db667e161597b.png?x-oss-process=style/high" alt="简约便携旅行套装5件套">
                        </a>
                        <div class="tagBox">
                        </div>
                        <a class="title" href="/product-181.html">简约便携旅行套装5件套</a>
                        <span>&yen;9.9</span>
                    </div>
                    <div class="item">
                        <a class="imgbox" href="/product-301.html">
                            <img src="http://s1.hgcang.com/bsimg/ec/public/images/32/cd/32cd5d41f99300349fa09021d37d81b8.png?x-oss-process=style/high" alt="魔棒车载出风口固体香水">
                            <div class="x-Ptag">4色可选</div>    </a>
                        <div class="tagBox">
                        </div>
                        <a class="title" href="/product-301.html">魔棒车载出风口固体香水</a>
                        <span>&yen;28.9</span>
                    </div>
                    <div class="item">
                        <a class="imgbox" href="/product-573.html">
                            <img src="http://s1.hgcang.com/bsimg/ec/public/images/e1/71/e171b12bf0a7c7d4af2820d64a56733d.png?x-oss-process=style/high" alt="超大容量多功能双肩包">
                        </a>
                        <div class="tagBox">
                            <span class="tag" style="background:#c4061a; color:#ffffff">买赠</span>
                        </div>
                        <a class="title" href="/product-573.html">超大容量多功能双肩包</a>
                        <span>&yen;109.0</span>
                    </div>
                    <div class="item">
                        <a class="imgbox" href="/product-449.html">
                            <img src="http://s2.hgcang.com/bsimg/ec/public/images/30/78/307861226d6cf94a112591390939551d.png?x-oss-process=style/high" alt="卡通硅胶零钱包">
                            <div class="x-Ptag">2款可选</div>    </a>
                        <div class="tagBox">
                        </div>
                        <a class="title" href="/product-449.html">卡通硅胶零钱包</a>
                        <span>&yen;9.9</span>
                    </div>
                </div>
            </div>
            <div class="x-pb60">
                <div class="x-channelTitle x-categoryList">
                    <h1>电器</h1>
                    <ul>
                        <li>
                            <div></div><a href="/category-channel-37-17.html#cid17">生活电器</a>
                        </li>
                        <li>
                            <div></div><a href="/category-channel-37-39.html#cid39">数码</a>
                        </li>
                    </ul>
                    <a class="x-pt15" href="/category-channel-37.html">查看更多&nbsp;></a>
                </div>
                <div class="banner2">
                    <a href="http://m.miniso.cn/product-624.html"><img src="http://s1.hgcang.com/bsimg/ec/public/images/9d/13/9d13c67356edfed68a1889ed915dc10d.jpg?x-oss-process=style/high" alt=""></a>
                </div>
                <div class="itemList clearfix">
                    <div class="item">
                        <a class="imgbox" href="/product-83.html">
                            <img src="http://s1.hgcang.com/bsimg/ec/public/images/b4/c0/b4c057fb2fc60e5415292b4a645d8393.png?x-oss-process=style/high" alt="节能环保小夜灯">
                        </a>
                        <div class="tagBox">
                        </div>
                        <a class="title" href="/product-83.html">节能环保小夜灯</a>
                        <span>&yen;19.9</span>
                    </div>
                    <div class="item">
                        <a class="imgbox" href="/product-315.html">
                            <img src="http://s2.hgcang.com/bsimg/ec/public/images/05/2e/052e41e897ede2eb66e6f80b5d9d8352.png?x-oss-process=style/high" alt="MFI认证苹果数据线1米">
                        </a>
                        <div class="tagBox">
                        </div>
                        <a class="title" href="/product-315.html">MFI认证苹果数据线1米</a>
                        <span>&yen;39.9</span>
                    </div>
                    <div class="item">
                        <a class="imgbox" href="/product-88.html">
                            <img src="http://s2.hgcang.com/bsimg/ec/public/images/d9/1f/d91f51b84ffe0becaf60c5b9974dd194.png?x-oss-process=style/high" alt="智能触控充电阅读台灯">
                        </a>
                        <div class="tagBox">
                        </div>
                        <a class="title" href="/product-88.html">智能触控充电阅读台灯</a>
                        <span>&yen;68.9</span>
                    </div>
                    <div class="item">
                        <a class="imgbox" href="/product-56.html">
                            <img src="http://s2.hgcang.com/bsimg/ec/public/images/88/6a/886a747e5574a40ae816a66002fad818.png?x-oss-process=style/high" alt="可充电多功能便携风扇">
                            <div class="x-Ptag">3色可选</div>    </a>
                        <div class="tagBox">
                        </div>
                        <a class="title" href="/product-56.html">可充电多功能便携风扇</a>
                        <span>&yen;49.9</span>
                    </div>
                </div>
            </div>
            <div class="x-pb60">
                <div class="x-channelTitle x-categoryList">
                    <h1>系列</h1>
                    <ul>
                        <li>
                            <div></div><a href="/category-channel-49-50.html#cid50">粉红豹</a>
                        </li>
                    </ul>
                    <a class="x-pt15" href="/category-channel-49.html">查看更多&nbsp;></a>
                </div>
                <div class="banner2">
                    <a href="http://m.miniso.cn/product-442.html"><img src="http://s1.hgcang.com/bsimg/ec/public/images/d5/4f/d54f36525a3a0d97c76896f743881e36.jpg?x-oss-process=style/high" alt=""></a>
                </div>
                <div class="itemList clearfix">
                    <div class="item">
                        <a class="imgbox" href="/product-409.html">
                            <img src="http://s2.hgcang.com/bsimg/ec/public/images/5b/4d/5b4d2727ba355451b76a5ebac3fdfd0e.png?x-oss-process=style/high" alt="粉红豹 慵懒款毛绒公仔">
                            <div class="x-Ptag">2款可选</div>    </a>
                        <div class="tagBox">
                        </div>
                        <a class="title" href="/product-409.html">粉红豹 慵懒款毛绒公仔</a>
                        <span>&yen;39.9</span>
                    </div>
                    <div class="item">
                        <a class="imgbox" href="/product-447.html">
                            <img src="http://s1.hgcang.com/bsimg/ec/public/images/e2/b1/e2b1323acb3877ba3ab1b4077ccf631a.png?x-oss-process=style/high" alt="粉红豹 亲子装手帕纸18包">
                            <div class="x-Ptag">18包装</div>    </a>
                        <div class="tagBox">
                        </div>
                        <a class="title" href="/product-447.html">粉红豹 亲子装手帕纸18包</a>
                        <span>&yen;9.9</span>
                    </div>
                    <div class="item">
                        <a class="imgbox" href="/product-442.html">
                            <img src="http://s1.hgcang.com/bsimg/ec/public/images/3b/aa/3baac4a90e6d144f4d8a4f675a9e77a5.png?x-oss-process=style/high" alt="粉红豹购物袋">
                            <div class="x-Ptag">3色可选</div>    </a>
                        <div class="tagBox">
                        </div>
                        <a class="title" href="/product-442.html">粉红豹购物袋</a>
                        <span>&yen;19.9</span>
                    </div>
                    <div class="item">
                        <a class="imgbox" href="/product-438.html">
                            <img src="http://s1.hgcang.com/bsimg/ec/public/images/8d/f7/8df7f05f7510c999d48c1af593b5eb41.png?x-oss-process=style/high" alt="粉红豹棒球帽">
                            <div class="x-Ptag">4色可选</div>    </a>
                        <div class="tagBox">
                        </div>
                        <a class="title" href="/product-438.html">粉红豹棒球帽</a>
                        <span>&yen;29.9</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="redBox x-hide">
        <div class="bg"></div>
        <div class="redBox-main">
            <div class="panel rel">
                <div class="picContent rel">
                    <div class="pic rel">
                        <a href="javascript:void(0);" id="closeBtn"></a>
                        <a href='javascript:void(0);' id="okText"></a>
                        <img src="/public/app/siteyx/statics/static/images/newredbox.png" alt="">
                    </div>
                </div>
            </div>
        </div>
        <script>
            var cookieKey = 'indexIsActivityClick'; // 用于标识是否点击活动图片跳到了登录页面 1：是 2：否

            $(function() {
                $('#closeBtn').click(function() {
                    $('.redBox').addClass('x-hide');
                });

                $('.redBox').bind("click", function(e) {
                    $('.redBox').addClass('x-hide');
                    e = e || event;
                    stopFunc(e);
                });

                //阻止向上传递事件　　　　
                $('.pic').bind("click", function(e) {
                    e = e || event;
                    stopFunc(e);
                });

                var isClicking = get_cookie(cookieKey);
                // 模拟点击
                if (isClicking == 1) {
                    set_cookie(cookieKey, 2, 0);
                    $.ajax({
                        url: '/activity-check_get_coupon_quantity.html',
                        cache: false,
                        dataType: "json",
                        data: {},
                        type: "POST",
                        success: function (result) {
                            var data = result.data;
                            if(result.hasOwnProperty('error')) {
                                if (data.error == 2) {
                                    Modal.black({"text": data.msg});
                                }
                            } else if (result.hasOwnProperty('success')) {
                                // 优惠券领取
                                $.ajax({
                                    url: '/member-coupon_multi_receive.html',
                                    cache: false,
                                    dataType: "json",
                                    data: {"cpns_ids": data.coupon_id},
                                    type: "POST",
                                    success: function (res) {
                                        Modal.black({"text": res.msg});
                                    }
                                });
                            }
                        }
                    });
                }

                $('#okText').bind('click', function () {
                    $.ajax({
                        url: '/activity-check_get_coupon_quantity.html',
                        cache: false,
                        dataType: "json",
                        data: {},
                        type: "POST",
                        success: function (result) {
                            var data = result.data;
                            if(result.hasOwnProperty('error')) {
                                flag = true;
                                if (data.error == 1) {
                                    // 用户未登录
                                    set_cookie(cookieKey, 1, 0); // 标识跳到登录页面
                                    location.href = data.url;
                                } else if (data.error == 2) {
                                    Modal.black({"text": data.msg});
                                }
                            } else if (result.hasOwnProperty('success')) {
                                // 优惠券领取
                                $.ajax({
                                    url: '/member-coupon_multi_receive.html',
                                    cache: false,
                                    dataType: "json",
                                    data: {"cpns_ids": data.coupon_id},
                                    type: "POST",
                                    success: function (res) {
                                        flag = true;
                                        Modal.black({"text": res.msg});
                                    }
                                });
                            }
                        }
                    });
                });
                var haveTipped = "1" == '1';
                var firstInnerHome = get_cookie('firstInnerHome');
                var isLogin = get_cookie('UNAME');

                if (haveTipped && firstInnerHome == 1 && isLogin === null) {
                    $('.redBox').removeClass('x-hide');
                }
                set_cookie('firstInnerHome', 2, 0);
            });
            function stopFunc(e) {
                e.stopPropagation ? e.stopPropagation() : e.cancelBubble = true;
            }
            function get_cookie(name)
            {
                var arr = document.cookie.match(new RegExp("(^| )"+name+"=([^;]*)(;|$)"));
                if(arr != null) return unescape(arr[2]); return null;
            }
            //设置cookie
            function set_cookie(name,value,time,path,domain)
            {
                if (time.length>0 && typeof(time) == 'number'){
                    expires = new Date();
                    expires.setTime(expires.getTime() + time);
                }
                document.cookie = name + "="+ escape (value)
                    + (typeof(expires)!=="undefined" ? "; expires=" + expires.toGMTString() : "")
                    + (path ? "; path="+path : "")
                    + (domain ? "; domain="+domain : "");
            }
            //删除cookie
            function del_cookie(name)
            {
                expires = new Date(0);
                set_cookie(name,'',expires);
            }
        </script>
    </div>
    <div class="x-footer">
    <div class="x-whiteBoard footerTop">
        <div class="x-main">
            <ul>
                <li>
                    <h1>服务热线</h1> <h2>400-9965-022</h2> <span>9:00 - 21:00</span>
                </li>
                <li class="middle">
                    <h1>名创优选品牌宣言</h1> <p> 名创优品旗下电商品牌，从名创优品2000家线下旗舰店筛选最优质的产品，秉承从选料，设计，生产，检测都严苛把控，只为把优质的商品送到你面前。 </p>
                </li>
                <li>
                    <h1>扫码关注公众号&nbsp;</h1>
                    <p></p>
                    <img src="http://s1.hgcang.com/bsimg/ec/public/images/67/c2/67c275e04d456892a6922878b842ce60.png?1505372243#h">
                </li>
            </ul>
            <ul>
            </ul>
        </div>
    </div>
    <div class="footerBottom">
        <div class="x-main">
            <div class="x-main">
                <ul class="borderB">
                    <li>
                        <img src="/Public/Home/images/footerIcon1.png" alt=""> <span>名创优选质量保障</span>
                    </li>
                    <li>
                        <img src="/Public/Home/images/footerIcon2.png" alt=""> <span>全场满79元包邮</span>
                    </li>
                    <li>
                        <img src="/Public/Home/images/footerIcon3.png" alt=""> <span>30天无理由退换</span>
                    </li>
                </ul>
                <ul class="link">
                    <li>
                        <a href="/article-index_question-i-13.html">常见问题</a>
                    </li>
                    <li>
                        <a href="/article-index_aftersale-i-15.html">售后服务</a>
                    </li>
                    <li>
                        <a href="/article-index_acceptance-i-14.html">配送与验收</a>
                    </li>
                    <li>
                        <a href="http://p.qiao.baidu.com/im/index?siteid=11018217&amp;ucid=22851248&amp;cw=170918135943703">联系客服</a>
                    </li>
                    <li>
                        <a href="/article-index_privacy-i-25.html">隐私政策</a>
                    </li>
                    <li>
                        <a href="/article-index_service-i-24.html">服务协议</a>
                    </li>
                </ul>
                <p>©&nbsp;2017&nbsp;MINISO&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;备案号：粤ICP备15008399号-3</p>
                <p>为了更好的体验，推荐您使用Chrome浏览器</p>
            </div>
        </div>
    </div>
</div>
</body>
</html>