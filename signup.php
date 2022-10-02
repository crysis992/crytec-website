<?php
include_once "partials/header.php";
?>




<div class="container mx-auto my-5">

    <div class="signup bg-primary-blue flex justify-center flex-col items-center w-2/5 mx-auto py-8">
        <h2>Sign Up</h2>
        <div class="alert-message success">
            <p>This is a error message</p>
        </div>
        <form action="<?= ROOT_URL ?>inc/signup.inc.php" enctype="multipart/form-data" method="post" class="flex flex-col justify-center w-fit gap-5">

            <input type="text" name="firstname" placeholder="First Name">
            <input type="text" name="lastname" placeholder="Last Name">
            <input type="text" name="username" placeholder="Username">
            <input type="email" name="email" placeholder="E-Mail">
            <input type="password" name="createpassword" placeholder="Create Password">
            <input type="password" name="confirmpassword" placeholder="Confirm Password">



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