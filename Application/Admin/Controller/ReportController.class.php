<?php 
// +----------------------------------------------------------------------
// | 财务报表控制器
// +----------------------------------------------------------------------
// | Copyright (c) 2016 http://www.zenghao.cc All rights reserved.
// +----------------------------------------------------------------------
// | Author: isum <http://www.zenghao.cc>
// +----------------------------------------------------------------------
namespace Admin\Controller;
use Common\Controller\AdminBaseController;
class ReportController extends AdminBaseController{

	public $begin;
	public $end;
	public function _initialize(){
        parent::_initialize();
		$timegap = I('timegap');
		$gap = I('gap',7);
		if($timegap){
			$gap = explode(' - ', $timegap);
			$begin = $gap[0];
			$end = $gap[1];
		}else{
			$lastweek = date('Y-m-d',strtotime("-1 month"));//30天前
			$begin = I('begin',$lastweek);
			$end =  I('end',date('Y-m-d'));
		}
		$this->begin = strtotime($begin);
		$this->end = strtotime($end);
		
		$this->assign('timegap',date('Y-m-d',$this->begin).' - '.date('Y-m-d',$this->end));
		$this->begin = strtotime($begin);
		$this->end = strtotime($end);
	}

	/**
	 * 销售概况
	 * @return [type] [description]
	 */
	public function index(){
		$now = strtotime(date('Y-m-d'));
		$today['today_amount'] = M('order')->where("add_time>$now AND pay_status=1  and order_status in(1,2,4)")->sum('order_amount');//今日销售总额
		$today['today_order'] = M('order')->where("add_time>$now and pay_status=1")->count();//今日订单数
		$today['cancel_order'] = M('order')->where("add_time>$now AND order_status=3")->count();//今日取消订单
		$today['sign'] = round($today['today_amount']/$today['today_order'],2);
		$this->assign('today',$today);
		$sql = "SELECT COUNT(*) as tnum,sum(order_amount) as amount, FROM_UNIXTIME(add_time,'%Y-%m-%d') as gap from  __PREFIX__order ";
		$sql .= " where add_time>$this->begin and add_time<$this->end AND pay_status=1 and order_status in(1,2,4) group by gap";
		$res = M()->query($sql);//订单数,交易额
		
		foreach ($res as $val){
			$arr[$val['gap']] = $val['tnum'];
			$brr[$val['gap']] = $val['amount'];
			$tnum += $val['tnum'];
			$tamount += $val['amount'];
		}

		for($i=$this->begin;$i<=$this->end;$i=$i+24*3600){
			$tmp_num = empty($arr[date('Y-m-d',$i)]) ? 0 : $arr[date('Y-m-d',$i)];
			$tmp_amount = empty($brr[date('Y-m-d',$i)]) ? 0 : $brr[date('Y-m-d',$i)];
			$tmp_sign = empty($tmp_num) ? 0 : round($tmp_amount/$tmp_num,2);						
			$order_arr[] = $tmp_num;
			$amount_arr[] = $tmp_amount;			
			$sign_arr[] = $tmp_sign;
			$date = date('Y-m-d',$i);
			$list[] = array('day'=>$date,'order_num'=>$tmp_num,'amount'=>$tmp_amount,'sign'=>$tmp_sign,'end'=>date('Y-m-d',$i+24*60*60));
			$day[] = $date;
		}
		
		$this->assign('list',$list);
		$result = array('order'=>$order_arr,'amount'=>$amount_arr,'sign'=>$sign_arr,'time'=>$day);
		$this->assign('result',json_encode($result));
		$this->display();
	}



	/**
	 * 销售排行
	 * @return [type] [description]
	 */
	public function saletop(){
		$sql = "select goods_name,goods_sn,sum(goods_number) as sale_num,sum(goods_number*goods_price) as sale_amount from __PREFIX__order_goods ";
		$sql .=" where is_send = 1 group by goods_id order by sale_amount DESC limit 100";
		$res = M()->cache(true,3600)->query($sql);
		$this->assign('list',$res);
		$this->display();
	}


