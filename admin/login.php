<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>登录</title>
    <link rel="stylesheet" href="plugins/layui/css/layui.css" media="all" />
    <link rel="stylesheet" href="css/login.css" />
    <script src="../js/jquery.js"></script>
</head>

<body class="beg-login-bg">
<div class="beg-login-box">
    <header>
        <h1>后台登录</h1>
    </header>
    <div class="beg-login-main">
        <form action="" class="layui-form" method="post"><input name="__RequestVerificationToken" type="hidden" value="fkfh8D89BFqTdrE2iiSdG_L781RSRtdWOH411poVUWhxzA5MzI8es07g6KPYQh9Log-xf84pIR2RIAEkOokZL3Ee3UKmX0Jc8bW8jOdhqo81" />
            <div class="layui-form-item">
                <label class="beg-login-icon">
                    <i class="layui-icon">&#xe612;</i>
                </label>
                <input type="text" id="userName" lay-verify="userName" autocomplete="off" placeholder="这里输入登录名" class="layui-input">
            </div>
            <div class="layui-form-item">
                <label class="beg-login-icon">
                    <i class="layui-icon">&#xe642;</i>
                </label>
                <input type="password" id="password" lay-verify="password" autocomplete="off" placeholder="这里输入密码" class="layui-input">
            </div>
            <div class="layui-form-item">
                <div class="beg-pull-left beg-login-remember">
                    <label>记住帐号？</label>
                    <input type="checkbox" name="rememberMe" value="true" lay-skin="switch" checked title="记住帐号">
                </div>
                <div class="beg-pull-right">
                    <button type="button" class="layui-btn layui-btn-primary" lay-filter="submitDemo" lay-submit>
                        <i class="layui-icon">&#xe650;</i> 登录
                    </button>
                </div>
                <div class="beg-clear"></div>
            </div>
        </form>
    </div>
    <footer>
        <p>Beginner © www.Euasia.cn</p>
    </footer>
</div>
<script type="text/javascript" src="plugins/layui/layui.js"></script>
<script>
    layui.use(['layer', 'form'], function() {
        var layer = layui.layer,
            $ = layui.jquery,
            form = layui.form();

        //监听
    form.on('submit(submitDemo)',function () {
        $.ajax({
            type:"post",
            url:"checkLogin.php",
            data:{userName:$("#userName").val(),password:$("#password").val()},
            dataType:"text",
            success:function (msg) {
                if(msg === "null"){
                    layer.open({
                        type:1,
                        content:'<div style="padding: 20px 50px;font-size: 16px">密码或用户名错误</div>',
                        skin: 'layui-layer-molv',
                        area: ['320px', '180px'],
                        btn: '确定',
                        btnAlign: 'c'
                    });
                }
                else if (msg === "ok"){
                    window.location.href="index.html";
                }
            },
            error:function () {
                alert("失败")
            }
        });
    });
    });
</script>
</body>

</html>