<?php
require_once ("conn.php");
$u_id = $_POST['u_id'];
$u_name = $_POST['u_name'];
$u_pwd = $_POST['u_pwd'];
$u_info = $_POST['u_info'];
$stmt = $conn->prepare("update users set user_name = ? ,user_pwd = ? ,info = ? where user_id = ?");
$stmt->bind_param("sssi",$u_name,$u_pwd,$u_info,$u_id);
$stmt->execute();
