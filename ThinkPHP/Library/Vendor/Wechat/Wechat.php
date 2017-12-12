<?php

class Wechat{

    //签名
    private $token = '';

    //消息类型
    private $msgtype;

    //消息内容
    private $msgobj;

    //事件类型
    private $eventtype;

    //事件key值
    private $eventkey;

    #{服务号才可得到
    //AppId
    private $appid = "";
    //AppSecret
    private $secret = "";
    #}
    
    private $_isvalid = false;
    
    public function __construct($token,$appid, $secret, $isvalid = false){
        $this->token = $token;
        $this->appid = $appid;
        $this->secret = $secret;
        $this->_isvalid = $isvalid;
    }
    
    /**
     *    执行程序入口
     */
    public function index(){
        if($this->_isvalid){
            $this->valid();
        }
    }

    /**
     *  初次校验
     */
    private function valid(){
        $echoStr = $_GET["echostr"];

        if($this->checkSignature()){
            echo $echoStr;
            exit();
        }
    }

    /**
     *  创建自定义菜单
     */
    public function createMenu($menujson){
        $url = "https://api.weixin.qq.com/cgi-bin/menu/create?access_token=".$this->getAccessToken();

        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS,$menujson);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);

        $info = curl_exec($ch);

        if (curl_errno($ch)) {
            echo 'Errno'.curl_error($ch);
        }

        curl_close($ch);

        var_dump($info);
    }

    /**
     *  删除自定义菜单
     */
    public function deleteMenu(){
        $url = "https://api.weixin.qq.com/cgi-bin/menu/delete?access_token=".$this->getAccessToken();

        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);

        $info = curl_exec($ch);

        if (curl_errno($ch)) {
            echo 'Errno'.curl_error($ch);
        }

        curl_close($ch);

        var_dump($info);

    }

    /**
     *  获取消息
     */
    public function getMsg(){
        //验证消息的真实性
        if(!$this->checkSignature()){
            exit();
        }

        //接收消息
        $poststr = $GLOBALS["HTTP_RAW_POST_DATA"];
        if(!empty($poststr)){
            $this->msgobj = simplexml_load_string($poststr,'SimpleXMLElement',LIBXML_NOCDATA);
            $this->msgtype = strtolower($this->msgobj->MsgType);
        }
        else{
            $this->msgobj = null;
        }
    }

    /**
     *  回复消息
     */
    public function responseMsg(){
        switch ($this->msgtype) {
            case 'text':
                $data = $this->getData($this->msgobj->Content);
                if(empty($data) || !is_array($data)){
                    $content = "ruiblog";
                    $this->textMsg($content);//查询不到记录返回提示信息
                }
                else{
                    $this->newsMsg($data);
                }
                break;
            case 'event':
                $this->eventOpt();
                break;
            default:
                # code...
                break;
        }
    }

    /**
     *  回复文本消息
     */
    public function textMsg($content=''){
        $textxml = "<xml><ToUserName><![CDATA[{$this->msgobj->FromUserName}]]></ToUserName><FromUserName><![CDATA[{$this->msgobj->ToUserName}]]></FromUserName><CreateTime>".time()."</CreateTime><MsgType><![CDATA[text]]></MsgType><Content><![CDATA[%s]]></Content></xml>";
        
        //做搜索处理
        if(empty($content)){
            $content = "查询功能正在开发中...";
        }
        $resultstr = sprintf($textxml,$content);
        echo $resultstr;
    }

    /**
     *  回复图文消息
     */
    public function newsMsg($data){
        if(!is_array($data)){
            exit();
        }
        $newscount = (count($data) > 10)?10:count($data);
        $newsxml = "<xml><ToUserName><![CDATA[{$this->msgobj->FromUserName}]]></ToUserName><FromUserName><![CDATA[{$this->msgobj->ToUserName}]]></FromUserName><CreateTime>".time()."</CreateTime><MsgType><![CDATA[news]]></MsgType><ArticleCount>{$newscount}</ArticleCount><Articles>%s</Articles></xml>";
        $itemxml = "";
        foreach ($data as $key => $value) {
            $itemxml .= "<item>";
            $itemxml .= "<Title><![CDATA[{$value['title']}]]></Title><Description><![CDATA[{$value['summary']}]]></Description><PicUrl><![CDATA[{$value['picurl']}]]></PicUrl><Url><![CDATA[{$value['url']}]]></Url>";
            $itemxml .= "</item>";
        }
        $resultstr = sprintf($newsxml,$itemxml);
        echo $resultstr;
    }

    /**
     *  事件处理
     */
    public function eventOpt(){
        $this->eventtype = strtolower($this->msgobj->Event);
        switch ($this->eventtype) {
            case 'subscribe':

                //做用户绑定处理

                $content = "ruiblog";
                $this->textMsg($content);
                break;
            case 'unsubscribe':
                
                //做用户取消绑定的处理

                break;
            case 'click':
                $this->menuClick();
                break;
            default:
                # code...
                break;
        }
    }

    /**
     *  自定义菜单事件处理
     */
    public function menuClick(){
        $this->eventkey = $this->msgobj->EventKey;
        switch ($this->eventkey) {
            case 'V1001_NEW':
                $data = $this->getData();
                $this->newsMsg($data);
                break;
            default:
                # code...
                break;
        }
    }

    /**
     *    获取本地数据
     */
    public function getData($key='ruiblog'){
        $data = $key;
        //写你自己相关的程序
        return $data;
    }
    
    /**
     *  校验签名
     */
    public function checkSignature(){
        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];    
                
        $token = $this->token;
        $tmpArr = array($token, $timestamp, $nonce);
        sort($tmpArr);
        $tmpStr = implode( $tmpArr );
        $tmpStr = sha1( $tmpStr );
        
        return ($tmpStr == $signature)?true:false;
    }

    /**
     *  获取access token
     */
    public function getAccessToken(){
        $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=$this->appid&secret=$this->secret";
        $atjson=file_get_contents($url);
        $result=json_decode($atjson,true);//json解析成数组
        if(!isset($result['access_token'])){
            exit( '获取access_token失败！' );
        }
        return $result["access_token"];
    }
}

?>