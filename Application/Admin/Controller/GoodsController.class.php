<?php
// +----------------------------------------------------------------------
// | 商品管理控制器
// +----------------------------------------------------------------------
// | Copyright (c) 2016 http://www.zenghao.cc All rights reserved.
// +----------------------------------------------------------------------
// | Author: isum <http://www.zenghao.cc>
// +----------------------------------------------------------------------
namespace Admin\Controller;
use Common\Controller\AdminBaseController;
class GoodsController extends AdminBaseController{



	/**
	 * 商品列表
	 * @return [type] [description]
	 */
	public function index(){
		$where = ' 1 = 1 '; // 搜索条件                
        I('intro')    && $where = "$where and ".I('intro')." = 1" ;        
        I('brand_id') && $where = "$where and brand_id = ".I('brand_id') ;
        (I('is_on_sale') !== '') && $where = "$where and is_on_sale = ".I('is_on_sale') ;                
        $cat_id = I('cat_id');
        // 关键词搜索               
        $key_word = I('key_word') ? trim(I('key_word')) : '';
        if($key_word)
        {
            $where = "$where and (goods_name like '%$key_word%' or goods_sn like '%$key_word%')" ;
        }
        
        if($cat_id > 0)
        {
            $grandson_ids = getCatGrandson($cat_id); 
            $where .= " and cat_id in(".  implode(',', $grandson_ids).") "; // 初始化搜索条件
        }
        
        $goods = D('Goods');
        $goodsList = $goods->relation(true)->getPage($goods, $where);
        // p($goodsList);
        $brand = D('brand')->where('is_show = 1')->select();
        $category = D('goodsCate')->select();
        $this->assign('category', cateForLevel($category));
        $this->assign('brand', $brand);
        $this->assign('catList',$catList);
        $this->assign('list',$goodsList);
        $this->assign('page',$show);// 赋值分页输出
        $this->display();  
	}


	/**
	 * 添加商品
	 * @return [type] [description]
	 */
	public function addGoods(){
		if(IS_POST){
            $Goods = D('Goods');        
            if(!$Goods->create(NULL,1))// 根据表单提交的POST数据创建数据对象                 
            {
                $this->error('操作失败！');
            }else {
                //  form表单提交                                                          
                $Goods->add_time = time(); // 上架时间         
                $goods_id = $insert_id = $Goods->add(); // 写入数据到数据库
                $Goods->afterSave($goods_id);
                $Goods->saveGoodsAttr($goods_id, $_POST['goods_type']); // 处理商品 属性
                
                $this->success('操作成功！', U('goods/index'));
            }  
		}else{
            $goodsType = M('goodsType')->select();
            $this->assign('goodsType', $goodsType);
            $category = D('goodsCate')->where('is_show = 1')->order('sort asc')->select();
            $brand = D('brand')->where('is_show = 1')->select();
            $this->assign('category', cateForLevel($category));
            $this->assign('brand', $brand);
            $this->initEditor(); // 编辑器
            $this->display();
        }
	}


    /**
     * 编辑商品
     * @return [type] [description]
     */
    public function editGoods(){
        if(IS_POST){
            $Goods = D('Goods');       
            if(!$Goods->create(NULL,2))// 根据表单提交的POST数据创建数据对象                 
            {
                $this->error('操作失败！');
            }else {                                                       
                $Goods->add_time = time(); // 上架时间           
                $goods_id = $_POST['goods_id'];                                                
                $Goods->save(); // 写入数据到数据库                        
                $Goods->afterSave($goods_id);
                $Goods->saveGoodsAttr($goods_id, $_POST['goods_type']); // 处理商品 属性
                $this->success('操作成功！', U('goods/index'));
            } 
        }else{
            $goodsInfo = D('Goods')->where('goods_id='.I('GET.goods_id',0))->find();
            $goodsType = M('goodsType')->select();
            $this->assign('goodsType', $goodsType);
            $category = D('goodsCate')->where('is_show = 1')->order('sort asc')->select();
            $brand = D('brand')->where('is_show = 1')->select();
            $this->assign('category', cateForLevel($category));
            $this->assign('brand', $brand);
            $this->assign('goodsInfo',$goodsInfo);  // 商品详情            
            $goodsImages = M("GoodsGallery")->where('goods_id ='.I('GET.goods_id',0))->select();
            $this->assign('goodsImages',$goodsImages);  // 商品相册
            $this->initEditor(); // 编辑器
            $this->display();
        }
    }


