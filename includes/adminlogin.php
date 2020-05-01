<?php
//TODO gerer les connexions multiples admins
require('config.php');
$username = $_POST['username'];
$password = $_POST['password'];
$selectQry = "SELECT * FROM admin WHERE pseudo='$username' AND mot_de_passe='$password' LIMIT 1";
$selectRow = mysqli_fetch_row(mysqli_query($conn, $selectQry));


if ($selectRow) {
    session_start();
    $_SESSION['username'] = $selectRow[1];
    $_SESSION['admin_logged'] = true;
    setcookie("adminsuccess",true, time() + 1, "/");
    header('Location: ../admin.php');
} else {
    setcookie("adminfail",true, time() + 1, "/");
    header('Location: ../admin.php');
}

