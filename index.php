<?php
include_once "partials/header.php";
?>

<?php if (isset($_SESSION['user-id'])) : ?>
<section class="welcome mx-auto text-5xl text-green-400">You are now logged in!</section>

<?php endif ?>

<style>
body {
    background: url("img/background.jpg") no-repeat center center fixed;
    background-size: cover;
    font-family: Bellefair, sans-serif;
    position: relative;
}
</style>

<!-- START Featured Post -->
<section class="container featured mt-32 mx-auto">

    <div class="container featured-container bg-primary pt-3 px-2">

        <div class="post-thumbnail">
            <img src="./img/woman-laptop.jpg">
        </div>
        <div class=" post-info">
            <a href="" class="category-button btn font-barlow">Technology</a>
            <h2 class="post-title text-4xl font-bold font-barlow"><a href="post.html">Lorem ipsum dolor sit amet</a>
            </h2>
            <p class="post-body">Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                Ea debitis eius eos ipsam dolores labore, mollitia rem doloremque minus ducimus quas veritatis vero
                sapiente eum accusantium tenetur possimus!
                Illum, similique.
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Magnam assumenda obcaecati velit quas
                optio iste nihil eius facilis.
                Explicabo, doloribus odio? Accusantium veritatis iusto ipsum harum consequuntur quos nemo dolore
                nostrum eaque aliquid! Sit in, quam repellat minus,
                veritatis ducimus obcaecati, magnam eveniet rem itaque voluptatibus vero praesentium consequatur!
                Provident.
            </p>

            <div class="post-author">
                <div class="post-author-avatar">
                    <img src="./img/avatar2.png">
                </div>
                <div class=" post-author-info">
                    <h5>By: Lea Cats</h5>
                    <small>Sep 28 2022 - 01:23</small>
                </div>
            </div>

        </div>

    </div>

</section>
<!-- END Featured Post -->


<!-- List all Posts -->

<section class="posts">


    <div class="container posts-container flex-col md:flex-row">


        <article class="post w-full md:w-3/12 flex items-center flex-col">
            <div class="post-thumbnail">
                <img class=" w-32 md:w-64 lg:w-96" src="./img/gaming.jpg" alt="">
            </div>

            <div class="post-info w-full">
                <a href="" class="btn font-barlow">Gaming</a>
                <h2 class="post-title text-3xl font-bold font-barlow"><a href="post.html">Lorem ipsum dolor sit
                        amet</a></h2>
                <p class="post-body hidden md:block"">Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                    Ea debitis eius eos ipsam dolores labore, mollitia rem doloremque minus ducimus quas veritatis
                    vero sapiente eum accusantium tenetur possimus!
                    Illum, similique.
                </p>
                <div class=" post-author">
                <div class="post-author-avatar">
                    <img src="./img/avatar1.png">png
                </div>
                <div class=" post-author-info">
                    <h5>By: Rabbit Foerby</h5>
                    <small>Sep 28 2022 - 06:23</small>
                </div>
            </div>
    </div>

    </article>

    <article class="post w-full md:w-3/12 flex items-center flex-col">
        <div class="post-thumbnail">
            <img class=" w-32 md:w-64 lg:w-96" src="./img/love.jpg" alt="">
        </div>

        <div class="post-info w-full">
            <a href="" class="btn font-barlow">Lifestyle</a>
            <h2 class="post-title text-3xl font-bold font-barlow"><a href="post.html">Lorem ipsum dolor sit
                    amet</a></h2>
            <p class="post-body hidden md:block"">Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                    Ea debitis eius eos ipsam dolores labore, mollitia rem doloremque minus ducimus quas veritatis
                    vero sapiente eum accusantium tenetur possimus!
                    Illum, similique.
                </p>
                <div class=" post-author">
            <div class="post-author-avatar">
                <img src="./img/avatar1.png">png
            </div>
            <div class=" post-author-info">
                <h5>By: Rabbit Foerby</h5>
                <small>Sep 28 2022 - 06:23</small>
            </div>
        </div>
        </div>

    </article>

    <article class="post w-full md:w-3/12 flex items-center flex-col">
        <div class="post-thumbnail">
            <img class=" w-32 md:w-64 lg:w-96" src="./img/love2.jpg" alt="">
        </div>

        <div class="post-info w-full">
            <a href="" class="btn font-barlow">News</a>
            <h2 class="post-title text-3xl font-bold font-barlow"><a href="post.html">Lorem ipsum dolor sit
                    amet</a></h2>
            <p class="post-body hidden md:block"">Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                    Ea debitis eius eos ipsam dolores labore, mollitia rem doloremque minus ducimus quas veritatis
                    vero sapiente eum accusantium tenetur possimus!
                    Illum, similique.
                </p>
                <div class=" post-author">
            <div class="post-author-avatar">
                <img src="./img/avatar1.png">png
            </div>
            <div class=" post-author-info">
                <h5>By: Rabbit Foerby</h5>
                <small>Sep 28 2022 - 06:23</small>
            </div>
        </div>
        </div>

    </article>

    <article class="post w-full md:w-3/12 flex items-center flex-col">
        <div class="post-thumbnail">
            <img class=" w-32 md:w-64 lg:w-96" src="./img/webhost.jpg" alt="">
        </div>

        <div class="post-info w-full">
            <a href="" class="btn font-barlow">Technology</a>
            <h2 class="post-title text-3xl font-bold font-barlow"><a href="post.html">Lorem ipsum dolor sit
                    amet</a></h2>
            <p class="post-body hidden md:block"">Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                    Ea debitis eius eos ipsam dolores labore, mollitia rem doloremque minus ducimus quas veritatis
                    vero sapiente eum accusantium tenetur possimus!
                    Illum, similique.
                </p>
                <div class=" post-author">
            <div class="post-author-avatar">
                <img src="./img/avatar1.png">png
            </div>
            <div class=" post-author-info">
                <h5>By: Rabbit Foerby</h5>
                <small>Sep 28 2022 - 06:23</small>
            </div>
        </div>
        </div>

    </article>





    </div>
</section>

<!-- END POSTS -->



<!-- Category Buttons -->
<section class="relative category-buttons px-14 mx-auto flex justify-center py-5 mb-5 md:w-7/12">
    <div
        class="container category-button-container font-bold flex flex-wrap flex-grow items-center justify-center gap-2 pb-3">
        <a href="category" class="btn">Gaming</a>
        <a href="category" class="btn">Lifestyle</a>
        <a href="category" class="btn">Science & Technology</a>
        <a href="category" class="btn">News</a>
        <a href="category" class="btn">Development</a>
    </div>
</section>


<?php
include_once "partials/footer.php";
?>