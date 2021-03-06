﻿<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Table</title>
    <link rel="stylesheet" href="plugins/layui/css/layui.css" media="all"/>
    <link rel="stylesheet" href="css/global.css" media="all">
    <link rel="stylesheet" href="plugins/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/table.css"/>
    <!-- 配置文件 -->
    <script type="text/javascript" src="ueditor.config.js"></script>
    <!-- 编辑器源码文件 -->
    <script type="text/javascript" src="ueditor.all.js"></script>
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
    var ue = UE.getEditor('container');
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
                            "<a class=\"layui-btn layui-btn-mini\" onclick='editItem(" + item['id'] + ")'>编辑</a>" +
                            "<a class=\"layui-btn layui-btn-danger layui-btn-mini\" onclick='deleteItem(" + item['id'] + ")'>删除</a>" +
                            "</td></tr>";
                        $("#aa").append(str);
                    });
                }
            })
        })

        //监听修改项目
        form.on('submit(updateItem)',function () {
            $.ajax({
                type:'post',
                url:'updateItem.php',
                data:{i_id:$('#i_id').val(),title:$('#title').val(),container:ue.getContentTxt()},
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
        $.ajax({
            type:'post',
            url:'editItem.php',
            data:{id:id},
            dataType:'json',
            success:function (msg) {
                console.log(msg);
                $("input[name='i_id']").val(id);
                $("input[name='title']").val(msg[0]['title']);
                $("textarea[name='content'").val(msg[0]['content']);
                layer.open({
                    type:1,
                    title:"修改项目",
                    area:['1000px','520px'],
                    skin:'layui-layer-rim',
                    content:$('#itemUpate')
                })
            }
        })
    }
</script>
</body>
<div class="layui-field-box layui-form" id="itemUpate" style="display: none">
<form class="layui-form" action="" method="post">
    <div class="layui-form-item">
        <input type="hidden" name="s_id">
        <label class="layui-form-label">ID</label>
        <div class="layui-input-inline">
            <input  style="background:#F6F6F6" name="i_id" id="i_id" disabled="disabled" autocomplete="off" class="layui-input">
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
        <textarea name="content" id="container"></textarea>
       </div>
    </div>
    <div class="layui-form-item">
        <div class="layui-input-block">
            <button  class="layui-btn" lay-submit lay-filter="updateItem">立即提交</button>
            <button onclick="window.close()" class="layui-btn layui-btn-primary">取消</button>
        </div>
    </div>
</form>
</div>
</html>
