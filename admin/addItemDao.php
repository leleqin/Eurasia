<?php
require_once ("conn.php");
$item = $_POST['item'];
$title = $_POST['title'];
$brief = $_POST['brief'];
$container = $_POST['content'];
$stmt = $conn->prepare("INSERT INTO item (item_name, item_title, item_brief, item_content) VALUES (?,?,?,?)");
$stmt->bind_param('ssss',$item,$title,$brief,$container);
$stmt->execute();

