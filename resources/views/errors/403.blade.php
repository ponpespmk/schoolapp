<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>Error 403 | SYTechID</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully responsive admin theme which can be used to build CRM, CMS,ERP etc." name="description" />
        <meta content="Techzaa" name="author" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="/backend/assets/images/favicon.ico">

        <!-- Theme Config Js -->
        <script src="/backend/assets/js/config.js"></script>

        <!-- App css -->
        <link href="/backend/assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-style" />

        <!-- Icons css -->
        <link href="/backend/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    </head>

    <body class="authentication-bg">
        <div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5 position-relative">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xxl-8 col-lg-10">
                        <div class="card overflow-hidden">
                            <div class="row g-0">
                                <div class="col-lg-6 d-none d-lg-block p-2">
                                    <img src="/backend/assets/images/auth-img.jpg" alt="" class="img-fluid rounded h-100">
                                </div>
                                <div class="col-lg-6">
                                    <div class="d-flex flex-column h-100">
                                        <div class="auth-brand p-4">
                                            <a href="index.html" class="logo-light">
                                                <img src="/backend/assets/images/logo.png" alt="logo" height="22">
                                            </a>
                                            <a href="index.html" class="logo-dark">
                                                <img src="/backend/assets/images/logo-dark.png" alt="dark logo" height="22">
                                            </a>
                                        </div>
                                        <div class="p-4 my-auto">
                                            <div class="d-flex justify-content-center mb-5">
                                                <img src="/backend/assets/images/access_denied.png" alt="" class="img-fluid">
                                            </div>

                                            <div class="text-center">
                                                <h1 class="mb-3">403</h1>
                                                <h4 class="fs-20">Tidak Memiliki Akses</h4>
                                                <p class="text-muted mb-3">Anda tidak memiliki akses ke Halaman yang anda tuju.!, silahkan hubungi admin untuk info lebih lanjut.!</p>
                                            </div>

                                            <button class="btn btn-soft-primary w-100"><i class="ri-arrow-left-line me-1"></i>  Kembali ke Halaman Sebelumnya</button>
                                        </div>
                                    </div>
                                </div> <!-- end col -->
                            </div>
                        </div>
                    </div>
                    <!-- end row -->
                </div>
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->

        <footer class="footer footer-alt fw-medium">
            <span class="text-dark-emphasis"><script>document.write(new Date().getFullYear())</script> © Velonic - Theme by Techzaa</span>
        </footer>
        <!-- Vendor js -->
        <script src="/backend/assets/js/vendor.min.js"></script>

        <!-- App js -->
        <script src="/backend/assets/js/app.min.js"></script>
        <script>
            let btnBack = document.querySelector('button');
            btnBack.addEventListener('click', () => {
                window.history.back();
            })
        </script>

    </body>
</html>
