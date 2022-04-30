<?php
include 'database.php';

$artikel = mysqli_query($conn, "SELECT * FROM artikel where status='Aktif' ");

?>

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

                    <!-- <ul class="link-list">
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
                    </ul> -->
                </div>
                <div class="grid__column grid__column--8">
                    <div class="mb-large">
                        <h1 class="mb-tiny">
                            Artikel
                        </h1>
                        <p class="txt-large">
                            Artikel ini adalah berisi dari refrensi mengenai website yang telah saya pelajari setiap hari.
                        </p>
                    </div>
                    <?php
                    while ($data = mysqli_fetch_array($artikel)) { ?>
                        <article class="post-preview">
                            <h3 class="post-preview__title">
                                <b>
                                    <?= $data['judul']; ?>
                                </b>
                            </h3>
                            <p class="post-preview__meta">
                                <!-- <a class="tag" href="https://sebkay.com/articles/category/wordpress" style="border-color: #0073AA; color: #0073AA;">
                                    WordPress
                                </a> -->

                                <?= $data['date']; ?>
                                /
                                3 minute read
                            </p>
                            <div class="post-preview__excerpt">
                                <?= $data['konten']; ?>
                            </div>
                            <p class="post-preview__action">
                                <a href="Detail.php?id=<?= $data['id']; ?>">
                                    Baca Selengkapnya→
                                </a>
                            </p>
                        </article>

                    <?php }
                    ?>
                </div>



            </div>
        </section>

        <?php
        include 'footer.php';
        ?>
    </div>
</body>

</html>