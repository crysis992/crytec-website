<?php
require($_SERVER['DOCUMENT_ROOT'] . '/crytec/config/database.php');
session_start();


if (isset($_POST['submit'])) {

    unset($_SERVER['signup-data']);

    $firstname = filter_var($_POST['firstname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $lastname = filter_var($_POST['lastname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $username = filter_var($_POST['username'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $createpassword = filter_var($_POST['createpassword'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $confirmpassword = filter_var($_POST['confirmpassword'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $avatar = $_FILES['avatar'];

    // validate input

    if (!$firstname) {
        $_SESSION['signup'] = "Please enter your first name.";
    } else if (!$lastname) {
        $_SESSION['signup'] = "Please enter your last name.";
    } else if (!$username) {
        $_SESSION['signup'] = "Please enter a username.";
    } else if (!$email) {
        $_SESSION['signup'] = "Please enter a valid email.";
    } else if (strlen($createpassword) < 6 || strlen($confirmpassword) < 6) {
        $_SESSION['signup'] = "Password must at least contain 6 characters.";
    } else if (!$avatar['name']) {
        $_SESSION['signup'] = "Please select an avatar";
    } else {
        if ($createpassword !== $confirmpassword) {
            $_SESSION['signup'] = "Passwords do not match";
            redirectBack();
            die();
        }
    }

    $hashed_pwd = password_hash($createpassword, PASSWORD_DEFAULT);

    if (!canRegister($connection, $username, $email)) {
        $_SESSION['signup'] = "Username or Email already taken.";
        redirectBack();
    }

    $time = time();
    $avatar_name = $time . $avatar['name'];
    $avatar_tmp_name = $avatar['tmp_name'];
    //$avatar_destination = 'static/images/' . $avatar_name;
    $avatar_destination = dirname(__DIR__) . "/static/images/" . $avatar_name;

    //Allowed extensions
    $allowed_files = ['png', 'jpg', 'jpeg'];
    $extention = explode('.', $avatar_name);
    $extention = end($extention);


    if (in_array($extention, $allowed_files)) {
        //Check file size

        if ($avatar['size'] < 1000000) {
            //Upload Avatar
            move_uploaded_file($avatar_tmp_name, $avatar_destination);
        } else {
            //Filesize too big
            $_SESSION['signup'] = "File size to big. Should be less than 1mb";
        }
    } else {
        $_SESSION['signup'] = "File should be png, jpg or jpeg!";
    }


    // Redirect user to registration if any errors occures
    if (isset($_SESSION['signup'])) {
        // pass form data back to signup page.
        $_SESSION['signup-data'] = $_POST;
        header('location:' . ROOT_URL . 'signup.php');
        die();
    } else {
        //insert new user into database
        $insert_user_query = "INSERT INTO users(firstname, lastname, username, email, password, avatar, is_admin) 
        VALUES('$firstname', '$lastname', '$username', '$email', '$hashed_pwd', '$avatar_name', 0)";

        $insert_user_result = mysqli_query($connection, $insert_user_query);
        echo $insert_user_result;

        if (mysqli_errno($connection) == 0) {
            //Redirect to Login page
            $_SESSION['signup-success'] = "Registration successful. Please log in!";
            header('location:' . ROOT_URL . 'login.php');
            die();
        } else {
            $_SESSION['signup'] = "Failed to create account - please contact support </br> Error number: " . mysqli_errno($connection);
            header('location:' . ROOT_URL . 'signup.php');
            die();
        }
    }
} else {
    echo "Fatal Error!";
    header('location: ' . ROOT_URL . 'error.php');
    die();
}







function redirectBack()
{

    if (isset($_SESSION['signup'])) {
        $_SESSION['signup-data'] = $_POST;
    }

    header('location:' . ROOT_URL . 'signup.php');
}



function canRegister($db, $username, $mail)
{

    $query = "SELECT * FROM users WHERE username='$username' OR email='$mail' LIMIT 1;";
    $result = mysqli_query($db, $query);

    if (mysqli_num_rows($result) > 0) {
        return false;
    } else {
        return true;
    }
}