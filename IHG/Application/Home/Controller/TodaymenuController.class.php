<?php
namespace Home\Controller;
use Think\Controller;
class TodaymenuController extends Controller{
    public function index(){
        $nav=M('nav')->select();
        //$time=strtotime(date('Y-m-d'));
     //   $where="time>$time";
       // $today=M('todaymenu')->where($where)->select();
//         foreach ($today as $k=>$today1){
//         $list[$k]=M('menu')->where('menu_id='.$today1['menu_id'])->find();
//         }
// $list=todaymenucategory('西餐');
//         dump($list);exit;
         $this->assign([
             'nav'=>$nav,
//              'list'=>$list,
//              'today'=>$today
         ]);
        $this->display('today/todaymenu');
    }

    //over
}
