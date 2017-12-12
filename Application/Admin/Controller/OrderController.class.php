<?php
// +----------------------------------------------------------------------
// | 订单控制器
// +----------------------------------------------------------------------
// | Copyright (c) 2016 http://www.zenghao.cc All rights reserved.
// +----------------------------------------------------------------------
// | Author: isum <http://www.zenghao.cc>
// +----------------------------------------------------------------------
namespace Admin\Controller;
use Common\Controller\AdminBaseController;

class OrderController extends AdminBaseController {

	/*
     * 初始化操作
     */
    public function _initialize() {
        parent::_initialize();
        $this->order_status = C('ORDER_STATUS');
        $this->pay_status = C('PAY_STATUS');
        $this->shipping_status = C('SHIPPING_STATUS');
        // 订单 支付 发货状态
        $this->assign('order_status',$this->order_status);
        $this->assign('pay_status',$this->pay_status);
        $this->assign('shipping_status',$this->shipping_status);
    }

	/**
	 * 订单列表
	 * @return [type] [description]
	 */
	public function index(){
		$order = D('order');
		$where = array();
		$timegap = I('timegap');
        if($timegap){
        	$gap = explode('-', $timegap);
        	$begin = strtotime($gap[0]);
        	$end = strtotime($gap[1]);
        }
        I('consignee') ? $where['consignee'] = trim(I('consignee')) : false;
        if($begin && $end){
        	$where['add_time'] = array('between',"$begin,$end");
        }
        I('order_sn') ? $where['order_sn'] = trim(I('order_sn')) : false;
        I('order_status') != '' ? $where['order_status'] = I('order_status') : false;
        I('pay_status') != '' ? $where['pay_status'] = I('pay_status') : false;
        I('pay_code') != '' ? $where['pay_code'] = I('pay_code') : false;
        I('shipping_status') != '' ? $where['shipping_status'] = I('shipping_status') : false;
        I('user_id') ? $where['user_id'] = trim(I('user_id')) : false;
		$list = $order->getPage($order, $where, 'add_time desc');
		$this->assign('list', $list);
		$this->display();
	}



	/**
	 * 订单详情
	 * @return [type] [description]
	 */
	public function detail(){
		$order_id = I('order_id', 0);
		$order = D('order');
		$orderInfo = $order->getOrderInfo($order_id);
        $orderGoods = $order->getOrderGoods($order_id);
        $button = $order->getOrderButton($orderInfo);
        // 获取操作记录
        $action_log = M('order_action')->where(array('order_id'=>$order_id))->order('log_time desc')->select();
        $this->assign('order',$orderInfo);
        $this->assign('action_log',$action_log);
        $this->assign('orderGoods',$orderGoods);
        $split = count($orderGoods) >1 ? 1 : 0;
        foreach ($orderGoods as $val){
        	if($val['goods_num']>1){
        		$split = 1;
        	}
        }
        $this->assign('split',$split);
        $this->assign('button',$button);
        $this->display();
	}

     /**
     * 订单操作
     * @param $id
     */
    public function order_action(){     
        $order = D('order');
        $action = I('get.type');
        $order_id = I('get.order_id');
        if($action && $order_id){
             $a = $order->orderProcessHandle($order_id,$action);           
             $res = $order->orderActionLog($order_id,$action,I('note'));
             if($res && $a){
                exit(json_encode(array('status' => 1,'msg' => '操作成功')));
             }else{
                exit(json_encode(array('status' => 0,'msg' => '操作失败')));
             }
        }else{
            $this->error('参数错误',U('order/detail',array('order_id'=>$order_id)));
        }
    }





    /**
     * 订单删除
     * @param int $id 订单id
     */
    public function delete_order($order_id){
        $order = D('order');
        $del = $order->delOrder($order_id);
        if($del){
            $this->success('删除订单成功！', U('order/index'));
        }else{
            $this->error('订单删除失败！', U('order/index'));
        }
    }



    /**
     * 订单取消付款
     */
    public function pay_cancel($order_id){
        if(I('remark')){
            $data = I('post.');
            $note = array('退款到用户余额','已通过其他方式退款','不处理，误操作项');
            if($data['refundType'] == 0 && $data['amount']>0){
                accountLog($data['user_id'], $data['amount'], 0, 0, '退款到用户余额');
            }
            $order = D('order');
            $order->orderProcessHandle($data['order_id'],'pay_cancel');
            $d = $order->orderActionLog($data['order_id'],'pay_cancel',$data['remark'].':'.$note[$data['refundType']]);
            if($d){
                exit("<script>window.parent.pay_callback(1);</script>");
            }else{
                exit("<script>window.parent.pay_callback(0);</script>");
            }
        }else{
            $order = M('order')->where("order_id=$order_id")->find();
            $this->assign('order',$order);
            $this->display();
        }
    }
















