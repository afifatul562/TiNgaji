<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login - SB Admin</title>
        <link href="<?= base_url(); ?>/sb-admin/css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <?= $this->renderSection('content'); ?>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; TiNgaji <?= date('Y') ?></div>
                            <div>
                                <a href="mailto:afifatulmawaddah562@gmail.com"><i class="far fa-envelope fa-lg"></i></a>
                                <a href="https://wa.me/qr/WYSNW4DQHOKJC1"><i class="fab fa-whatsapp fa-lg"></i></a>
                                <a href="https://www.instagram.com/_faamwddh?igsh=MW90cjM4ejU0aDgyNA=="><i class="fab fa-instagram fa-lg"></i></a>
                                <a href="https://www.tiktok.com/@akuiifaa?_t=ZS-8th27uIxKqN&_r=1"><i class="fab fa-tiktok fa-lg"></i></a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="<?= base_url(); ?>/sb-admin/js/scripts.js"></script>
    </body>
</html>