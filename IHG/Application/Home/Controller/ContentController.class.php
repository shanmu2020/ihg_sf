<?php
namespace Home\Controller;use Think\Controller;use Think\Model;
class ContentController extends Controller{
    public function show(){
        $id=$_GET['id'];
//         $comment_status=$_GET['comment'];
        $content=M('menu')->where('menu_id='.$id)->find();
        $comment=M('comment')->where('menu_id='.$id)->order('time desc')->select();
        $nav=M('nav')->select();
        $this->assign([
            'content'=>$content,
            'nav'=>$nav,
            'comment'=>$comment
        ]);
        $this->display('content/content');


    }
    public function comment(){
        $contact=$_POST['contact']?$_POST['contact']:null;
        $username=$_POST['username']?$_POST['username']:'游客'.time();
        $content=$_POST['content'];
        $menu_id=$_POST['menu_id'];
        $title=M('menu')->where("menu_id=$menu_id")->find();
        $date=['menu_id'=>"$menu_id",
            'username'=>"$username",
            'content'=>"$content",
            'contact'=>"$contact",
             'time'=>time(),
            'title'=>$title['title']
        ];
//         $w1['comment_count']='comment_count+1';
       $count= M('menu')->where("menu_id=$menu_id")->setInc('comment_count');
             if ($count&&$content){
            $comment1=M('comment')->add($date);
                   return show(1,'成功',$date);}
        else { return show(0, '评论失败,检查评论内容是否为空',$date);}

    }
 //over

}