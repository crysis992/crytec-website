<?php
include $_SERVER["DOCUMENT_ROOT"] . "/crytec/config/constants.php";



// Connect to database
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if ($connection->connect_error) {
    die();
    $_SESSION['error'] = "Unable to connect to database!";
    header('location:' . ROOT_URL . 'error.php');
}

if (mysqli_errno($connection)) {
    die(mysqli_error($connection));
}