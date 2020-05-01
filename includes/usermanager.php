<?php
require __DIR__ . '/userlist.php';

/*CHECKS IF REMOVE BUTTON HAS BEEN PRESSED AND REMOVES USER*/
if (preg_match("/(supprimer)/i", implode('', $_POST))) {
    foreach ($_POST as $key => $value) {
        if (preg_match("/^(remove_)/", $key)) {
            $tempUser = substr($key, 7);
            echo $tempUser . "<br>";
        }
    }
    removeUserFromDB($conn, $tempUser);
    setcookie("userremovedsuccesfully", true, time() + 1, "/");
    header('Location: ../adminusers.php');
    exit();
}
/*CHECKS IF REMOVE BUTTON HAS BEEN PRESSED AND REMOVES USER*/



/*USER UPDATE*/
foreach ($_POST as $key => $value) {
    $key = str_replace("_" ,".", $key);
    if (preg_match("/^(email.)([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/", $key)) {
        $emailFromKey = substr($key,strpos($key, ".") + 1);
        $updateQry = "UPDATE events_registrations SET email_adress='$value' WHERE email_adress='$emailFromKey'";
        //Need a dump to keep updating after main email adress has been updated
        $dump = $value;
        mysqli_query($conn, $updateQry);
    }
    if (preg_match("/^(name.)([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/", $key)) {
        $updateQry = "UPDATE events_registrations SET nom='$value' WHERE email_adress='$dump'";
        mysqli_query($conn, $updateQry);
    }
    if (preg_match("/^(surname.)([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/", $key)) {
        $updateQry = "UPDATE events_registrations SET prenom='$value' WHERE email_adress='$dump'";
        mysqli_query($conn, $updateQry);
    }
    if (preg_match("/^(confidentialCode.)([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/", $key)) {
        $value =  mysqli_real_escape_string($conn, stripslashes($value));
        $updateQry = "UPDATE events_registrations SET confidential_code='$value' WHERE email_adress='$dump'";
        mysqli_query($conn, $updateQry);
    }
    if (preg_match("/^(event.)([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/", $key)) {
        $selectQry = "SELECT id FROM events WHERE nom='$value'";
        $selectRes = mysqli_query($conn,$selectQry);
        $selectRow = mysqli_fetch_row($selectRes);
         /*
          * selectRow[0] = id
          * */
        $updateQry = "UPDATE events_registrations SET event_id='$selectRow[0]' WHERE email_adress='$dump'";
        mysqli_query($conn, $updateQry);
    }
}
/*USER UPDATE*/


/*NEW USERS INSERTION*/
$counter = 0;
foreach ($_POST as $key => $value) {
    if (preg_match("/^(email_([0-9]+))$/", $key)) {
        $newUserEmail = $value;
        $counter++;
    }
    if (preg_match("/^(name_([0-9]+))$/", $key)) {
        $newUserName = $value;
        $counter++;
    }
    if (preg_match("/^(surname_([0-9]+))$/", $key)) {
        $newUserSurname = $value;
        $counter++;
    }
    if (preg_match("/^(confidentialCode_([0-9]+))$/", $key)) {
        $newUserConfidentialCode = $value;
        $counter++;
    }
    if (preg_match("/^(event_([0-9]+))$/", $key)) {
        $newUserEvent = $value;
        $counter++;
    }

    if ($counter == 5) {

        /*CHECK IF USER ALREADY EXISTS AND IS ALREADY REGISTERED TO THAT EVENT*/



        //GET EMAIL ID FROM EMAIL NAME
        $checkEventQry = "SELECT id FROM events WHERE nom='$newUserEvent'";
        $checkEventRes = mysqli_query($conn,$checkEventQry);
        $checkEventRow = mysqli_fetch_row($checkEventRes);
        $eventId = $checkEventRow[0];
        if ($eventId === NULL) {
            header('Location: ../adminusers.php');
            setcookie("wrongeventname", true, time() + 1, "/");
            exit();
        }
        //$checkEventRow[0] = event id
        //GET EMAIL ID FROM EMAIL NAME



        $checkEmailQry = "SELECT * FROM events_registrations WHERE email_adress='$newUserEmail' AND event_id='$eventId'";
        $checkEmailRes = mysqli_query($conn, $checkEmailQry);
        if (mysqli_num_rows($checkEmailRes) > 0) {
            setcookie("emailandeventalreadydb", true, time() + 1, "/");
            header('Location: ../adminusers.php');
            exit();
        }


        /*CHECK IF USER ALREADY EXISTS AND IS ALREADY REGISTERED TO THAT EVENT*/



        /*CREATE USER*/
        $insertQuery = "INSERT INTO events_registrations (email_adress, nom, prenom,confidential_code, event_id)
                        VALUES('$newUserEmail','$newUserName','$newUserSurname','$newUserConfidentialCode',$eventId)";
        mysqli_query($conn, $insertQuery);
        $counter = 0;
        /*CREATE USER*/
    }
}
/*NEW USERS INSERTION*/

header('Location: ../adminusers.php');