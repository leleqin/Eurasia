<?php
require_once ("conn.php");
if (isset($_POST['button'])) {
    echo $_POST['select'];
    $item_name = $_POST['select'];
    $rs = $conn->query("select * from item where item_name = '$item_name'");
}
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
           <form class="layui-form" style="margin-top: 25px" method="post">
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
                   <input name="button" value="查找" type="submit" class="layui-btn">
               </div>
           </form>
           </fieldset>
           <blockquote class="layui-elem-quote">
               <a href="add.php" class="layui-btn layui-btn-small" id="add">
                   <i class="layui-icon">&#xe608;</i> 添加信息
               </a>
               <a href="#" class="layui-btn layui-btn-small" id="import">
                   <i class="layui-icon">&#xe608;</i> 导入信息
               </a>
               <a href="#" class="layui-btn layui-btn-small">
                   <i class="fa fa-shopping-cart" aria-hidden="true"></i> 导出信息
               </a>
               <a href="#" class="layui-btn layui-btn-small" id="getSelected">
                   <i class="fa fa-shopping-cart" aria-hidden="true"></i> 获取全选信息
               </a>
               <a href="javascript:;" class="layui-btn layui-btn-small" id="search">
                   <i class="layui-icon">&#xe615;</i> 搜索
               </a>
           </blockquote>
           <fieldset class="layui-elem-field">
               <legend>数据列表</legend>
               <div class="layui-field-box layui-form">
                   <table class="layui-table admin-table">
                       <thead>
                       <tr>
                           <th style="width: 30px;"><input type="checkbox" lay-filter="allselector" lay-skin="primary"></th>
                           <th>序号</th>
                           <th>栏目名称</th>
                           <th>发表人</th>
                           <th>发表时间</th>
                       </tr>
                       <?php
                       while ($row = mysqli_fetch_assoc($rs)) {
                           ?>
                           <tr>
                               <th><?php echo $row['$item_Id'] ?></th>
                               <th><?php echo $row['$item_title'] ?></th>
                               <th><?php echo $row['$item_user'] ?></th>
                               <th><?php echo $row['$item_time'] ?></th>
                               <td>
                                   <a href="/detail-1" target="_blank" class="layui-btn layui-btn-normal layui-btn-mini">预览</a>
                                   <a href="javascript:;" data-name="{{ item.name }}" data-opt="edit" class="layui-btn layui-btn-mini">编辑</a>
                                   <a href="del.php?id=<?php echo $row['$item_Id']?>" onclick="return confirm('确认要删除吗？');" class="layui-btn layui-btn-danger layui-btn-mini">删除</a>
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
			});
		</script>
	</body>

</html>