	/**
	 * 订单列表
	 * @return [type] [description]
	 */
	public function saleList(){
		$p = I('p',1);
		$start = ($p-1)*20;
		$cat_id = I('cat_id',0);
		$brand_id = I('brand_id',0);
		$where = "where b.add_time>$this->begin and b.add_time<$this->end ";
		if($cat_id>0){
			$where .= " and g.cat_id=$cat_id";
			$this->assign('cat_id',$cat_id);
		}
		if($brand_id>0){
			$where .= " and g.brand_id=$brand_id";
			$this->assign('brand_id',$brand_id);
		}
		$sql = "select a.*,b.order_sn,b.shipping_name,b.pay_name,b.add_time from __PREFIX__order_goods as a left join __PREFIX__order as b on a.order_id=b.order_id ";
		$sql .= " left join __PREFIX__goods as g on a.goods_id = g.goods_id $where ";
		$sql .= "  order by add_time desc limit $start,20";
		$res = M()->query($sql);
		$this->assign('list',$res);
		
		$sql2 = "select count(*) as tnum from __PREFIX__order_goods as a left join __PREFIX__order as b on a.order_id=b.order_id ";
		$sql2 .= " left join __PREFIX__goods as g on a.goods_id = g.goods_id $where";
		$total = M()->query($sql2);
		$count =  $total[0]['tnum'];
		$Page = new \Think\Page($count,20);
		$show = $Page->show();
		$this->assign('page',$show);
		
        $goods = D('goods');        
        $brandList = $goods->getSortBrands();
        $categoryList = $goods->getSortCategory();
        $this->assign('categoryList',$categoryList);
        $this->assign('brandList',$brandList);
		$this->display();
	}



	/**
	 * 会员统计
	 * @return [type] [description]
	 */
	public function user(){
		$today = strtotime(date('Y-m-d'));
		$month = strtotime(date('Y-m-01'));
		$user['today'] = D('users')->where("reg_time>$today")->count();//今日新增会员
		$user['month'] = D('users')->where("reg_time>$month")->count();//本月新增会员
		$user['total'] = D('users')->count();//会员总数
		$user['user_money'] = D('users')->sum('use_money');//会员余额总额
		$res = M('order')->cache(true)->distinct(true)->field('user_id')->select();
		$user['hasorder'] = count($res);
		$this->assign('user',$user);
		$sql = "SELECT COUNT(*) as num,FROM_UNIXTIME(reg_time,'%Y-%m-%d') as gap from __PREFIX__users where reg_time>$this->begin and reg_time<$this->end group by gap";
		$new = M()->query($sql);//新增会员趋势		
		foreach ($new as $val){
			$arr[$val['gap']] = $val['num'];
		}
		
		for($i=$this->begin;$i<=$this->end;$i=$i+24*3600){
			$brr[] = empty($arr[date('Y-m-d',$i)]) ? 0 : $arr[date('Y-m-d',$i)];
			$day[] = date('Y-m-d',$i);
		}		
		$result = array('data'=>$brr,'time'=>$day);
		$this->assign('result',json_encode($result));					
		$this->display();
	}


	/**
	 * 财务统计
	 * @return [type] [description]
	 */
	public function finance(){
		$sql = "SELECT sum(a.order_amount) as goods_amount,sum(a.shipping_price) as shipping_amount,";
		$sql .= " FROM_UNIXTIME(a.add_time,'%Y-%m-%d') as gap from  __PREFIX__order a left join __PREFIX__order_goods b on a.order_id=b.order_id ";
		$sql .= " where a.add_time>$this->begin and a.add_time<$this->end AND a.pay_status=1 and a.order_status in (1,2,4) group by gap order by a.add_time";
		$res = M()->cache(true)->query($sql);//物流费,交易额,成本价
		
		foreach ($res as $val){
			$arr[$val['gap']] = $val['goods_amount'];
			$brr[$val['gap']] = $val['cost_price'];
			$crr[$val['gap']] = $val['shipping_amount'];
		}
			
		for($i=$this->begin;$i<=$this->end;$i=$i+24*3600){
			$tmp_goods_amount = empty($arr[date('Y-m-d',$i)]) ? 0 : $arr[date('Y-m-d',$i)];
			$tmp_amount = empty($brr[date('Y-m-d',$i)]) ? 0 : $brr[date('Y-m-d',$i)];
			$tmp_shipping_amount =  empty($crr[date('Y-m-d',$i)]) ? 0 : $crr[date('Y-m-d',$i)];
			$goods_arr[] = $tmp_goods_amount;
			$amount_arr[] = $tmp_amount;
			$shipping_arr[] = $tmp_shipping_amount;
			$date = date('Y-m-d',$i);
			$list[] = array('day'=>$date,'goods_amount'=>$tmp_goods_amount,'cost_amount'=>$tmp_amount,'shipping_amount'=>$tmp_shipping_amount,'end'=>date('Y-m-d',$i+24*60*60));
			$day[] = $date;
		}
		
		$this->assign('list',$list);
		$result = array('goods_arr'=>$goods_arr,'amount'=>$amount_arr,'shipping_arr'=>$shipping_arr,'time'=>$day);
		$this->assign('result',json_encode($result));
		$this->display();
	}

}
?>