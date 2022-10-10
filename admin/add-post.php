<?php
include_once "./partials/header.php";


$query_categories = "SELECT * FROM categories";
$category_query = mysqli_query($connection, $query_categories);


$title = $_SESSION['add-post-data']['title'] ?? null;
$description = $_SESSION['add-post-data']['body'] ?? null;
// delete session
unset($_SESSION['add-post-data']);


?>

<div class="container mx-auto my-5">

    <div class="bg-primary-blue 
    flex justify-center flex-col items-center 
    w-4/5 mx-auto py-8">
        <h2 class="font-extrabold text-5xl mb-4">Add new post</h2>
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

            <textarea name="body" class="resize-none" rows="10" placeholder="Body" id="editor"></textarea>
            <?php if (isset($_SESSION['user_is_admin'])) : ?>
            <div class="form-control">
                <input type="checkbox" name="is_featured" value="1" id="is_featured" checked>
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
</div>


<?php
include_once "./partials/footer.php";
?>