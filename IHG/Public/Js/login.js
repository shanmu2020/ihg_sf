$(document).ready(function(){
	$("#submit").click(function(){

	var username =$('#username').val();
	var password =$('#password').val();
	var monthlogin=$('#monthlogin').val();


    var url = "/IHG/admin.php/admin/login/logincheck";
    var data = {'username':username,'password':password,'monthlogin':monthlogin};
    // 执行异步请求  $.post
		    $.post(url,data,function(result){
		        if(result.status == 0) {
		            return dialog.error(result.message);
		        }
		        if(result.status == 1) {
		            return dialog.success(result.message, '/IHG/admin.php/admin/index/index');
		        }

		       },'JSON');


	})
// over
})