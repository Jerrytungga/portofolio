    <?php
    error_reporting(E_ALL ^ E_NOTICE);
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
            <script src="https://apps.elfsight.com/p/platform.js" defer></script>
            <div class="elfsight-app-9a5e68c0-3d7a-4bf0-94ca-3855e40f5c88"></div>
            <center>
                <form action="" method="POST" id="form_id">
                    <?php
                    if (isset($_POST['filter'])) {
                        $pilih = $_POST['filter']; ?>
                        <select name="filter" type="option" id="filter" class="form-control kolom mt-2 shadow" onChange="document.getElementById('form_id').submit();">
                            <option selected class="form-control">Silahkan Pilih</option>
                            <option value="dicoding" <?php if ($pilih == "dicoding") { ?> selected <?php } ?>>dicoding</option>
                            <option value="sololern" <?php if ($pilih == "sololern") { ?> selected <?php } ?>>sololern</option>

                        </select>
                    <?php   } else { ?>
                        <select name="filter" type="option" id="filter" class="form-control kolom mt-2 shadow" onChange="document.getElementById('form_id').submit();">
                            <option selected class="form-control">Silahkan Pilih</option>
                            <option value="dicoding" class="form-control">dicoding</option>
                            <option value="sololern" class="form-control">sololern</option>
                        </select>
                    <?php  }
                    ?>
                </form>
                <br><br>

                <?php
                if ($pilih == 'dicoding') { ?>
                    <img src="image/dicoding-logo.png" width="200px" class="mb-2">
                <?php   } elseif ($pilih == 'sololern') { ?>
                    <img src="image/sololern.png" width="200px" class="mb-2">
                <?php  }
                ?>
            </center>
            <div class="album py-5">
                <div class="container">
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                        <?php
                        $sertifikasi = mysqli_query($conn, "SELECT * FROM tb_sertifikasi where name='$pilih' ");
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