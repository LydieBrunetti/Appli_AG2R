<?php
session_start();
if(!isset($_SESSION['admin_logged'])) {
    header('Location: admin.php');
    exit();
}

require(__DIR__ . '/includes/header.php');
require(__DIR__ . '/views/adminheader.view.phtml');
require(__DIR__ . '/views/adminfdr.view.phtml');
require(__DIR__ . "/includes/footer.php");