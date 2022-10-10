<?php
require(__DIR__ . '/../config/database.php');
session_start();

//Check if user is admin to prevent manually calling the URL.
if (!$_SESSION['user_is_admin']) {
    header('location: ' . ROOT_URL . "admin/categories.php");
    die();
}

if (!isset($_GET['id'])) {
    //Redirect back, ID not set
    header('location: ' . ROOT_URL . "admin/categories.php");
    die();
}

$id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
$query = "SELECT * FROM categories WHERE id=$id";
$result = mysqli_query($connection, $query);
$user = mysqli_fetch_assoc($result);

if (mysqli_num_rows($result) != 1) {
    //Got multiple users, error!
    die();
}

// Delete user from database

$query_delete = "DELETE FROM categories WHERE id=$id";
$result_delete = mysqli_query($connection, $query_delete);

if (mysqli_errno($connection)) {
    echo "Failed to delete category!";
    die();
} else {
    //Sucessfully deleted user, redirect back.
    header('location: ' . ROOT_URL . "admin/categories.php");
    die();
}