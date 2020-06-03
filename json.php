<?php

include_once('db.php');

$calendarQ = "select * from calendar";
$query = mysqli_query($connection, $calendarQ);
while ($row = mysqli_fetch_array($query)) {
    $allday = $row['allday'];
    $is_allday = $allday == 1 ? true : false;

    $data[] = array(
        'id' => $row['id'],
        'title' => $row['title'],
        'start' => date('Y-m-d H:i', $row['starttime']),
        'allDay' => $is_allday,
    );
}
echo json_encode($data);
?>