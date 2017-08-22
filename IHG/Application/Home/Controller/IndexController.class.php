<?php
// 本类由系统自动生成，仅供测试用途
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        $title=$_GET['title']?$_GET['title']:null;
        $page=$_GET['p']?$_GET['p']:1;
        $category=$_GET['category'];
        $where="";
        if ($category){
        $where='category="'.$category.'"';}
        $show=D('Admin/Page')->pagelist('menu',$where,8);
        $offset=($page-1)*8;
//         var_dump($show);exit;
     $hp=M('position')->order('time desc')->limit(2)->select();
            $list=M('menu')->where('category="'.$category.'"')->limit($offset,8)->select();
        $nav=M('nav')->select();
        //得到评论数
//         foreach ($list as $list1){
//       $k=$list1['menu_id'];
//       $value=M('comment')->where("menu_id=".$list1['menu_id'])->count();
//       $comment_number.=[$k=>$value];
//                }
//                echo $comment_number[$k];var_dump($comment_number);
//                exit;
        $this->assign(['nav'=>$nav,
                       'list'=>$list,
                        'page'=>$show,
                         'hp'=>$hp,
//             'k'=>$k,
//             'comment_count'=>$comment_count


        ]);

              $this->display();
    }
//over
}