<?php
require(__DIR__ . '/../config/database.php');
session_start();

if (!isset($_POST['submit'])) {
}

$id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
$title = filter_var($_POST['title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$description = filter_var($_POST['description'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

if (!$title || !$description) {
    $_SESSION['edit-category'] = "Invalid form input";
    //Redirect Back
    header('location: ' . ROOT_URL . 'admin/edit-category.php?id=' . $id);
    //Abort script
    die();
}

$query = "UPDATE categories SET title='$title', description='$description' WHERE id=$id LIMIT 1;";
$result = mysqli_query($connection, $query);

$_SESSION['edit-category-success'] = "Category $title updated sucessfully!";
header('location: ' . ROOT_URL . 'admin/edit-category.php?id=' . $id);