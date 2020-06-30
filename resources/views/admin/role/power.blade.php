<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>头部-有点</title>
    <link rel="stylesheet" type="text/css" href="/css/css.css" />
    <script type="text/javascript" src="/js/jquery.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
<div id="pageAll">
    <div class="pageTop">
        <div class="page">
            <img src="/img/coin02.png" /><span><a href="#">首页</a>&nbsp;-&nbsp;<a
                        href="#">角色管理</a>&nbsp;-</span>&nbsp;查看角色
        </div>
    </div>
    <div class="page ">
        <!-- 添加导航栏页面样式 -->
        <div class="banneradd bor">
            <div class="baTop">
                <span>角色添加权限</span>
            </div>
            <div class="baBody">
                <div class="bbD">
                    角色：{{$data->role_name}}<br/>
                    权限：
                    @foreach($info as $k=>$v)
                        <input type="checkbox" value="{{$v->p_id}}" name="p_id"/>{{$v->p_name}}
                    @endforeach
                </div>
                <div class="bbD">
                    <p class="bbDP">
                        <button class="btn_ok btn_yes" href="#" id="but">提交</button>
                        <a class="btn_ok btn_no" href="#">取消</a>
                    </p>
                </div>
            </div>
        </div>

        <!-- 上传广告页面样式end -->
    </div>
</div>
</body>
</html>
<script src="/js/jquery.min.js"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).ready(function(){
        $(document).on('click','#but',function(){
            var str="";
            $("input[name='p_id']:checked").each(function(){
                str+=$(this).val()+',';
            })
            var p_id = str.substring(0,str.length-1);
            var role_id = "{{$role_id}}";
            var url = '/admin/addroleright';
            var data = {role_id:role_id,p_id:p_id};
            $.ajax({
                url:url,
                data:data,
                type:'post',
                dataType:'json',
                success:function(res){
//                    console.log(res);
                    if(res.code == 00000){
                        window.location.href=res.url;
                    }else{
                        alert(res.msg);
                        window.location.href=res.url;
                    }
                }
            })
        })
    })
</script>