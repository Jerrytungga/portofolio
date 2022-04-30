<?php
include 'database.php';
$sqli_aplikasi = mysqli_query($conn, "Select * from aplikasi ");
$id = $_GET['id'];
$sqli_aplikasi = mysqli_fetch_array(mysqli_query($conn, "Select * from aplikasi where id_aplikasi='$id'"));
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
                        <img src="admin/images/proyek/<?= $sqli_aplikasi['gambar']; ?>" class="gambar">
                    </figure>
                </div>

                <div class="mt-large wysiwyg">
                    <h2>Singkat</h2>
                    <p><?= $sqli_aplikasi['Keterangan_Singkat']; ?></p>

                    <h2>Hasil</h2>
                    <p><?= $sqli_aplikasi['keterangan_Hasil']; ?></p>

                </div>

                <div class="mt-large txt-center">
                    <a class="btn btn--large btn-dark" href="<?= $sqli_aplikasi['link']; ?>" target="_blank">
                        Lihat Website
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