    /**
     * 删除商品
     */
    public function delGoods()
    {
        $goods_id = $_GET['id'];
        $error = '';
        
        // 判断此商品是否有订单
        $c1 = M('OrderGoods')->where("goods_id = $goods_id")->count('1');
        $c1 && $error .= '此商品有订单,不得删除! <br/>';
        
        
         // 商品团购
        $c1 = M('group_buy')->where("goods_id = $goods_id")->count('1');
        $c1 && $error .= '此商品有团购,不得删除! <br/>';   
        
         // 商品退货记录
        $c1 = M('return_goods')->where("goods_id = $goods_id")->count('1');
        $c1 && $error .= '此商品有退货记录,不得删除! <br/>';
        
        if($error)
        {
            $this->error('删除失败！');        
        }
        
        // 删除此商品        
        M("Goods")->where('goods_id ='.$goods_id)->delete();  //商品表
        M("cart")->where('goods_id ='.$goods_id)->delete();  // 购物车
        M("comment")->where('goods_id ='.$goods_id)->delete();  //商品评论
        M("goods_gallery")->where('goods_id ='.$goods_id)->delete();  //商品相册
        M("spec_goods_price")->where('goods_id ='.$goods_id)->delete();  //商品规格
        M("spec_image")->where('goods_id ='.$goods_id)->delete();  //商品规格图片
        M("goods_attr")->where('goods_id ='.$goods_id)->delete();  //商品属性     
        M("goods_collect")->where('goods_id ='.$goods_id)->delete();  //商品收藏          
                     
        $this->success('操作成功！', U('goods/index'));
    }




	/**
     *  商品属性列表
     */
    public function ajaxGoodsAttributeList(){            
        //ob_start('ob_gzhandler'); // 页面压缩输出
        $where = ' 1 = 1 '; // 搜索条件                        
        I('type_id')   && $where = "$where and type_id = ".I('type_id') ;                
        // 关键词搜索               
        $model = M('GoodsAttr');
        $count = $model->where($where)->count();
        $Page       = new AjaxPage($count,13);
        $show = $Page->show();
        $goodsAttributeList = $model->where($where)->order('`order` desc,attr_id DESC')->limit($Page->firstRow.','.$Page->listRows)->select();
        $goodsTypeList = M("GoodsType")->getField('id,name');
        $attr_input_type = array(0=>'手工录入',1=>' 从列表中选择',2=>' 多行文本框');
        $this->assign('attr_input_type',$attr_input_type);
        $this->assign('goodsTypeList',$goodsTypeList);        
        $this->assign('goodsAttributeList',$goodsAttributeList);
        $this->assign('page',$show);// 赋值分页输出
        $this->display();         
    }  


    /**
     * 动态获取商品属性输入框 根据不同的数据返回不同的输入框类型
     */
    public function ajaxGetAttrInput(){
        $Goods = D('goods');
        $str = $Goods->getAttrInput($_REQUEST['goods_id'],$_REQUEST['type_id']);
        exit($str);
    }


    /**
     * 动态获取商品规格选择框 根据不同的数据返回不同的选择框
     */
    public function ajaxGetSpecSelect(){
        $goods_id = $_GET['goods_id'] ? $_GET['goods_id'] : 0;        

        $specList = D('Spec')->where("type_id = ".$_GET['spec_type'])->order('`sort` desc')->select();
        foreach($specList as $k => $v)        
            $specList[$k]['spec_item'] = D('SpecItem')->where("spec_id = ".$v['id'])->order('id')->getField('id,item'); // 获取规格项                
        $items_id = M('SpecGoodsPrice')->where('goods_id = '.$goods_id)->getField("GROUP_CONCAT(`key` SEPARATOR '_') AS items_id");
        $items_ids = explode('_', $items_id);       
        
        // 获取商品规格图片                
        if($goods_id)
        {
           $specImageList = M('SpecImage')->where("goods_id = $goods_id")->getField('spec_image_id,src');                 
        }        
        $this->assign('specImageList',$specImageList);
        
        $this->assign('items_ids',$items_ids);
        $this->assign('specList',$specList);
        $this->display('ajax_spec_select');        
    }  


    /**
     * 动态获取商品规格输入框 根据不同的数据返回不同的输入框
     */    
    public function ajaxGetSpecInput(){     
        $goods = D('goods');
        $goods_id = $_REQUEST['goods_id'] ? $_REQUEST['goods_id'] : 0;
        $str = $goods->getSpecInput($goods_id ,$_POST['spec_arr']);
        exit($str);   
    }

