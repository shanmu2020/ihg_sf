<?php
// 本类由系统自动生成，仅供测试用途
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller {
//    public function __construct(){
//         if (true){$this->error('请先登录...',U('admin/login/index'),2);}
//     }
    public function index(){
        $page=$_GET['p']?$_GET['p']:1;
        $position=$_GET['position']?$_GET['position']:0;
        $order='menu_id';
        if ($_GET['orderwhere']=='类别'){$order='category';}
        if($_GET['orderwhere']=='时间'||$position==1){$order='time';}
       // $order=$_GET['orderwhere'];
         $offset=($page-1)*10;
        if($position==1){$table='position';}else{$table='menu';}
        if (session('username')||cookie('username')){
        $menu=M($table)->order("$order desc")->limit($offset,10)->select();
        //dump($menu);
$show=D('Page')->pagelist($table);
$this->assign([
    'position'=>$position,
    'page'=>$show,
    'list'=>$menu,
    'table'=>$table
              ]);

        $this->display();
    }else{$this->error('请先登录...',U('admin/login/index'),2);}}
//     public function order(){
//         $page=$_GET['p']?$_GET['p']:1;
//         $table='menu';
//         $position=$_GET['position']?$_GET['position']:0;
//         $offset=($page-1)*10;
//         $order=$_GET['orderwhere']=='类别'?'category':'time';
//          var_dump($order);
//         $menu=M('menu')->order("$order desc")->limit($offset,10)->select();
//         $show=D('Page')->pagelist($table);
//         $this->assign(['list'=>$menu,
//             'page'=>$show,
//             'table'=>$table
//         ]);
//        //         var_dump($menu);exit;
//         $this->display('index/index');
//     }
    public function search(){
        $page=$_GET['p']?$_GET['p']:1;
        $table='menu';
        $offset=($page-1)*10;
        $info=$_GET['title']?$_GET['title']:null;
        $where="";
        if (is_numeric($info)){
            $where="menu_id=$info"; }
            else  if (is_string($info)){$where='title like "%'.$info.'%"';}
        $menu=M('menu')->order("time desc")->where($where)->limit($offset,10)->select();
        $show=D('Page')->pagelist($table);
               $this->assign(['list'=>$menu,
            'page'=>$show,
            'table'=>$table
        ]);
//         var_dump($menu);exit;
        $this->display('index/index');

    }
    public function comment(){
        if(session('username')||cookie('username')){
        $page=$_GET['p']?$_GET['p']:1;
        $search=$_GET['search'];
//         dump($search);exit;
        $where="";
        if (is_numeric($search)){
            $where="menu_id=$search"; }
      else  if (is_string($search)){$where='username like "%'.$search.'%"';}
         $offset=($page-1)*15;
        $show=D('Page')->pagelist('comment',"",15);
        $comment_count=M('menu')->select();
        $comment=M('comment')->order('time desc')->where($where)->limit($offset,15)->select();
        $this->assign(['comment'=>$comment,
            'comment_count'=>$comment_count,
            'page'=>$show,
            'table'=>'comment'
        ]);
        $this->display('comment/comment');}else{$this->error('请先登录...',U('admin/login/index'),2);}

    }
    public function todaymenu(){
        if(session('username')||cookie('username')){
            $t=$_GET['time']?$_GET['time']:date('Y-m-d');
            $timemin=strtotime($t);
            $timemax=strtotime($t)+86400;
           // dump($time);exit;
//             $time= strtotime(date('Y-m-d'));
            $where="time>=$timemin and time<=$timemax";
            $todaymenu=M('todaymenu')->where($where)->order('category asc, time desc')->select();
            $this->assign(
                ['menu'=>$todaymenu,
                    'table'=>'todaymenu',
                    'time'=>$t
                ]);
            $this->display('todaymenu/menu');


        }
    }
    //over
}