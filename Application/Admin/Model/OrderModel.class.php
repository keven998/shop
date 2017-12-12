<?php 
// +----------------------------------------------------------------------
// | 订单表模型
// +----------------------------------------------------------------------
// | Copyright (c) 2016 http://www.zenghao.cc All rights reserved.
// +----------------------------------------------------------------------
// | Author: isum <http://www.zenghao.cc>
// +----------------------------------------------------------------------
namespace Admin\Model;
use Common\Model\BaseModel;
class OrderModel extends BaseModel{
	
	/**
	 * 订单基本信息
	 * @param  [type] $order_id [description]
	 * @return [type]           [description]
	 */
    public function getOrderInfo($order_id)
    {
        //  订单总金额查询语句		
        $order = M('order')->where("order_id = $order_id")->find();
        $order['address2'] = $this->getAddressName($order['province'],$order['city'],$order['district']);
        $order['address2'] = $order['address2'].$order['address'];		
        return $order;
    }

     /*
     * 根据商品型号获取商品
     */
    public function get_spec_goods($goods_id_arr){
        if(!is_array($goods_id_arr)) return false;
        foreach($goods_id_arr as $key => $val)
        {
            $arr = array();
            $goods = M('goods')->where("goods_id = $key")->find();
            $arr['goods_id'] = $key; // 商品id
            $arr['goods_name'] = $goods['goods_name'];
            $arr['goods_sn'] = $goods['goods_sn'];
            $arr['market_price'] = $goods['market_price'];
            $arr['goods_price'] = $goods['shop_price'];
            $arr['member_goods_price'] = $goods['shop_price'];
            foreach($val as $k => $v)
            {
                $arr['goods_num'] = $v['goods_num']; // 购买数量
                // 如果这商品有规格
                if($k != 'key')
                {
                    $arr['spec_key'] = $k;
                    $spec_goods = M('spec_goods_price')->where("goods_id = $key and `key` = '{$k}'")->find();
                    $arr['spec_key_name'] = $spec_goods['key_name'];
                    $arr['member_goods_price'] = $arr['goods_price'] = $spec_goods['price'];
                    // $arr['sku'] = $spec_goods['sku']; // 参考 sku  http://www.zhihu.com/question/19841574
                }
                $order_goods[] = $arr;
            }
        }
        return $order_goods;    
    }

    /**
     * 获取地区名字
     * @param  integer $p [description]
     * @param  integer $c [description]
     * @param  integer $d [description]
     * @return [type]     [description]
     */
    public function getAddressName($p=0,$c=0,$d=0){
        $p = M('region')->where(array('id'=>$p))->field('name')->find();
        $c = M('region')->where(array('id'=>$c))->field('name')->find();
        $d = M('region')->where(array('id'=>$d))->field('name')->find();
        return $p['name'].','.$c['name'].','.$d['name'].',';
    }


    /**
     * 获取订单商品详情
     * @param  [type] $order_id [description]
     * @return [type]           [description]
     */
    public function getOrderGoods($order_id){
        $sql = "SELECT g.*,o.*,(o.goods_number * o.member_goods_price) AS goods_total FROM __PREFIX__order_goods o ".
            "LEFT JOIN __PREFIX__goods g ON o.goods_id = g.goods_id WHERE o.order_id = $order_id";
        $res = $this->query($sql);
        return $res;
    }


    /**
     * 获取当前可操作的按钮
     * @param  [type] $order [description]
     * @return [type]        [description]
     */
    public function getOrderButton($order){
        /*
         *  操作按钮汇总 ：付款、设为未付款、确认、取消确认、无效、去发货、确认收货、申请退货
         * 
         */
    	$os = $order['order_status'];//订单状态
    	$ss = $order['shipping_status'];//发货状态
    	$ps = $order['pay_status'];//支付状态
        $btn = array();
        if($order['pay_code'] == 'cod') {
        	if($os == 0 && $ss == 0){
        		$btn['confirm'] = '确认';
        	}elseif($os == 1 && $ss == 0 ){
        		$btn['delivery'] = '去发货';
        		$btn['cancel'] = '取消确认';
        	}elseif($ss == 1 && $os == 1 && $ps == 0){
        		$btn['pay'] = '付款';
        	}elseif($ps == 1 && $ss == 1 && $os == 1){
        		$btn['pay_cancel'] = '设为未付款';
        	}
        }else{
        	if($ps == 0 && $os == 0){
        		$btn['pay'] = '付款';
        	}elseif($os == 0 && $ps == 1){
        		$btn['pay_cancel'] = '设为未付款';
        		$btn['confirm'] = '确认';
        	}elseif($os == 1 && $ps == 1 && $ss==0){
        		$btn['cancel'] = '取消确认';
        		$btn['delivery'] = '去发货';
        	}
        } 
               
        if($ss == 1 && $os == 1 && $ps == 1){
        	$btn['delivery_confirm'] = '确认收货';
        	$btn['refund'] = '申请退货';
        }elseif($os == 2 || $os == 4){
        	$btn['refund'] = '申请退货';
        }elseif($os == 3 || $os == 5){
        	$btn['remove'] = '移除';
        }
        if($os != 5){
        	$btn['invalid'] = '无效';
        }
        return $btn;
    }



