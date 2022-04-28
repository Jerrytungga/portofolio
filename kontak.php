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

        <section class="page">
            <div class="wysiwyg">
                <h1>Kontak Saya</h1>
                <p class="txt-large">Jika Anda ingin mengobrol tentang sebuah proyek atau hanya memiliki pertanyaan, silakan isi formulir di bawah ini. Saya akan membalas kembali dalam 2 hari.</p>
            </div>

            <div class="mt-large">

                <form action="email.php" method="post">
                    <div class="form__row">
                        <div class="form__field">
                            <label for="name" class="form__label">
                                Nama <span class="form__required">*</span>
                            </label>
                            <input id="name" name="name" type="text" required>
                        </div>

                        <div class="form__field">
                            <label for="email" class="form__label">
                                Email <span class="form__required">*</span>
                            </label>
                            <input id="email" name="email" type="email" required>
                        </div>
                    </div>

                    <div class="form__row">
                        <div class="form__field">
                            <label for="subject" class="form__label">
                                Subjek <span class="form__required">*</span>
                            </label>
                            <input id="subject" name="subject" type="text" required>
                        </div>
                    </div>

                    <div class="form__row">
                        <div class="form__field">
                            <label for="message" class="form__label">
                                Pesan <span class="form__required">*</span>
                            </label>
                            <textarea id="message" name="message" required></textarea>
                        </div>
                    </div>



                    <button type="submit" name="sent" class="btn btn-dark">Kirim Pesan</button>
                </form>
            </div>
        </section>

        <?php
        include 'footer.php';
        ?>
    </div>
</body>

</html>