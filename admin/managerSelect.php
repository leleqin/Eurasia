<?php
header("Content-type: text/html; charset=utf-8");
$title=$_POST["title"];
require_once("conn.php");
$sql = "SELECT * FROM item WHERE item_name='$title'";
$rs=$conn->query($sql);
$arr = array();
class  DataDom{
    public $id;
    public $title;
    public $user;
    public $time;
}
while ($row = $rs->fetch_assoc()) {
    list($title) = $row;
    $datadom = new DataDom();
    $datadom->id=urlencode($row["item_Id"]);
    $datadom->title=urlencode($row["item_title"]);
    $datadom->user=urlencode($row["item_user"]);
    $datadom->time=urlencode($row["item_time"]);
    $arr[]=$datadom;
}
echo  urldecode(json_encode($arr));