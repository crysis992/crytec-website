<?php
include_once "partials/header.php";
?>




<div class="loginform">

    <div class="signup flex justify-center flex-col items-center gap-4">
        <h2 class="font-extrabold text-5xl mb-16">Sign Up</h2>
        <div class="alert-message success">
            <p>You are now logged in!</p>
        </div>
        <form action="" class="flex flex-col justify-center w-fit gap-5">

            <input type="text" placeholder="Username or Email">
            <input type="password" placeholder="Password">
            <button class="btn" type="submit">Log in</button>
            <small>Don't have an account? <a href="signup.php" class="text-secondary hover:underline">Register
                    now</a></small>
        </form>
    </div>
</div>




<?php
include_once "partials/footer.php";
?>