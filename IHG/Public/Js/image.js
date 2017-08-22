/**
 * 图片上传功能
 */
$(function() {
    $('#file_upload').uploadify({
        'swf'      : '__PUBLIC__/uploadify/uploadify.swf' ,
        'uploader' : '__ROOT__/admin.php?c=editor&a=uploadify',
        'buttonText': '上传图片',
        'fileTypeDesc': 'Image Files',
        'fileObjName' : 'file',
        //允许上传的文件后缀
        'fileTypeExts': '*.gif; *.jpg; *.png;*.jpeg',
        'onUploadSuccess' : function(file,data,response) {
            // response true ,false
            if(response) {
                var obj = JSON.parse(data); //由JSON字符串转换为JSON对象

                console.log(data);
                $('#' + file.id).find('.data').html(' 上传完毕');

                $("#upload_org_code_img").attr("src","/IHG"+obj.data);
                $("#file_upload_image").attr('value',"/IHG"+obj.data);
                $("#upload_org_code_img").show();
            }else{
                alert('上传失败');
            }
        }
    });
});





