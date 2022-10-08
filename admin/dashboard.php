<?php
include_once "./partials/header.php";
?>

<div class="dashboard container mx-auto w-full">

    <div class="dashboard-container mx-auto w-3/6">
        <aside>
            <ul>
                <li><a href="add-post.php">Add Post</a></li>
                <li><a href="#">Manage Posts</a></li>
                <?php if (isset($_SESSION['user_is_admin'])) : ?>
                <li><a href="add-user.php">Add User</a></li>
                <li><a href="add-category.php">Add Category</a></li>
                <li><a href="#manage">Manage Categories</a></li>
                <?php endif ?>
            </ul>
        </aside>
        <main>

            <h2>Manage Categories</h2>

            <table>

                <thead>

                    <tr>
                        <th>Title</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>

                </thead>

                <tbody>
                    <tr>
                        <td>Travel</td>
                        <td><a href="edit" class="btn">Edit</a></td>
                        <td><a href="edit" class="btn">Delete</a></td>
                    </tr>
                    <tr>
                        <td>Gaming</td>
                        <td><a href="edit" class="btn">Edit</a></td>
                        <td><a href="edit" class="btn">Delete</a></td>
                    </tr>
                    <tr>
                        <td>Lifestyle</td>
                        <td><a href="edit" class="btn">Edit</a></td>
                        <td><a href="edit" class="btn">Delete</a></td>
                    </tr>

                </tbody>
            </table>

        </main>
    </div>


</div>



<?php
include_once "./partials/footer.php";
?>