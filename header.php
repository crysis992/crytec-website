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





</head>

<body class="bg-body-bg text-white w-full m-0 p-0 font-bellefair">

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

                <li class="active"><a href="index.html"><span aria-hidden="true">01</span>Home</a></li>
                <li> <a href="#blog"><span aria-hidden="true">02</span> News</a></li>
                <li><a href="#projects"><span aria-hidden="true">03</span>My Projects</a></li>
                <li><a href="#contact"><span aria-hidden="true">04</span>Kontakt</a></li>
                <li><a href="/portfolio"><span aria-hidden="true">05</span>Portfolio</a></li>
                <li><a href="login.php"><span aria-hidden="true">06</span>Login</a></li>

            </ul>
        </nav>
        <script src="js/nav.js"></script>
    </header>