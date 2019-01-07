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
        <!-- 配置文件 -->
        <script type="text/javascript" src="ueditor.config.js"></script>
        <!-- 编辑器源码文件 -->
        <script type="text/javascript" src="ueditor.all.js"></script>
        <script src="../js/jquery.js"></script>
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
						<select name="quiz" id="quiz">
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
					<label class="layui-form-label">输入标题</label>
					<div class="layui-input-block">
						<input type="text" name="title" id="title" lay-verify="title" autocomplete="off" placeholder="请输入标题" class="layui-input">
					</div>
				</div>

<!--                <div class="layui-form-item layui-form-text">
                <form id="uploadForm" enctype="multipart/form-data" class="layui-form-item layui-form-text">
                    <label class="layui-form-label">上传图片</label>
                    <input id="file" type="file" name="file"/>
                </form>
                <button type="button" class="layui-btn" id="imgUp" lay-submit lay-filter="imgUp">
                    <i class="layui-icon">&#xe64a;</i>上传图片
                </button>
                </div>-->


                <div class="layui-form-item layui-form-text">
                    <label class="layui-form-label">内容简介</label>
                    <div class="layui-input-block">
                        <textarea name="brief" id="brief" lay-verify="brief" placeholder="请输入内容" class="layui-textarea"></textarea>
                    </div>
                </div>

                <div class="layui-form-item layui-form-text">
					<label class="layui-form-label">内容编辑</label>
					<div class="layui-input-block" id="aa">
                        <!-- 加载编辑器的容器 -->
                        <script id="container" name="content" type="text/plain"></script>
					</div>
				</div>
				<div class="layui-form-item">
					<div class="layui-input-block">
                        <button  class="layui-btn" lay-submit lay-filter="addItem">立即提交</button>
						<button type="reset" class="layui-btn layui-btn-primary">重置</button>
					</div>
				</div>
			</form>

		</div>
		<script type="text/javascript" src="plugins/layui/layui.js"></script>

		<script>
            var ue = UE.getEditor('container');

			layui.use(['form', 'layedit', 'laydate'], function() {
                var $ = layui.jquery,
                    layer = layui.layer,
                    form = layui.form();

                //监听提交按钮
				form.on('submit(addItem)',function () {
				   // alert(ue.getContent());
				   $.ajax({
                       type:'post',
                       url:'addItemDao.php',
                       data:{item:$('#quiz').val(),title:$('#title').val(),brief:$('#brief').val(),content:ue.getContent()},
                       dataType:'text',
                       success:function (msg) {
                           alert(msg);
                           if (msg === "ok"){
                               layer.msg('添加成功',{icon:6,time:500},function () {
                                   location.reload();
                               });
                           }
                       }
                   })
                });

                //监听图片上传
/*                form.on('submit(imgUp)',function () {
                    var formData = new FormData($('#uploadForm')[0]);
                    $.ajax({
                        type:'post',
                        url:'/admin/php/upload/{filename}',
                        data: formData,
                        cache: false,
                        processData: false,
                        contentType: false,
                        success:function (data) {
                            alert(data);
                        },
                        error:function () {
                            alert("上传失败");
                        }
                    })
                })*/

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