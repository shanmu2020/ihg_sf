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
<div class="container">
	<div class="row">

<div class="col-md-10 col-md-offset-4">
<div class="form-inline">
<input type="date" id="todaymenu_time" name="todaymenu_time" class="form-control" value="<?php echo ($time); ?>">
<span class="btn btn-info" id="tt">查看单日菜单</span></div>
</div>
			<div class="col-md-10 col-md-offset-1">
			<form id="deletetm">
			<table class="table table-bordered table-hover">
			<tr><th><span class="glyphicon glyphicon-ok" id="checkAll">All</span></th>
				<th class="text-center">菜单编号</th>
				<th class="text-center">菜名</th>
				<th class="text-center">类别</th>
				<th class="text-center">时间</th>
				<th class="text-center">操作</th>
			</tr>

			<?php if(is_array($menu)): $i = 0; $__LIST__ = $menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu1): $mod = ($i % 2 );++$i;?><tr>
					<td><input type="checkbox" name="deletetm[<?php echo ($menu1["menu_id"]); ?>]" value="<?php echo ($menu1["menu_id"]); ?>"></td>
					<td class="text-center"><?php echo ($menu1["menu_id"]); ?></td>
					<td ><?php echo ($menu1["title"]); ?></td>
					<td ><?php echo ($menu1["category"]); ?></td>
					<td class="text-center"><?php echo (date("Y-m-d H:i:s",$menu1["time"])); ?></td>
					<td class="text-center">
					<a href="javascript:dialog.confirm('确认删除吗?','/IHG/index.php/admin/editor/delete/deletetable/2/id/<?php echo ($menu1["menu_id"]); ?>')"><span class="glyphicon glyphicon-remove-circle"></span>
					</a>
					</td>
			</tr><?php endforeach; endif; else: echo "" ;endif; ?>
			</table></form>
		</div>
		<div class="col-md-10 col-md-offset-1" style="margin-bottom:20px;"><span class="btn btn-warning" id="deleteAll">批量删除</span></div>
		<div class="col-md-2 col-md-offset-1"><span class="btn btn-info" id="delete3month">清除缓存</span>(保留近三月)</div>
		</div>

<script src="/IHG/Public/Js/common.js"></script>
<script>
$("#delete3month").click(function(){
	layer.confirm('确认只保留近三月的菜单吗?',{icon:3,btn:['确认','取消']},function(){
		location.href="/IHG/admin.php/admin/editor/delete3month/dm/1"
		//$.post("/IHG/admin.php/admin/editor/delete3month",{'dm':1},function(result){
		//	if(result.status==1){dialog.toconfirm(result.message);}
		//	if(result.status==0){dialog.error(result.message);

		//},"JSON")

		});

})
</script>







</div>
</body></html>