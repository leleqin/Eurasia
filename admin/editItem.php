<?php
require_once "conn.php";
if (@$_POST['button']){
    $item_name = $_POST['quiz'];
    $item_title = $_POST['title'];
    $item_content = $_POST['content'];
    $stmt = "INSERT INTO item (item_name, item_title, item_content) VALUES ('$item_name', '$item_title', '$item_content')";
    $conn->query($stmt);
}
?>
<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<title>新增项目</title>
		<meta name="renderer" content="webkit">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="format-detection" content="telephone=no">

		<link rel="stylesheet" href="plugins/layui/css/layui.css" media="all" />
		<link rel="stylesheet" href="plugins/font-awesome/css/font-awesome.min.css">
	</head>
	<body>
		<div style="margin: 15px;">
			<fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
				<legend>栏目选择</legend>
			</fieldset>

			<form class="layui-form" action="" method="post">
				<div class="layui-form-item">
					<label class="layui-form-label">栏目选择</label>
					<div class="layui-input-inline" style="z-index: 9999;">
						<select name="quiz">
							<option value="">请选择要添加栏目</option>
							<optgroup label="中心简介">
								<option value="中心简介">新增简介</option>
							</optgroup>
							<optgroup label="中心负责人">
								<option value="中心负责人">新增负责人</option>
							</optgroup>
                            <optgroup label="申报书">
                                <option value="申报书">新增申报书</option>
                            </optgroup>
                            <optgroup label="教学成果">
                                <option value="教学成果">新增教学成本</option>
                            </optgroup>
                            <optgroup label="政策制度">
                                <option value="政策制度">新增政策制度</option>
                            </optgroup>
                            <optgroup label="中心视频">
                                <option value="中心视频">新增中心视频</option>
                            </optgroup>
                            <optgroup label="典型案例">
                                <option value="典型案例">新增典型案例</option>
                            </optgroup>
                            <optgroup label="典型教材">
                                <option value="典型教材">新增典型教材</option>
                            </optgroup>
                            <optgroup label="典型课件">
                                <option value="典型课件">新增典型课件</option>
                            </optgroup>
                            <optgroup label="产学合作">
                                <option value="产学合作">新增产学合作</option>
                            </optgroup>
                            <optgroup label="新闻管理">
                                <option value="资讯">新增新闻</option>
                            </optgroup>
                            <optgroup label="友情链接">
                                <option value="友情链接">新增友情链接</option>
                            </optgroup>
						</select>
					</div>
				</div>

				<div class="layui-form-item">
					<label class="layui-form-label">单行输入框</label>
					<div class="layui-input-block">
						<input type="text" name="title" id="title" lay-verify="title" autocomplete="off" placeholder="请输入标题" class="layui-input">
					</div>
				</div>
                <div class="layui-form-item layui-form-text">
					<label class="layui-form-label">编辑器</label>
					<div class="layui-input-block">
                        <!-- 加载编辑器的容器 -->
                        <script id="container" name="content" type="text/plain">
                        </script>
					</div>
				</div>
				<div class="layui-form-item">
					<div class="layui-input-block">
                        <input  class="layui-btn" type="submit" name="button" value="立即提交" />
						<button type="reset" class="layui-btn layui-btn-primary">重置</button>
					</div>
				</div>
			</form>

		</div>
		<script type="text/javascript" src="plugins/layui/layui.js"></script>
        <!-- 配置文件 -->
        <script type="text/javascript" src="ueditor.config.js"></script>
        <!-- 编辑器源码文件 -->
        <script type="text/javascript" src="ueditor.all.js"></script>
		<script>
			layui.use(['form', 'layedit', 'laydate'], function() {
				var form = layui.form(),
					layer = layui.layer,
					layedit = layui.layedit,
					laydate = layui.laydate;

				//创建一个编辑器
                var ue = UE.getEditor('container');
				//自定义验证规则
				form.verify({
					title: function(value) {
						if(value.length < 2) {
							return '标题至少得2个字符啊';
						}
					}
				});
			});
		</script>
	</body>

</html>