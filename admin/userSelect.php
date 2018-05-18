<?php
require_once("conn.php");
$sql = ("select * from users");
$rs=$conn->query($sql);
$arr = array();
class DateUser{
    public $id;
    public $name;
    public $time;
    public $info;
}
while ($row = $rs->fetch_assoc()){
    $userdata = new DateUser();
    $userdata->id=urlencode($row['user_id']);
    $userdata->name=urlencode($row['user_name']);
    $userdata->time=urlencode($row['user_date']);
    $userdata->info=urlencode($row['info']);
    $arr[]=$userdata;
}
echo urldecode(json_encode($arr,true));