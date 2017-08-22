/**
 *
 */
$(function(){
$('#order_c').click(function(){
	//排序
	var order=$("#order_c").text();
location.href="/IHG/admin.php/admin/index/index/orderwhere/"+order;
});
$('#order_t').click(function(){
	var order=$("#order_t").text();
location.href="/IHG/admin.php/admin/index/index/orderwhere/"+order;})
//查询
$("#search_title").click(function(){
	var title=$("#search").val();
	location.href="/IHG/admin.php/?c=index&a=search&title="+title;
})
$("#search_title1").click(function(){
	var title=$("#search").val();
	location.href="/IHG/index.php/?m=home&c=search&a=index&title="+title;
})
$("#upcomment").click(function(){
var commentname=$("input[name='comment_name']") .val();
var commentcontact=$("input[name='comment_contact']").val();
var commentcontent=$("textarea[name='comment_content']").val();
var menu_id=$("input[name='menu_id']").val();
var url='/IHG/index.php/Home/content/comment';
var date={'content':commentcontent,
           'username':commentname,
           'contact':commentcontact,
           'menu_id':menu_id,
};
//alert(article_id);
$.post(url,date,function(result){
	if(result.status==1)
	{var date = new Date();
	var y=date.getFullYear();
	var m=(date.getMonth()+1);
	var d=date.getDate();
    var  time1=y+"-"+(m<10?"0"+m:m)+"-"+(d<10?"0"+d:d);
	dialog.time('感谢你宝贵的意见!',1500);
	 $("#li_1").html("<strong>"+result.date.username+"</strong>&nbsp;"+time1);
	 $("#li_1").addClass("glyphicon glyphicon-user");
	 $("#li_2").html("&nbsp;&nbsp;&nbsp;&nbsp;"+result.date.content);
	  }
	if(result.status==0){dialog.error(result.message);}
},'JSON'

		);



})
//发布今日菜单
$("#addtoday").click(function(){

var date = $("#addtodaymenu").serializeArray();
//var data = $("#singcms-listorder").serializeArray();
postData = {};
$(date).each(function(i){
   postData[this.name] = this.value;
});
//console.log(date);
$.post('/IHG/index.php/admin/Addtodaymenu/index',postData,function(ruselt){
	if(ruselt.status==1){
	dialog.toconfirm(ruselt.message);}
	if(ruselt.status==0){dialog.error(ruselt.messag);}
	//dialog.toconfirm(ruselt.message);
},"JSON"
		);

})
//查看指定日期今日菜单
$("#tt").click(function(){
	var sc=$("#todaymenu_time").val();
	location.href="/IHG/admin.php/admin/index/todaymenu/time/"+sc;
})
//批量删除+全选
$("#checkAll").click(function(){
	var arr = $(':checkbox');
	for(var i=0;i<arr.length;i++){
	arr[i].checked = ! arr[i].checked;
	}
})
$("#deleteAll").click(function(){
	//alert(123);
	var deleteID=$("#deletetm").serializeArray();
	var url ='/IHG/admin.php/admin/editor/deletetm'
	dateID={};
	$(deleteID).each(function(i){
		  dateID[this.name] = this.value;
		});
	$.post(url,dateID,function(result){
		if(result.status==1){
		dialog.success(result.message,"/IHG/admin.php/admin/index/todaymenu");}
		if(result.status==0){dialog.error(result.message)}
	},"JSON")

})
//over
})