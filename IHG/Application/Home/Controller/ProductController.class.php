<?php
namespace Home\Controller;
use Think\Controller;
class ProductController extends Controller{
    function product_list(){
        $category=$_GET['category']?$_GET['category']:"西餐";
        $list=M('menu')->where('category="'.$category.'"')->select();
        $this->assign('list',$list);
        $this->display('index/index');

    }



    //over
}