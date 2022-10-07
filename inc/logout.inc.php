<?php
require(__DIR__ . '/../config/database.php');
session_start();

if (!isset($_SESSION['user-id'])) {
    header('location: ' . ROOT_URL . "error.php");
    die();
}


if (isset($_SESSION['user-id'])) {
    unset($_SESSION['user-id']);
    if (isset($_SESSION['user_is_admin'])) {
        unset($_SESSION['user_is_admin']);
        header('location: ' . ROOT_URL);
    } else {
        header('location: ' . ROOT_URL);
    }
}