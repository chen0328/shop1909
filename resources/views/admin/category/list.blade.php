<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>广告-有点</title>
<link rel="stylesheet" type="text/css" href="/admin/css/css.css" />
<script type="text/javascript" src="/admin/js/jquery.min.js"></script>
<!-- <script type="text/javascript" src="/admin/js/page.js" ></script> -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<style type="text/css">
    ul li{  color: black;
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
				<img src="/admin/img/coin02.png" /><span><a href="#">首页</a>&nbsp;-&nbsp;<a
					href="#">分类管理</a>&nbsp;-</span>&nbsp;分类展示
			</div>
		</div>
		<div class="page">
			<!-- banner页面样式 -->
			<div class="banner">
				<div class="add">
					<a class="addA" href="{{url('admin/category/add')}}">添加分类&nbsp;&nbsp;+</a>
				</div>
				<!-- banner 表格 显示 -->
				<div class="banShow">
					<table border="1" cellspacing="0" cellpadding="0">
						<tr>
							<td width="66px" class="tdColor tdC">序号</td>
							<td width="308px" class="tdColor">分类名称</td>
							<td width="215px" class="tdColor">是否显示</td>
							<td width="125px" class="tdColor">操作</td>
						</tr>
						@foreach($info as $k=>$v)
						<tr gui_id="{{$v->id}}">
							<td>{{$v->cate_id}}</td>
							<td>{{$v->cate_name}}</td>
							<td>
								<span class="is_show">
								@if($v->is_show == 1)
									是
								@else
									否
								@endif
							</td>
							<td><a href="/admin/category/upd/{{$v->cate_id}}"><img class="operation"
									src="/admin/img/update.png"></a> 
									<img class="operation delban"
								src="/admin/img/delete.png" data-id="{{$v->cate_id}}"></td>
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
				<a><img src="/admin/img/shanchu.png" /></a>
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
            var cate_id = $(this).data('cate_id');
            if(confirm('你确定要删除此条记录吗？')){
                var url = '/admin/category/del';
                var data={cate_id:cate_id};
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
            }
        })

















		
	// //即点即改
	// $(document).on('click','.sorts',function(){
	// 			$(this).hide();
	// 			$(this).next('input').show();

	// 		})
	// 		$(document).on('blur','.editsorts',function(){
	// 			var info = $(this).val();
	// 			var id = $(this).attr('gui_id');
	// 			// console.log(info);return false;
	// 			if(info == ''){
	// 				$('.sorts').show();
	// 				$(this).hide();
	// 				// loaction.reload(false);
	// 				return false;
	// 			}
	// 			var url = '/admin/guide/editsorts';
	// 			var data = {info:info,id:id};
	// 			$.ajax({
	// 				url:url,
	// 				data:data,
	// 				type:'post',
	// 				dataType:'json',
	// 				success:function(res){
	// 					if(res.code == 00000){
	// 						window.location.href=res.url;
	// 					}
	// 				}
	// 			})
	// 		})
	// 		$(document).on('click','.is_show',function(){
	// 			var info = $(this).html();
	// 			var info = $.trim(info);
	// 			if(info == '是'){
	// 				var val=2;
	// 			}else{
	// 				var val=1;
	// 			}
	// 			var id = $(this).parents('tr').attr('gui_id');
	// 			var url = '/admin/guide/edithidden';
	// 			var data = {val:val,id:id};
	// 			// console.log(data);return false;
	// 			$.ajax({
	// 				url:url,
	// 				data:data,
	// 				type:'post',
	// 				dataType:'json',
	// 				success:function(res){
	// 					// console.log(res);
	// 					if(res.code == 00000){
	// 						window.location.href=res.url;
	// 					}
	// 				}
	// 			})
	// 		})
	// 	})



	})
</script>
</html>