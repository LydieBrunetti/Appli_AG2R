<?php
require(__DIR__ . '/Event.php');
require(__DIR__ . '/config.php');
require(__DIR__ . '/functions.php');

$events = array();

$selectQry = "SELECT * FROM events WHERE 1";
$selectRes = mysqli_query($conn,$selectQry);
/*
 * $selectRow[0] = event id
 * $selectRow[11 = event name
 * $selectRow[2] = event location
 * $selectRow[3] = event start date
 * $selectRow[4] = event total number of participants
 * */
while ($selectRow = mysqli_fetch_row($selectRes))
{
    $event = new Event($selectRow[1],$selectRow[2],$selectRow[3],$selectRow[4]);
    array_push($events, $event);
}