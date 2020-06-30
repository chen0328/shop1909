<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>中卫仲裁</title>
    <link href="./index/css/base.css" rel="stylesheet" type="text/css" />
    <link href="./index/css/main.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="./index/js/jquery-1.8.3.min.js"></script>
    <link href="./index/css/jquery.slideBox.css" rel="stylesheet" type="text/css" />
    <script src="./index/js/jquery.slideBox.min.js" type="text/javascript"></script>
    <script type="text/javascript"  src="./index/js/nav.js"></script>
    <script>
        jQuery(function($){
            $('#newspic').slideBox({
                duration : 0.3,//滚动持续时间，单位：秒
                easing : 'linear',//swing,linear//滚动特效
                delay : 5,//滚动延迟时间，单位：秒
                hideClickBar : false,//不自动隐藏点选按键
                clickBarRadius : 10
            });
        });
    </script>
</head>
<body>
<div class="header">
    <div class="container">
        <div id="weather"></div>
        <div class="toptxt"><a href="#">登陆</a>|<a href="#">注册</a><a href="#">加入收藏</a><a href="#">设为首页</a></div>
        <div class="logo"><a href="#"><img src="./index/images/logo.png" /></a></div>
        <div class="search">
            <input type="text" class="ipt-sea" placeholder="请输入搜索关键词" />
            <a href="javascript:;">搜索</a> </div>
    </div>
</div>
<div class="nav">
    <ul class="" id="navul">
        <li class="active"><a href="#">首页</a></li>
        <li><a href="#">关于我们</a></li>
        <li><a href="#">仲裁动态</a>
            <ul>
                <li><a href="#">本院动态</a></li>
                <li><a href="#">领导活动</a></li>
                <li><a href="#">重要发文</a></li>
                <li><a href="#">通知公告</a></li>
            </ul>
        </li>
        <li><a href="#">仲裁须知</a></li>
        <li><a href="#">仲裁规则</a></li>
        <li><a href="#">仲裁员</a></li>
        <li><a href="#">法律制度</a></li>
        <li><a href="#">在线服务</a>
            <ul>
                <li><a href="#">在线立案</a></li>
                <li><a href="liuyan.html">在线留言</a></li>
            </ul>
        </li>
    </ul>
</div>