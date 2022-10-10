<?php
include_once "./partials/header.php";
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
            <h2>Dashboard</h2>
        </div>
        <div class="admin-container-content">

            <p>
                Welcome to the admin dashboard
            </p>



        </div>
    </div>
</div>

<?php
include_once "./partials/footer.php";
?>