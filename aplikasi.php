<?php
include 'database.php';
$sqli_aplikasi = mysqli_query($conn, "Select * from aplikasi ");

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


        <div class="mb-large">
            <h1 class="mb-tiny">
                Proyek
            </h1>
            <p class="txt-large">
                Beberapa proyek yang telah saya kerjakan.
            </p>
        </div>
        <?php
        while ($query = mysqli_fetch_array($sqli_aplikasi)) {
        ?>
            <section class="page-wide">
                <div class="project-preview">
                    <figure class="project-preview__media">
                        <a>
                            <img src="admin/images/proyek/<?= $query['gambar']; ?>">
                        </a>
                    </figure>

                    <div class="project-preview__content">
                        <h2 class="project-preview__title">
                            <a>
                                <?= $query['Judul']; ?>
                            </a>
                        </h2>

                        <p class="project-preview__desc">
                            <?= $query['keterangan']; ?>
                        </p>

                        <div class="project-preview__action">
                            <a href="view_detail.php?id=<?= $query['id_aplikasi']; ?>" class="btn bg-dark text-light hov-pointer">
                                Lihat Selengkapnya
                            </a>
                        </div>
                    </div>
                </div>
            </section>


            <style type="text/css">
                section {
                    margin-bottom: 50px;
                }
            </style>
        <?php
        }
        ?>
        <?php
        include 'footer.php';
        ?>
    </div>
</body>

</html>