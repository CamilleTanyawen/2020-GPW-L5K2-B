<?php

include_once('db.php'); //连接数据库

$action = $_GET['action'];
if ($action == 'add') { //增加
    $title = $_POST['title'];
    $allday = $_POST['allday'] == 'true' ? 1 : 0; //是否是全天事件
    $startdate = trim($_POST['startdate']); //开始日期
    $s_time = $_POST['s_hour'] . ':' . $_POST['s_minute'].':00'; //开始时间
    $starttime = strtotime($startdate . ' ' . $s_time);

    $isallday = $isallday?1:0;
    $sql = "insert into `calendar` (`title`,`starttime`,`allday`) values ('$title','$starttime','$allday')";
    $query = mysqli_query($connection, $sql);
    if (mysqli_insert_id($connection) > 0) {
        echo '1';
    } else {
        echo 'Input failed！';
    }
} else if ($action == "drag") {
    $id = $_POST['id'];
    $daydiff = (int) $_POST['daydiff'] * 24 * 60 * 60;
    $minudiff = (int) $_POST['minudiff'] / 1000;
    $allday = $_POST['allday'] == 'true' ? 1 : 0;
    $difftime = $daydiff + $minudiff;

    $sql = "update `calendar` set starttime=starttime+'$difftime',allday='$allday' where id='$id'";
    $result = mysqli_query($connection, $sql);
    if (mysqli_affected_rows($connection) == 1) {
        echo '1';
    } else {
        echo 'error！';
    }
}
?>