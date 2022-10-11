<?php
include_once "./partials/header.php";

//fetch userlist from database

$current_admin_id = $_SESSION['user-id'];

$query = "SELECT * FROM users";
$users = mysqli_query($connection, $query);

?>

<div class="ad-dashboard">

    <div class="admin-sidebar">
        <nav>
            <ul>
                <li><a href="add-post.php">Add Post</a></li>
                <li><a href="dashboard.php">Manage Posts</a></li>
                <?php if (isset($_SESSION['user_is_admin'])) : ?>
                <li><a href="userlist.php">Userlist</a></li>
                <li><a href="categories.php">Categories</a></li>
                <?php endif ?>
            </ul>

        </nav>
    </div>


    <div class="admin-container">

        <div class="adc-head">
            <h2>Userlist</h2>
            <button class="btn green"> <a href="add-user.php">Add new User</a></button>
        </div>
        <div class="admin-container-content">
            <table>
                <thead>
                    <tr>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Admin</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                    <?php while ($user = mysqli_fetch_assoc($users)) : ?>
                    <tr>
                        <td><?= $user['username'] ?></td>
                        <td><?= $user['email'] ?></td>
                        <td class="cursor-default"><?= $user['is_admin'] ? 'Yes' : 'No' ?></td>
                        <td><?= $user['firstname'] ?></td>
                        <td><?= $user['lastname'] ?></td>
                        <td class="w-10 flex gap-1">
                            <?php if ($user['id'] == $current_admin_id) : ?>
                            <a href="" class="btn disabled">Edit</a>
                            <a href="" class="btn disabled">Delete</a>
                            <?php else : ?>
                            <a href="edit-user.php?id=<?= $user['id'] ?>" class="btn green">Edit</a>
                            <a href="../inc/delete-user.inc.php?id=<?= $user['id'] ?>" class="btn red">Delete</a>
                        </td>
                        <?php endif ?>

                    </tr>

                    <?php endwhile ?>
                </tbody>
            </table>



        </div>
    </div>
</div>

<?php
include_once "./partials/footer.php";
?>