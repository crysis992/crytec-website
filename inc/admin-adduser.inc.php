<?php
require(__DIR__ . '/../config/database.php');
session_start();

var_dump($_SESSION);
echo "</br>";
echo "</br>";
echo "</br>";
var_dump($_FILES);




if (!isset($_POST['submit'])) {
    header('location: ' . ROOT_URL . 'admin/add-user.php');
    die();
}

$firstname = filter_var($_POST['firstname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$lastname = filter_var($_POST['lastname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$username = filter_var($_POST['username'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
$password = filter_var($_POST['password'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$avatar = $_FILES['avatar'];
$role = filter_var($_POST['userrole'], FILTER_SANITIZE_NUMBER_INT);

if (!check($firstname, "First name must be set!")) die();
if (!check($lastname, "Last name must be set!")) die();
if (!check($username, "Please enter a username!")) die();
if (!check($email, "Please enter a valid email!")) die();
if (!check($password, "Please enter a password!")) die();

$hashed_password = password_hash($password, PASSWORD_DEFAULT);

//Check if user already exists
if (!canRegister($connection, $username, $email)) {
    $_SESSION['admin-error'] = "Username or Email already taken.";
    header('location: ' . ROOT_URL . 'admin/add-user.php');
    die();
}

$avatar_name = "unset-avatar.png";

//Upload Avatar
if ($avatar['name']) {
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
            $_SESSION['admin-error'] = "File size to big. Should be less than 1mb";
        }
    } else {
        $_SESSION['admin-error'] = "File should be png, jpg or jpeg!";
    }
}

//insert new user into database
$insert_user_query = "INSERT INTO users(firstname, lastname, username, email, password, avatar, is_admin) 
        VALUES('$firstname', '$lastname', '$username', '$email', '$hashed_password', '$avatar_name', $role)";

$insert_user_result = mysqli_query($connection, $insert_user_query);
echo $insert_user_result;

if (mysqli_errno($connection) == 0) {
    //Redirect to Login page
    header('location:' . ROOT_URL . 'admin/dashboard.php');
    die();
} else {
    $_SESSION['signup'] = "Failed to create account - please contact support </br> Error number: " . mysqli_errno($connection);
    header('location:' . ROOT_URL . 'signup.php');
    die();
}





function check($data, $error_message)
{

    if (!$data) {
        $_SESSION['admin-error'] = $error_message;
        $_SESSION['admin-add-data'] = $_POST;
        header('location: ' . ROOT_URL . 'admin/add-user.php');
        return false;
        die();
    }
    return true;
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