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

    <div class="background">
        <main class="wrap">
            <div class="bg-light shadow p-5 rounded">
                <?php
                include 'header.php';
                ?>

                <!-- <section>
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
                </section> -->

                <section>
                    <div>
                        <div class="detail-proyek">
                            <p class="judul"><?= $sqli_aplikasi['Judul']; ?></p>
                            <div class="deskripsi">
                                <?= $sqli_aplikasi['keterangan']; ?>
                            </div><br>
                            <button class="btn btn-success shadow">Lihat Gambar</button>
                            <button class="btn btn-dark shadow">Lihat Website</button>
                        </div>
                        <div>
                            <div class="judul mt-2">Ulasan</div>
                            <div class="deskripsi">
                                <?= $sqli_aplikasi['Keterangan_Singkat']; ?>
                            </div>
                        </div>
                        <div>
                            <div class="judul mt-2">Waktu Pembuatan</div>
                            <div class="deskripsi">
                                <?= $sqli_aplikasi['Keterangan_Singkat']; ?>
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