	/**
	 * 商品分类
	 * @return [type] [description]
	 */
	public function category(){
		$category  = D('goodsCate')->order('sort asc')->select();
		$this->assign('category',cateForLevel($category,'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'));
		$this->display();
	}



	/**
	 * 添加分类
	 * @return [type] [description]
	 */
	public function addCate(){
		$goodsCate = D('goodsCate');
		if(IS_POST){
			$post = I('post.');	
			$post['sort'] = empty($post['sort']) ? 0 : $post['sort'];
			if(!$post['cat_name']) $this->error('分类名称不能为空');
			if($goodsCate->add($post)){
				$this->success('操作成功！', U('goods/category'));
			}else{
				$this->error('操作失败！', U('goods/category'));
			}
		}else{
			$category = $goodsCate->select();
			$this->assign('category', cateForLevel($category));
			$this->display();
		}
	}


	/**
	 * 编辑分类
	 * @return [type] [description]
	 */
	public function editCate(){
		$goodsCate = D('goodsCate');
		if(IS_POST){
			$post = I('post.');	
			$post['sort'] = empty($post['sort']) ? 0 : $post['sort'];
			if(!$post['cat_name']) $this->error('分类名称不能为空');
			$goodsCate->save($post);
			$this->success('操作成功！', U('goods/category'));
		}else{
			$cat_id = I('cat_id', 0);
			$_result = $goodsCate->find($cat_id);
			$category = $goodsCate->select();
			$this->assign('category', cateForLevel($category));
			$this->assign('data', $_result);
			$this->display();
		}
	}

	/**
	 * 删除分类
	 * @return [type] [description]
	 */
	public function delCate(){
		$cat_id = I('cat_id', 0);
	}



	/**
	 * 品牌列表
	 * @return [type] [description]
	 */
	public function brand(){
		$Brand = D('brand');
		$where = array();
		$list = $Brand->getPage($Brand,$where,'sort asc');
		$this->assign('list', $list);
		$this->display();
	}



	/**
	 * 添加品牌
	 * @return [type] [description]
	 */
	public function addBrand(){
		if(IS_POST){
			$post = I('post.');
			if(empty($post['brand_name'])) $this->error('品牌名称不能为空！');
			if(M('brand')->add($post)){
				$this->success('操作成功！', U('goods/brand'));
			}else{
				$this->error('操作失败！');
			}
		}else{
			$this->display();
		}
	}


	/**
	 * 编辑品牌
	 * @return [type] [description]
	 */
	public function editBrand(){
		$brand_id = I('brand_id', 0);
		$Brand = D('brand');
		if(IS_POST){
			$post = I('post.');
			if(empty($post['brand_name'])) $this->error('品牌名称不能为空！');
			M('brand')->save($post);
			$this->success('操作成功！', U('goods/brand'));
		}else{
			$_result = $Brand->find($brand_id);
			$this->assign('brand', $_result);
			$this->display();
		}
	}



	/**
	 * 删除品牌
	 * @return [type] [description]
	 */
	public function delBrand(){
		$brand_id = I('brand_id', 0);
		$goods_count = M('Goods')->where("brand_id = {$brand_id}")->count('1'); 
		if($goods_count){
			$this->error('此品牌有商品在用不得删除!');
		}
		if(D('brand')->delete($brand_id)){
			$this->success('操作成功！', U('goods/brand'));
		}
	}


	/**
     * 初始化编辑器链接     
     * 本编辑器参考 地址 http://fex.baidu.com/ueditor/
     */
    private function initEditor()
    {
        $this->assign("URL_upload", U('Admin/Ueditor/imageUp',array('savepath'=>'goods'))); // 图片上传目录
        $this->assign("URL_imageUp", U('Admin/Ueditor/imageUp',array('savepath'=>'article'))); //  不知道啥图片
        $this->assign("URL_fileUp", U('Admin/Ueditor/fileUp',array('savepath'=>'article'))); // 文件上传
        $this->assign("URL_scrawlUp", U('Admin/Ueditor/scrawlUp',array('savepath'=>'article')));  //  图片流
        $this->assign("URL_getRemoteImage", U('Admin/Ueditor/getRemoteImage',array('savepath'=>'article'))); // 远程图片管理
        $this->assign("URL_imageManager", U('Admin/Ueditor/imageManager',array('savepath'=>'article'))); // 图片管理        
        $this->assign("URL_getMovie", U('Admin/Ueditor/getMovie',array('savepath'=>'article'))); // 视频上传
        $this->assign("URL_Home", "");
    }   

    /**
     * 删除商品相册图
     * @return [type] [description]
     */
    public function del_goods_images()
    {
        $path = I('filename','');
        M('goods_images')->where("image_url = '$path'")->delete();
    }


