<?php
// +----------------------------------------------------------------------
// | 登录控制器
// +----------------------------------------------------------------------
// | Copyright (c) 2016 http://www.zenghao.cc All rights reserved.
// +----------------------------------------------------------------------
// | Author: isum <http://www.zenghao.cc>
// +----------------------------------------------------------------------
namespace Admin\Controller;
use Common\Controller\AdminBaseController;
class ArticleController extends AdminBaseController{

	/**
	 * 文章列表
	 * @return [type] [description]
	 */
	public function index(){
		$article = D('article');
		$where = array();
		$keyword = I('keywords', '');
		$cat_id = I('cat_id', 0);
		if($keywords){
			$where['title'] = array('like', '%'.$keywords.'%');
		}
		if($cat_id){
			$where['cat_id'] = $cat_id;
		}


		$list = $article->relation(true)->getPage($article, $where, 'add_time desc');
		$category = D('articleCat')->select();
		$this->assign('category', cateForLevel($category));
		$this->assign('list', $list);
		$this->display();
	}

	/**
	 * 添加文章
	 * @return [type] [<description>]
	 */
	public function addArt(){
		if(IS_POST){
			$data = I('post.');
			$data['click'] = mt_rand(1000,1300);
        	$data['add_time'] = time(); 
			if(D('article')->add($data)){
				$this->success('操作成功！', U('article/index'));
			}else{
				$this->error('操作失败！');
			}
		}else{
			$category = D('articleCat')->select();
			$this->assign('category', cateForLevel($category));
			$this->initEditor();
			$this->display();
		}
	}

	/**
	 * 编辑文章
	 * @return [type] [description]
	 */
	public function editArt(){
		if(IS_POST){
			$data = I('post.');
			if(D('article')->save($data)){
				$this->success('操作成功！', U('article/index'));
			}else{
				$this->error('数据没有更新或操作失败！', U('article/index'));
			}
		}else{
			$article_id = I('article_id', 0);
			$_result = D('article')->find($article_id);
			$category = D('articleCat')->select();
			$this->assign('category', cateForLevel($category));
			$this->initEditor();
			$this->assign('data', $_result);
			$this->display();
		}
	}


	/**
	 * 删除文章
	 * @return [type] [description]
	 */
	public function delArt(){
		$article_id = I('article_id', 0);
		if(D('article')->delete($article_id)){
			$this->success('操作成功！', U('article/index'));
		}else{
			$this->error('操作失败！', U('article/index'));
		}
	}

	/**
     * 初始化编辑器链接
     * @param $post_id post_id
     */
    private function initEditor()
    {
        $this->assign("URL_upload", U('Admin/Ueditor/imageUp',array('savepath'=>'article')));
        $this->assign("URL_fileUp", U('Admin/Ueditor/fileUp',array('savepath'=>'article')));
        $this->assign("URL_scrawlUp", U('Admin/Ueditor/scrawlUp',array('savepath'=>'article')));
        $this->assign("URL_getRemoteImage", U('Admin/Ueditor/getRemoteImage',array('savepath'=>'article')));
        $this->assign("URL_imageManager", U('Admin/Ueditor/imageManager',array('savepath'=>'article')));
        $this->assign("URL_imageUp", U('Admin/Ueditor/imageUp',array('savepath'=>'article')));
        $this->assign("URL_getMovie", U('Admin/Ueditor/getMovie',array('savepath'=>'article')));
        $this->assign("URL_Home", "");
    }


	/**
	 * 文章分类
	 * @return [type] [description]
	 */
	public function category(){
		$category  = D('articleCat')->order('sort asc')->select();
		$this->assign('category',cateForLevel($category,'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'));
		$this->display();
	}


	/**
	 * 添加文章分类
	 * @return [type] [<description>]
	 */
	public function addCate(){
		$articleCat  = D('articleCat');
		if(IS_POST){
			$post = I('post.');
			if($articleCat->add($post)){
				$this->success('操作成功！', U('article/category'));
			}else{
				$this->error('操作失败！');
			}
		}else{
			$category = $articleCat->select();
			$this->assign('category', cateForLevel($category));
			$this->display();
		}
	}


	/**
	 * 编辑文章分类
	 * @return [type] [description]
	 */
	public function editCate(){
		$articleCat  = D('articleCat');
		if(IS_POST){
			$post = I('post.');
			if($articleCat->save($post)){
				$this->success('操作成功！', U('article/category'));
			}else{
				$this->error('数据没有更新或操作失败！', U('article/category'));
			}
		}else{
			$cat_id = I('cat_id', 0);
			$_result = $articleCat->find($cat_id);
			$category = $articleCat->select();
			$this->assign('data', $_result);
			$this->assign('category', cateForLevel($category));
			$this->display();
		}
	}


	/**
	 * 删除文章分类
	 * @return [type] [description]
	 */
	public function delCate(){
		$cat_id = I('cat_id', 0);
		$res = D('article_cat')->where('parent_id ='.$cat_id)->select(); 
    	if ($res)
    	{
    		$this->error('还有子分类，不能删除', U('article/category'));
    	}
    	$res = D('article')->where('cat_id ='.$cat_id)->select();       	      	
    	if ($res)
    	{
    		exit(json_encode('非空的分类不允许删除'));
    		$this->error('非空的分类不允许删除', U('article/category'));
    	}      	
    	$r = D('article_cat')->where('cat_id='.$cat_id)->delete();
    	if($r) $this->success('操作成功！', U('article/category'));
	}
}
?>