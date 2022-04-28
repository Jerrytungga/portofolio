<!doctype html>
<html lang="en">
<?php
include 'head.php';
?>

<body>
    <div class="wrap">
        <?php
        include 'header.php';
        ?>

        <section>
            <div class="grid grid--tb2-12">
                <div class="grid__column grid__column--4">
                    <div class="mb-tiny">
                        <p class="subheading">
                            Search
                        </p>
                    </div>

                    <div class="mb-medium col">
                        <form class="search-form" action="">
                            <input class="search-form__field" type="text" name="s" placeholder="PHP, WordPress, Freelancing..." enterkeyhint="search" value="">
                            <button class="search-form__action">
                                Search
                            </button>
                        </form>
                    </div>


                    <div class="mb-tiny">
                        <p class="subheading">
                            Filter By
                        </p>
                    </div>

                    <ul class="link-list">
                        <li class="link-list__item ">
                            <a class="tag" href="https://sebkay.com/articles/category/freelancing">
                                Freelancing
                            </a>
                        </li>
                        <li class="link-list__item ">
                            <a class="tag" href="https://sebkay.com/articles/category/copywriting">
                                Copywriting
                            </a>
                        </li>
                        <li class="link-list__item ">
                            <a class="tag" href="https://sebkay.com/articles/category/side-projects">
                                Side Projects
                            </a>
                        </li>
                        <li class="link-list__item ">
                            <a class="tag" href="https://sebkay.com/articles/category/wordpress" style="border-color: #0073AA; color: #0073AA;">
                                WordPress
                            </a>
                        </li>
                        <li class="link-list__item ">
                            <a class="tag" href="https://sebkay.com/articles/category/tips">
                                Tips
                            </a>
                        </li>
                        <li class="link-list__item ">
                            <a class="tag" href="https://sebkay.com/articles/category/advice">
                                Advice
                            </a>
                        </li>
                        <li class="link-list__item ">
                            <a class="tag" href="https://sebkay.com/articles/category/assorted">
                                Assorted
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="grid__column grid__column--8">
                    <div class="mb-large">
                        <h1 class="mb-tiny">
                            Articles
                        </h1>
                        <p class="txt-large">
                            My thoughts on web development and a look at my personal life.
                        </p>
                    </div>
                    <article class="post-preview">
                        <h3 class="post-preview__title">
                            <a href="https://sebkay.com/articles/writing-wordpress-unit-tests-touchstone">
                                Touchstone – WordPress Unit &amp; Integration Tests
                            </a>
                        </h3>
                </div>



            </div>
        </section>
        <!-- <div class="mb-large">
            <h1 class="mb-tiny">Aplikasi</h1>
            <p class="txt-large">Berbasis Website</p>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body shadow">
                        <center>
                            <div class="col-md-4">
                                <img src="image/jurnalpka.png" class="img-fluid rounded-start" alt="...">
                            </div>
                            <div class="card-body">
                                <p class="card-text">Aplikasi jurnal pka</p>
                            </div>
                            <a href="#" class="btn btn-primary">Lihat Aplikasi</a>
                        </center>
                    </div>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body shadow">
                        <center>
                            <div class="col-md-4">
                                <img src="image/siapangkut.png" class="img-fluid rounded-start gambar" alt="...">
                            </div>
                            <div class="card-body">
                                <p class="card-text">Aplikasi Siapangkut</p>
                            </div>
                            <a href="./work copy" class="btn btn-primary">Lihat Aplikasi</a>
                        </center>
                    </div>
                </div>
            </div>
        </div> -->
        <?php
        include 'footer.php';
        ?>
    </div>
</body>

</html>