	/**
	 * 发货单
	 * @return [type] [description]
	 */
	public function delivery(){
		$order = D('order');
        $condition = array();
        I('consignee') ? $condition['consignee'] = trim(I('consignee')) : false;
        I('order_sn') != '' ? $condition['order_sn'] = trim(I('order_sn')) : false;
        $condition['order_status'] = array('egt',1);
        $shipping_status = I('shipping_status');
        $condition['shipping_status'] = empty($shipping_status) ? array('neq',1) : $shipping_status;
        
        $orderList = $order->getPage($order, $condition, 'add_time desc');
        $this->assign('orderList',$orderList);
        $this->display();
	}




    /**
     * 去发货
     * @return [type] [description]
     */
    public function delivery_info(){
        $order_id = I('order_id');
        $order = D('order');
        $orderInfo = $order->getOrderInfo($order_id);
        $orderGoods = $order->getOrderGoods($order_id);
        $this->assign('order',$orderInfo);
        $this->assign('orderGoods',$orderGoods);
        $delivery_record = M('delivery_doc')->where('order_id='.$order_id)->select();
        $this->assign('delivery_record',$delivery_record);//发货记录
        $this->display();
    }

    /**
     * 生成发货单
     */
    public function deliveryHandle(){
        $order= D('order');
        $data = I('post.');
        $res = $order->deliveryHandle($data);
        if($res){
            $this->success('操作成功',U('Admin/Order/delivery_info',array('order_id'=>$data['order_id'])));
        }else{
            $this->success('操作失败',U('Admin/Order/delivery_info',array('order_id'=>$data['order_id'])));
        }
    }



    /**
     * 打印订单
     * @return [type] [description]
     */
    public function order_print(){
        $order_id = I('order_id');
        $order = D('order');
        $orderInfo = $order->getOrderInfo($order_id);
        $orderInfo['province'] = getRegionName($orderInfo['province']);
        $orderInfo['city'] = getRegionName($orderInfo['city']);
        $orderInfo['district'] = getRegionName($orderInfo['district']);
        $orderInfo['full_address'] = $orderInfo['province'].' '.$orderInfo['city'].' '.$orderInfo['district'].' '. $orderInfo['address'];
        $orderGoods = $order->getOrderGoods($order_id);
        $shop = C('web');
        $this->assign('order',$orderInfo);
        $this->assign('shop',$shop);
        $this->assign('orderGoods',$orderGoods);
        $this->display('print');
    }


    public function export_order()
    {
        //搜索条件
        $where = 'where 1=1 ';
        $consignee = I('consignee');
        if($consignee){
            $where .= " AND consignee like '%$consignee%' ";
        }
        $order_sn =  I('order_sn');
        if($order_sn){
            $where .= " AND order_sn = '$order_sn' ";
        }
        if(I('order_status')){
            $where .= " AND order_status = ".I('order_status');
        }
        
        $timegap = I('timegap');
        if($timegap){
            $gap = explode('-', $timegap);
            $begin = strtotime($gap[0]);
            $end = strtotime($gap[1]);
            $where .= " AND add_time>$begin and add_time<$end ";
        }
            
        $sql = "select *,FROM_UNIXTIME(add_time,'%Y-%m-%d') as create_time from __PREFIX__order $where order by order_id";
        $orderList = D()->query($sql);
        $strTable ='<table width="500" border="1">';
        $strTable .= '<tr>';
        $strTable .= '<td style="text-align:center;font-size:12px;width:120px;">订单编号</td>';
        $strTable .= '<td style="text-align:center;font-size:12px;" width="100">日期</td>';
        $strTable .= '<td style="text-align:center;font-size:12px;" width="*">收货人</td>';
        $strTable .= '<td style="text-align:center;font-size:12px;" width="*">收货地址</td>';
        $strTable .= '<td style="text-align:center;font-size:12px;" width="*">电话</td>';
        $strTable .= '<td style="text-align:center;font-size:12px;" width="*">订单金额</td>';
        $strTable .= '<td style="text-align:center;font-size:12px;" width="*">实际支付</td>';
        $strTable .= '<td style="text-align:center;font-size:12px;" width="*">支付方式</td>';
        $strTable .= '<td style="text-align:center;font-size:12px;" width="*">支付状态</td>';
        $strTable .= '<td style="text-align:center;font-size:12px;" width="*">发货状态</td>';
        $strTable .= '<td style="text-align:center;font-size:12px;" width="*">商品信息</td>';
        $strTable .= '</tr>';
        if(is_array($orderList)){
            $region = M('region')->getField('id,name');
            foreach($orderList as $k=>$val){
                $strTable .= '<tr>';
                $strTable .= '<td style="text-align:center;font-size:12px;">&nbsp;'.$val['order_sn'].'</td>';
                $strTable .= '<td style="text-align:left;font-size:12px;">'.$val['create_time'].' </td>';               
                $strTable .= '<td style="text-align:left;font-size:12px;">'.$val['consignee'].'</td>';
                        $strTable .= '<td style="text-align:left;font-size:12px;">'."{$region[$val['province']]},{$region[$val['city']]},{$region[$val['district']]},{$val['address']}".' </td>';                        
                $strTable .= '<td style="text-align:left;font-size:12px;">'.$val['mobile'].'</td>';
                $strTable .= '<td style="text-align:left;font-size:12px;">'.$val['goods_amount'].'</td>';
                $strTable .= '<td style="text-align:left;font-size:12px;">'.$val['order_amount'].'</td>';
                $strTable .= '<td style="text-align:left;font-size:12px;">'.$val['pay_name'].'</td>';
                $strTable .= '<td style="text-align:left;font-size:12px;">'.$this->pay_status[$val['pay_status']].'</td>';
                $strTable .= '<td style="text-align:left;font-size:12px;">'.$this->shipping_status[$val['shipping_status']].'</td>';
                $orderGoods = D('order_goods')->where('order_id='.$val['order_id'])->select();
                $strGoods="";
                foreach($orderGoods as $goods){
                    $strGoods .= "商品编号：".$goods['goods_sn']." 商品名称：".$goods['goods_name'];
                    if ($goods['spec_key_name'] != '') $strGoods .= " 规格：".$goods['spec_key_name'];
                    $strGoods .= "<br />";
                }
                unset($orderGoods);
                $strTable .= '<td style="text-align:left;font-size:12px;">'.$strGoods.' </td>';
                $strTable .= '</tr>';
            }
        }
        $strTable .='</table>';
        unset($orderList);
        downloadExcel($strTable,'order');
        exit();
    }