    /**
     * 商品类型列表
     * @return [type] [description]
     */
    public function goodsTypeList(){
    	$goodsType = D('goodsType');
    	$list = $goodsType->getPage($goodsType,'','id desc');
    	$this->assign('list', $list);
    	$this->display();
    }


    /**
     * 添加商品类型
     * @return [type] [description]
     */
    public function addGoodsType(){
    	if(IS_POST){
    		$post = I('post.');
    		if(empty($post['name'])) $this->error('类型名称不能为空！');
    		if(M('goodsType')->add($post)){
    			$this->success('操作成功！', U('goods/goodsTypeList'));
    		}else{
    			$this->error('操作失败！');
    		}
    	}else{
    		$this->display();
    	}    	
    }


    /**
     * 编辑商品类型
     * @return [type] [description]
     */
    public function editGoodsType(){
    	$id = I('get.id', 0);
    	$goodsType = D('goodsType');
    	if(IS_POST){
    		$post = I('post.');
    		if(empty($post['name'])) $this->error('类型名称不能为空！');
    		if(M('goodsType')->save($post)){
    			$this->success('操作成功！', U('goods/goodsTypeList'));
    		}else{
    			$this->error('数据未更新或操作失败！');
    		}
    	}else{
    		$_result = $goodsType->find($id);
    		$this->assign('data', $_result);
    		$this->display();
    	}
    }


    /**
     * 删除商品类型
     * @return [type] [description]
     */
    public function delGoodsType(){
    	$id = I('get.id', 0);
    	// 判断 商品规格        
        $count = M("spec")->where("type_id = {$id}")->count("1");   
        $count > 0 && $this->error('该类型下有商品规格不得删除!',U('Admin/Goods/goodsTypeList'));
        // 判断 商品属性        
        $count = M("goodsAttribute")->where("type_id = {$id}")->count("1");   
        $count > 0 && $this->error('该类型下有商品属性不得删除!',U('Admin/Goods/goodsTypeList'));        
        // 删除分类
        M('goodsType')->where("id = {$id}")->delete();   
        $this->success("操作成功!",U('Admin/Goods/goodsTypeList'));
    }



    /**
     * 商品属性
     * @return [type] [description]
     */
    public function goodsAttributeList(){
        $where = ' 1 = 1 '; // 搜索条件                        
        I('type_id')   && $where = "$where and type_id = ".I('type_id');  

    	$goodsAttribute = D('goodsAttribute');
    	$list = $goodsAttribute->getPage($goodsAttribute, $where, 'sort desc,attr_id desc');
    	$attr_input_type = array(0=>'手工录入',1=>' 从列表中选择',2=>' 多行文本框');
        $this->assign('attr_input_type',$attr_input_type);
    	$goodsTypeList = M('goodsType')->select();
   		$this->assign('goodsTypeList', $goodsTypeList);
    	$this->assign('list', $list);
    	$this->display();
    }



    /**
     * 添加商品属性
     * @return [type] [description]
     */
    public function addGoodsAttribute(){
    	$goodsAttribute = D("GoodsAttribute");
    	if(IS_POST){
    		$post = I('post.');
    		$post['attr_values'] = str_replace('_', '', $post['attr_values']); // 替换特殊字符
            $post['attr_values'] = str_replace('@', '', $post['attr_values']); // 替换特殊字符            
            $post['attr_values'] = trim($post['attr_values']);
            if($goodsAttribute->add($post)){
            	$this->success('操作成功！', U('goods/goodsAttributeList'));
            }else{
            	$this->error('操作失败！');
            }

    	}else{
    		$goodsTypeList = M('goodsType')->select();
   			$this->assign('goodsTypeList', $goodsTypeList);
    		$this->display();
    	}
    }


    /**
     * 编辑商品属性
     * @return [type] [description]
     */
    public function editGoodsAttribute(){
        $goodsAttribute = D("GoodsAttribute");
        if(IS_POST){
            $post = I('post.');
            $post['attr_values'] = str_replace('_', '', $post['attr_values']); // 替换特殊字符
            $post['attr_values'] = str_replace('@', '', $post['attr_values']); // 替换特殊字符            
            $post['attr_values'] = trim($post['attr_values']);
            $goodsAttribute->save($post);
            $this->success('操作成功！', U('goods/goodsAttributeList'));
            
        }else{
            $attr_id = I('attr_id', 0);
            $_result = $goodsAttribute->find($attr_id);
            $goodsTypeList = M('goodsType')->select();
            $this->assign('goodsTypeList', $goodsTypeList);
            $this->assign('data', $_result);
            $this->display();
        }
    }


