<?php
include_once "partials/header.php";
?>

<style>
body {
    background: linear-gradient(#141e30, #243b55);
}
</style>


<div class="loginform">

    <div class="flex justify-center flex-col items-center gap-4">
        <h2 class="font-extrabold text-5xl mb-16">Log in</h2>


        <?php if (isset($_SESSION['signup-success'])) : ?>
        <div class="alert-message success">
            <p>
                <?= $_SESSION['signup-success'];
                    unset($_SESSION['signup-success']);
                    ?>
            </p>
        </div>
        <?php elseif (isset($_SESSION['login-error'])) : ?>
        <div class="alert-message error">
            <p>
                <?= $_SESSION['login-error'];
                    unset($_SESSION['login-error']);
                    ?>
            </p>
        </div>
        <?php endif ?>

        <form action="<?= ROOT_URL ?>inc/login.inc.php" method="POST" class="flex flex-col justify-center w-fit gap-5">
            <div class="user-box">
                <input type="text" name="username_email" id="username" placeholder="Username">
            </div>
            <div class="user-box">
                <input type="password" name="password" id="password" placeholder="Password">
            </div>
            <button class="btn green" name="submit" type="submit">Log in</button>
            <small>Don't have an account? <a href="signup.php" class="text-secondary hover:underline">Register
                    now</a></small>
        </form>
    </div>
</div>




<?php
include_once "partials/footer.php";
?>