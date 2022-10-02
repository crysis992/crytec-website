<?php
include_once "./partials/header.php";
?>




<div class="container mx-auto my-5">

    <div class="signup bg-primary-blue 
    flex justify-center flex-col items-center 
    w-2/5 mx-auto py-8">
        <h2 class="font-extrabold text-5xl mb-4">Edit Category</h2>
        <div class="alert-message error my-2">
            <p>This is a error message</p>
        </div>
        <form action="" enctype="multipart/form-data" class="flex flex-col justify-center w-fit gap-5">

            <input type="text" placeholder="Title">
            <textarea name="" id="" rows="4" placeholder="Description"></textarea>
            <button class="btn" type="submit">Edit</button>
        </form>

    </div>
</div>




<?php
include_once "./partials/footer.php";
?>