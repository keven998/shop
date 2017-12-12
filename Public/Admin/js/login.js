$(document).ready(function() {
	$("#loginBtn").click(function(){
		login();
	});
	$(document).keyup(function(event){ 
		if(event.keyCode == 13){
			login();
		} 
	}); 
});
function login(){
	if($('#username').val() == ''){
		layer.msg('账号不能为空');
		return false;
	}
	if($('#password').val() == ''){
		layer.msg('密码不能为空');
		return false;
	}
	$.post(loginHandleUrl,{'username':$('#username').val(), 'password':$('#password').val()},function(data){
		if(!data.status){
			layer.msg(data.msg,{icon:1,shade: [0.8, '#393D49']});
			setTimeout(function(){
				location.href = homeUrl;
			},1500)
			
		}else{
			layer.msg(data.msg,{icon:2,shade: [0.8, '#393D49']});
		}
	},'json')
}