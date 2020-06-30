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
                <dl class="last">
                    <dt>中卫仲裁委员会</dt>
                    <dd>
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
                <img src="./index/images/ewm.png" />
                <p>扫码关注公众号</p>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="cop">
        <div class="container">&copy; 2018 XX公司&nbsp;&nbsp;ICP备XXXXXXXX号&nbsp;&nbsp;技术支持：<a style="color:#b7c1c6;" href="http://www.jsdaima.com/" title="js代码" target="_blank">js代码</a></div>
    </div>
</div>
<script src="./index/js/Tabs.js"></script>
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
    $('#weather').leoweather({format:'{时段}好！<span id="colock">现在时间是：{年}年{月}月{日}日 星期{周} {时}:{分}:{秒}，</span> <b>{城市}天气</b> {天气} {夜间气温}℃ ~ {白天气温}℃'});
</script>
<script type="text/javascript">
    $(function(){
        $(".listbox>li").click(function(){
            $(".listbox>li").removeClass("active");
            $(this).addClass("active");
        });
    })
</script>
<script src="./index/js/jquery.page.js"></script>
<script>
    $(".tcdPageCode").createPage({
        pageCount:100,
        current:1,
        backFn:function(p){
            //console.log(p);
        }
    });
</script>