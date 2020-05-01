<?php
require('config.php');
session_start();
session_destroy();

header('Location: ../admin.php');
