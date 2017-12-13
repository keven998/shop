<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Cache-Control" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1, user-scalable=no">
    <title>管理登录</title>
    <link href="/Public/Admin/css/login.css" type="text/css" rel="stylesheet">
    <script type="text/javascript" src="/Public/Admin/js/jquery-1.9.0.min.js"></script>
    <script type="text/javascript" src="/Public/COM/js/layer.js"></script>
</head>
<body>
<div class="login">
    <div class="message">管理登录</div>
    <div id="darkbannerwrap"></div>
    <form method="post" id="loginForm">
        <input name="username" placeholder="用户名" required="" type="text">
        <hr class="hr15">
        <input name="password" placeholder="密码" required="" type="password">
        <hr class="hr15">
        <input name="code" placeholder="验证码" maxlength="4" required="" type="text" style="float: left;width: 160px;">
        <img src="<?php echo U('public/verify');?>" onclick="changeVerify(this)" class="captcha" id="verify" alt="点击更换验证码" title="点击更换验证码">
        <hr class="hr15">
        <input value="登录" style="width:100%;" type="button" id="login">
        <hr class="hr20">
    </form>
</div>
<div class="copyright">Coder by @ <a href="https://www.zenghao.cc" target="_blank">Mr Jack</a> - CopyRight © 2017
    <a href="http://www.miitbeian.gov.cn/" target="_blank">赣ICP备15006768号-5</a></div>
</body>
<script type="text/javascript">
    $(function(){
        $('#login').click(function(){
            handLogin();
        })

        $('#loginForm').keydown(function(event){
            if (event.keyCode == 13) {
                handLogin();
            }
        });
    })
    function handLogin(){
        if($('input[name="username"]').val() == ''){
            layer.msg('用户名不能为空');
            $('input[name="username"]').focus();
            return false;
        }
        if($('input[name="password"]').val() == ''){
            layer.msg('密码不能为空');
            $('input[name="password"]').focus();
            return false;
        }
        if($('input[name="code"]').val() == ''){
            layer.msg('验证码不能为空');
            $('input[name="code"]').focus();
            return false;
        }
        $.post("<?php echo U('public/login');?>",{'username':$('input[name="username"]').val(), 'password':$('input[name="password"]').val(),'code': $('input[name="code"]').val()},function(data){
            if(!data.error){
                location.href = "<?php echo U('index/index');?>";
            }else{
                layer.msg(data.msg);
                $('#verify').click();
            }
        },'json')
    }
    function changeVerify(obj){
        $(obj).attr('src',$(obj).attr('src')+'?'+Math.random());
    }
</script>
</html>