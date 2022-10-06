<?php
include_once "partials/header.php";
?>

<style>
body {
    background: linear-gradient(#141e30, #243b55);
}

.loginform {
    background: rgba(0, 0, 0, .5);
    box-sizing: border-box;
    box-shadow: 0 15px 25px rgba(0, 0, 0, .6);
    border-radius: 10px;
}

.user-box {
    position: relative;
}

.user-box input {
    width: 100%;
    padding: 10px 0;
    font-size: 16px;
    color: #fff;
    margin-bottom: 30px;
    border: none;
    border-bottom: 1px solid #fff;
    outline: none;
    background: transparent;
    border-radius: 0;
}

.user-box label {
    position: absolute;
    top: 0;
    left: 0;
    padding: 10px 0;
    font-size: 16px;
    color: #fff;
    pointer-events: none;
    transition: .5s;
}

.user-box input:focus~label,
.user-box input:valid {
    top: -20px;
    left: 0;
    color: #03e9f4;
    font-size: 12px;
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
            <div class="user-box">
                <input type="text" name="username_email" id="username">
                <label for="username">Username or Email</label>
            </div>
            <div class="user-box">
                <input type="password" name="password" id="password">
                <label for="password">Password</label>
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