<?php
namespace Home\Controller;use Think\Controller;
class SearchController extends Controller{
    public function index(){
        $title=$_GET['title']?$_GET['title']:null;
        $nav=M('nav')->select();
        $search=M('menu')->order("time desc")->where('title like "%'.$title.'%"')->select();
        $this->assign('list',$search);
        $this->assign('nav',$nav);
        $this->display('search/search');
    }
    //over
}