<?php
header("Content-type: text/html; charset=utf-8");
require_once("conn.php");
$id = $_POST['id'];
$sql = ("select * from users where user_id = '$id'");
$rs = $conn->query($sql);
$arr = array();
class DataDom{
    public $id;
    public $name;
    public $pwd;
    public $info;
}
while($row = $rs->fetch_assoc()){
    list($id) = $row;
    $datadom = new DataDom();
    $datadom->id = urlencode($row['user_id']);
    $datadom->name = urlencode($row['user_name']);
    $datadom->pwd = urlencode($row['user_pwd']);
    $datadom->info = urlencode($row['info']);
    $arr[]=$datadom;
}
echo  urldecode(json_encode($arr));