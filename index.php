<?php
include_once "partials/header.php";


// fetch featured post from database

$featured_query = $connection->query("SELECT * FROM posts WHERE is_featured=1");
$featured = mysqli_fetch_assoc($featured_query);



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


//Fetch latest 9 Posts
$post_query = "SELECT * from posts ORDER BY date DESC LIMIT 9";
$post_result = mysqli_query($connection, $post_query);


?>

<!-- START Featured Post -->
<?php if (mysqli_num_rows($featured_query) == 1) : ?>
    <section class="container mx-auto featured-post">
        <div class="featured-thumbnail"><img src="<?= ROOT_URL ?>static/thumbnails/<?= $featured['thumbnail'] ?>"></div>
        <div class="featured-post-info">
            <a href="" class="btn"><?= $category_names[$featured['category_id']] ?></a>
            <h2 class="post-title"><a href="post.html"><?= $featured['title'] ?></a></h2>
            <p class="post-body"><?= $featured['body'] ?></p>
            <div class="post-author">
                <div class="post-author-avatar">
                    <img src="<?= ROOT_URL ?>static/images/<?= $user_avatars[$featured['author_id']] ?>">
                </div>
                <div class=" post-author-info">
                    <h5>By: <?= $users[$featured['author_id']] ?></h5>
                    <small><?= $featured['date']  ?></small>
                </div>
            </div>
        </div>



    </section>

<?php endif ?>
<!-- END Featured Post -->


<!-- List all Posts -->

<div class="container posts mx-auto">


    <?php while ($post = mysqli_fetch_assoc($post_result)) : ?>

        <article class="post-article w-[300px] md:w-[355px] mb-10 md:mb-0">
            <div class="post-thumbnail"> <img src="<?= ROOT_URL ?>static/thumbnails/<?= $post['thumbnail'] ?>"> </div>

            <div class="post-info">
                <div class="flex gap-6 mb-4">
                    <a href="" class="btn"><?= $category_names[$post['category_id']] ?></a>
                    <h2><a href="post.html"><?= $post['title'] ?></a></h2>
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



<!-- Category Buttons -->
<section class="relative category-buttons px-14 mx-auto flex justify-center py-5 mb-5 md:w-7/12">
    <div class="container category-button-container font-bold flex flex-wrap flex-grow items-center justify-center gap-2 pb-3">

        <?php foreach ($category_names as $cat => $v) : ?>
            <a href="" class="btn"><?= $v ?></a>
        <?php endforeach ?>

    </div>
</section>


<?php
include_once "partials/footer.php";
?>