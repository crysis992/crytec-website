<?php
require(__DIR__ . '/../config/database.php');
session_start();

//Check if user is admin to prevent manually calling the URL.
if (!$_SESSION['user_is_admin']) {
    header('location: ' . ROOT_URL . "admin/dashboard.php");
    die();
}

if (!isset($_GET['id'])) {
    //Redirect back, ID not set
    header('location: ' . ROOT_URL . "admin/dashboard.php");
    die();
}

$id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
$query = "SELECT * FROM posts WHERE id=$id";
$result = mysqli_query($connection, $query);
$post = mysqli_fetch_assoc($result);

if (mysqli_num_rows($result) > 1) {
    echo "Error - Multiple posts found!";
    die();
} else if (mysqli_num_rows($result) < 1) {
    echo "Error - No post with id " . $id . " found";
    die();
}

// Delete user from database

$query_delete = "DELETE FROM posts WHERE id=$id";
$result_delete = mysqli_query($connection, $query_delete);

if (mysqli_errno($connection)) {
    echo "Failed to delete category!";
    die();
} else {
    // Delete uploaded thumbnail
    $thumbnail_path =  dirname(getcwd(), 1) . "/static/thumbnails/" . $post['thumbnail'];
    if (file_exists($thumbnail_path)) {
        unlink($thumbnail_path);
    }
    //Sucessfully deleted user, redirect back.
    header('location: ' . ROOT_URL . "admin/dashboard.php");
    die();
}
