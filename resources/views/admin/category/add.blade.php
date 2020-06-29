<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>头部-有点</title>
    <link rel="stylesheet" type="text/css" href="/admin/css/css.css" />
    <script type="text/javascript" src="/admin/js//jquery.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
<div id="pageAll">
    <div class="pageTop">
        <div class="page">
            <img src="/admin/img/coin02.png" /><span><a href="#">首页</a>&nbsp;-&nbsp;<a
                        href="#">分类管理</a>&nbsp;-</span>&nbsp;分类添加
        </div>
    </div>
    <div class="page ">
        <!-- 添加导航栏页面样式 -->
        <div class="banneradd bor">
            <div class="baTop">
                <span>添加分类</span>
            </div>
            <div class="baBody">
                <div class="bbD">
                    分类名称：<input type="text" class="input1" name="cate_name" />
                </div>
                <div class="bbD">
                    是否显示：<label><input type="radio" checked="checked" name="is_show" value="1" />是</label>
                    <label><input name="is_show"  type="radio" value="2"/>否</label>
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
<script src="/admin/js/jquery.min.js"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).ready(function(){
        $(document).on('click','#but',function(){
            var data = {};
            data.cate_name = $("input[name='cate_name']").val();
            data.is_show = $("input[name='is_show']:checked").val();
            var url = '/admin/category/add_do';
            $.ajax({
                url:url,
                data:data,
                type:'post',
                dataType:'json',
                success:function(res){
                    if(res.code == 00000){
                        window.location.href=res.url;
                    }
                }
            })
        })
    })
</script>