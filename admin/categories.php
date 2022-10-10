<?php
include_once "./partials/header.php";

//fetch userlist from database

$current_admin_id = $_SESSION['user-id'];

$query = "SELECT * FROM categories ORDER by title";
$users = mysqli_query($connection, $query);



?>


<div class="ad-dashboard">

    <div class="admin-sidebar">
        <nav>
            <ul>
                <li><a href="add-post.php">Add Post</a></li>
                <li><a href="#">Manage Posts</a></li>
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
            <button class="btn green"> <a href="add-category.php">Add Category</a></button>
        </div>
        <div class="admin-container-content">
            <table>
                <thead>
                    <tr>
                        <th>Category</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                    <?php while ($user = mysqli_fetch_assoc($users)) : ?>
                    <tr>
                        <td><?= $user['title'] ?></td>
                        <td><?= $user['description'] ?></td>
                        <td class="w-10 flex gap-1">
                            <a href="edit-category.php?id=<?= $user['id'] ?>" class="btn green">Edit</a>
                            <a href="../inc/admin-delete-category.inc.php?id=<?= $user['id'] ?>"
                                class="btn red">Delete</a>
                        </td>
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