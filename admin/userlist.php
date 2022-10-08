<?php
include_once "./partials/header.php";

//fetch userlist from database

$current_admin_id = $_SESSION['user-id'];

$query = "SELECT * FROM users WHERE NOT id=$current_admin_id";
$users = mysqli_query($connection, $query);



?>

<div class="dashboard container mx-auto w-full relative">


    <div class="dashboard-container mx-auto">
        <aside>
            <ul>
                <li><a href="add-post.php">Add Post</a></li>
                <li><a href="#">Manage Posts</a></li>
                <?php if (isset($_SESSION['user_is_admin'])) : ?>
                <li><a href="userlist.php">User list</a></li>
                <li><a href="add-category.php">Add Category</a></li>
                <li><a href="#manage">Manage Categories</a></li>
                <?php endif ?>
            </ul>
        </aside>
        <main>

            <div class="title flex items-center justify-between my-3">
                <span class="text-xl font-bold mx-auto">Registrered Users</span>
                <button class="btn green"> <a href="add-user.php">Add new User</a></button>
            </div>



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
                            <a href="edit-user.php?id=<?= $user['id'] ?>" class="btn green">Edit</a>
                            <a href="edit" class="btn red">Delete</a>
                        </td>
                    </tr>

                    <?php endwhile ?>
                </tbody>
            </table>

        </main>
    </div>
</div>

<?php
include_once "./partials/footer.php";
?>