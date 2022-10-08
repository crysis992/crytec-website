<?php
require(__DIR__ . '/../config/database.php');
session_start();

if (!isset($_SESSION['user-id'])) {
    header('location: ' . ROOT_URL . "error.php");
    die();
}

session_destroy();
header('location: ' . ROOT_URL);