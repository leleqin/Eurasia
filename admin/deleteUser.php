<?php
require_once("conn.php");
$id = $_POST['id'];
$row = $conn->query("delete from users where user_id = '$id'");