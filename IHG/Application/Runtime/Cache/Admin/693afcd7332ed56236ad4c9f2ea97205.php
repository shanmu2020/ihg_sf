<?php if (!defined('THINK_PATH')) exit();?><html><head><meta charset="utf-8">
<script src="/IHG/Public/Js/dialog.js"></script>
<script src="/IHG/Public/Js/image.js"></script>
<script src="/IHG/Public/Js/editor.js"></script>
<script src="/IHG/Public/Js/common.js"></script>
<script src="/IHG/Public/Js/login.js"></script>
<link rel="stylesheet" href="/IHG/Public/public/css/bootstrap.min.css">
<script src="/IHG/Public/public/js/jquery-3.2.1.min.js"></script>
<script src="/IHG/Public/public/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="/IHG/Public/kindeditor/themes/default/default.css" />
	<link rel="stylesheet" href="/IHG/Public/kindeditor/plugins/code/prettify.css" />
	<script charset="utf-8" src="/IHG/Public/kindeditor/kindeditor.js"></script>
	<script charset="utf-8" src="/IHG/Public/kindeditor/lang/zh_CN.js"></script>
	<script charset="utf-8" src="/IHG/Public/kindeditor/plugins/code/prettify.js"></script>
	<link href="/IHG/Public/uploadify/uploadify.css" rel="stylesheet" type="text/css" />
<script src="/IHG/Public/layer-v3.0.3/layer/layer.js"></script>
     <script type="text/javascript" src="/IHG/Public/uploadify/jquery.uploadify.js"></script>
	<script type="text/javascript">KindEditor.ready(function(K) {
		var editor1 = K.create('#show');}

	);


	</script>
	</head><body>
<div style="width:1000px">
	   <div class="navbar col-md-8 col-md-offset-2 navbar-fixed-top " style="background: #66CCCC">
 <div class="navbar-header">
<a class="navbar-brand" href="/IHG/index.php/home/todaymenu/index" target="_blank">前端首页</a></div>
            <ul class="nav navbar-nav nav-tabs ">
            <li class=<?php if(($table == 'menu')): ?>"active"<?php endif; ?>><a href="/IHG/admin.php"><strong>菜单管理</strong></a></li>
            <li class=<?php if(($table == 'position')): ?>"active"<?php endif; ?>><a href="/IHG/admin.php/admin/index/index/position/1"><strong>推荐表管理</strong></a></li>
               <li class=<?php if(($table == 'comment')): ?>"active"<?php endif; ?>><a href="/IHG/admin.php/admin/index/comment"><strong>评价表管理</strong></a></li>
<li class=<?php if(($table == 'todaymenu')): ?>"active"<?php endif; ?>><a href="/IHG/admin.php/admin/index/todaymenu"><strong>今日菜单表管理</strong></a></li>
<li class="dropdown">
            <a class="btn" data-toggle="dropdown"><span class="glyphicon glyphicon-user ">欢迎你,<?php echo (session('username')); echo (cookie('username')); ?></span></a>
            <ul class="dropdown-menu">
                       <li><a href="/IHG/admin.php/admin/login/loginout"><span class="glyphicon glyphicon-off">退出</span></a></li>

            </ul>
            </li>

            </ul>


</div>
		   </div>
		   <br><br><br><br>
<div class="container" >
	<div class="row">
		<div class="col-md-1 col-md-offset-1">
		<a href="/IHG/admin.php?c=editor&a=index" ><span class="btn btn-info  ">新菜添加</span></a>
	   </div>
	   <div class="col-md-3 ">
	   <div class="btn-group">
  <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    排序 <span class="caret"></span>
  </button>
  <ul class="dropdown-menu">
    <li id="order_c"><a href="#">类别</a></li>
    <li id="order_t"><a href="#">时间</a></li>
            <li role="separator" class="divider"></li>
        <li id="order"><a href="/IHG/admin.php?c=index&a=index">默认</a></li>

  </ul>
</div>
</div>
<div class="form-inline" style="margin-bottom:20px;margin-left:810px;">
  <div class="form-group">
        <input type="text" class="form-control" id="search" name="search" placeholder="请输入菜单编号/菜名">
  </div>
  <button id="search_title"  class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
</div>
    </div>
</div>
<div class="col-md-8 col-md-offset-2">
<form id="addtodaymenu">
<table class="table table-bordered table-hover">
	<tr><th>今日菜单</th>
		<th>编号</th>
		<th>菜名</th>
		<th>介绍</th>
		<th>类别</th>
		<th>图片</th>
		<th>时间</th>
		<th>评论数</th>
		<th>操作</th>
	</tr>
	<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$li): $mod = ($i % 2 );++$i;?><tr>
	<td><input type="checkbox" value="<?php echo ($li["category"]); ?>" name="addtoday[<?php echo ($li["menu_id"]); ?>]" ></td>
		<td><?php echo ($li["menu_id"]); ?></td>
		<td><?php echo ($li["title"]); ?></td>
		<td><?php echo (msubstr($li["content"],0,25,'utf-8',true)); ?></td>
		<td><?php echo ($li["category"]); ?></td>
		<td><img src="<?php echo ($li["image"]); ?>" width="80" height="50"></td>
		<td><?php echo (date("Y/m/d H:i:s",$li["time"])); ?></td>
		<td class="text-center"><a href="#"><?php echo ($li["comment_count"]); ?></a></td>
				<td>
		<a href="/IHG/admin.php?c=editor&a=update&id=<?php echo ($li["menu_id"]); ?>"><span class="glyphicon glyphicon-edit"></span></a>


<a href="javascript:dialog.confirm('确定要删除吗?','/IHG/admin.php?c=editor&a=delete&id=<?php echo ($li["menu_id"]); if($position == 1): ?>&deletetable=1<?php endif; ?>')"><span  class="glyphicon glyphicon-remove-circle "></span></a>
	<?php if($position == 0): ?><a href="javascript:dialog.confirm('添加到推荐表?','/IHG/admin.php?c=editor&a=addposition&id=<?php echo ($li["menu_id"]); ?>')"><span class="glyphicon glyphicon-plus"></span></a><?php endif; ?>
	<a  target="_blank" href="/IHG/index.php?m=home&c=content&a=show&id=<?php echo ($li["menu_id"]); ?>"><span class="glyphicon glyphicon-eye-open"></span></a>
		</td>

	</tr><?php endforeach; endif; else: echo "" ;endif; ?>

</table></form>
<button id="addtoday" class="btn btn-warning">今日菜品发布</button>
<?php echo ($page); ?>
</div>
<script src="/IHG/Public/Js/common.js"></script>
<script>
$(function(){

})
</script>






</div>
</body></html>