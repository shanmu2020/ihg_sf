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
	<div class="col-md-4 col-md-offset-4" style="margin-bottom:20px">
	<input type="text" class="form-control" placeholder="输入游客/文章id查询" name="search_comment"></div>
	<div ><button id="submit_search_comment" class="btn btn-info"><span class="glyphicon glyphicon-search"></span></button>
	</div>
		<div class="col-md-10 col-md-offset-1">
			<table class="table table-bordered table-hover">
			<tr>
			<th>评论编号</th>
			<th>菜名</th>
			<th>菜单编号</th>
			<th>用户</th>
			<th>联系方式</th>
			<th>评论</th>
			<th>时间</th>
			</tr>

			<?php if(is_array($comment)): $i = 0; $__LIST__ = $comment;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$comment1): $mod = ($i % 2 );++$i;?><tr>
			<td><?php echo ($comment1["id"]); ?></td>
			<td><?php echo ($comment1["title"]); ?></td>
			<td><?php echo ($comment1["menu_id"]); ?></td>
			<td><?php echo ($comment1["username"]); ?></td>
			<td><?php echo ((isset($comment1["contact"]) && ($comment1["contact"] !== ""))?($comment1["contact"]):"无"); ?></td>
			<td><?php echo ($comment1["content"]); ?></td>
			<td><?php echo (date("Y-m-d H:i:s",$comment1["time"])); ?></td>
			</tr><?php endforeach; endif; else: echo "" ;endif; ?>
			</table>
		</div>
		<div class="col-md-4 col-md-offset-4"><?php echo ($page); ?></div>
	</div>

</div>
<script>
$("#submit_search_comment").click(function(){
	var sc=$("input[name='search_comment']").val();
	location.href='/IHG/admin.php/admin/index/comment/search/'+sc;
})
</script>







</div>
</body></html>