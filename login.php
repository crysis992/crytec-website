<?php
include_once "partials/header.php";
?>




<div class="loginform">

    <div class="signup flex justify-center flex-col items-center gap-4">
        <h2 class="font-extrabold text-5xl mb-16">Log in</h2>


        <?php if (isset($_SESSION['signup-success'])) : ?>
        <div class="alert-message success">
            <p>
                <?= $_SESSION['signup-success'];
                    unset($_SESSION['signup-success']);
                    ?>
            </p>
        </div>
        <?php endif ?>

        <?php if (isset($_SESSION['login-error'])) : ?>
        <div class="alert-message error">
            <p>
                <?= $_SESSION['login-error'];
                    unset($_SESSION['login-error']);
                    ?>
            </p>
        </div>
        <?php endif ?>

        <form action="<?= ROOT_URL ?>inc/login.inc.php" method="POST" class="flex flex-col justify-center w-fit gap-5">

            <input type="text" name="username_email" placeholder="Username or Email">
            <input type="password" name="password" placeholder="Password">
            <button class="btn green" name="submit" type="submit">Log in</button>
            <small>Don't have an account? <a href="signup.php" class="text-secondary hover:underline">Register
                    now</a></small>
        </form>
    </div>
</div>




<?php
include_once "partials/footer.php";
?>