<?php
namespace Admin\Controller;
use Think\Controller;use Think\Model;
class EditorController extends Controller {
    public function index()
    {
        $this->display('editor/add');
    }
//     public function index2(){
//         $this->display('editor/update');
//     }
    public function add(){
//         $addposition=$_POST['addposition']?$_POST['addposition']:null;
        $title=$_POST['title'];
        $show=$_POST['show'];
        $content=$_POST['content'];
        $category=$_POST['category'];
//         $image=$_POST['image'];

               $image=D("Upload1")->uploadimage();
                $date=['title'=>"$title",
                    'content'=>"$content",
                    'image'=>"$image",
                    'category'=>"$category",
                    'show'=>"$show",
                    'time'=>time(),
                ];
//                 if ($info) {echo $image;}
//               $this->assign('image1',$image);
//         if (!empty($addposition)){$position=M('position')->add($date);}
//         if ($position){$this->success('插入成功',U('Admin/Index/index'),1);
//                 }else{
//                     $this->error('插入失败',U('Admin/editor/index'),2);
//                 }

        if (!empty( $title&&$show&&$content&&$category&&$image))
        {$add=M('menu')->add($date);

        if ($add){
        $this->success('插入成功',U('Admin/Index/index'),1);
                }else{
                    $this->error('插入失败',U('Admin/editor/index'),2);
                }
        }
        else
        { $this->error('请把信息填写完整...',U('Admin/editor/index'),2);}

//         var_dump($_FILES);
//        $add= M('menu')->add($date);
//         if($add){$this->success('操作成功','/IHG/admin.php');}

    }

    public function update(){

        $id=$_GET['id'];
        $list1=M('menu')->where("menu_id=$id")->find();
        $listposition=M('position')->where("menu_id=$id")->find();
       $this->assign('list1',$list1);
//        dump($list1);
       $menu_id=$_POST['menu_id'];
       $title=$_POST['title'];
       $show=$_POST['show'];
       $content=$_POST['content'];
       $category=$_POST['category'];
       $image1=D('Upload1')->uploadimage();
       $image2=$_POST['img'];
$image=strlen($image1)>strlen("/IHG/Uploads/")?$image1:$image2;
       $date=[
           'title'=>"$title",
           'content'=>"$content",
           'image'=>"$image",
           'category'=>"$category",
           'show'=>"$show",
           'time'=>time(),
       ];
//        var_dump($show);
//        var_dump($date);
//        var_dump($image1);
//        var_dump($image2);
       if (!empty( $title&&$show&&$content&&$category&&$image))
       {
         $save1=M('menu')->where("menu_id=$menu_id")->save($date);
         if ($list1['menu_id']==$listposition['menu_id']){
             $save1=M('position')->where("menu_id=$menu_id")->save($date);
         }
         if ($save1){
         $this->success('更新成功',"/IHG/admin.php?c=editor&a=inde2&id=$menu_id",1);}

       }
       $this->display('editor/update');
    }
    public function delete(){
        $deletetable=$_GET['deletetable']?$_GET['deletetable']:null;
        $id=$_GET['id'];
        $url='/IHG/admin.php';$table='menu';
        if ($deletetable==1){$url='/IHG/admin.php/admin/index/index/position/1';$table='position';}
        if ($deletetable==2){$url='/IHG/admin.php/admin/index/todaymenu';$table='todaymenu';}


//         dump($id);
if ($id){
     $del= M($table)->where("menu_id=$id")->delete();}
     else {$this->error('操作失败,id不存在...',$url);}
      if($del){$this->success('操作成功',$url);}

    }
    public function deletetm(){
        $deleteID=$_POST['deletetm'];
        foreach ($deleteID as $menu_id=>$values){
            $del=M('todaymenu')->where("menu_id=$menu_id")->delete();
        }
        if($del){
            return show(1, '删除成功');}
        else{return show(0, '删除失败');}

    }
    public function delete3month(){
        $dm=$_GET['dm']?$_GET['dm']:null;
        if($dm){$time=time()-7776000;
        $d3m=M('todaymenu')->where("time<$time")->delete();
       echo "<script>location.href='/IHG/admin.php/admin/index/todaymenu/';</script>";}

        //else{echo "<script>location.href='/IHG/admin.php/admin/index/todaymenu/';</script>";}
    }
    public function addposition(){
        $id=$_GET['id'];
        $date=M('menu')->where("menu_id=$id")->find();
        $addposition=M('position')->add($date);
        if ($addposition){
            $this->success('追加成功',U('Admin/Index/index'),1);
        }else{
            $this->error('追加失败',U('Admin/Index/index'),2);
        }
        }


//        public function uploadfile(){
//        $upload=new \Think\Upload();
//         $upload->maxsize=1024*1024;
//         $upload->exts=array('jpg','gif','png');
//         $upload->rootPath='/Uploads/';
//         $upload->savePath='';
//         //         $upload->autoSub=true;
//         $info=$upload->uploadOne($_FILES['myfile']);

//         $image=$upload->rootPath.$info['savepath'] . $info['savename'];
//         if ($info) {echo "上传成功" ;}
//         else{echo "上传失败".$this->error($upload->getError());}    }
//over
}