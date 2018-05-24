<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Table</title>
    <link rel="stylesheet" href="plugins/layui/css/layui.css" media="all"/>
    <link rel="stylesheet" href="css/global.css" media="all">
    <link rel="stylesheet" href="plugins/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/table.css"/>
    <script src="../js/jquery.js"></script>
</head>

<body>
<div class="admin-main">
    <fieldset class="layui-elem-field layui-field-title">
        <legend>选择查看栏目</legend>
        <form class="layui-form" style="margin-top: 25px">
            <div class="layui-form-item">
                <label class="layui-form-label">栏目选择</label>
                <div class="layui-input-inline">
                    <select name="selectDemo" lay-filter="selectDemo">
                        <option selected disabled>请选择要查看栏目</option>
                        <option value="中心简介">中心简介</option>
                        <option value="中心负责人">负责人</option>
                        <option value="申报书">申报书</option>
                        <option value="教学成果">教学成本</option>
                        <option value="政策制度">政策制度</option>
                        <option value="中心视频">中心视频</option>
                        <option value="典型案例">典型案例</option>
                        <option value="典型教材">典型教材</option>
                        <option value="典型课件">典型课件</option>
                        <option value="产学合作">产学合作</option>
                        <option value="资讯">新闻</option>
                        <option value="友情链接">友情链接</option>
                    </select>
                </div>
                <!--                   <input value="查找" type="submit" class="layui-btn">-->
            </div>
        </form>
    </fieldset>
</div>
<div class="admin-main">
    <fieldset class="layui-elem-field layui-field-title">
        <legend>数据列表</legend>
        <div class="layui-field-box layui-form">
            <table class="layui-table admin-table" lay-filter="tableDemo">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>标题</th>
                    <th>创建人</th>
                    <th>创建时间</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody id="aa">
                </tbody>
            </table>
        </div>
    </fieldset>
    <div class="admin-table-page">
        <div id="paged" class="page">
        </div>
    </div>
</div>

<script type="text/javascript" src="plugins/layui/layui.js"></script>
<script>
    layui.config({
        base: 'js/'
    });

    layui.use(['paging', 'form'], function () {
        var $ = layui.jquery,
            paging = layui.paging(),
            layerTips = parent.layer === undefined ? layui.layer : parent.layer, //获取父窗口的layer对象
            layer = layui.layer, //获取当前窗口的layer对象
            form = layui.form();

        //监听提交
        form.on('select(selectDemo)', function (data) {
            $.ajax({
                type: "post",
                url: "managerSelect.php",
                data: {title: data.value},
                dateType: "json",
                success: function (msg) {
                    $("#aa").html("");//删除之前的数据
                    var str;
                    $.each(JSON.parse(msg), function (index, item) {
                        str = "<tr><td>" + (index + 1) + "</td><td>" + item['title'] + "</td><td>" + item['user'] + "</td><td>" + item['time'] +
                            "</td><td>" +
                            "<a class=\"layui-btn layui-btn-normal layui-btn-mini\" lay-even='detail'>预览</a>" +
                            "<a class=\"layui-btn layui-btn-mini\" onclick='editItem(\" + item['id'] + \")'>编辑</a>" +
                            "<a class=\"layui-btn layui-btn-danger layui-btn-mini\" onclick='deleteItem(" + item['id'] + ")'>删除</a>" +
                            "</td></tr>";
                        $("#aa").append(str);
                    });
                }
            })
        })

    })

    function deleteItem(id) {
        layer.confirm("是否删除？", {icon: 3, title: '删除'}, function (index) {
            $.ajax({
                type: "post",
                url: "deleteManager.php",
                data: {id: id},
            });
            layer.msg('删除成功', {icon: 6, time: 500}, function () {
                location.reload();
            });
            layer.close(index);
        })
    }

    function editItem(id) {

    }
</script>
</body>
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
        <label class="layui-form-label">单行输入框</label>
        <div class="layui-input-block">
            <input type="text" name="title" id="title" lay-verify="title" autocomplete="off" placeholder="请输入标题"
                   class="layui-input">
        </div>
    </div>
    <div class="layui-form-item layui-form-text">
        <label class="layui-form-label">编辑器</label>
        <div class="layui-input-block" id="aa">
            <!-- 加载编辑器的容器 -->
            <script id="container" name="content" type="text/plain"></script>
        </div>
    </div>
    <div class="layui-form-item">
        <div class="layui-input-block">
            <button class="layui-btn" lay-submit lay-filter="addItem">立即提交</button>
            <button type="reset" class="layui-btn layui-btn-primary">重置</button>
        </div>
    </div>
</form>
</html>
