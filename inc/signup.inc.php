<?php

// require("./config/database.php");
// require(__DIR__ . '/../../config/database.php');

require($_SERVER['DOCUMENT_ROOT'] . '/crytec/config/database.php');



if (isset($_POST['submit'])) {

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
        echo "FN";
    } else if (!$lastname) {
        $_SESSION['signup'] = "Please enter your last name.";
        echo "LN";
    } else if (!$username) {
        $_SESSION['signup'] = "Please enter your last name.";
        echo "U";
    } else if (!$email) {
        $_SESSION['signup'] = "Please enter a valid email.";
        echo "EM";
    } else if (strlen($createpassword) < 2 || strlen($confirmpassword) < 2) {
        $_SESSION['signup'] = "Password must be at least contain 8 characters.";
        echo "PWL";
    } else if (!$avatar['name']) {
        $_SESSION['signup'] = "Please select an avatar";
        echo "AV";
    } else {
        // Check if passwords match
        if ($createpassword !== $confirmpassword) {
            $_SESSION['signup'] == "Passwords do not match";
            echo "No match";
        } else {
            // Hash Password
            $hashed_pwd = password_hash($createpassword, PASSWORD_DEFAULT);

            var_dump($connection);

            if (canRegister($connection, $username, $email)) {

                //Rename Image
                $time = time();
                $avatar_name = $time . $avatar['name'];
                $avatar_tmp_name = $avatar['tmp_name'];
                $avatar_destination = './static/avatars/' . $avatar_name;

                //Allowed extensions
                $allowed_files = ['png', 'jpg', 'jpeg'];
                $extension = explode('.', $avatar_name);
                $extention = end($extension);


                if (in_array($extension, $allowed_files)) {
                    //Check file size

                    if ($avatar['size'] < 1000000) {
                        //Upload Avatar
                        move_uploaded_file($avatar_tmp_name, $avatar_destination);
                    } else {
                        //Filesize too big
                        $_SESSION['signup'] = "File size to big. Should be less than 1mb";
                    }
                } else {
                    $_SESSION['signup'] = "File should be png, jpg or jpeg.";
                }
            } else {
                $_SESSION['signup'] == "Username or Email already taken.";
            }
        }
    }


    // Redirect user to registration if any errors occures
    if (isset($_SESSION)) {
        // pass form data back to signup page.
        header('location:' . ROOT_URL . 'signup.php');
    } else {
        //insert new user into database
        echo 'Successfully registered!';
    }
} else {
    echo "Fatal Error!";
    // header('location: ' . ROOT_URL . 'signup.php');
    // die();
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
