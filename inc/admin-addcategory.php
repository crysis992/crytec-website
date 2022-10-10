<?php
require(__DIR__ . '/../config/database.php');
session_start();

if (!isset($_POST['submit'])) {
    header('location: ' . ROOT_URL . "admin/categories.php");
    die();
}

$title = filter_var($_POST['title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$description = filter_var($_POST['description'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

if (!$title) {
    $_SESSION['add-category'] = "Please enter a title";
    $_SESSION['add-category-data'] = $_POST;
    header('location: ' . ROOT_URL . "admin/add-category.php");
    die();
}

if (!$description) {
    $_SESSION['add-category'] = "Please enter a description";
    $_SESSION['add-category-data'] = $_POST;
    header('location: ' . ROOT_URL . "admin/add-category.php");
    die();
}

$query = "INSERT INTO categories (title, description) VALUES ('$title', '$description')";
echo $query;
$result = mysqli_query($connection, $query);

if (mysqli_errno($connection)) {
    $_SESSION['add-category'] = "Could not add category!";
    $_SESSION['add-category-data'] = $_POST;
    header('location: ' . ROOT_URL . "admin/add-category.php");
    die();
} else {
    header('location: ' . ROOT_URL . "admin/categories.php");
}
die();