<?php
$tmp_name=$_FILES['mytest']['tmp_name'];
$filename=$_FILES['mytest']['name'];
$rand=Date("YmdHis").rand(0,999);
 $destination="up/".$rand.$filename;

 //print_r($destination."<br>");
 if(move_uploaded_file($tmp_name, $destination)){echo "移动文件成功"."<br>";}
 else{echo "移动文件失败";};
?>