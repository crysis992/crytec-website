<?php
require(__DIR__ . '/../config/database.php');
session_start();

if (!isset($_POST['submit'])) {
    die();
}

$post_id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
$previous_thumbnail = filter_var($_POST['prev_thumbnail'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$author_id = $_SESSION['user-id'];
$title = filter_var($_POST['title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$body = filter_var($_POST['body'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$category_id = filter_var($_POST['category'], FILTER_SANITIZE_NUMBER_INT);
$is_featured = 0;
if (isset($_POST['is_featured'])) {
    $is_featured = filter_var($_POST['is_featured'], FILTER_SANITIZE_NUMBER_INT);
}

$thumbnail = $_FILES['thumbnail'];

// set is_featured to 0 if unchecked
$is_featured = $is_featured == 1 ?: 0;

//validate form
if (!$title) {
    $_SESSION['add-post'] = "Enter post Title";
}
if (!$category_id) {
    $_SESSION['add-post'] = "Select Post Category";
}
if (!$body) {
    $_SESSION['add-post'] = "Enter Post Body";
}
if ($thumbnail['name']) {
    $previous_thumbnail_path =  dirname(getcwd(), 1) . "/static/thumbnails/" . $previous_thumbnail;

    if ($previous_thumbnail_path) {
        //Delete old thumbnail
        unlink($previous_thumbnail_path);
    }

    $time = time();
    $thumbnail_name = $time . $thumbnail['name'];
    $thumbnail_tmp_name = $thumbnail['tmp_name'];
    $thumbnail_destination_path = dirname(__DIR__) . "/static/thumbnails/" . $thumbnail_name;

    $allowed_files = ['png', 'jpg', 'jpeg'];
    $extention = explode('.', $thumbnail_name);
    $extention = end($extention);

    if (!in_array($extention, $allowed_files)) {
        $_SESSION['add-post'] = "File should be png, jpg or jpeg!";
    }

    if ($thumbnail['size'] > 2000000) {
        $_SESSION['add-post'] = "File size to big. Should be less than 1mb";
    }
}



if (isset($_SESSION['add-post'])) {
    // ERROR - Redirect back
    $_SESSION['add-post-data'] = $_POST;
    echo "ERROR";
    //header('location: ' . ROOT_URL . "admin/add-post.php");
    die();
}


//Upload Avatar
if ($thumbnail['name']) {
    move_uploaded_file($thumbnail_tmp_name, $thumbnail_destination_path);
}


if ($is_featured == 1) {
    $zero_all_is_featured_query = "UPDATE posts SET is_featured=0";
    $zero_all_is_featured_result = mysqli_query($connection, $zero_all_is_featured_query);
}

$thumbnail_to_insert = $thumbnail_name ?? $previous_thumbnail;

$query = "UPDATE posts SET title='$title', body='$body', thumbnail='$thumbnail_to_insert', category_id=$category_id, is_featured=$is_featured WHERE id=$post_id LIMIT 1";

$result = mysqli_query($connection, $query);

if (!mysqli_errno($connection)) {
    $_SESSION['add-post-success'] = "New post added successfully";
    header('location: ' . ROOT_URL . "/admin/dashboard.php");
    die();
}
