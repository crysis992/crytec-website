<?php
require(__DIR__ . '/../config/database.php');
session_start();

//TODO
// Update Avatar if uploaded


if (!isset($_POST['submit'])) {
}

$id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
$firstname = filter_var($_POST['firstname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$lastname = filter_var($_POST['lastname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$role = filter_var($_POST['userrole'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$password = filter_var($_POST['password'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

//Check for valid input

if (!$firstname || !$lastname) {
    $_SESSION['edit-user'] = "Invalid form input";
    //Redirect Back
    header('location: ' . ROOT_URL . 'admin/edit-user.php?id=' . $id);
    //Abort script
    die();
}

//Update User

$query = "UPDATE users SET firstname='$firstname', lastname='$lastname', is_admin='$role' WHERE id=$id LIMIT 1;";
if ($password) {
    $hpw = password_hash($password, PASSWORD_DEFAULT);
    $query = "UPDATE users SET firstname='$firstname', lastname='$lastname', is_admin='$role', password='$hpw' WHERE id=$id LIMIT 1;";
}

$result = mysqli_query($connection, $query);

if (mysqli_errno($connection)) {
    $_SESSION['edit-user'] = "Failed to update user!";
} else {
    $_SESSION['edit-user-success'] = "User $firstname $lastname updated sucessfully!";
}

//Redirect user back to edit page on success
header('location: ' . ROOT_URL . 'admin/edit-user.php?id=' . $id);