    /*
     * 价钱修改
     */
    public function editprice(){
        $order_id = I('order_id');
        $order = D('order');
        $order = $order->getOrderInfo($order_id);
        $this->editable($order);
        if(IS_POST){
            $admin_id = session(C('USER_AUTH_KEY'));
            if(empty($admin_id)){
                $this->error('非法操作');
                exit;
            }
            $update['discount'] = I('post.discount');
            $update['shipping_price'] = I('post.shipping_price');
            $update['order_amount'] = $order['goods_amount'] + $update['shipping_price'] - $update['discount'] - $order['use_money'] - $order['integral_money'] - $order['coupon_price'];
            $row = M('order')->where(array('order_id'=>$order_id))->save($update);
            if(!$row){
                $this->success('没有更新数据',U('Admin/Order/editprice',array('order_id'=>$order_id)));
            }else{
                $this->success('操作成功',U('Admin/Order/detail',array('order_id'=>$order_id)));
            }
            exit;
        }
        $this->assign('order',$order);
        $this->display();
    }

    /**
     * 检测订单是否可以编辑
     * @param $order
     */
    private function editable($order){
        if($order['shipping_status'] != 0){
            $this->error('已发货订单不允许编辑');
            exit;
        }
        return;
    }


	/**
	 * 退货单
	 * @return [type] [description]
	 */
	public function returnList(){
        $order_sn =  trim(I('order_sn'));
        $status =  I('status');
        $where = array();
        if($order_sn){
            $where['order_sn'] = $order_sn;
        }
        if($status){
            $where['status'] = $status;
        }
        $returnGoods = D('returnGoods');
        $list = $returnGoods->relation(true)->getPage($returnGoods, $where, 'id desc');
        $this->assign('list', $list);
		$this->display();
	}


    /**
     * 退换货操作
     */
    public function return_info()
    {
        $id = I('id');
        $return_goods = M('return_goods')->where("id= $id")->find();
        if($return_goods['imgs'])            
        $return_goods['imgs'] = explode(',', $return_goods['imgs']);
        $user = M('users')->where("user_id = {$return_goods[user_id]}")->find();
        $goods = M('goods')->where("goods_id = {$return_goods[goods_id]}")->find();
        $type_msg = array('退换','换货');
        $status_msg = array('未处理','处理中','已完成');
        if(IS_POST)
        {
            $data['type'] = I('type');
            $data['status'] = I('status');
            $data['remark'] = I('remark');                                    
            $note ="退换货:{$type_msg[$data['type']]}, 状态:{$status_msg[$data['status']]},处理备注：{$data['remark']}";
            $result = M('return_goods')->where("id= $id")->save($data);    
            if($result)
            {        
                $type = empty($data['type']) ? 2 : 3;
                $where = " order_id = ".$return_goods['order_id']." and goods_id=".$return_goods['goods_id'];
                M('order_goods')->where($where)->save(array('is_send'=>$type));//更改商品状态        
                $log = D('order')->orderActionLog($return_goods['order_id'],'refund',$note);
                $this->success('修改成功!');            
                exit;
            }  
        }        
        
        $this->assign('id',$id); // 用户
        $this->assign('user',$user); // 用户
        $this->assign('goods',$goods);// 商品
        $this->assign('return_goods',$return_goods);// 退换货               
        $this->display();
    }
}

?>