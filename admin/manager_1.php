<?php
require_once ("conn.php");
$title = $_GET['title'];
$rs = $conn->query("select * from item where item_title='$title'");
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Table</title>
    <link rel="stylesheet" href="plugins/layui/css/layui.css" media="all" />
    <link rel="stylesheet" href="css/global.css" media="all">
    <link rel="stylesheet" href="plugins/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/table.css" />
</head>

<body>
<div class="admin-main">
    <fieldset class="layui-elem-field">
        <legend>数据列表</legend>
        <div class="layui-field-box layui-form">
            <table class="layui-table admin-table">
                <thead>
                <tr>
                    <th>标题名</th>
                    <th></th>
                    <th>创建时间</th>
                    <th>创建人</th>
                </tr>
                </thead>
                <tbody id="content">
                </tbody>
            </table>
        </div>
    </fieldset>
    <div class="admin-table-page">
        <div id="paged" class="page">
        </div>
    </div>
</div>
<!--模板-->
<script type="text/html" id="tpl">
    {{# layui.each(d.list, function(index, item){ }}
    <tr>
        <td><input type="checkbox" lay-skin="primary"></td>
        <td>{{ item.name }}</td>
        <td>{{ item.age }}</td>
        <td>{{ item.createtime }}</td>
        <td>
            <a href="/detail-1" target="_blank" class="layui-btn layui-btn-normal layui-btn-mini">预览</a>
            <a href="javascript:;" data-name="{{ item.name }}" data-opt="edit" class="layui-btn layui-btn-mini">编辑</a>
            <a href="javascript:;" data-id="1" data-opt="del" class="layui-btn layui-btn-danger layui-btn-mini">删除</a>
        </td>
    </tr>
    {{# }); }}
</script>
<script type="text/javascript" src="plugins/layui/layui.js"></script>
<script>
    layui.config({
        base: 'js/'
    });

    layui.use(['paging', 'form'], function() {
        var $ = layui.jquery,
            paging = layui.paging(),
            layerTips = parent.layer === undefined ? layui.layer : parent.layer, //获取父窗口的layer对象
            layer = layui.layer, //获取当前窗口的layer对象
            form = layui.form();
</script>
</body>

</html>
