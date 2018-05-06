<?php
ob_start();
require_once ("conn.php");

$id = $_GET['id'];
echo $id;
$del = $conn->query("delete from item where item_Id = '$id'");
header("location:manager_1.php");