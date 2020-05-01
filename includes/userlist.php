<?php

require(__DIR__ . '/config.php');
require(__DIR__ . '/User.php');
require(__DIR__ . '/functions.php');


$users = array();

$selectQry = "SELECT * FROM users WHERE 1";
$selectRes = mysqli_query($conn,$selectQry);
/*
 * $selectRow[0] = user id
 * $selectRow[11 = user email
 * $selectRow[2] = user name
 * $selectRow[3] = user surname
 * $selectRow[4] = user confidential code
 * $selectRow[5] = user event registered
 * */
while ($selectRow = mysqli_fetch_row($selectRes))
{
    $user = new User($selectRow[1],$selectRow[2],$selectRow[3],$selectRow[5],$selectRow[6],$selectRow[7]);
    array_push($users, $user);
}
