<?php
include_once "partials/header.php";

if (!isset($_GET['id'])) {
    //$_SESSION['blog-error'] = "This post does no longer exist!";
    //header('location: ' . ROOT_URL . "error.php");
}
$post_id = $_GET['id'];

$post_query = $connection->query("SELECT * FROM posts WHERE id=$post_id");
$post = mysqli_fetch_assoc($post_query);

$author_id = $post['author_id'];
$author_query = $connection->query("SELECT * FROM users WHERE id=$author_id");
$author = mysqli_fetch_assoc($author_query);

?>


<div class="singlepost bg-primary w-11/12 mx-auto my-10">



    <section class="singlepost-content mx-auto w-full md:w-5/12 py-6">
        <h2 class="font-bold text-5xl"><?= $post['title'] ?></h2>

        <div class="post-author">
            <div class="post-author-avatar">
                <img src="<?= ROOT_URL ?>static/images/<?= $author['avatar'] ?>">
            </div>
            <div class=" post-author-info">
                <h5>By: <?= $author['username'] ?></h5>
                <small><?= $post['date']  ?></small>
            </div>
        </div>

        <div class="singlepost-thumbnail mb-10 mt-5 mx-auto">
            <img src="<?= ROOT_URL ?>static/thumbnails/<?= $post['thumbnail'] ?>">
        </div>
        <?= $post['body'] ?>

    </section>

</div>

<?php
include_once "partials/footer.php";
?>