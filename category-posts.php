<?php
include_once "partials/header.php";

if (!isset($_GET['id'])) {
    header('location: ' . ROOT_URL);
}

$id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
$query = "SELECT * FROM posts WHERE category_id = $id ORDER BY date DESC";
$result = mysqli_query($connection, $query);

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


<header class="category-title bg-primary py-14 md:py-16 mt-14 shadow-ct w-11/12 md:w-3/6 mx-auto rounded-xl border
    border-secondary mb-6">
    <h2 class="text-5xl font-extrabold font-barlow text-center mx-auto"><?= $category_names[$id] ?></h2>
</header>


<!-- List all Posts -->

<div class="container posts mx-auto mb-6">


    <?php while ($post = $result->fetch_assoc()) : ?>
    <article class="post-article w-[300px] md:w-[355px] mb-10 md:mb-0">
        <div class="post-thumbnail"> <img src="<?= ROOT_URL ?>static/thumbnails/<?= $post['thumbnail'] ?>"> </div>

        <div class="post-info">
            <div class="flex gap-6 mb-4">
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