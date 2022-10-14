<?php
include_once "partials/header.php";

if (!isset($_GET['search']) || !isset($_GET['submit'])) {
    header('location: ' . ROOT_URL . "blog.php");
    die();
}

$search = filter_var($_GET['search'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$query = "SELECT * FROM posts WHERE title LIKE '%$search%' ORDER BY date DESC";
$posts = mysqli_query($connection, $query);

$users = array();
$user_avatars = array();
$category_names = array();

$user_query = "SELECT id, username, avatar FROM users;";

foreach ($connection->query($user_query) as $index => $row) {
    $users[$row['id']] = $row['username'];
    $user_avatars[$row['id']] = $row['avatar'];
}



$category_query = "SELECT id, title FROM categories";

foreach ($connection->query($category_query) as $index => $row) {
    $category_names[$row['id']] = $row['title'];
}

?>

<!-- List all Posts -->

<div class="container posts mx-auto my-6">


    <?php while ($post = $posts->fetch_assoc()) : ?>

    <article class="post-article w-[300px] md:w-[355px] mb-10 md:mb-0">
        <div class="post-thumbnail"> <img src="<?= ROOT_URL ?>static/thumbnails/<?= $post['thumbnail'] ?>"> </div>

        <div class="post-info">
            <div class="flex gap-6 mb-4">
                <a href="<?= ROOT_URL ?>category-posts.php?id=<?= $post['category_id'] ?>"
                    class="btn"><?= $category_names[$post['category_id']] ?></a>
                <h2><a href="post.php?id=<?= $post['id'] ?>"><?= $post['title'] ?></a></h2>
            </div>
            <div class="post-body hidden md:block">
                <p><?= $post['body'] ?></p>
            </div>

        </div>

        <div class="post-author">
            <div class="post-author-avatar">
                <img src="<?= ROOT_URL ?>static/images/<?= $user_avatars[$post['author_id']] ?>">
            </div>

            <div class=" post-author-info">
                <h5>By: <?= $users[$post['author_id']] ?></h5>
                <small><?= $post['date']  ?></small>
            </div>

        </div>


    </article>

    <?php endwhile ?>

</div>

<!-- END POSTS -->

<?php
include_once "partials/footer.php";
?>