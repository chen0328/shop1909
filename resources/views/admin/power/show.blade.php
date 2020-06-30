<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>广告-有点</title>
    <link rel="stylesheet" type="text/css" href="/css/css.css" />
    <script type="text/javascript" src="/js/jquery.min.js"></script>
    <!-- <script type="text/javascript" src="/js/page.js" ></script> -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style type="text/css">
        ul li{
            color: black;
            float: left;
            padding: 8px 16px;
            text-decoration: none;
            margin-left: 15px;
        }
    </style>
</head>

<body>
<div id="pageAll">
    <div class="pageTop">
        <div class="page">
            <img src="/img/coin02.png" /><span><a href="#">首页</a>&nbsp;-&nbsp;<a
                        href="#">角色管理</a>&nbsp;-</span>&nbsp;查看角色
        </div>
    </div>
    <div class="page">
        <!-- banner页面样式 -->
        <div class="banner">
            <div class="add">
                <a class="addA" href="/admin/power">添加权限&nbsp;&nbsp;+</a>
            </div>
            <!-- banner 表格 显示 -->
            <div class="banShow">
                <table border="1" cellspacing="0" cellpadding="0">
                    <tr>
                        <td width="66px" class="tdColor tdC">序号</td>
                        <td width="315px" class="tdColor">权限</td>
                        <td width="315px" class="tdColor">路由</td>
                        <td width="125px" class="tdColor">操作</td>
                    </tr>
                    @foreach($info as $k=>$v)
                    <tr>
                        <td>{{$v->p_id}}</td>
                        <td>{{$v->p_name}}</td>
                        <td>{{$v->url}}</td>
                        <td><a href="/admin/editpower/{{$v->p_id}}">
                                <img class="operation" src="/img/update.png"></a>
                            <img class="operation delban" src="/img/delete.png" data-id="{{$v->p_id}}"></td>
                    </tr>
                    @endforeach
                </table>
                <div class="paging">{{$info->links()}}</div>
            </div>
            <!-- banner 表格 显示 end-->
        </div>
        <!-- banner页面样式end -->
    </div>

</div>


<!-- 删除弹出框 -->
<div class="banDel">
    <div class="delete">
        <div class="close">
            <a class="ok no"><img src="/img/shanchu.png" /></a>
        </div>
        <p class="delP1">你确定要删除此条记录吗？</p>
        <p class="delP2">
            <a href="#" class="ok yes" onclick="del()">确定</a><a class="ok no">取消</a>
        </p>
    </div>
</div>
<!-- 删除弹出框  end-->
</body>

<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).ready(function(){
        $(document).on('click','.delban',function(){
            var id = $(this).data('id');
            if(confirm('你确定要删除此条记录吗？')){
                var url = '/admin/delpower';
                var data={id:id};
                $.ajax({
                    url:url,
                    data:data,
                    type:'get',
                    dataType:'json',
                    success:function(res){
//                        console.log(res);
                        if(res.code == 00000){
                            window.location.href=res.url;
                        }
                    }
                })
            }
        })
    })

</script>
</html>