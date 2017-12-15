<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo ($WEB_NAME); ?> - 登录</title>
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
    <!-- 登录板块 开始 -->
    <div class="x-login x-signIn">
        <div class="x-main">
            <div class="board x-flr">
                <p>账号登录</p>
                <!-- 输入限制为数字且最大输入数为11位 -->
                <!-- <input maxlength="11" placeholder="手机号码" onkeyup="value=value.replace(/[^\d]/g,'')" onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/[^\d]/g,''))"> -->
                <!-- 不做输入限制 -->
                <div class="x-input x-pb12">
                    <div class="phone x-Licon"></div>
                    <input class="x-left" type="text" placeholder="手机号码" name="uname">
                </div>
                <div class="x-input">
                    <div class="lock x-Licon"></div>
                    <input class="x-left" type="password" placeholder="输入密码" name="password">
                </div>
                <div class="h75">
                    <!-- x-hide隐藏验证input栏 -->
                    <div class="x-input x-verificationCode x-pb12 x-hide" id="input-vcode">
                        <input class="x-left" type="text" placeholder="验证码" name="verifycode">
                        <div class="x-codeArea" onclick="$('#vcode').attr('src', '/index-gen_vcode-b2c-4.html?r='+Math.random());"><img id="vcode" width="98" height="36"></div>
                    </div>
                    <div class="x-red" id="err-msg"></div>
                </div>
                <button class="x-redBtn" id="submit-btn">登录</button>
                <div class="etc">
                    <a href="<?php echo U('passport/lost');?>">忘记密码&nbsp;?</a>
                    <a class="x-flr" href="<?php echo U('passport/register');?>">注册</a>
                </div>
                <div class="loginThirdParty">
                    <div>
                        <a href="https://open.weixin.qq.com/connect/qrconnect?appid=wxf5ec9e991627f395&response_type=code&scope=snsapi_login&redirect_uri=http%3A%2F%2Fm.miniso.cn%2Fopenapi%2Ftrustlogin_api%2Fparse%2Ftrustlogin_plugin_weixin%2Fcallback%2F&state=ecf0ff76b96c60cf305ed2125e7439c8" data-link="https://open.weixin.qq.com/connect/qrconnect?appid=wxf5ec9e991627f395&response_type=code&scope=snsapi_login&redirect_uri=http%3A%2F%2Fm.miniso.cn%2Fopenapi%2Ftrustlogin_api%2Fparse%2Ftrustlogin_plugin_weixin%2Fcallback%2F&state=ecf0ff76b96c60cf305ed2125e7439c8" onclick="imageUrl(this,'微信');"><img src="http://m.miniso.cn/public/app/trustlogin/statics/weixin.png" alt="">
                            <span>微信</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="login_container">

    </div>

    <script>
        var msg = '';
        if(msg!=''){
            Modal.black({
                text : msg,
                hold : 3000
            })
        }

        $(document).keyup(function(e) {
            if(e.keyCode == 13){
                loginSubmit();
            }
        });
        $('#submit-btn').click(function (e) {
            loginSubmit();
        });

        function loginSubmit() {
            var param = {};
            param.uname = $.trim($('input[name="uname"]').val());
            param.password = $('input[name="password"]').val();
            param.verifycode = $('input[name="verifycode"]').val();
            if (param.uname.length <= 0) {
                $('#err-msg').html('请输入手机号');
                $('input').removeClass('x-redBorder');
                $('input[name="uname"]').addClass('x-redBorder');
                return;
            }
            if (param.password.length <= 0) {
                $('#err-msg').html('请输入密码');
                $('input').removeClass('x-redBorder');
                $('input[name="password"]').addClass('x-redBorder');
                return;
            }

            var url = "/passport-post_login.html";
            $.post(url, param,function (rs) {
                if (rs.error) {
                    $('#err-msg').html(rs.error);
                    checkIsNeedVcode(param);
                } else if (rs.success) {
                    location.href = rs.redirect;
                }
            }, 'JSON');
        }

        //检查是否需要验证码
        function checkIsNeedVcode(param) {
            var url = "/passport-ajax_check_login_is_need_vcode.html";
            $.post(url, param,function (rs) {
                if (rs) {
                    $('#input-vcode').removeClass('x-hide');
                    $('#vcode').attr('src', '/index-gen_vcode-b2c-4.html?r='+Math.random());
                } else {
                    $('#input-vcode').addClass('x-hide');
                }
            }, 'JSON');
        }

    </script>

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