<?php
include_once "partials/header.php";
?>




<div class="container mx-auto my-5">

    <div class="signup bg-primary-blue flex justify-center flex-col items-center w-2/5 mx-auto py-8">
        <h2>Sign Up</h2>
        <div class="alert-message success">
            <p>This is a error message</p>
        </div>
        <form action="" class="flex flex-col justify-center w-fit gap-5">

            <input type="text" placeholder="First Name">
            <input type="text" placeholder="Last Name">
            <input type="text" placeholder="Username">
            <input type="email" placeholder="E-Mail">
            <input type="password" placeholder="Create Password">
            <input type="password" placeholder="Confirm Password">



            <div class="form-control">
                <label for="avatar" class="btn">Browse</label>
                <input type="file" id="avatar">
                <span>Upload Avatar</span>
            </div>
            <button class="btn" type="submit">Sign Up</button>
            <small>Already have an account? <a href="login.php" class="hover:text-light underline">Log in</a></small>


        </form>

    </div>
</div>




<?php
include_once "partials/footer.php";
?>