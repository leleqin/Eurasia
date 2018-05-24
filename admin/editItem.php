<?php
require_once "conn.php";
$id = $_POST['id'];
$rs = $conn->query("select * from item where item_Id = '$id'");
    $item_name = $_POST['quiz'];
    $item_title = $_POST['title'];
    $item_content = $_POST['content'];
    $stmt = "INSERT INTO item (item_name, item_title, item_content) VALUES ('$item_name', '$item_title', '$item_content')";
    $conn->query($stmt);

