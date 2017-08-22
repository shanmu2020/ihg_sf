<?php
namespace Admin\Model;use Think\Model;
class PageModel extends Model{
    public function pagelist($table,$where="",$pagesize=10){
$count=M($table)->where($where)->count();
$page=new \Think\Page($count, $pagesize);
$page->setConfig('prev', '上一页');
$page->setConfig('next', '下一页');
$page->setConfig('last', '末页');
$page->setConfig('first', '首页');
 return $show=$page->show();
    }



//over
}