<?php

include __DIR__ . '/../config/database.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();


//fetch current user from database
if (isset($_SESSION['user-id'])) {
    $id = filter_var($_SESSION['user-id'], FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT avatar FROM users WHERE id=$id";
    $result = mysqli_query($connection, $query);
    $avatar = mysqli_fetch_assoc($result);
}
?>



<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= ROOT_URL ?>css/style.css">
    <title>CryTec Blog</title>
    <link rel="icon" type="image/png" href="<?= ROOT_URL ?>favicon.png">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
        integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>


</head>

<body class="flex min-h-screen flex-col">
    <header>
        <div class="logo flex items-center">
            <img class="m-2" src="<?= ROOT_URL ?>img/logo.png" alt="Website logo" width="50" height="50">
            <h2 class="font-bold text-xl">CryTec</h2>
        </div>

        <button class="mobile-nav-toggle" aria-controls="primary-navigation" aria-expanded="false">
            <span class="sr-only">Menu</span>
        </button>

        <nav>
            <!-- Nav Links -->
            <ul id="primary-navigation" data-visible="false"
                class="primary-navigation flex md:items-center text-slate-300 font-barlow">

                <li><a href="<?= ROOT_URL ?>index.php"><span aria-hidden="true">01</span>Home</a></li>
                <li> <a href="<?= ROOT_URL ?>blog.php"><span aria-hidden="true">02</span> Blog</a></li>
                <li><a href="<?= ROOT_URL ?>contact.php"><span aria-hidden="true">03</span>Kontakt</a></li>
                <?php if (!isset($_SESSION['user-id'])) : ?>
                <li><a href="<?= ROOT_URL ?>login.php"><span aria-hidden="true">04</span>Login</a></li>
                <?php endif ?>

                <?php if (isset($_SESSION['user-id'])) : ?>
                <li class="nav__profile relative cursor-pointer avatarDropMenu">
                    <div class="nav_avatar rounded-full overflow-hidden">
                        <img src="<?= ROOT_URL . 'static/images/' . $avatar['avatar'] ?>">
                    </div>


                    <ul class=" bg-highlight px-5 py-4 dropdown" data-visible="false">
                        <li><a href="<?= ROOT_URL ?>admin/dashboard.php">Dashboard</a>
                        </li>
                        <li><a href="<?= ROOT_URL ?>inc/logout.inc.php">Logout</a></li>
                    </ul>
                </li>
                <?php endif ?>

            </ul>
        </nav>
        <script src="<?= ROOT_URL ?>js/nav.js"></script>
    </header>


    <?php

    //echo '<div class="bg-black text-red-700 text-center debug-r mt-1"> ';
    //echo 'Session Debug: </br>';
    //var_dump($_SESSION);
    //echo "</div> ";

    ?>