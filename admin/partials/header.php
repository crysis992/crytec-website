<?php

//Require our main header
require dirname(__FILE__, 3) . '/partials/header.php';

//Redirect user to login if not logged in
if (!isset($_SESSION['user-id'])) {
    header('location:' . ROOT_URL . 'login.php');
    die();
}