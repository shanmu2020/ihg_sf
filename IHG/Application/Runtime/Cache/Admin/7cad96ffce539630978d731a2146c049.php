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
<a class="navbar-brand" href="/IHG/index.php" target="_blank">前端首页</a></div>
            <ul class="nav navbar-nav nav-tabs ">
            <li class=<?php if(($table == 'menu')): ?>"active"<?php endif; ?>><a href="/IHG/admin.php"><strong>菜单管理</strong></a></li>
            <li class=<?php if(($table == 'position')): ?>"active"<?php endif; ?>><a href="/IHG/admin.php/admin/index/index/position/1"><strong>推荐表管理</strong></a></li>
               <li class=<?php if(($table == 'comment')): ?>"active"<?php endif; ?>><a href="/IHG/admin.php/admin/index/comment"><strong>评价表管理</strong></a></li>
<li class="dropdown">
            <a class="btn" data-toggle="dropdown"><span class="glyphicon glyphicon-user ">欢迎你,<?php echo (session('username')); ?></span></a>
            <ul class="dropdown-menu">
                       <li><a href="/IHG/admin.php/admin/login/loginout"><span class="glyphicon glyphicon-off">退出</span></a></li>

            </ul>
            </li>

            </ul>


</div>
		   </div>
		   <br><br><br><br>

<form class="form-horizontal" action="/IHG/admin.php?c=editor&a=update" enctype="multipart/form-data" method="post">
  <div class="form-group">
    <label for="title" class="col-sm-2 col-sm-offset-1 control-label">菜名</label>
    <div class="col-sm-5">
      <input type="text" name="title" class="form-control" id="title" placeholder="" value="<?php echo ($list1["title"]); ?>">
    </div>
  </div>
  <div class="form-group">
    <label for="content" class="col-sm-2 col-sm-offset-1 control-label">描叙</label>
    <div class="col-sm-5">
      <input type="text" name="content" class="form-control" id="content" value="<?php echo ($list1["content"]); ?>">
    </div>
  </div>
    <div class="form-group">
    <label for="" class="col-sm-2 col-sm-offset-1 control-label">菜系</label>
    <div class="col-sm-5">
      <select class="form-control" name="category">
  <option value="中餐" <?php if($list1['category'] == '中餐'): ?>selected="selected"<?php endif; ?>>中餐</option>
  <option value="面包" <?php if($list1['category'] == '面包'): ?>selected="selected"<?php endif; ?>>面包</option>
  <option value="西餐" <?php if($list1['category'] == '西餐'): ?>selected="selected"<?php endif; ?>>西餐</option>
  <option value="水果" <?php if($list1['category'] == '水果'): ?>selected="selected"<?php endif; ?>>水果</option>
  <option value="冷菜" <?php if($list1['category'] == '冷菜'): ?>selected="selected"<?php endif; ?>>冷菜</option>

</select>
    </div>
  </div>
  <div class="form-group">
    <label for="show" class="col-sm-2 col-sm-offset-1 control-label">内容</label>
    <div class="col-sm-5">
      <textarea name="show" class="form-control" id="show"><?php echo ((isset($list1["show"]) && ($list1["show"] !== ""))?($list1["show"]):"请添加内容..."); ?></textarea>
    </div>
  </div>
   <div class="form-group">
    <label for="image" class="col-sm-2  col-sm-offset-1 control-label">图片</label>
    <div class="col-sm-5">
      <input type="file" name="image" class="form-control" id="image">
      <input type="hidden" name="img" value="<?php echo ($list1["image"]); ?>">
      <input type="hidden" name="menu_id" value="<?php echo ($list1["menu_id"]); ?>">
     <img width="180px" height="200px" src="<?php echo ($list1["image"]); ?>">
        </div>

  <div class="form-group">
    <div class="col-sm-offset-3 col-sm-5" style="top:10px">
      <button type="submit" class="btn btn-info">修&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;改</button>
    </div>
  </div>
</form>






</div>
</body></html>