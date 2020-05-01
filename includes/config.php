<?php

try {
    $conn = mysqli_connect("localhost:3307", "root", "", "ag2r");
} catch (Exception $e) {
    error_log($e->getMessage());
    exit("Unable to connect to database");
}
?>


