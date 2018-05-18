<?php
ob_start();
require_once ("conn.php");
$id = $_GET['id'];
$row = $conn->query("delete from users where user_id = '$id'");
header("location:begtable.php");