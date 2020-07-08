<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>注册-有点</title>
    <link rel="stylesheet" type="text/css" href="/css/public.css" />
    <link rel="stylesheet" type="text/css" href="/css/page.css" />
    <script type="text/javascript" src="/js/jquery.min.js"></script>
    <script type="text/javascript" src="/js/public.js"></script>
</head>
<body>

<!-- 登录页面头部 -->
<div class="logHead">
    <img src="/img/logLOGO.png" />
</div>
<!-- 登录页面头部结束 -->

<!-- 登录body -->
<div class="logDiv">
    <img class="logBanner" src="/img/logBanner.png" />
    <div class="logGet">
        <!-- 头部提示信息 -->
        <div class="logD logDtip">
            <p class="p1">注册</p>
            <p class="p2">有点人员注册</p>
        </div>
        <!-- 输入框 -->
        <div class="lgD">
            <img class="img1" src="/img/logName.png" /><input type="text"
                                                             placeholder="输入用户名" name="name" />
        </div>
        <div class="lgD">
            <img class="img1" src="/img/logPwd.png" /><input type="password"
                                                            placeholder="输入用户密码" name="pwd" />
        </div>
        <div class="logC">
            <button id="but">注册</button>
        </div>
    </div>
</div>
<!-- 登录body  end -->

<!-- 登录页面底部 -->
<div class="logFoot">
    <p class="p1">版权所有：南京设易网络科技有限公司</p>
    <p class="p2">南京设易网络科技有限公司 登记序号：苏ICP备11003578号-2</p>
</div>
<!-- 登录页面底部end -->
</body>
</html>
<script>
    $(document).on('click','#but',function(){
        var data={};
        data.name = $("input[name='name']").val();
        data.pwd = $("input[name='pwd']").val();
//        console.log(data);return false;
        var url = "/index/reg_do";
        $.ajax({
            url:url,
            data:data,
            type:'post',
            dataType:'json',
            success:function(res){
//                console.log(res);
                if(res.code == 00000){
                    window.location.href=res.url;
                }else{
                    alert(res.msg);
                }
            }
        });
    })
</script>