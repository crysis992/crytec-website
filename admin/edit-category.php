<?php
include_once "./partials/header.php";

if (!isset($_GET['id'])) {
    header('location: ' . ROOT_URL . 'admin/categories.php');
    die();
}

$id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

echo "ID: " . $id;

$query = "SELECT * FROM categories WHERE id=$id";
$result = mysqli_query($connection, $query);
$category = mysqli_fetch_assoc($result);
?>




<div class="form-container">
    <h2>Edit Category</h2>

    <?php if (isset($_SESSION['edit-category'])) : ?>
    <div class="alert-message error" id="alert-message">
        <p>
            <?= $_SESSION['edit-category'];
                unset($_SESSION['edit-category']);
                ?>
        </p>
    </div>
    <?php elseif (isset($_SESSION['edit-category-success'])) : ?>
    <div class="alert-message success" id="alert-message">
        <p>
            <?= $_SESSION['edit-category-success'];
                unset($_SESSION['edit-category-success']);
                ?>
        </p>
    </div>
    <?php endif ?>

    <form action="<?= ROOT_URL ?>inc/admin-edit-category.inc.php" method="POST">

        <input type="hidden" name="id" value="<?= $category['id'] ?>">
        <input type="text" name="title" value="<?= $category['title'] ?>" placeholder=" Title">
        <textarea rows="4" name="description" placeholder="Description"
            autocomplete="off"><?= $category['description'] ?></textarea>
        <button class="btn green" name="submit" type="submit">Edit</button>
    </form>
</div>

<?php
include_once "./partials/footer.php";
?>