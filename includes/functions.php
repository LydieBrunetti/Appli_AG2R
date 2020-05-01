<?php

function updateEventDB($oneEventArray, $conn,$tempName)
{
    $unchangedTempName = str_replace("_", " ",$tempName);
    $tempName = "";
    $tempLocation = "";
    $tempDateDepart = 0;
    $tempNumberOfParticipants = "";
    foreach ($oneEventArray as $key => $value) {
        $tempName = $oneEventArray[0];
        $tempLocation = $oneEventArray[1];
        $tempDateDepart = $oneEventArray[2];
        $tempNumberOfParticipants = $oneEventArray[3];
    }
    $selectQry = "SELECT * from events WHERE 1";
    $selectRes = mysqli_query($conn, $selectQry);
    while ($selectRow = mysqli_fetch_array($selectRes)) {
        if ($selectRow[1] === $unchangedTempName) {
            $updateqry = "UPDATE events 
                          SET nom='$tempName', location='$tempLocation', date_depart='$tempDateDepart', nombre_participants='$tempNumberOfParticipants' 
                          WHERE nom='$unchangedTempName'";
            mysqli_query($conn, $updateqry);
        }
    }
}

function insertEventDB($conn, $eventName, $eventLocation, $eventStartDate, $eventNumberOfParticipants)
{
    $insertquery = "INSERT INTO events(nom,location,date_depart,nombre_participants) 
                    VALUES('$eventName','$eventLocation','$eventStartDate','$eventNumberOfParticipants')";
    mysqli_query($conn, $insertquery);
}

function removeUserFromDB($conn, $username)
{
    $qry = "DELETE FROM events_registrations WHERE events_registrations.nom='$username'";
    mysqli_query($conn, $qry);
}
