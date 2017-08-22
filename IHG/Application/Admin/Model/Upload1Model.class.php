<?php
namespace Admin\Model;use Think\Model;
class Upload1Model extends Model{
  public function uploadimage(){
      $upload=new \Think\Upload();
      $upload->maxsize=1024*1024;
      $upload->exts=array('jpg','gif','png');
      $upload->rootPath='/IHG/Uploads/';
      $upload->savePath='';
      //         $upload->autoSub=true;
      $info=$upload->uploadOne($_FILES['image']);
    return  $image=$upload->rootPath.$info['savepath'] . $info['savename'];

  }



    //over
}
