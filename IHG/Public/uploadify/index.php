
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>UploadiFive Test</title>
<script src="jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="jquery.uploadify.min.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="uploadify.css">
<style type="text/css">
body {
	font: 13px Arial, Helvetica, Sans-serif;margin:0 auto;
}
</style>
</head>

<body>
	<h1>Uploadify上传插件</h1>
	<form>
		<div id="queue"></div>
		<input id="file_upload" name="file_upload" type="file" multiple="true">
	</form>

	<script type="text/javascript">
		<?php $timestamp = time();?>
		$(function() {
			$('#file_upload').uploadify({
				'formData'     : {
					'timestamp' : '<?php echo $timestamp;?>',
					'token'     : '<?php echo md5('unique_salt' . $timestamp);?>'
				},
				'swf'      : 'uploadify.swf',

				'uploader' : 'up.php',
				'buttonText':'选择文件',
				'formData':{'name':'jack'},
				'metdoh':'post',
				'fileObjName' : 'mytest',
				'onUploadComplete':function(file){window.location.href="https://www.baidu.com";},
				'oncancel':function(file){alert('你放弃了上传');},

			});
		});
	</script>
</body>
</html>