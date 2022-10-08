<?php
include_once "./partials/header.php";


$firstname = $_SESSION['admin-add-data']['firstname'] ?? null;
$lastname = $_SESSION['admin-add-data']['lastname'] ?? null;
$username = $_SESSION['admin-add-data']['username'] ?? null;
$email = $_SESSION['admin-add-data']['email'] ?? null;
$createpassword = $_SESSION['admin-add-data']['password'] ?? null;
// delete session
unset($_SESSION['admin-add-data']);
?>




<div class="container mx-auto my-5">

    <div class="bg-primary-blue 
    flex justify-center flex-col items-center 
    w-4/5 mx-auto py-8">
        <h2 class="font-extrabold text-5xl mb-4">Create User</h2>

        <?php if (isset($_SESSION['admin-error'])) : ?>
        <div class="alert-message error">
            <p>
                <?= $_SESSION['admin-error'];
                    unset($_SESSION['admin-error']);
                    ?>
            </p>
        </div>
        <?php endif ?>
        <form action="<?= ROOT_URL ?>inc/admin-adduser.inc.php" method="POST" enctype="multipart/form-data"
            class="flex flex-col justify-center gap-5 w-2/3">


            <input type="text" name="firstname" placeholder="First Name" value="<?= $firstname ?>">
            <input type="text" name="lastname" placeholder="Last Name" value="<?= $lastname ?>">
            <input type="text" name="username" placeholder="Username" value="<?= $username ?>">
            <input type="email" name="email" placeholder="E-Mail" value="<?= $email ?>">
            <input type="password" name="password" placeholder="Password">
            <select name="userrole" class="w-40" value="<?= $userrole ?>">
                <option value="0">Author</option>
                <option value="1">Admin</option>
            </select>

            <div class="form-control">
                <label for="avatar" class="btn">Add Avatar</label>
                <input type="file" name="avatar" id="avatar">
            </div>


            <button class="btn" name="submit" type="submit">Create User</button>
        </form>

    </div>
</div>




<?php
include_once "./partials/footer.php";
?>