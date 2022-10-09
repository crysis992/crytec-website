<?php
require(__DIR__ . '/../config/database.php');
session_start();

//Check if user is admin to prevent manually calling the URL.
if (!$_SESSION['user_is_admin']) {
    header('location: ' . ROOT_URL . "admin/userlist.php");
    die();
}

if (!isset($_GET['id'])) {
    //Redirect back, ID not set
    die();
}

$id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
$query = "SELECT * FROM users WHERE id=$id";
$result = mysqli_query($connection, $query);
$user = mysqli_fetch_assoc($result);

if (mysqli_num_rows($result) != 1) {
    //Got multiple users, error!
    die();
}

$avatar_name = $user['avatar'];
$avatar_path = dirname(__DIR__) . "/static/images/" . $avatar_name;
// Delete Avatar if available
if ($avatar_path) {
    unlink($avatar_path);
}

//TODO: Delete posts & uploaded media



// Delete user from database

$delete_user_query = "DELETE FROM users WHERE id=$id";
$delete_user_result = mysqli_query($connection, $delete_user_query);

if (mysqli_errno($connection)) {
    echo "Failed to delete user!";
    die();
} else {
    //Sucessfully deleted user, redirect back.
    header('location: ' . ROOT_URL . "admin/userlist.php");
    die();
}