<?php
include_once "./partials/header.php";
?>




<div class="container mx-auto my-5">

    <div class="bg-primary-blue 
    flex justify-center flex-col items-center 
    w-4/5 mx-auto py-8">
        <h2 class="font-extrabold text-5xl mb-4">Create User</h2>
        <div class="alert-message error my-2">
            <p>This is a error message</p>
        </div>
        <form action="" enctype="multipart/form-data" class="flex flex-col justify-center gap-5 w-2/3">


            <input type="text" placeholder="First Name">
            <input type="text" placeholder="Last Name">
            <input type="text" placeholder="Username">
            <input type="email" placeholder="E-Mail">
            <input type="password" placeholder="Password">
            <select name="test" id="" class="w-40">
                <option value="0">Author</option>
                <option value="1">Admin</option>
            </select>

            <div class="form-control">
                <label for="avatar" class="btn">Add Avatar</label>
                <input type="file" id="avatar">
            </div>


            <button class="btn" type="submit">Create User</button>
        </form>

    </div>
</div>




<?php
include_once "./partials/footer.php";
?>