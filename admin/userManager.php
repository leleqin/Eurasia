<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>管理员管理</title>
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
					<input type="password" id="password" lay-verify="pass_one" placeholder="请填写6到12位密码" autocomplete="off" class="layui-input">
				</div>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label">请再次输入</label>
				<div class="layui-input-inline">
					<input type="password" id="passwordAgain" lay-verify="pass_two" placeholder="请填写6到12位密码" autocomplete="off" class="layui-input">
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
                                 "<a class=\"layui-btn layui-btn-mini\" onclick='editUser(" + item['id'] + ")'>编辑</a>" +
                                 "<a class=\"layui-btn layui-btn-danger layui-btn-mini\" onclick='deleteUser(" + item['id'] + ")'>删除</a>" +
                                 "</td></tr>";
                             $("#content").append(str);
                         })
                        }
                    })
                })

                //密码验证
                form.verify({
                    pass_one:[/^[\S]{6,12}$/,'密码必须6到12位，且不能出现空格'],
                    pass_two:function (value) {
                        if (value != $("#password").val()){
                            return '两次密码不一致';
                        }
                    }
                });

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
               //监听修改管理员信息
                form.on('submit(updateUser)',function () {
                    $.ajax({
                        type:'post',
                        url:'updateUser.php',
                        data:{u_id:$("#u_id").val(),u_name:$("#u_name").val(),u_pwd:$("#u_pwd").val(),u_info:$("#u_info").val()},
                        dataType:'text',
                        success:function (msg) {
                            if (msg === "ok"){
                                layer.msg('修改成功',{icon:6,time:500},function () {
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

            //编辑管理员
            function editUser(id) {
                $.ajax({
                    type:'post',
                    url:'editUser.php',
                    data:{id:id},
                    dataType:'json',
                    success:function (msg) {
                        console.log(msg);
                        $("input[name='u_id']").val(id);
                        $("input[name='u_username']").val(msg[0]['name']);
                        $("input[name='u_pwd']").val(msg[0]['pwd']);
                        $("input[name='u_info']").val(msg[0]['info']);
                        layer.open({
                            type:1,
                            title:'修改信息',
                            area:['360px','400px'],
                            skin:'layui-layer-rim',
                            content:$('#userUpdate')
                        })

                    }

                });
            }
		</script>

	</body>
    <div class="layui-field-box layui-form" id="userUpdate" style="display: none">
        <form class="layui-form" action="" method="post">
            <div class="layui-form-item">
                <input type="hidden" name="s_id">
                <label class="layui-form-label">ID</label>
                <div class="layui-input-inline">
                    <input  style="background:#F6F6F6" name="u_id" id="u_id" disabled="disabled" autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">输入用户名</label>
                <div class="layui-input-inline">
                    <input type="text" name="u_username" id="u_name"  autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">请输入密码</label>
                <div class="layui-input-inline">
                    <input name="u_pwd" id="u_pwd" lay-verify="pass_one1" autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">请填写备注</label>
                <div class="layui-input-inline">
                    <input name="u_info" id="u_info" autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <div class="layui-input-block">
                    <button class="layui-btn" lay-submit="" lay-filter="updateUser">立即提交</button>
                    <button onclick="window.close()" class="layui-btn layui-btn-primary">取消</button>
                </div>
            </div>
        </form>
    </div>

</html>