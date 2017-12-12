$(function(){
    /*左侧导航栏显示隐藏功能*/
    $(".subNav").click(function(){		
		/*显示*/
		if($(this).find("span:first-child").attr('class')=="title-icon glyphicon glyphicon-chevron-down")
		{
			$(this).find("span:first-child").removeClass("glyphicon-chevron-down");
		    $(this).find("span:first-child").addClass("glyphicon-chevron-right");
		    $(this).removeClass("sublist-down");
			$(this).addClass("sublist-up");
            $(".navContent").slideUp(300)
            
		}
		/*隐藏*/
		else
		{
            $('.subNav').find("span:first-child").removeClass("glyphicon-chevron-down");
        $('.subNav').find("span:first-child").addClass("glyphicon-chevron-right");
			$(this).find("span:first-child").removeClass("glyphicon-chevron-right");
			$(this).find("span:first-child").addClass("glyphicon-chevron-down");
			$(this).removeClass("sublist-up");
			$(this).addClass("sublist-down");
            $(".navContent").slideUp(300)
            $(this).next(".navContent").slideDown(300);

		}	

		
	})
    /*左侧导航栏缩进功能*/
    $(".left-main .sidebar-fold").click(function(){
    	if($(this).parent().attr('class')=="left-main left-full")
    	{
    		$(this).parent().removeClass("left-full");
    		$(this).parent().addClass("left-off");
    		$(this).parent().parent().find(".right-product").removeClass("right-full");
    		$(this).parent().parent().find(".right-product").addClass("right-off");
    	}
    	else
    	{
    		$(this).parent().removeClass("left-off");
    		$(this).parent().addClass("left-full");
    		$(this).parent().parent().find(".right-product").removeClass("right-off");
    		$(this).parent().parent().find(".right-product").addClass("right-full");
    	}
    })	
     
      /*左侧鼠标移入提示功能*/
    $(".sBox ul li").mouseenter(function(){
		if($(this).find("span:last-child").css("display")=="none")
		{
            $(this).find("div").show();
        }
	})
    .mouseleave(function(){$(this).find("div").hide();})	
    detectBrowser();
})
 
function detectBrowser()
{
    var browser = navigator.appName
    if(navigator.userAgent.indexOf("MSIE")>0){ 
        var b_version = navigator.appVersion
        var version = b_version.split(";");
        var trim_Version = version[1].replace(/[ ]/g,"");
        if ((browser=="Netscape"||browser=="Microsoft Internet Explorer"))
        {
            if(trim_Version == 'MSIE8.0' || trim_Version == 'MSIE7.0' || trim_Version == 'MSIE6.0'){
                alert('请使用IE9.0版本以上进行访问');
                return;
            }
        }
    }
}


// 验证手机号
function checkMobile(tel) {
    var reg = /(^1[3|4|5|7|8][0-9]{9}$)/;
    if (reg.test(tel)) {
        return true;
    }else{
        return false;
    };
}

/*
 * 上传图片 后台专用
 * @access  public
 * @null int 一次上传图片张图
 * @elementid string 上传成功后返回路径插入指定ID元素内
 * @path  string 指定上传保存文件夹,默认存在Public/upload/temp/目录
 * @callback string  回调函数(单张图片返回保存路径字符串，多张则为路径数组 )
 */
function GetUploadify(num,elementid,path,callback)
{       
    var upurl ='/index.php?m=Admin&c=Uploadify&a=upload&num='+num+'&input='+elementid+'&path='+path+'&func='+callback;
    var iframe_str='<iframe frameborder="0" ';
    iframe_str=iframe_str+'id=uploadify ';          
    iframe_str=iframe_str+' src='+upurl;
    iframe_str=iframe_str+' allowtransparency="true" class="uploadframe" scrolling="no"> ';
    iframe_str=iframe_str+'</iframe>';                  
    $("body").append(iframe_str);   
    $("iframe.uploadframe").css("height",$(document).height()).css("width","100%").css("position","absolute").css("left","0px").css("top","0px").css("z-index","999999").show();
    $(window).resize(function(){
        $("iframe.uploadframe").css("height",$(document).height()).show();
    });
}


