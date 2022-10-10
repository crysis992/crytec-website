<?php
include_once "./partials/header.php";

$title = $_SESSION['add-category-data']['title'] ?? null;
$description = $_SESSION['add-category-data']['description'] ?? null;
// delete session
unset($_SESSION['add-category-data']);

if (isset($description)) {
    echo "VALUE HERE!";
}

?>


<div class="form-container">
    <h2>Add Category</h2>
    <?php if (isset($_SESSION['add-category'])) : ?>
    <div class="alert-message error">
        <p>
            <?= $_SESSION['add-category'];
                unset($_SESSION['add-category']);
                ?>
        </p>
    </div>
    <?php endif ?>
    <form action="<?= ROOT_URL ?>inc/admin-addcategory.php" method="POST">

        <input type="text" name="title" placeholder="Title" value="<?= $title ?>">
        <textarea name="description" rows=" 4" placeholder="Description"
            autocomplete="off"><?php if (isset($description)) : ?><?= $description ?><?php endif ?></textarea>
        <button class="btn green" name="submit" type="submit">Add</button>
    </form>

</div>
<?php
include_once "./partials/footer.php";
?>