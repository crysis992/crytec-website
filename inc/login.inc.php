<?php
require(__DIR__ . '/../config/database.php');
session_start();


if (!isset($_POST['submit'])) {
    // Redirect user back to login if accessed without any data
    redirectBack();
    die();
}

$username_email = filter_var($_POST['username_email'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$password = filter_var($_POST['password'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

if (!$username_email || !$password) {
    redirectBack("Please enter a username and password!");
}

if (!login($connection, $username_email, $password)) {
    die();
}

header('location:' . ROOT_URL);





function login($connection, $user, $password)
{

    $fetch_user_query = "SELECT * FROM users WHERE username='$user' OR email='$user'";
    $fetch_user_result = mysqli_query($connection, $fetch_user_query);

    if (mysqli_num_rows($fetch_user_result) == 1) {
        //convert the record into array
        $user_record = mysqli_fetch_assoc($fetch_user_result);
        $db_password = $user_record['password'];
        // Compare password

        if (password_verify($password, $db_password)) {
            $_SESSION['user-id'] = $user_record['id'];
            if ($user_record["is_admin"] == 1) {
                $_SESSION['user_is_admin'] = true;
            }
            return true;
        } else {
            redirectBack("Invalid user credentials.");
        }
    } else {
        redirectBack("User not found!");
    }
}


//Redirect user back to login form, error message is optional
function redirectBack($error_message = "null")
{
    if ($error_message !== "null") {
        $_SESSION['login-error'] = $error_message;
    }
    header('location:' . ROOT_URL . 'login.php');
    die();
}