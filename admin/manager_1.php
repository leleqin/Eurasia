<?php
require_once ("conn.php");
$title = $_GET["select"];
$rs = $conn->query("select * from item where item_name='$title'");
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>信息管理</title>
    <link rel="stylesheet" href="plugins/layui/css/layui.css" media="all" />
    <link rel="stylesheet" href="css/global.css" media="all">
    <link rel="stylesheet" href="plugins/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/table.css" />
</head>

<body>

<a href="manager.php" class="layui-btn" style="margin-top: 20px;margin-left: 20px">返回</a>
<div class="admin-main">
    <fieldset class="layui-elem-field">
        <legend>数据列表</legend>
        <div class="layui-field-box layui-form">
            <table class="layui-table admin-table">
                <thead>
                <tr>
                    <th>显示位置</th>
                    <th>标题</th>
                    <th>创建人</th>
                    <th>创建时间</th>
                    <th>操作</th>
                </tr>
                </thead>
                <?php
                while ($row = mysqli_fetch_assoc($rs)) {
                    ?>
                    <tr>
                        <th><?php echo $row['item_Id']?></th>
                        <th><?php echo $row['item_title']?></th>
                        <th><?php echo $row['item_user']?></th>
                        <th><?php echo $row['item_time']?></th>
                        <td>
                            <a href="" target="_blank" class="layui-btn layui-btn-normal layui-btn-mini">预览</a>
                            <a href="" class="layui-btn layui-btn-mini">编辑</a>
                            <a href="" class="layui-btn layui-btn-danger layui-btn-mini">删除</a>
                        </td>
                    </tr>
                    <?php
                }
                ?>
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
