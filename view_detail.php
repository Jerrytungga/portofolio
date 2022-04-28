<?php
include 'database.php';
$sqli_aplikasi = mysqli_query($conn, "Select * from aplikasi ");
$id = $_GET['id'];
$sqli_aplikasi = mysqli_fetch_array(mysqli_query($conn, "Select * from aplikasi where id_aplikasi='$id'"));
$sqli_detail = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `aplikasi_detail` where aplikasi='$id'"));
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
            <div class="page">
                <div class="txt-center wysiwyg">
                    <h1>
                        <?= $sqli_aplikasi['Judul']; ?>
                    </h1>
                    <p class="txt-large">
                        <?= $sqli_aplikasi['keterangan']; ?>
                    </p>
                </div>


                <div class="mt-large">
                    <figure class="feature-media">
                        <img src="siap.png" class="gambar">
                    </figure>
                </div>

                <div class="mt-large wysiwyg">
                    <h2><?= $sqli_detail['judul1']; ?></h2>
                    <p><?= $sqli_detail['keterangan1']; ?></p>

                    <h2><?= $sqli_detail['judul2']; ?></h2>
                    <p><?= $sqli_detail['keterangan2']; ?></p>

                </div>

                <div class="mt-large txt-center">
                    <a class="btn btn--large" href="<?= $sqli_detail['go_link']; ?>" target="_blank">
                        View Site
                    </a>
                </div>
            </div>
        </section>
        <?php
        include 'footer.php';
        ?>
    </div>
</body>

</html>