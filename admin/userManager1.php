<!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
		<title>Layui</title>
		<meta name="renderer" content="webkit">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link rel="stylesheet" href="plugins/layui/css/layui.css" media="all" />
		<link rel="stylesheet" href="css/begtable.css" />
        <link rel="stylesheet" href="plugins/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/table.css"/>
        <script src="../js/jquery.js"></script>
	</head>

	<body>
        <div style="margin: 15px;">
			<!-- 添加管理员 -->
			<fieldset class="layui-elem-field">
				<legend>添加管理员</legend>
				<div class="layui-field-box layui-form">
			<form class="layui-form" action="" method="post">
			<div class="layui-form-item">
				<label class="layui-form-label">输入用户名</label>
				<div class="layui-input-inline">
					<input type="text" id="username" lay-verify="username" placeholder="请填写用户名" autocomplete="off" class="layui-input">
				</div>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label">请输入密码</label>
				<div class="layui-input-inline">
					<input type="password" id="password" lay-verify="pass" placeholder="请填写6到12位密码" autocomplete="off" class="layui-input">
				</div>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label">请再次输入</label>
				<div class="layui-input-inline">
					<input type="password" id="password" lay-verify="password" placeholder="请填写6到12位密码" autocomplete="off" class="layui-input">
				</div>
			</div>
                <div class="layui-form-item">
                    <label class="layui-form-label">请填写备注</label>
                    <div class="layui-input-inline">
                        <input type="text" id="info" lay-verify="info" placeholder="请填写备注" autocomplete="off" class="layui-input">
                    </div>
                </div>
			<div class="layui-form-item">
				<div class="layui-input-block">
                    <button class="layui-btn" lay-submit="" lay-filter="addUser">立即提交</button>
					<button type="reset" class="layui-btn layui-btn-primary">重置</button>
				</div>
			</div>
			</form>
				</div>
			</fieldset>

			<!-- 管理员展示 -->
			<fieldset class="layui-elem-field layui-field-title" style="margin-top: 30px;">
				<legend>已有管理员</legend>
			</fieldset>
			<div class="layui-field-box layui-form">
				<table class="layui-table admin-table">
					<thead>
					<tr>
						<th>ID</th>
						<th>管理员账号</th>
                        <th>创建日期</th>
						<th>备注</th>
						<th>操作</th>
					</tr>
					</thead>
					<tbody id="content">
					</tbody>
				</table>
			</div>

		</div>
		<script type="text/javascript" src="plugins/layui/layui.js"></script>
		<script>
			layui.config({
				base: 'js/'
			});

			layui.use(['begtable','form'], function() {
				var $ = layui.jquery,
					layer = layui.layer,
                    form = layui.form();

				//显示所有管理员
				$(document).ready(function () {
                    $.ajax({
                        type:"post",
                        url:"userSelect.php",
                        dataType:"json",
                        success:function (msg) {
                            console.log(msg);
                         $("#content").html("");
                         var str;
                         $.each(msg,function (index,item) {
                             str = "<tr><td>" + (index + 1) + "</td><td>" + item['name'] + "</td><td>" + item['time'] + "</td><td>" + item['info'] +
                                 "</td><td>" +
                                 "<a href=\"javascript:;\" data-name=\"{{ item.name }}\" data-opt=\"edit\" class=\"layui-btn layui-btn-mini\">编辑</a>" +
                                 "<a class=\"layui-btn layui-btn-danger layui-btn-mini\" onclick='deleteUser(" + item['id'] + ")'>删除</a>" +
                                 "</td></tr>";
                             $("#content").append(str);
                         })
                        }
                    })
                })

                //监听添加管理员
                form.on('submit(addUser)',function () {

                    $.ajax({
                        type:"post",
                        url:"userAdd.php",
                        data:{username:$("#username").val(),password:$("#password").val(),info:$("#info").val()},
                        dataType:"text",
                        success:function (msg) {
                            if (msg === "ok"){
                                layer.msg('添加成功',{icon:6,time:500},function () {
                                    location.reload();
                                });
                            }
                        }
                    })
                })


			});

			//删除管理员
            function deleteUser(id) {
                layer.confirm("是否删除？", {icon: 3, title: '删除'}, function (index) {
                    $.ajax({
                        type: "post",
                        url: "deleteUser.php",
                        data: {id: id},
                    });
                    layer.msg('删除成功', {icon: 6, time: 500}, function () {
                        location.reload();
                    });
                    layer.close(index);
                })
            }
		</script>

	</body>

</html>