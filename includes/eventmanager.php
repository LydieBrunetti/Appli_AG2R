<?php
require(__DIR__ . '/eventslist.php');
session_start();


/*REMOVES CONTENT*/
if (preg_match("/(supprimer)/i", implode('', $_POST))) {
    foreach ($_POST as $key => $value) {
        if (preg_match("/^(remove_)/", $key)) {
            $tempArticle = substr($key, 7);
        }
    }
    $tempArticle = str_replace('_', ' ' ,$tempArticle);
    $qry = "DELETE FROM events WHERE events.nom='$tempArticle'";
    mysqli_query($conn, $qry);
    header('Location: ../adminevents.php');
    exit();
}
/*REMOVES CONTENT*/


/*UPDATES CONTENT*/
$oneEventArray = array();
$counter = 0;
foreach ($_POST as $key => $value) {
    if (preg_match("(nom_)", $key)) {
        array_push($oneEventArray, $value);
        $tempName = str_replace(" ", "_", substr($key,4, strlen($key)));
        $counter++;
    }
    if (preg_match("(location_" . $tempName . ")", $key)) {
        array_push($oneEventArray, $value);
        $counter++;
    }
    if (preg_match("(datedepart_" . $tempName . ")", $key)) {
        array_push($oneEventArray, $value);
        $counter++;
    }
    if (preg_match("(participants_" . $tempName . ")", $key)) {
        array_push($oneEventArray, $value);
        $counter++;
    }
    if ($counter == 4) {
        $counter = 0;
        updateEventDB($oneEventArray, $conn, $tempName);
        //will always have array with 4 elements(name, location, start_date, participants)
        //var_dump($onePizzaArray);
        foreach ($oneEventArray as $key => $value) {
            $oneEventArray[$key] = null;
        }
        $oneEventArray = array_filter($oneEventArray);
    }
}
/*UPDATES CONTENT*/


/*ADD NEW CONTENT*/
$counter = 0;
var_dump($_POST);
foreach ($_POST as $pkey => $pvalue) {
    if (preg_match("/(nom_[0-9]+)$/", $pkey)) {
        $tempName = $pvalue;
        $counter++;
    }
    if (preg_match("/(location_[0-9]+)$/", $pkey)) {
        $tempLocation = $pvalue;
        $counter++;
    }
    if (preg_match("/(datedepart_[0-9]+)$/", $pkey)) {
        $tempStartDate = $pvalue;
        $counter++;
    }
    if (preg_match("/(participants_[0-9]+)$/", $pkey)) {
        $tempNumberOfParticipants = $pvalue;
        $counter++;
    }
    if ($counter == 4) {
        insertEventDB($conn, $tempName, $tempLocation, $tempStartDate, $tempNumberOfParticipants);
        $counter = 0;
    }
}
/*ADD NEW CONTENT*/


header('Location: ../adminevents.php');
