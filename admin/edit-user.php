<?php
include_once "./partials/header.php";

if (!isset($_GET['id'])) {
    header('location: ' . ROOT_URL . 'admin/userlist.php');
    die();
}

$id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
$query = "SELECT * FROM users WHERE id=$id";
$result = mysqli_query($connection, $query);
$user = mysqli_fetch_assoc($result);
?>




<div class="container mx-auto my-5">

    <div class="bg-primary-blue 
    flex justify-center flex-col items-center 
    w-4/5 mx-auto py-8">
        <div class="edit-title flex flex-col justify-center items-center mb-10">
            <h2 class="font-extrabold text-4xl">Editing User</h2>
            <span class="text-green-200"><?= $user['firstname'] ?>
                <?= $user['lastname'] ?></span>

        </div>

        <div class="flex flex-col justify-center items-center">
            <label for="avatar">
                <img class="avatar cursor-pointer" src="../static/images/<?= $user['avatar'] ?>" alt="Avatar"></label>
            <p class="font-bold">Editing user ID <?= $user['id'] ?></p>
        </div>


        <div class="alert-message error my-2">
            <p>This is a error message</p>
        </div>


        <form action="<?= ROOT_URL ?>inc/admin-edituser.inc.php" method="POST" enctype="multipart/form-data"
            class="flex flex-col justify-center gap-5 w-2/3">


            <input type="text" name="firstname" value="<?= $user['firstname'] ?>">
            <input type="text" name="lastname" value="<?= $user['lastname'] ?>">
            <input type="password" placeholder="Password">
            <select name="userrole" id="" class="w-40">
                <option value="0">Author</option>
                <option value="1">Admin</option>
            </select>

            <div class="form-control">
                <input type="file" id="avatar">
            </div>


            <button class="btn green" type="submit">Update User</button>
        </form>

    </div>
</div>




<?php
include_once "./partials/footer.php";
?>