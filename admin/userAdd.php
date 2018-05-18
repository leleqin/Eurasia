<?php
require_once ("conn.php");
$username = $_POST['username'];
$password = $_POST['password'];
$info = $_POST['info'];
$sql = "INSERT INTO users (user_name,user_pwd,info) VALUES ('$username','$password','$info')";
$rs = $conn->query($sql);
if ($rs === TRUE) {
    echo "ok";
} else {
    echo "no";
}
