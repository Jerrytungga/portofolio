<?php
$id = $_GET['id'];
include 'database.php';
$artikel = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM artikel where status='Aktif' and id='$id' "));

?>

<!doctype html>
<html lang="en">
<?php
include 'head.php';
?>

<body>
    <div class="background">
        <main class="wrap">
            <div class="bg-light shadow p-5 rounded">
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
                                    <?= $artikel['judul']; ?>
                                </h1>
                                <p class="mb-medium txt-fade">
                                    <!-- <a class="tag" href="https://sebkay.com/articles/category/wordpress" style="border-color: #0073AA; color: #0073AA;">
                                WordPress
                            </a> -->
                                    <br>
                                    <?= $artikel['date']; ?>
                                    /
                                    3 minute read
                                </p>
                                <p class="txt-large">
                                    <?= $artikel['konten']; ?>
                                </p>


                            </div>
                        </div>


                    </div>
                </section>

                <?php
                include 'footer.php';
                ?>
            </div>
        </main>
    </div>
</body>

</html>