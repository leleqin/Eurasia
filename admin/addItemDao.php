<?php
require_once ("conn.php");
$item = $_POST['item'];
$title = $_POST['title'];
$container = $_POST['content'];
$stmt = $conn->prepare("INSERT INTO item (item_name, item_title, item_content) VALUES (?,?,?)");
$stmt->bind_param('sss',$item,$title,$container);
$stmt->execute();

