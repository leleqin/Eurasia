<?php
ob_start();
session_start();
require_once ("conn.php");
    $name = $_POST['userName'];
    $pwd = $_POST['password'];
    $rs=$conn->query("select * from users where user_name = '$name' and user_pwd = '$pwd'");
    $usernum=mysqli_num_rows($rs);
    if($usernum>=1)
    {
        $_SESSION['gly']=$uname;
        header("location:index.html");
    }
    else{
        echo "null";
    }

