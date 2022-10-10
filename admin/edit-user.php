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


<div class="form-container">
    <h2>Editing User</h2>

    <?php if (isset($_SESSION['edit-user-success'])) : ?>
    <div class="alert-message success" id="alert-message">
        <p>
            <?= $_SESSION['edit-user-success'];
                unset($_SESSION['edit-user-success']);
                ?>
        </p>
    </div>
    <?php elseif (isset($_SESSION['edit-user'])) : ?>
    <div class="alert-message error" id="alert-message">
        <p>
            <?= $_SESSION['edit-user'];
                unset($_SESSION['edit-user']);
                ?>
        </p>
    </div>
    <?php endif ?>

    <div class="flex flex-col justify-center items-center mb-4">
        <span class="text-green-200 text-lg"><?= $user['firstname'] ?>
            <?= $user['lastname'] ?></span>
        <div class="flex flex-col justify-center items-center">
            <label for="avatar">
                <img class="avatar cursor-pointer" src="../static/images/<?= $user['avatar'] ?>" alt="Avatar"></label>
        </div>
    </div>





    <form action="<?= ROOT_URL ?>inc/admin-edituser.inc.php" method="POST" enctype="multipart/form-data">


        <input type="hidden" name="id" value="<?= $user['id'] ?>">
        <input type="text" name="firstname" placeholder="Firstname" value="<?= $user['firstname'] ?>">
        <input type="text" name="lastname" placeholder="Lastname" value="<?= $user['lastname'] ?>">
        <input type="password" name="password" placeholder="Password">
        <select name="userrole" value="<?= $user['is_admin'] ?>">
            <option value=" 0">Author
            </option>
            <option value="1" <?php if ($user['is_admin'] == 1) : ?> selected="selected" <?php endif ?>>Admin
            </option>
        </select>

        <div class="form-control">
            <input type="file" id="avatar"">
            </div>


            <button class=" btn green" type="submit">Update User</button>
    </form>




</div>


<script>
const error = document.getElementById('alert-message');
if (error) {
    setTimeout(() => {
        error.style.display = 'none';
    }, 5000);
}
</script>

<?php
include_once "./partials/footer.php";
?>