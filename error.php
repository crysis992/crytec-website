<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="h-screen flex justify-center flex-col">

    <div class="container mx-auto">
        <section class="bg-slate-900 w-2/5 mx-auto">
            <h1 class="text-5xl text-center py-1">Error!</h1>

            <?php if (isset($_SESSION['blog-error'])) : ?>
                <div class="alert-message error">
                    <p>
                        <?= $_SESSION['blog-error'];
                        unset($_SESSION['blog-error']);
                        ?>
                    </p>
                </div>
            <?php endif ?>
        </section>
    </div>


</body>

</html>