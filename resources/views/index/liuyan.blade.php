@include('nav')
<div class="container mg-t-b container_col">
    @include('left')
   <div class="page-right">
   	 <div class="pagelujing"><div class="name">在线留言</div><span>您当前所在位置：<a href="#">首页</a> > <a href="#">在线服务</a> > <a href="#">在线留言</a></span></div>
     <div class="news-txt ny mg-t-b">
       <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0" class="liuyantab">
  <form action="" method="post" name="new" id="new"></form><tbody><tr>
    <td width="569" height="38" align="center" bgcolor="#F4F4F4" class="kkkk1">
      <a name="1" id="1"></a>
      
      <input type="radio" value="face2.gif" name="face" checked="checked">
      <img border="0" src="./index/images/face2.gif">
	  <input type="radio" value="face1.gif" name="face">
      <img border="0" src="./index/images/face1.gif">
      <input type="radio" value="face3.gif" name="face">
      <img border="0" src="./index/images/face3.gif">
      <input type="radio" value="face4.gif" name="face">
      <img border="0" src="./index/images/face4.gif">
      <input type="radio" value="face5.gif" name="face">
      <img border="0" src="./index/images/face5.gif">
      <input type="radio" value="face6.gif" name="face">
      <img border="0" src="./index/images/face6.gif">
      <input type="radio" value="face7.gif" name="face">
      <img border="0" src="./index/images/face7.gif">
      <input type="radio" value="face8.gif" name="face">
      <img border="0" src="./index/images/face8.gif">
      <input type="radio" value="face9.gif" name="face">
      <img border="0" src="./index/images/face9.gif">
      <input type="radio" value="face10.gif" name="face">
    <img border="0" src="./index/images/face10.gif"> </td>
  </tr>
  <tr>
    <td height="66" class="kkkk2">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      
      <tbody><tr>
        <td width="11%" height="34" align="center">姓　名：</td>
        <td colspan="2">
		<input name="msg_name" type="text" class="input1" size="52" maxlength="20" style="width:95%; border:#999999 dashed 1px; color:#666666; padding:5px; outline:none;" onfocus="this.select()" onblur="if (this.value =='') this.value='请输入您的姓名，不填写为匿名发表'" onclick="if (this.value=='请输入您的姓名，不填写为匿名发表') this.value=''" value="请输入您的姓名，不填写为匿名发表">
		</td>
      </tr>
      <tr>
        <td align="center">留　言：</td>
        <td colspan="2"><textarea name="mag_content" cols="50" rows="7" style="width:95%; border:#999999 dashed 1px; color: #5C5C5C; line-height:20px; padding:5px; outline:none;"></textarea></td>
      </tr>
      <tr>
        <td height="27" align="center">验证码：<input type="hidden" id="sid" value="{{$code['sid']}}"></td>
        <td width="14%"><input name="sn" id="codeImg" type="text" class="ipt1" id="sn" size="10" style=" border:#999999 dashed 1px;"></td>
        <td width="75%"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tbody><tr>
            <td width="12%"><img id="imageUrl" src="{{$code['image_url']}}"></td>
            <td width="88%"><a href="javascript:;" id="code" target="code"><u>换一张</u></a></td>
          </tr>
        </tbody></table></td>
      </tr>

      <tr>
        <td>&nbsp;</td>
        <td colspan="2"><span class="font8">
          <div align="center" style="margin:20px 0;">
          <input type="hidden" name="action_e" value="Add_New">
          <input type="button" id="but" name="Submit2" value="发表留言"></div></span></td>
      </tr>
    </tbody></table></td>
  </tr>
</tbody></table>
    </div>
   	 
   </div>
   <div class="clearfix"></div>
</div>

     @include('foot')

</body>
</html>
<script>
    $(document).on('click','#but',function(){
//        alert(123);
        var msg_name = $("input[name='msg_name']").val();
        var msg_content = $("textarea[name='mag_content']").val();
        var code = $('#codeImg').val();
        var url = "/addmessages";
        var data = {msg_name:msg_name,msg_content:msg_content,code:code};
        $.ajax({
            url:url,
            data:data,
            type:'get',
            dataType:'json',
            success:function(res){
//                console.log(res);
                if(res.code == 00000){
                    alert(res.msg);
                    window.location.reload();
                }else{
                    alert(res.msg);
                }
            }
        })
    })
</script>