// 修改指定表的排序字段
function updateSort(table,id_name,id_value,field,obj)
{              
    var value = $(obj).val();
    $.ajax({
        url:"/index.php?m=Admin&c=Index&a=changeTableVal&table="+table+"&id_name="+id_name+"&id_value="+id_value+"&field="+field+'&value='+value,           
        success: function(data){                                    
            layer.msg('更新成功', {icon: 1});   
        }
    });     
}


// 修改指定表的指定字段值
function changeTableVal(table,id_name,id_value,field,obj)
{
    var src = "";
    if($(obj).attr('src').indexOf("cancel.png") > 0 )
    {          
        src = '/Public/Admin/images/yes.png';
        var value = 1;
        
    }else{                    
        src = '/Public/Admin/images/cancel.png';
        var value = 0;
    }                                                 
    $.ajax({
        url:"/index.php?m=Admin&c=Index&a=changeTableVal&table="+table+"&id_name="+id_name+"&id_value="+id_value+"&field="+field+'&value='+value,           
        success: function(data){                                    
            $(obj).attr('src',src);           
        }
    });     
}

/**
* ajax 提交表单 到后台去验证然后回到前台提示错误
* 验证通过后,再通过 form 自动提交
*/
before_request = 1; // 标识上一次ajax 请求有没回来, 没有回来不再进行下一次
function ajax_submit_form(form_id,submit_url){
    if(before_request == 0)
        return false;
              
    $("[id^='err_']").hide();  // 隐藏提示
    $.ajax({
        type : "POST",
        url  : submit_url,
        data : $('#'+form_id).serialize(),// 你的formid                
        error: function(request) {
                alert("服务器繁忙, 请联系管理员!");
        },
        success: function(v) {
            before_request = 1; // 标识ajax 请求已经返回
            var v =  eval('('+v+')');
                // 验证成功提交表单
            if(v.hasOwnProperty('status'))
            {      
                // alert(v.msg);
                layer.msg(v.msg);
                if(v.status == 1)
                {
                    if(v.hasOwnProperty('data')){
                        if(v.data.hasOwnProperty('url')){
                            location.href = v.data.url;
                        }else{
                            location.href = location.href;
                        }
                    }else{
                        location.href = location.href;
                    }
                    return true;
                }
                if(v.status == 0)
                {
                    // alert(v.msg);
                    layer.msg(v.msg);
                    return false;
                }
                    //return false;
            }
                 // 验证失败提示错误
             for(var i in v['data'])
             {
                $("#err_"+i).text(v['data'][i]).show(); // 显示对于的 错误提示
            }
        }
    });   
    before_request = 0; // 标识ajax 请求已经发出
}

/**
 * 获取城市
 * @param t  省份select对象
 */
function get_city(t){
    var parent_id = $(t).val();
    if(!parent_id > 0){
        return;
    }
    $('#twon').empty().css('display','none');
    var url = '/index.php?m=Admin&c=Api&a=getRegion&level=2&parent_id='+ parent_id;
    $.ajax({
        type : "GET",
        url  : url,
        error: function(request) {
            alert("服务器繁忙, 请联系管理员!");
            return;
        },
        success: function(v) {
            v = '<option value="0">选择城市</option>'+ v;          
            $('#city').empty().html(v);
        }
    });
}

/**
 * 获取地区
 * @param t  城市select对象
 */
function get_area(t){
    var parent_id = $(t).val();
    if(!parent_id > 0){
        return;
    }
    var url = '/index.php?m=Admin&c=Api&a=getRegion&level=3&parent_id='+ parent_id;
    $.ajax({
        type : "GET",
        url  : url,
        error: function(request) {
            alert("服务器繁忙, 请联系管理员!");
            return;
        },
        success: function(v) {
            v = '<option>选择区域</option>'+ v;
            $('#district').empty().html(v);
        }
    });
}
// 获取最后一级乡镇
function get_twon(obj){
    var parent_id = $(obj).val();
    var url = '/index.php?m=Admin&c=Api&a=getTwon&parent_id='+ parent_id;
    $.ajax({
        type : "GET",
        url  : url,
        success: function(res) {
            if(parseInt(res) == 0){
                $('#twon').empty().css('display','none');
            }else{
                $('#twon').css('display','block');
                $('#twon').empty().html(res);
            }
        }
    });
}















































