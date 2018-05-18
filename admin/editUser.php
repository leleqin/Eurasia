<?php
require_once("conn.php");
$id = $_GET['id'];

$rs = $conn->query("select * from users where user_id = '$id'");

if ($_POST['button']) {
    $user_name = $_POST['username'];
    $user_pwd = $_POST['password'];
    $info = $_POST['info'];
    $stam = $conn->query("update users set user_name = '$user_name',user_pwd = '$user_pwd',info = '$info' where user_id = '$id'");
    header("location:userManager.php");
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Layui</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="plugins/layui/css/layui.css" media="all"/>
    <link rel="stylesheet" href="css/begtable.css"/>
</head>

<body>
<div style="margin: 15px;">
    <!-- 添加管理员 -->
    <fieldset class="layui-elem-field">
        <legend>修改管理员信息</legend>
        <div class="layui-field-box layui-form">
            <form class="layui-form" action="" method="post">
                <?php
                while ($row = mysqli_fetch_assoc($rs)) {
                    ?>
                    <div class="layui-form-item">
                        <label class="layui-form-label">输入用户名</label>
                        <div class="layui-input-inline">
                            <input type="text" name="username" lay-verify="title" placeholder="请填写用户名"
                                   autocomplete="off" class="layui-input" value="<?php echo $row['user_name'] ?>">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">输入原密码</label>
                        <div class="layui-input-inline">
                            <input type="password" name="password" lay-verify="pass" placeholder="请输入原密码"
                                   autocomplete="off" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">输入新密码</label>
                        <div class="layui-input-inline">
                            <input type="password" name="password" lay-verify="pass" placeholder="请填写6到12位密码"
                                   autocomplete="off" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">请填写备注</label>
                        <div class="layui-input-inline">
                            <input type="text" name="info" lay-verify="title" placeholder="请填写备注" autocomplete="off"
                                   class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <div class="layui-input-block">
                            <input class="layui-btn" type="submit" name="button" value="立即提交"/>
                            <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </form>
        </div>
    </fieldset>
</div>
<script type="text/javascript" src="plugins/layui/layui.js"></script>
<script>
    layui.config({
        base: 'js/'
    });

    layui.use('begtable', function () {
        var begtable = layui.begtable(),
            layer = layui.layer,
            $ = layui.jquery,
            laypage = layui.laypage;

        laypage({
            cont: $('.beg-table-paged'),
            pages: 25 //总页数
            ,
            groups: 5 //连续显示分页数
            ,
            jump: function (obj, first) {
                //得到了当前页，用于向服务端请求对应数据
                var curr = obj.curr;
                if (!first) {
                    //layer.msg('第 '+ obj.curr +' 页');
                }
            }
        });
        begtable.set({
            bordered: true,
            hovered: true,
            striped: true,
            elem: '#xx',
            columns: columns,
            data: data,
            checked: true,
            //paged:false
        }).init();

        console.log(begtable.getSelectedRows());
        console.log(location);
    });
</script>

</body>

</html>