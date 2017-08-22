<?php
namespace Admin\Controller;use Think\Controller;
class AddtodaymenuController extends Controller{
public function index(){
    $date=$_POST[addtoday];
    if(is_array($date)&&$date){
        foreach ($date as $menu_id=>$date1){
            $t=M('menu')->where("menu_id=$menu_id")->find();
            $today['menu_id']=$menu_id;
            $today['category']=$date1;
            $today['time']=time();
            $today['title']=$t['title'];
            $menu=M('todaymenu')->add($today);
        }
         return show(1,'发布成功',$date);}
    else{return show(0,'发布失败');}
}
    //over
    }