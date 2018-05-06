<?php
require_once ("conn.php");
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
       <script src="../js/jquery.js"></script>
   </head>

   <body>
       <div class="admin-main">
           <fieldset class="layui-elem-field layui-field-title">
               <legend>选择查看栏目</legend>
           <form class="layui-form" style="margin-top: 25px" method="get" action="manager_1.php">
               <div class="layui-form-item">
                   <label class="layui-form-label">栏目选择</label>
                   <div class="layui-input-inline">
                       <select name="select">
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
                   </div>
                   <input value="查找" type="submit" class="layui-btn">
<!--                   <a href="--><?php //echo "manager_1.php?title=".$var?><!--" class="layui-btn">查找</a>-->
               </div>
           </form>
           </fieldset>
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
			});
		</script>
	</body>

</html>