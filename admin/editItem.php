<?php
header("Content-type: text/html; charset=utf-8");
require_once("conn.php");
$id = $_POST['id'];
$sql = ("select * from item where item_Id = '$id'");
$rs = $conn->query($sql);
$arr = array();
class DataDom{
    public $id;
    public $name;
    public $title;
    public $content;
}
while($row = $rs->fetch_assoc()){
    list($id) = $row;
    $datadom = new DataDom();
    $datadom->id = urlencode($row['item_Id']);
    $datadom->name = urlencode($row['item_name']);
    $datadom->title = urlencode($row['item_title']);
    $datadom->content = urlencode($row['item_content']);
    $arr[]=$datadom;
}
echo  urldecode(json_encode($arr));