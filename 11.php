<?php
require_once "conn.php";
if ($_POST){
    echo $_POST['select'];
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
</head>
<body>
<form method="post">
<select  id="mySelect" name="select">
    <option value="" >请选择要查看栏目</option>
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
</form>
</body>
</html>