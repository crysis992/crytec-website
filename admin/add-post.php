<?php
include_once "./partials/header.php";


$query_categories = "SELECT * FROM categories";
$category_query = mysqli_query($connection, $query_categories);


$title = $_SESSION['add-post-data']['title'] ?? null;
$description = $_SESSION['add-post-data']['body'] ?? null;
// delete session
unset($_SESSION['add-post-data']);


?>

<div class="form-container">
    <h2>Add new post</h2>
    <?php if (isset($_SESSION['add-post'])) : ?>
    <div class="alert-message error">
        <p>
            <?= $_SESSION['add-post'];
                unset($_SESSION['add-post']);
                ?>
        </p>
    </div>
    <?php endif ?>

    <form action="<?= ROOT_URL ?>inc/addpost.inc.php" method="POST" enctype="multipart/form-data"
        class="flex flex-col justify-center gap-5 w-2/3">

        <input type="text" name="title" placeholder="Title" class="w-96">
        <select name="category" class="w-40">
            <?php while ($category = mysqli_fetch_assoc($category_query)) : ?>
            <option value="<?= $category['id'] ?>"><?= $category['title'] ?></option>
            <?php endwhile ?>
        </select>

        <textarea name="body" class="resize-none" rows="20" placeholder="Body" id="editor"></textarea>
        <?php if (isset($_SESSION['user_is_admin'])) : ?>
        <div class="form-control">
            <input type="checkbox" name="is_featured" id="is_featured" value="1">
            <label for="is_featured">Featured</label>
        </div>
        <?php endif ?>
        <div class="form-control">
            <label for="thumbnail" class="btn">Add Thumbnail</label>
            <input type="file" name="thumbnail" id="thumbnail">
        </div>


        <button class="btn" name="submit" type="submit">Publish Post</button>
    </form>

</div>

<script src="../js/editor/ckeditor.js"></script>
<script>
ClassicEditor
    .create(document.querySelector('#editor'))
    .catch(error => {
        console.error(error);
    });
</script>

<?php
include_once "./partials/footer.php";
?>