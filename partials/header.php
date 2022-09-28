<?php

include "config/database.php";
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

?>

<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>CryTec.net</title>
    <link rel="icon" type="image/png" href="favicon.png">

    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@400;700&family=Bellefair&display=swap" rel="stylesheet">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />


</head>

<body class="bg-body-bg text-white m-0 p-0 font-bellefair">

    <header class="flex justify-between items-center font-barlow">



        <!-- Logo -->
        <div class="logo flex items-center">
            <img class="m-2" src="img/logo.png" alt="Website logo" width="50px" height="50px">
            <h2 class="font-bold text-xl">CryTec</h2>
        </div>

        <button class="mobile-nav-toggle" aria-controls="primary-navigation" aria-expanded="false">
            <span class="sr-only">Menu</span>
        </button>

        <nav>
            <!-- Nav Links -->
            <ul id="primary-navigation" data-visible="false" class="primary-navigation flex md:items-center gap-4">

                <li class="active"><a href="<?= ROOT_URL ?>index.php"><span aria-hidden="true">01</span>Home</a></li>
                <li> <a href="<?= ROOT_URL ?>about.php"><span aria-hidden="true">02</span> About</a></li>
                <li><a href="<?= ROOT_URL ?>projects.php"><span aria-hidden="true">03</span>My Projects</a></li>
                <li><a href="<?= ROOT_URL ?>contact.php"><span aria-hidden="true">04</span>Kontakt</a></li>


                <li class="nav__profile relative cursor-pointer avatarDropMenu">
                    <div class="nav_avatar rounded-full overflow-hidden">
                        <img src="./img/logo.png"">
                    </div>


                    <ul class=" bg-primary-blue px-5 py-4 dropdown" data-visible="false">
                <li><a href=" dashboard.html">Dashboard</a>
                </li>
                <li><a href="logout.html">Logout</a></li>
            </ul>
            </li>


            </ul>
        </nav>
        <script src="js/nav.js"></script>
    </header>