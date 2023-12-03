<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

        <title>Realshed - HTML 5 Template Preview</title>

        <!-- Fav Icon -->
        <link rel="icon" href="frontend/assets/images/favicon.ico" type="image/x-icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

        <!-- Stylesheets -->
        <link href="frontend/assets/css/font-awesome-all.css" rel="stylesheet">
        <link href="frontend/assets/css/flaticon.css" rel="stylesheet">
        <link href="frontend/assets/css/owl.css" rel="stylesheet">
        <link href="frontend/assets/css/bootstrap.css" rel="stylesheet">
        <link href="frontend/assets/css/jquery.fancybox.min.css" rel="stylesheet">
        <link href="frontend/assets/css/animate.css" rel="stylesheet">
        <link href="frontend/assets/css/jquery-ui.css" rel="stylesheet">
        <link href="frontend/assets/css/nice-select.css" rel="stylesheet">
        <link href="frontend/assets/css/color/theme-color.css" id="jssDefault" rel="stylesheet">
        <link href="frontend/assets/css/switcher-style.css" rel="stylesheet">
        <link href="frontend/assets/css/style.css" rel="stylesheet">
        <link href="frontend/assets/css/responsive.css" rel="stylesheet">

        </head>


        <!-- page wrapper -->
        <body>

            <div class="boxed_wrapper">


                <!-- preloader -->
                <div class="loader-wrap">
                    <div class="preloader">
                        <div class="preloader-close"><i class="far fa-times"></i></div>
                        <div id="handle-preloader" class="handle-preloader">
                            <div class="animation-preloader">
                                <div class="spinner"></div>
                                <div class="txt-loading">
                                    <span data-text-preloader="P" class="letters-loading">
                                        P
                                    </span>
                                    <span data-text-preloader="P." class="letters-loading">
                                        P.
                                    </span>
                                    <span data-text-preloader="Salafiyah" class="letters-loading">
                                        Salafiyah
                                    </span>
                                    <span data-text-preloader="-P" class="letters-loading">
                                        -P
                                    </span>
                                    <span data-text-preloader="M" class="letters-loading">
                                        M
                                    </span>
                                    <span data-text-preloader="K" class="letters-loading">
                                        K
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- preloader end -->


                <!-- switcher menu -->
                <div class="switcher">
                    <div class="switch_btn">
                        <button><i class="fas fa-palette"></i></button>
                    </div>
                    <div class="switch_menu">
                        <!-- color changer -->
                        <div class="switcher_container">
                            <ul id="styleOptions" title="switch styling">
                                <li>
                                    <a href="javascript: void(0)" data-theme="green" class="green-color"></a>
                                </li>
                                <li>
                                    <a href="javascript: void(0)" data-theme="pink" class="pink-color"></a>
                                </li>
                                <li>
                                    <a href="javascript: void(0)" data-theme="violet" class="violet-color"></a>
                                </li>
                                <li>
                                    <a href="javascript: void(0)" data-theme="crimson" class="crimson-color"></a>
                                </li>
                                <li>
                                    <a href="javascript: void(0)" data-theme="orange" class="orange-color"></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- end switcher menu -->


                <!-- main header -->
                <header class="main-header header-style-two">
                    <!-- header-lower -->
                    <div class="header-lower">
                        <div class="outer-box">
                            <div class="main-box">
                                <div class="logo-box">
                                    <figure class="logo"><a href="index.html"><img src="frontend/assets/images/logo-light.png" alt=""></a></figure>
                                </div>
                                <div class="menu-area clearfix">
                                    <!--Mobile Navigation Toggler-->
                                    <div class="mobile-nav-toggler">
                                        <i class="icon-bar"></i>
                                        <i class="icon-bar"></i>
                                        <i class="icon-bar"></i>
                                    </div>
                                    <nav class="main-menu navbar-expand-md navbar-light">
                                        <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                                            <ul class="navigation clearfix">
                                                <li><a href="#"><span>BERANDA</span></a></li>
                                                <li class="dropdown"><a href="#"><span>PROFIL</span></a>
                                                    <ul>
                                                        <li><a href="#">Dewan Direksi</a></li>
                                                        <li><a href="#">Sejarah Ringkas</a></li>
                                                        <li><a href="#">Visi, Misi & Tujuan</a></li>
                                                        <li><a href="#">Target Output</a></li>
                                                        <li><a href="#">Jadwal Keseharian</a></li>
                                                    </ul>
                                                </li>
                                                <li class="dropdown"><a href="#"><span>PENDIDIKAN</span></a>
                                                    <ul>
                                                        <li><a href="#">Prestasi</a></li>
                                                        <li><a href="#">Salafiyah Putra</a></li>
                                                        <li><a href="#">Salafiyah Putri</a></li>
                                                    </ul>
                                                </li>
                                                <li class="dropdown"><a href="#"><span>SARPRAS</span></a>
                                                    <ul>
                                                        <li><a href="#">HAL</a></li>
                                                        <li><a href="#">Perpustakaan</a></li>
                                                        <li><a href="#">Olahraga</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="#"><span>BERITA</span></a></li>
                                                <li class="dropdown"><a href="#"><span>GALLERY</span></a>
                                                    <ul>
                                                        <li><a href="#">Foto</a></li>
                                                        <li><a href="#">Vidio</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="#"><span>Kontak</span></a></li>
                                            </ul>
                                        </div>
                                    </nav>
                                </div>
                                <div class="menu-right-content clearfix">
                                    <div class="sign-box">
                                        <a href="signin.html"><i class="fas fa-user"></i>Sign In</a>
                                    </div>
                                    <div class="btn-box">
                                        <a href="index.html" class="theme-btn btn-one"><span>+</span>Add Listing</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--sticky Header-->
                    <div class="sticky-header">
                        <div class="outer-box">
                            <div class="main-box">
                                <div class="logo-box">
                                    <figure class="logo"><a href="index.html"><img src="frontend/assets/images/logo.png" alt=""></a></figure>
                                </div>
                                <div class="menu-area clearfix">
                                    <nav class="main-menu clearfix">
                                        <!--Keep This Empty / Menu will come through Javascript-->
                                    </nav>
                                </div>
                                <div class="btn-box">
                                    <a href="index.html" class="theme-btn btn-one"><span>+</span>Add Listing</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </header>
                <!-- main-header end -->

                <!-- Mobile Menu  -->
                <div class="mobile-menu">
                    <div class="menu-backdrop"></div>
                    <div class="close-btn"><i class="fas fa-times"></i></div>

                    <nav class="menu-box">
                        <div class="nav-logo"><a href="index.html"><img src="frontend/assets/images/logo-2.png" alt="" title=""></a></div>
                        <div class="menu-outer"><!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header--></div>
                        <div class="contact-info">
                            <h4>Contact Info</h4>
                            <ul>
                                <li>Chicago 12, Melborne City, USA</li>
                                <li><a href="tel:+8801682648101">+88 01682648101</a></li>
                                <li><a href="mailto:info@example.com">info@example.com</a></li>
                            </ul>
                        </div>
                        <div class="social-links">
                            <ul class="clearfix">
                                <li><a href="index.html"><span class="fab fa-twitter"></span></a></li>
                                <li><a href="index.html"><span class="fab fa-facebook-square"></span></a></li>
                                <li><a href="index.html"><span class="fab fa-pinterest-p"></span></a></li>
                                <li><a href="index.html"><span class="fab fa-instagram"></span></a></li>
                                <li><a href="index.html"><span class="fab fa-youtube"></span></a></li>
                            </ul>
                        </div>
                    </nav>
                </div><!-- End Mobile Menu -->


                <!-- banner-style-two -->
                <section class="banner-style-two centred">
                    <div class="banner-carousel owl-theme owl-carousel owl-nav-none">
                        <div class="slide-item">
                            <div class="image-layer" style="background-image:url(frontend/assets/images/banner/banner-2.jpg)"></div>
                            <div class="auto-container">
                                <div class="content-box">
                                    <h2>Apel Pagi Setiap Hari Senin</h2>
                                    <p>Seluruh Santriwan/wati Diwajibkan Apel Pagi untuk Pengecekan/Peninjauan Tata-tertib Pondok.</p>
                                </div>
                            </div>
                        </div>
                        <div class="slide-item">
                            <div class="image-layer" style="background-image:url(frontend/assets/images/banner/banner-3.jpg)"></div>
                            <div class="auto-container">
                                <div class="content-box">
                                    <h2>Senam Pagi Setiap Pagi Sabtu</h2>
                                    <p>Senam Pagi Berhadiah yang Bisa Diikuti Oleh Seluruh Santri Salafiyah.</p>
                                </div>
                            </div>
                        </div>
                        <div class="slide-item">
                            <div class="image-layer" style="background-image:url(frontend/assets/images/banner/banner-4.jpg)"></div>
                            <div class="auto-container">
                                <div class="content-box">
                                    <h2>Santri PP. Salafiyah Perkampungan Minangkabau </h2>
                                    <p>Bangga Menjadi Santri Salafiyah.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- banner-style-two end -->

                <!-- funfact-section -->
                <section class="funfact-section centred">
                    <div class="auto-container">
                        <div class="inner-container wow slideInLeft animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                            <div class="row clearfix">
                                <div class="col-lg-3 col-md-6 col-sm-12 funfact-block">
                                    <div class="funfact-block-one">
                                        <div class="inner-box">
                                            <div class="count-outer count-box">
                                                {{-- <span class="count-text" data-speed="1500" data-stop="1270">0</span> --}}
                                                {{-- <div class="icon-box"><i class="icon-26"></i></div> --}}
                                                <figure class="image-box"><img src="frontend/assets/images/resource/education.png" alt=""></figure>
                                            </div>
                                            <p>Pendidikan Berkualitas</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-12 funfact-block">
                                    <div class="funfact-block-one">
                                        <div class="inner-box">
                                            <div class="count-outer count-box">
                                                {{-- <span class="count-text" data-speed="1500" data-stop="2350">0</span> --}}
                                                {{-- <div class="icon-box"><i class="icon-27"></i></div> --}}
                                                <figure class="image-box"><img src="frontend/assets/images/resource/equality.png" alt=""></figure>
                                            </div>
                                            <p>Pendidikan Berakhlak</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-12 funfact-block">
                                    <div class="funfact-block-one">
                                        <div class="inner-box">
                                            <div class="count-outer count-box">
                                                {{-- <span class="count-text" data-speed="1500" data-stop="2540">0</span> --}}
                                                {{-- <div class="icon-box"><i class="icon-28"></i></div> --}}
                                                <figure class="image-box"><img src="frontend/assets/images/resource/graduation-cap.png" alt=""></figure>
                                            </div>
                                            <p>Pendidikan Muammalah</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-12 funfact-block">
                                    <div class="funfact-block-one">
                                        <div class="inner-box">
                                            <div class="count-outer count-box">
                                                {{-- <span class="count-text" data-speed="1500" data-stop="8270">0</span> --}}
                                                {{-- <div class="icon-box"><i class="icon-25"></i></div> --}}
                                                <figure class="image-box"><img src="frontend/assets/images/resource/elearning.png" alt=""></figure>
                                            </div>
                                            <p>Pendidikan Teknologi</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- funfact-section end -->



                <!-- berita -->
                <section class="feature-style-two sec-pad">
                    <div class="auto-container">
                        <div class="sec-title centred">
                            <h5>News & Article</h5>
                            <h2>Stay Update With Realshed</h2>
                            <p>Berita, Kegiatan dan Article Pondok Pesantren Salafiyah Perkampungan Minangkabau <br />update setiap minggunya.</p>
                        </div>
                        <div class="three-item-carousel owl-carousel owl-theme owl-dots-none nav-style-one">
                            <div class="news-block-one wow fadeInUp animated" data-wow-delay="300ms" data-wow-duration="1500ms">
                                <div class="inner-box">
                                    <div class="image-box">
                                        <figure class="image"><a href="blog-details.html"><img src="frontend/assets/images/news/news-1.jpg" alt=""></a></figure>
                                        <span class="category bg-info">Hot News</span>
                                    </div>
                                    <div class="lower-content">
                                        <h4><a href="#">Team Bola Voly Putra Salafiyah</a></h4>
                                        <ul class="post-info clearfix">
                                            <li class="author-box">
                                                <figure class="author-thumb"><img src="frontend/assets/images/news/author-1.jpg" alt=""></figure>
                                                <h5><a href="blog-details.html">Syukri Yanto</a></h5>
                                            </li>
                                            <li>November 09, 2023</li>
                                        </ul>
                                        <div class="text">
                                            <p>Team Voly Putra Salafiyah dibentuk pada tahun 2023 oleh ustadz Mhd. Rizki Lubis & ustadz Syukri Yanto. Dimana team ini sudah memiliki segudang prestasi hingga Tingkat Nasional.</p>
                                        </div>
                                        <div class="btn-box">
                                            <a href="blog-details.html" class="theme-btn btn-two">Lanjut Baca</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="news-block-one wow fadeInUp animated" data-wow-delay="300ms" data-wow-duration="1500ms">
                                <div class="inner-box">
                                    <div class="image-box">
                                        <figure class="image"><a href="blog-details.html"><img src="frontend/assets/images/news/news-2.jpg" alt=""></a></figure>
                                        <span class="category bg-info">Hot News</span>
                                    </div>
                                    <div class="lower-content">
                                        <h4><a href="#">Sabtu Pagi Santri Salafiyah Rutin Renam Pagi</a></h4>
                                        <ul class="post-info clearfix">
                                            <li class="author-box">
                                                <figure class="author-thumb"><img src="frontend/assets/images/news/author-1.jpg" alt=""></figure>
                                                <h5><a href="blog-details.html">Syukri Yanto</a></h5>
                                            </li>
                                            <li>November 09, 2023</li>
                                        </ul>
                                        <div class="text">
                                            <p>Seluruh Santri Salafiyah rutin melakukan senam setiap pagi sabtu yang di pandu oleh ustadz/ustadzah nya.</p>
                                        </div>
                                        <div class="btn-box">
                                            <a href="blog-details.html" class="theme-btn btn-two">Lanjut Baca</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="news-block-one wow fadeInUp animated" data-wow-delay="300ms" data-wow-duration="1500ms">
                                <div class="inner-box">
                                    <div class="image-box">
                                        <figure class="image"><a href="blog-details.html"><img src="frontend/assets/images/news/news-3.jpg" alt=""></a></figure>
                                        <span class="category bg-info">Hot News</span>
                                    </div>
                                    <div class="lower-content">
                                        <h4><a href="#">Pembangunan Asrama Utama Putra</a></h4>
                                        <ul class="post-info clearfix">
                                            <li class="author-box">
                                                <figure class="author-thumb"><img src="frontend/assets/images/news/author-1.jpg" alt=""></figure>
                                                <h5><a href="blog-details.html">Syukri Yanto</a></h5>
                                            </li>
                                            <li>November 09, 2023</li>
                                        </ul>
                                        <div class="text">
                                            <p>Ketua Yayasan, WAkil Ketua Yayasan dan salah satu Dewan Pembina yayasan meninjau proses pembangunan/Rehab Asrama utama putra.</p>
                                        </div>
                                        <div class="btn-box">
                                            <a href="blog-details.html" class="theme-btn btn-two">Lanjut Baca</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="more-btn centred"><a href="#" class="theme-btn btn-one">View All Listing</a></div>
                    </div>
                </section>
                <!-- berita end -->


                <!-- PPDB -->
                <section class="about-section about-page pb-0">
                    <div class="auto-container">
                        <div class="inner-container">
                            <div class="row align-items-center clearfix">
                                <div class="col-lg-6 col-md-12 col-sm-12 image-column">
                                    <div class="image_block_2">
                                        <div class="image-box">
                                            <figure class="image"><img src="frontend/assets/images/resource/about-1.jpg" alt=""></figure>
                                            {{-- <div class="text wow fadeInLeft animated animated" data-wow-delay="00ms" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 0ms; animation-name: fadeInLeft;">
                                                <h2>PPDB</h2>
                                                <h4 class="text-warning">TA.2024/2025 <br>Kuota Terbatas</h4>
                                            </div> --}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                                    <div class="content_block_3">
                                        <div class="content-box">
                                            <div class="sec-title">
                                                <h5>INGIN MENDAFTARKAN ANANDA DI</h5>
                                                <h2>PP.Salafiyah PMK?</h2>
                                            </div>
                                            <div class="text">
                                                <p>KAMI MEMBUKA PENDAFTARAN UNTUK TAHUN AJARAN 2024 & 2025 <br> Dengan Ketentuan sebagai berikut :</p>
                                            </div>
                                            <ul class="list clearfix">
                                                <li>Melakukan Pendaftaran Secara Online</li>
                                                <li>Membayar Uang Pendaftaran Rp.100.000</li>
                                                <li>Melengkapi Dokument/Berkas Seperti KK,Akte Kelahiran SKL dll</li>
                                                <li>Mengikuti Tes Masuk Secara Offline</li>
                                                <li>Melakukan Daftar Ulang Online</li>
                                            </ul>
                                            <div class="btn-box">
                                                <a href="#" class="theme-btn btn-one">Daftar Sekarang</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- PPDB end -->


                <!-- video-section -->
                <section class="video-section centred" style="background-image: url(frontend/assets/images/background/video-1.jpg);">
                    <div class="auto-container">
                        <div class="video-inner">
                            <div class="video-btn">
                                <a href="https://www.youtube.com/watch?v=nfP5N9Yc72A&amp;t=28s" class="lightbox-image" data-caption=""><i class="icon-17"></i></a>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- video-section end -->


                <!-- team-section -->
                <section class="team-section sec-pad centred bg-color-1">
                    <div class="pattern-layer" style="background-image: url(frontend/assets/images/shape/shape-1.png);"></div>
                    <div class="auto-container">
                        <div class="sec-title">
                            <h5>Ustadz & Ustadzah</h5>
                            <h2>Meet Our Excellent Ustadz/Ustadzah</h2>
                        </div>
                        <div class="single-item-carousel owl-carousel owl-theme owl-dots-none nav-style-one">
                            <div class="team-block-one">
                                <div class="inner-box">
                                    <figure class="image-box"><img src="frontend/assets/images/ustadz/team-1.jpg" alt=""></figure>
                                    <div class="lower-content">
                                        <div class="inner">
                                            <h4><a href="agents-details.html">Candra Halim</a></h4>
                                            <span class="designation">Senior Ustadz/ah</span>
                                            <ul class="social-links clearfix">
                                                <li><a href="index.html"><i class="fab fa-facebook-f"></i></a></li>
                                                <li><a href="index.html"><i class="fab fa-twitter"></i></a></li>
                                                <li><a href="index.html"><i class="fab fa-google-plus-g"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="team-block-one">
                                <div class="inner-box">
                                    <figure class="image-box"><img src="frontend/assets/images/ustadz/team-2.jpg" alt=""></figure>
                                    <div class="lower-content">
                                        <div class="inner">
                                            <h4><a href="agents-details.html">Suaib Harumi</a></h4>
                                            <span class="designation">Senior Ustadz/ah</span>
                                            <ul class="social-links clearfix">
                                                <li><a href="index.html"><i class="fab fa-facebook-f"></i></a></li>
                                                <li><a href="index.html"><i class="fab fa-twitter"></i></a></li>
                                                <li><a href="index.html"><i class="fab fa-google-plus-g"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="team-block-one">
                                <div class="inner-box">
                                    <figure class="image-box"><img src="frontend/assets/images/ustadz/team-3.jpg" alt=""></figure>
                                    <div class="lower-content">
                                        <div class="inner">
                                            <h4><a href="agents-details.html">Indrian Saputra</a></h4>
                                            <span class="designation">Senior Ustadz/ah</span>
                                            <ul class="social-links clearfix">
                                                <li><a href="index.html"><i class="fab fa-facebook-f"></i></a></li>
                                                <li><a href="index.html"><i class="fab fa-twitter"></i></a></li>
                                                <li><a href="index.html"><i class="fab fa-google-plus-g"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="team-block-one">
                                <div class="inner-box">
                                    <figure class="image-box"><img src="frontend/assets/images/ustadz/team-4.jpg" alt=""></figure>
                                    <div class="lower-content">
                                        <div class="inner">
                                            <h4><a href="agents-details.html">Rian Siregar</a></h4>
                                            <span class="designation">Senior Ustadz/ah</span>
                                            <ul class="social-links clearfix">
                                                <li><a href="index.html"><i class="fab fa-facebook-f"></i></a></li>
                                                <li><a href="index.html"><i class="fab fa-twitter"></i></a></li>
                                                <li><a href="index.html"><i class="fab fa-google-plus-g"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="team-block-one">
                                <div class="inner-box">
                                    <figure class="image-box"><img src="frontend/assets/images/ustadz/team-5.jpg" alt=""></figure>
                                    <div class="lower-content">
                                        <div class="inner">
                                            <h4><a href="agents-details.html">Daisy Phillips</a></h4>
                                            <span class="designation">Senior Ustadz/ah</span>
                                            <ul class="social-links clearfix">
                                                <li><a href="index.html"><i class="fab fa-facebook-f"></i></a></li>
                                                <li><a href="index.html"><i class="fab fa-twitter"></i></a></li>
                                                <li><a href="index.html"><i class="fab fa-google-plus-g"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- team-section end -->


                <!-- testimonial-style-two -->
                <section class="testimonial-style-two" style="background-image: url(frontend/assets/images/background/testimonial-1.jpg);">
                    <div class="auto-container">
                        <div class="row clearfix">
                            <div class="col-xl-6 col-lg-12 col-md-12 offset-xl-6 inner-column">
                                <div class="single-item-carousel owl-carousel owl-theme dots-style-one owl-nav-none">
                                    <div class="testimonial-block-two">
                                        <div class="inner-box">
                                            <div class="icon-box"><i class="icon-18"></i></div>
                                            <div class="text">
                                                <p class="text-white">“
                                                    Santri Salafiyah PP.PMK berasal dari berbagai daerah. Mereka membawa budaya yang berlainan. Cara mereka memandang sesuatu juga berbeda-beda. Dengannya kita belajar mengolah perbedaan menjadi sesuatu yang menguntungkan semua pihak. Kita juga melatih kedewasaan dan mengatur emosi. Tak hanya itu, kemandirian pun dilatih agar tidak selalu bergantung kepada orang lain. Begitu pula dalam setiap komunitas pasti ada peraturan yang dibuat untuk menyukseskan tujuan yang ditetapkan. Darinya kita belajar menjadi pemimpin yang adil dan bijaksana. Di situ pula kita belajar bahwa melakukan sesuatu secara berjamaah akan lebih mudah.PPs.PMK saya mendapat banyak ilmu tentang kemandirian, kecerdasan emosional, spiritual dan intelektual. Dari sini saya belajar memimpin diri sendiri dan orang lain
                                                .”</p>
                                            </div>
                                            <div class="author-info">
                                                <figure class="author-thumb"><img src="frontend/assets/images/resource/testimonial-1.jpg" alt=""></figure>
                                                <h4>Muhammad Nabil</h4>
                                                <span class="designation">Santri Angkatan 2023/2024</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="testimonial-block-two">
                                        <div class="inner-box">
                                            <div class="icon-box"><i class="icon-18"></i></div>
                                            <div class="text">
                                                <h3>“Our goal each day is to ensure that our res- idents’ needs are not only met but exceeded To make that happen we are committed to providing an environment.”</h3>
                                            </div>
                                            <div class="author-info">
                                                <figure class="author-thumb"><img src="frontend/assets/images/resource/testimonial-2.jpg" alt=""></figure>
                                                <h4>Marc Kenneth</h4>
                                                <span class="designation">Founder CEO</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="testimonial-block-two">
                                        <div class="inner-box">
                                            <div class="icon-box"><i class="icon-18"></i></div>
                                            <div class="text">
                                                <h3>“Our goal each day is to ensure that our res- idents’ needs are not only met but exceeded To make that happen we are committed to providing an environment.”</h3>
                                            </div>
                                            <div class="author-info">
                                                <figure class="author-thumb"><img src="frontend/assets/images/resource/testimonial-1.jpg" alt=""></figure>
                                                <h4>Owen Lester</h4>
                                                <span class="designation">Manager</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- testimonial-style-two end -->


                <!-- clients-section -->
                <section class="clients-section bg-color-1">
                    <div class="pattern-layer" style="background-image: url(frontend/assets/images/shape/shape-1.png);"></div>
                    <div class="auto-container">
                        <div class="row clearfix">
                            <div class="col-lg-4 col-md-12 col-sm-12 title-column">
                                <div class="sec-title">
                                    <h5>Partners Kerjasama</h5>
                                    <h2>Kami akan Menjadi Mitra untuk Jangka Panjang.</h2>
                                </div>
                            </div>
                            <div class="col-lg-8 col-md-12 col-sm-12 inner-column">
                                <div class="clients-logo">
                                    <ul class="logo-list clearfix">
                                        <li>
                                            <figure class="logo"><a href="index-2.html"><img src="frontend/assets/images/clients/clients-1.png" alt=""></a></figure>
                                        </li>
                                        <li>
                                            <figure class="logo"><a href="index-2.html"><img src="frontend/assets/images/clients/clients-2.png" alt=""></a></figure>
                                        </li>
                                        <li>
                                            <figure class="logo"><a href="index-2.html"><img src="frontend/assets/images/clients/clients-3.png" alt=""></a></figure>
                                        </li>
                                        <li>
                                            <figure class="logo"><a href="index-2.html"><img src="frontend/assets/images/clients/clients-4.png" alt=""></a></figure>
                                        </li>
                                        <li>
                                            <figure class="logo"><a href="index-2.html"><img src="frontend/assets/images/clients/clients-5.png" alt=""></a></figure>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- clients-section end -->


                <!-- subscribe-section -->
                <section class="subscribe-section bg-color-3">
                    <div class="pattern-layer" style="background-image: url(frontend/assets/images/shape/shape-2.png);"></div>
                    <div class="auto-container">
                        <div class="row clearfix">
                            <div class="col-lg-6 col-md-6 col-sm-12 text-column">
                                <div class="text">
                                    <span>Subscribe</span>
                                    <h2>Sign Up To Our Newsletter To Get The Latest News And Offers.</h2>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 form-column">
                                <div class="form-inner">
                                    <form action="contact.html" method="post" class="subscribe-form">
                                        <div class="form-group">
                                            <input type="email" name="email" placeholder="Enter your email" required="">
                                            <button type="submit">Subscribe Now</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- subscribe-section end -->


                <!-- main-footer -->
                <footer class="main-footer">
                    <div class="footer-top bg-color-2">
                        <div class="auto-container">
                            <div class="row clearfix">
                                <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                                    <div class="footer-widget about-widget">
                                        <div class="widget-title">
                                            <figure class="post-thumb"><a href="blog-details.html"><img src="frontend/assets/images/Logo Salafiyah 2023.png" alt="" style="size: 10rem"></a></figure>
                                        </div>
                                        <div class="text">
                                            <p>PP. Salafiyah Perkampungan Minangkabau Islamic Boarding School menginspirasi sekaligus menerapkan pendidikan berbasis tauhid dan adab untuk mencetak generasi Taqwa, Cerdas & Mandiri.</p>
                                            {{-- <p>Quis nostrud exercita laboris nisi ut aliquip commodo.</p> --}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                                    <div class="footer-widget links-widget ml-70">
                                        <div class="widget-title">
                                            <h3>Selayang Pandang</h3>
                                        </div>
                                        <div class="widget-content">
                                            <ul class="links-list class">
                                                <li><a href="index.html">About Us</a></li>
                                                <li><a href="index.html">Listing</a></li>
                                                <li><a href="index.html">How It Works</a></li>
                                                <li><a href="index.html">Our Services</a></li>
                                                <li><a href="index.html">Our Blog</a></li>
                                                <li><a href="index.html">Contact Us</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                                    <div class="footer-widget post-widget">
                                        <div class="widget-title">
                                            <h3>Top News</h3>
                                        </div>
                                        <div class="post-inner">
                                            <div class="post">
                                                <figure class="post-thumb"><a href="blog-details.html"><img src="frontend/assets/images/resource/footer-post-1.jpg" alt=""></a></figure>
                                                <h5><a href="blog-details.html">The Added Value Social Worker</a></h5>
                                                <p>Mar 25, 2020</p>
                                            </div>
                                            <div class="post">
                                                <figure class="post-thumb"><a href="blog-details.html"><img src="frontend/assets/images/resource/footer-post-2.jpg" alt=""></a></figure>
                                                <h5><a href="blog-details.html">Ways to Increase Trust</a></h5>
                                                <p>Mar 24, 2020</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                                    <div class="footer-widget contact-widget">
                                        <div class="widget-title">
                                            <h3>Contacts</h3>
                                        </div>
                                        <div class="widget-content">
                                            <ul class="info-list clearfix">
                                                <li><i class="fas fa-map-marker-alt"></i>Jl. Mekah RT.003 RW.006 Kec.Koto Tangah Kota Padang | Belakang TVRI Sumbar ByPass</li>
                                                <li><i class="fas fa-microphone"></i><a href="tel:23055873407">+62 812-6658-3335</a></li>
                                                <li><i class="fas fa-envelope"></i><a href="mailto:info@example.com">ppsalafiyahpmk@gmail.com</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="footer-bottom">
                        <div class="auto-container">
                            <div class="inner-box clearfix">
                                <figure class="footer-logo"><a href="index.html"><img src="frontend/assets/images/footer-logo.png" alt=""></a></figure>
                                <div class="copyright pull-left">
                                    <p><a href="index.html">PP.Salafiyah PMK</a> &copy; 2023 All Right Reserved</p>
                                </div>
                                <ul class="footer-nav pull-right clearfix">
                                    <li><a href="index.html">Terms of Service</a></li>
                                    <li><a href="index.html">Privacy Policy</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- main-footer end -->



                <!--Scroll to top-->
                <button class="scroll-top scroll-to-target" data-target="html">
                    <span class="fal fa-angle-up"></span>
                </button>
            </div>


            <!-- jequery plugins -->
            <script src="frontend/assets/js/jquery.js"></script>
            <script src="frontend/assets/js/popper.min.js"></script>
            <script src="frontend/assets/js/bootstrap.min.js"></script>
            <script src="frontend/assets/js/owl.js"></script>
            <script src="frontend/assets/js/wow.js"></script>
            <script src="frontend/assets/js/validation.js"></script>
            <script src="frontend/assets/js/jquery.fancybox.js"></script>
            <script src="frontend/assets/js/appear.js"></script>
            <script src="frontend/assets/js/scrollbar.js"></script>
            <script src="frontend/assets/js/isotope.js"></script>
            <script src="frontend/assets/js/jquery.nice-select.min.js"></script>
            <script src="frontend/assets/js/jQuery.style.switcher.min.js"></script>
            <script src="frontend/assets/js/jquery-ui.js"></script>
            <script src="frontend/assets/js/jquery.paroller.min.js"></script>
            <script src="frontend/assets/js/nav-tool.js"></script>

            <!-- main-js -->
            <script src="frontend/assets/js/script.js"></script>

        </body><!-- End of .page_wrapper -->
</html>
