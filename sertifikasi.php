    <?php
    include 'database.php';
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

            <center>
                <img src="image/dicoding-logo.png" width="200px" class="mb-2">
            </center>
            <div class="album py-5">
                <div class="container">
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                        <?php
                        $sertifikasi = mysqli_query($conn, "SELECT * FROM tb_sertifikasi  ");
                        while ($perulangan = mysqli_fetch_array($sertifikasi)) {
                        ?>
                            <div class="col">
                                <div class="card shadow">
                                    <img src="image/sertifikasi/<?= $perulangan['gambar']; ?>" alt="">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <small class="text-muted"><?= $perulangan['date']; ?></small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>

                    </div>
                </div>
            </div>


            <?php

            include 'footer.php';
            ?>
        </div>
    </body>

    </html>