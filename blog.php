<?php
include_once "partials/header.php";
?>








<section class="mt-20 mb-4">
    <form class="search-bar-container relative w-2/6 flex justify-between mx-auto bg-primary px-5 py-3">
        <div class="w-full flex items-center gap-3">
            <i class="fa-solid fa-magnifying-glass"></i>
            <input class="bg-transparent w-full outline-none" type="search" name="" placeholder="Search Blog...">
        </div>
        <button class="btn ml-3">Search</button>
    </form>
</section>


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