<?php
namespace Api\Controller;
use Common\Controller\HomeBaseController;
class WeixinController extends HomeBaseController{
	public function index(){
    	$signature = $_GET["signature"];
    	$nonce = $_GET["nonce"];
    	$timestamp = $_GET["timestamp"];
    	$echoStr = $_GET["echostr"];
    	$token = C('WEIXINPAY_CONFIG.TOKEN');
    	$tmpArr = array($token, $timestamp, $nonce);
    	sort($tmpArr);
        $tmpStr = sha1(join( $tmpArr ));
        if($signature == $tmpStr){
        	echo $echoStr;
        }
        $postStr = $GLOBALS["HTTP_RAW_POST_DATA"];
        if($postStr){
        	$postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
        	$postArr = json_decode(json_encode($postObj), true);
            // p($postArr);
        	// 接受用户发送的信息类型
        	switch ($postArr['MsgType']) {
        		//关注/取消关注事件
        		case 'event':
                    //用户关注公众号操作
        			if($postArr['Event'] == 'subscribe'){

        				$keyArray = explode("_", $postArr['EventKey']);
        				echo $keyArray[1];
                        // $_result = M('wechatFollow')->where(array('level'=>1))->find();
                        // if($_result){
                        //     if($_result['type'] ==2){
                        //         echo subscribeImg($postArr, $_result);
                        //     }else{
                        //         echo sendText($postArr, $_result['content']);
                        //     }
                        // }  
        				
        			}
                    // 点击菜单拉取消息时的事件推送
                    if($postArr['Event'] == 'CLICK'){
                        $_result = M('wechatKey')->select();
                        foreach($_result as $val){
                            if($postArr['EventKey'] == $val['key']){
                                echo sendText($postArr, $val['content']);
                            }
                        }
                    }

                    // 上报地理位置事件
                    if($postArr['Event'] == 'LOCATION'){
                    }
        			break;

        		// 接收文本消息
        		case 'text':
        			$_result = M('wechatKey')->where(array('key'=>$postArr['Content']))->find();
                    if($_result){
                        echo sendText($postArr, $_result['content']);
                    }
                            
        			break;

        		// 接收图片消息
        		case 'image':
        			break;

                // 接收地理位置消息
                case 'location' :
                    break;

        		// 接收语音消息
        		case 'voice':
        			break;
        		// 接收视频消息
        		case 'video':
        			break;
        		//接收音乐消息
        		case 'music':
        			break;
        		//接收图文消息
        		case 'news':
        			break;
        	} 
        }else{
        	echo ""; 
           	exit; 
        }
    }

    public function getTicket(){
    	$accessToken = getAccessToken(C('WEIXINPAY_CONFIG.APPID'), C('WEIXINPAY_CONFIG.APPSECRET'));
    	$url = "https://api.weixin.qq.com/cgi-bin/qrcode/create?access_token={$accessToken}";
    	$data = array(
    		'action_name' => 'QR_LIMIT_STR_SCENE',
    		'action_info' => array(
    			'scene' => array(
    				'scene_str' => '123456'
    				)
    			)
    		);
    	$_result = json_decode(https_request($url, json_encode($data)), true);
    	if($_result){
    		echo $url = "https://mp.weixin.qq.com/cgi-bin/showqrcode?ticket=".urlencode($_result['ticket']);

    		// header('location:'.$url);

    	}
    }
}
?>