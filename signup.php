<?php
include_once "partials/header.php";


// Get form data if there was an registration error

$firstname = $_SESSION['signup-data']['firstname'] ?? null;
$lastname = $_SESSION['signup-data']['lastname'] ?? null;
$username = $_SESSION['signup-data']['username'] ?? null;
$email = $_SESSION['signup-data']['email'] ?? null;
$createpassword = $_SESSION['signup-data']['createpassword'] ?? null;
$confirmpassword = $_SESSION['signup-data']['confirmpassword'] ?? null;
// delete session
unset($_SESSION['signup-data']);
?>




<div class="loginform">

    <div class="signup flex justify-center flex-col items-center gap-4">
        <h2>Sign Up</h2>

        <?php if (isset($_SESSION['signup'])) : ?>


        <div class="alert-message error">
            <p>
                <?= $_SESSION['signup'];
                    unset($_SESSION['signup']);
                    ?>
            </p>

        </div>

        <?php endif ?>






        <form action="<?= ROOT_URL ?>inc/signup.inc.php" enctype="multipart/form-data" method="post"
            class="flex flex-col justify-center w-fit gap-5">

            <input type="text" name="firstname" value="<?= $firstname ?>" placeholder="First Name">
            <input type="text" name="lastname" value="<?= $lastname ?>" placeholder="Last Name">
            <input type="text" name="username" value="<?= $username ?>" placeholder="Username">
            <input type="email" name="email" value="<?= $email ?>" placeholder="E-Mail">
            <input type="password" name="createpassword" value="<?= $createpassword ?>" placeholder="Create Password">
            <input type="password" name="confirmpassword" value="<?= $confirmpassword ?>"
                placeholder="Confirm Password">



            <div class="form-control">
                <label for="avatar" name="avatar" class="btn">Browse</label>
                <input type="file" id="avatar" name="avatar">
                <span>Upload Avatar</span>
            </div>
            <button class="btn" name="submit" type="submit">Sign Up</button>
            <small>Already have an account? <a href="login.php" class="hover:text-light underline">Log in</a></small>


        </form>

    </div>
</div>




<?php
include_once "partials/footer.php";
?>