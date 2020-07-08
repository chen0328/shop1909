<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>@yield('title')</title>
<meta name="keywords" content="简洁大气,政府机关,对外,新闻资讯,门户网站模板" />
<meta name="description" content="简洁大气政府机关对外新闻资讯门户网站模板下载。下载文件包含首页、列表页、详情页、留言页等4张HTML静态网页模板。" /> 
<meta name="author" content="js代码(www.jsdaima.com)" />
<meta name="copyright" content="js代码(www.jsdaima.com)" />
<link href="css/base.css" rel="stylesheet" type="text/css" />
<link href="css/main.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/js/jquery-1.8.3.min.js"></script>
<link href="css/jquery.slideBox.css" rel="stylesheet" type="text/css" />
<script src="/js/jquery.slideBox.min.js" type="text/javascript"></script>
<script type="text/javascript"  src="/js/nav.js"></script>
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
<script src="https://cdn.staticfile.org/axios/0.18.0/axios.min.js"></script>
</head>
<body>
<div class="header">
  <div class="container">
    <div id="weather"></div>
    <div class="toptxt"><a href="#">登陆</a>|<a href="#">注册</a><a href="#">加入收藏</a><a href="#">设为首页</a></div>
    <div class="logo"><a href="#"><img src="/images/logo.png" /></a></div>
    <div class="search">
      <input type="text" class="ipt-sea" placeholder="请输入搜索关键词" />
      <a href="javascript:;">搜索</a> </div>
  </div>
</div>
<div class="nav" id="content">
  <ul class="" id="navul" v-for="site in sites"> 
    <li class="active" ><a v-bind:href="[site['url']]">${site['name']}</a></li> 
  </ul>
</div>
<script  type="text/javascript"> 
$(".navbg").capacityFixed();
</script>

@yield('content')

<div class="foot">
  <div class="ft-menu">
    <div class="container">
    	<div class="menu">
        	<dl>
            	<dt>首页</dt>
                <dd>
                	<a href="#"></a>
                </dd>
            </dl>
            <dl>
            	<dt>关于我们</dt>
                <dd>
                	<a href="#">关于中仲</a>
                </dd>
            </dl>
            <dl>
            	<dt>仲裁动态</dt>
                <dd>
                	<a href="#">仲裁动态</a>
                </dd>
            </dl>
            <dl>
            	<dt>仲裁员</dt>
                <dd>
                	<a href="#">仲裁员名册</a>
                    <a href="#">仲裁员守则</a>
                </dd>
            </dl>
            <dl>
            	<dt>法律制度</dt>
                <dd>
                	<a href="#">仲裁规则</a>
                    <a href="#">法律法规</a>
                    <a href="#">统计数据</a>
                </dd>
            </dl>
            <dl>
            	<dt>在线服务</dt>
                <dd>
                	<a href="#">在线咨询</a>
                    <a href="#">立案申请</a>
                </dd>
            </dl>
            <dl>
                <dd class="last">
                	<p>联系地址：中卫市沙坡头区清风路55号（市财政局后楼四楼）</p>
                    <p>邮政编码：755000</p>
                    <p>咨询电话：0955-7674885</p>
                    <p>电子邮件：baidu@163.com</p>
                    <p>网　　址：www.baidu.com</p>
                </dd>
            </dl>
            <div class="clearfix"></div>
        </div>
        <div class="ewm">
        	<img src="/images/ewm.png" />
            <p>扫码关注公众号</p>
        </div>
        <div class="clearfix"></div>
    </div>
  </div>
  <div class="cop">
    <div class="container">&copy; 2018 XX公司&nbsp;&nbsp;ICP备XXXXXXXX号&nbsp;&nbsp;技术支持：<a style="color:#b7c1c6;" href="http://www.jsdaima.com/" title="js代码" target="_blank">js代码</a></div>
  </div>
</div>
<script src="/js/Tabs.js"></script> 
<script type="text/javascript">
	$(function() {
		$("#link").rTabs({
			bind : 'hover',
			animation : 'fadein',
			auto:false
		});
	})
</script>
<script type="text/javascript">
	$(function() {
		$("#news").rTabs({
			bind : 'hover',
			animation : 'fadein',
			auto:false
		});
	})
</script>

</body>
</html>
<script src="/js/vue.min.js"></script>
<script>
var vm = new Vue({
  delimiters:['${','}'],
  el: '#content',
  data: {sites:null},
  mounted(){
      var url="/index/show_nav";
      axios.post(url).then(function(response){
        vm.sites= response.data;
        // console.log(response);
      });
    
  }
})
</script>