    /**
     * 删除商品属性
     * @return [type] [description]
     */
    public function delGoodsAttribute(){
        $attr_id = I('attr_id', 0);
        // 判断 有无商品使用该属性
        $count = M("GoodsAttr")->where("attr_id = {$attr_id}")->count("1");   
        $count > 0 && $this->error('有商品使用该属性,不得删除!',U('Admin/Goods/goodsAttributeList'));                        
        // 删除 属性
        M('GoodsAttribute')->where("attr_id = {$attr_id}")->delete();   
        $this->success("操作成功!",U('Admin/Goods/goodsAttributeList'));
    }


    /**
     * 商品规格
     * @return [type] [description]
     */
    public function specList(){
        $where = ' 1 = 1 '; // 搜索条件                        
        I('type_id')   && $where = "$where and type_id = ".I('type_id');  
        $spec = D('spec');
        $list = $spec->getPage($spec, $where, 'sort asc');
        foreach($list['data'] as $k => $v)
        {       // 获取规格项     
                $arr = $spec->getSpecItem($v['id']);
                $list['data'][$k]['spec_item'] = implode(' , ', $arr);
        }
        $goodsTypeList = M('goodsType')->select();
        $this->assign('goodsTypeList', $goodsTypeList);
        $this->assign('list', $list);
        $this->display();
    }


    /**
     * 添加商品规格
     * @return [type] [description]
     */
    public function addSpec(){
        if(IS_POST){
            $spec = D("spec");
            $post = I('post.');
            $data = array(
                'type_id' => $post['type_id'],
                'name' => $post['name'],
                'sort' => I('sort', 0)
                );
            $insert_id = $spec->add($data); // 写入数据到数据库        
            $spec->updateSpecItem($insert_id, $post);
            $this->success('操作成功！', U('goods/specList'));
        }else{
            $goodsTypeList = M('goodsType')->select();
            $this->assign('goodsTypeList', $goodsTypeList);
            $this->display();
        }
    }


    /**
     * 编辑商品规格
     * @return [type] [description]
     */
    public function editSpec(){
        $spec = D("spec");
        if(IS_POST){
            $post = I('post.');
            $data = array(
                'id' => $post['id'],
                'type_id' => $post['type_id'],
                'name' => $post['name'],
                'sort' => I('sort', 0)
                );
            $spec->save($data); // 写入数据到数据库        
            $spec->updateSpecItem($post['id'], $post);
            $this->success('操作成功！', U('goods/specList'));
        }else{
            $id = I('id', 0);
            $goodsTypeList = M('goodsType')->select();
            $_result = $spec->find($id);
            $items = $spec->getSpecItem($id);
            $_result['items'] = implode(PHP_EOL, $items);
            $this->assign('data', $_result);
            $this->assign('goodsTypeList', $goodsTypeList);
            $this->display();
        }
    }


    /**
     * 删除商品规格
     * @return [type] [description]
     */
    public function delSpec(){
        $id = I('id', 0);
        // 判断 商品规格项
        $count = M("specItem")->where("spec_id = {$id}")->count("1");   
        $count > 0 && $this->error('清空规格项后才可以删除!',U('Admin/Goods/specList'));
        // 删除分类
        M('spec')->where("id = {$id}")->delete();   
        $this->success("操作成功!!!",U('Admin/Goods/specList'));
    }



    /**
     * 商品评价
     * @return [type] [description]
     */
    public function comment(){
        $comment = D('comment');
        $where = array('parent_id'=>0);
        $list = $comment->getPage($comment, $where,'add_time desc');
        $this->assign('list', $list);
        $this->display();
    }


    /**
     * 商品评价详情
     * @return [type] [description]
     */
    public function detailComment(){
        $comment = D('comment');
        if(IS_POST && $_POST['content']){
            $post = I('post.');

            $data = array(
                'goods_id' => $post['goods_id'],
                'username' => session('username'),
                'content'  => I('content', ''),
                'add_time' => time(),
                'is_show' => 1,
                'parent_id' => $post['comment_id']
                );
            if($comment->add($data)){
                $this->success('操作成功！');
            }else{
                $this->error('操作失败！');
            }
        }else{
            $id = I('get.id');
            $_result = $comment->relation(true)->find($id);
            $_reply = $comment->where('parent_id='.$id)->select();
            $this->assign('comment', $_result);
            $this->assign('reply', $_reply);
            $this->display();
        }
        
    }

}
?>