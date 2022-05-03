<?php
include 'database.php';
error_reporting(E_ALL ^ E_NOTICE);
$sqli_aplikasi = mysqli_query($conn, "Select * from aplikasi order by id_aplikasi DESC ");

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
                    <section>
                        <div>
                            <div>
                                <div class="date">
                                    <?= $query['date']; ?>
                                </div>

                                <form>
                                    <div class="judul">
                                        <a href="view_detail.php?id=<?= $query['id_aplikasi']; ?>" class="judul">
                                            <?= $query['Judul']; ?>
                                        </a>
                                        <button name="ulasan" value="<?= $query['id_aplikasi']; ?>" class="btn ulasan shadow">Lihat Ulasan</button>
                                    </div>
                                </form>


                                <div class="deskripsi">
                                    <?= $query['keterangan']; ?>
                                </div><br>


                                <div>
                                    <?php
                                    $ambil_ulasan = $_GET['ulasan'];
                                    $ulasan = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM aplikasi WHERE id_aplikasi='$ambil_ulasan'"));
                                    if ($query['id_aplikasi'] == $ulasan['id_aplikasi']) { ?>
                                        <div class="judul_ulasan">Ulasan</div>
                                        <div class="deskripsi">
                                            <?= $ulasan['Keterangan_Singkat']; ?>
                                        </div><br>
                                        <a href="aplikasi.php" class="hidden_ulasan">Sembunyikan</a>
                                    <?php }
                                    ?>

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
        </main>
    </div>
</body>

</html>