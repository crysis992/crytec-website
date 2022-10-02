<?php
include_once "./partials/header.php";
?>




<div class="container mx-auto my-5">

    <div class="bg-primary-blue 
    flex justify-center flex-col items-center 
    w-4/5 mx-auto py-8">
        <h2 class="font-extrabold text-5xl mb-4">Edit post</h2>
        <form action="" enctype="multipart/form-data" class="flex flex-col justify-center gap-5 w-2/3">

            <input type="text" placeholder="Title" class="w-96">
            <select name="" id="" class="w-40">
                <option value="1">Gaming</option>
                <option value="1">Tech</option>
                <option value="1">Blub</option>
            </select>

            <textarea name="" id="" rows="10" placeholder="Body"></textarea>
            <div class="form-control">
                <input type="checkbox" id="is_featured">
                <label for="is_featured">Featured</label>
            </div>
            <div class="form-control">
                <label for="thumbnail" class="btn">Change Thumbnail</label>
                <input type="file" id="thumbnail">
            </div>


            <button class="btn" type="submit">Update Post</button>
        </form>

    </div>
</div>




<?php
include_once "./partials/footer.php";
?>