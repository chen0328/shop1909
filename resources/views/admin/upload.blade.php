<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <style>
        .show img {
            width:  200px;
            height: 200px;
        }
        .show video {
            width:  240px;
            height: 150px;
        }
    </style>
</head>
<script type="text/javascript" src="/js/uploadify/jquery.js"></script>
<link rel="stylesheet" type="text/css" href="/js/uploadify/uploadify.css" />
<script type="text/javascript" src="/js/uploadify/jquery.uploadify.js"></script>
<body>
<input type="file" name="source" id="file_upload">
<div class="show">

</div>
</body>
</html>
<script>
    $("#file_upload").uploadify({
        "swf": "/js/uploadify/uploadify.swf",//flash地址
        "uploader" : "/admin/addupload",//上传请求处理地址
        'buttonText' : "上传",
        onUploadSuccess:function(msg,newFilePath,info){
            //展示图片
            var img_str="<img src = '"+newFilePath+"'>";
            //展示视频
//            var video_str='<video src="'+newFilePath+'" controls="controls"></video>';
            $(".show").append(img_str);
        }
    })
</script>