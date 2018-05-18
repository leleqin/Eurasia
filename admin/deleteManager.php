<?php
require_once ("conn.php");
$id = $_POST['id'];
$del = $conn->query("delete from item where item_Id = '$id'");
