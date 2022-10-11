<?php
include_once "./partials/header.php";


// fetch users posts

$current_user_id = $_SESSION['user-id'];
$query = "SELECT id, title, category_id FROM posts WHERE author_id=$current_user_id ORDER by id DESC";
$posts = mysqli_query($connection, $query);

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
            <h2>Dashboard</h2>
        </div>
        <div class="admin-container-content">

            <table>
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                    <?php

                    $array = array();

                    $category_query = "SELECT id, title FROM categories";

                    foreach ($connection->query($category_query) as $index => $row) {
                        $array[$row['id']] = $row['title'];
                    }
                    ?>


                    <?php while ($post = mysqli_fetch_assoc($posts)) : ?>

                    <tr>
                        <td><?= $post['title'] ?></td>
                        <td><?= $array[$post['category_id']] ?></td>
                        <td class="w-10 flex gap-1">
                            <a href="edit-post.php?id=<?= $post['id'] ?>" class="btn green">Edit</a>
                            <a href="<?= ROOT_URL ?>inc/admin-delete-post.inc.php?id=<?= $post['id'] ?>"
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