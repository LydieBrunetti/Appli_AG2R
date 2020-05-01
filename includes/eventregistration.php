<?php
require(__DIR__ . "/config.php");
require(__DIR__ . "/emailsender.php");

$email = $_POST['email'];
$event = $_POST['event'];
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];


/*Transform event from name to id*/
$selectQry = "SELECT * FROM events WHERE nom='$event'";
$selectRes = mysqli_query($conn, $selectQry);
$selectRow = mysqli_fetch_row($selectRes);
if ($selectRow) {
    $eventId = $selectRow[0];
} else {
    header('Location: ../index.php');
    setcookie("problem_event_register", true, time() + 1, "/");
    exit();
}
/*Transform event from name to id*/


/*Creation of confidential ID and email sending*/
function code_generator($length) {
    $random = '';
    for ($i = 0; $i < $length; $i++) {
        $random .= chr(random_int(33, 126));
    }
    return $random;
}

$confidentialCode = code_generator(rand(75,100));
$confidentialCode = mysqli_real_escape_string($conn, stripslashes($confidentialCode));
/*Creation of confidential ID and email sending*/


/*PHP MAILER*/
sendEmail($email,$nom,$event,$confidentialCode);
/*PHP MAILER*/

$insertQry = "INSERT INTO events_registrations (email_adress, nom, prenom, confidential_code, event_id) VALUES ('$email', '$nom', '$prenom', '$confidentialCode','$eventId')";
$updateQry = "UPDATE events SET nombre_participants=nombre_participants + 1 WHERE nom='$event'";
mysqli_query($conn, $insertQry);
mysqli_query($conn, $updateQry);
setcookie("event_register_succesfull", true, time() + 1, "/");
header('Location: ../index.php');