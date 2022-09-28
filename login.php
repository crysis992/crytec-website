<?php
include_once "partials/header.php";
?>




<div class="container mx-auto my-5 debug-r">

    <div class="debug-y signup bg-primary-blue 
    flex justify-center flex-col items-center 
    w-2/5 mx-auto py-8">
        <h2 class="font-extrabold text-5xl mb-4">Sign Up</h2>
        <div class="alert-message success my-2">
            <p>This is a error message</p>
        </div>
        <form action="" class="flex flex-col justify-center w-fit gap-5">

            <input type="text" placeholder="Username or Email">
            <input type="password" placeholder="Password">
            <button class="btn" type="submit">Log in</button>
            <small>Don't have an account? <a href="signup.php" class="hover:text-light underline">Register now</a></small>


        </form>

    </div>
</div>




<?php
include_once "partials/footer.php";
?>