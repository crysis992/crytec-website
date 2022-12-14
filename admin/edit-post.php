<?php
include_once "./partials/header.php";

if (!isset($_GET['id'])) {
    header('location: ' . ROOT_URL . 'admin/dashboard.php');
    die();
}

$id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
$categories = $connection->query("SELECT * from categories;");

$postres = $connection->query("SELECT * from posts WHERE id=$id");
$post = mysqli_fetch_assoc($postres);

?>


<div class="form-container">
    <h2>Edit post</h2>

    <?php if (isset($_SESSION['add-post'])) : ?>
    <div class="alert-message error">
        <p>
            <?= $_SESSION['add-post'];
                unset($_SESSION['add-post']);
                ?>
        </p>
    </div>
    <?php endif ?>

    <form action="<?= ROOT_URL ?>inc/admin-edit-post.inc.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $post['id'] ?>">
        <input type="hidden" name="prev_thumbnail" value="<?= $post['thumbnail'] ?>">
        <input type="text" name="title" placeholder="Title" value="<?= $post['title'] ?>">
        <select name="category_id">
            <?php while ($category = mysqli_fetch_assoc($categories)) : ?>
            <option value=" <?= $category['id'] ?>" <?php if ($category['id'] == $post['category_id']) : ?>
                selected="selected" <?php endif ?>><?= $category['title'] ?></option>
            <?php endwhile ?>
        </select>

        <textarea name="body" id="editor" rows="10" placeholder="Body"><?= $post['body'] ?></textarea>
        <div class="form-control">
            <input type="checkbox" id="is_featured" name="is_featured" value="1">
            <label for="is_featured">Featured</label>
        </div>
        <div class="form-control">
            <label for="thumbnail" class="btn">Change Thumbnail</label>
            <input type="file" name="thumbnail" id="thumbnail">
        </div>


        <button class="btn" name="submit" type="submit">Update Post</button>
    </form>

</div>

<script src="../js/editor/ckeditor.js"></script>
<script>
ClassicEditor
    .create(document.querySelector('#editor'), {
        mediaEmbed: {
            previewsInData: true
        },
    })
    .catch(error => {
        console.error(error);
    });
</script>

<?php
include_once "./partials/footer.php";
?>