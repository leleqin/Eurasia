<?php
require_once ("conn.php");
$i_id = $_POST['id'];
$i_title = $_POST['title'];
$i_content = $_POST['container'];
$stmt = $conn->prepare("update item set item_title = ? ,item_content = ? where item_Id = ?");
$stmt->bind_param("ssi",$i_title,$i_content,$i_id);
$stmt->execute();
echo "ok";