    /**
     * 订单操作处理
     * @param  [type] $order_id [description]
     * @param  [type] $act      [description]
     * @return [type]           [description]
     */
    public function orderProcessHandle($order_id,$act){
        $updata = array();
        switch ($act){
            case 'pay': //付款
                $order_sn = M('order')->where("order_id = $order_id")->getField("order_sn");
                update_pay_status($order_sn); // 调用确认收货按钮
                return true;                
            case 'pay_cancel': //取消付款
                $updata['pay_status'] = 0;
                break;
            case 'confirm': //确认订单
                $updata['order_status'] = 1;
                break;
            case 'cancel': //取消确认
                $updata['order_status'] = 0;
                break;
            case 'invalid': //作废订单
                $updata['order_status'] = 5;
                break;
            case 'remove': //移除订单
                $this->delOrder($order_id);
                break;
            case 'delivery_confirm'://确认收货
                confirm_order($order_id); // 调用确认收货按钮
                return true;
            default:
                return true;
        }
        return M('order')->where("order_id=$order_id")->save($updata);//改变订单状态
    }


    /**
     * 订单操作记录
     * @param  [type] $order_id [description]
     * @param  [type] $action   [description]
     * @param  string $note     [description]
     * @return [type]           [description]
     */
    public function orderActionLog($order_id,$action,$note=''){     
        $order = M('order')->where(array('order_id'=>$order_id))->find();
        $data['order_id'] = $order_id;
        $data['action_user'] = session(C('USER_AUTH_KEY'));
        $data['action_note'] = $note;
        $data['order_status'] = $order['order_status'];
        $data['pay_status'] = $order['pay_status'];
        $data['shipping_status'] = $order['shipping_status'];
        $data['log_time'] = time();
        $data['status_desc'] = $action;        
        return M('order_action')->add($data);//订单操作记录
    }


    /**
     * 删除订单
     * @return [type] [<description>]
     */
    function delOrder($order_id){
        $a = M('order')->where(array('order_id'=>$order_id))->delete();
        $b = M('order_goods')->where(array('order_id'=>$order_id))->delete();
        return $a && $b;
    }


    /**
     *  处理发货单
     * @param array $data  查询数量
     */
    public function deliveryHandle($data){
        $order = $this->getOrderInfo($data['order_id']);
        $orderGoods = $this->getOrderGoods($data['order_id']);
        $selectgoods = $data['goods'];
        $data['order_sn'] = $order['order_sn'];
        $data['delivery_sn'] = $this->get_delivery_sn();
        $data['zipcode'] = $order['zipcode'];
        $data['user_id'] = $order['user_id'];
        $data['admin_id'] = session(C('USER_AUTH_KEY'));
        $data['consignee'] = $order['consignee'];
        $data['mobile'] = $order['mobile'];
        $data['country'] = $order['country'];
        $data['province'] = $order['province'];
        $data['city'] = $order['city'];
        $data['district'] = $order['district'];
        $data['address'] = $order['address'];
        $data['shipping_code'] = $order['shipping_code'];
        $data['shipping_name'] = $order['shipping_name'];
        $data['shipping_price'] = $order['shipping_price'];
        $data['create_time'] = time();
        $did = M('delivery_doc')->add($data);
        $is_delivery = 0;
        foreach ($orderGoods as $k=>$v){
            if($v['is_send'] == 1){
                $is_delivery++;
            }           
            if($v['is_send'] == 0 && in_array($v['rec_id'],$selectgoods)){
                $res['is_send'] = 1;
                $res['delivery_id'] = $did;
                $r = M('order_goods')->where("rec_id=".$v['rec_id'])->save($res);//改变订单商品发货状态
                $is_delivery++;
            }
        }
        $updata['shipping_time'] = time();
        if($is_delivery == count($orderGoods)){
            $updata['shipping_status'] = 1;
        }else{
            $updata['shipping_status'] = 2;
        }
        M('order')->where("order_id=".$data['order_id'])->save($updata);//改变订单状态
        $s = $this->orderActionLog($order['order_id'],'delivery',$data['note']);//操作日志
        return $s && $r;
    }

    /**
     * 得到发货单流水号
     */
    public function get_delivery_sn()
    {
        /* 选择一个随机的方案 */send_http_status('310');
        mt_srand((double) microtime() * 1000000);
        return date('YmdHi') . str_pad(mt_rand(1, 99999), 5, '0', STR_PAD_LEFT);
    }
}
?>