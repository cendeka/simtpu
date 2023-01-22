<!-- =========

 Template Name: Play
 Author: UIdeck
 Author URI: https://uideck.com/
 Support: https://uideck.com/support/
 Version: 1.1

========== -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pelayanan Pemakaman Umum Kabupaten Cianjur</title>

    <!-- Primary Meta Tags -->
    <meta name="title" content="Pelayanan Pemakaman Umum Kabupaten Cianjur">
    <meta name="description" content="Dinas Perumahan dan Kawasan Permukiman Kabupaten Cianjur">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="/">
    <meta property="og:title" content="Pelayanan Pemakaman Umum Kabupaten Cianjur">
    <meta property="og:description" content="Dinas Perumahan dan Kawasan Permukiman Kabupaten Cianjur">
    <meta property="og:image" content="/">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="/">
    <meta property="og:title" content="Pelayanan Pemakaman Umum Kabupaten Cianjur">
    <meta property="og:description" content="Dinas Perumahan dan Kawasan Permukiman Kabupaten Cianjur">
    <meta property="og:image" content="/">


    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="{{ URL::asset('assets/images/pemda.png   ') }}" type="image/svg" />

    <!-- ===== All CSS files ===== -->
    <link rel="stylesheet" href="{{ URL::asset('front/assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('front/assets/css/animate.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('front/assets/css/lineicons.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('front/assets/css/ud-styles.css') }}" />
</head>

<body>
    <!-- ====== Header Start ====== -->
    <header class="ud-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg">
                        <a class="navbar-brand" href="/">
                            <img src="{{ URL::asset('/assets/images/pemda.png') }}" style="weight: 52px; width: 52px;"
                                alt="Logo" />
                        </a>
                        <button class="navbar-toggler">
                            <span class="toggler-icon"> </span>
                            <span class="toggler-icon"> </span>
                            <span class="toggler-icon"> </span>
                        </button>

                        <div class="navbar-collapse">
                            <ul id="nav" class="navbar-nav mx-auto">
                                <li class="nav-item">
                                    <a class="ud-menu-scroll" href="/#home">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="ud-menu-scroll" href="/#artikel">Informasi</a>
                                </li>
                                <li class="nav-item">
                                    <a class="ud-menu-scroll" href="/#hubungi">Hubungi Kami</a>
                                </li>
                            </ul>
                        </div>

                        <!-- <div class="navbar-btn d-none d-sm-inline-block">
                            @if (Auth::check())
                                <a href="dashboard" class="ud-main-btn ud-white-btn">
                                    Dashboard
                                </a>
                            @else
                                <a href="{{ url('/login') }}" class="ud-main-btn ud-login-btn">
                                    Masuk
                                </a>
                                <a class="ud-main-btn ud-white-btn" href="javascript:void(0)">
                                    Daftar
                                </a>
                            @endif
                        </div> -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ====== Header End ====== -->
    @yield('content')

    <!-- ====== Footer Start ====== -->
    <footer class="ud-footer wow fadeInUp" data-wow-delay=".15s">
        <div class="shape shape-1">
            <img src="{{ URL::asset('front/assets/images/footer/shape-1.svg') }}" alt="shape" />
        </div>
        <div class="shape shape-2">
            <img src="{{ URL::asset('front/assets/images/footer/shape-2.svg') }}" alt="shape" />
        </div>
        <div class="shape shape-3">
            <img src="{{ URL::asset('front/assets/images/footer/shape-3.svg') }}" alt="shape" />
        </div>
        <div class="ud-footer-widgets">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="ud-widget">
                            <a href="/" class="ud-footer-logo">
                                <img src="{{ URL::asset('/assets/images/pemda.png') }}"
                                    style="height: 54px; width: 52px;" alt="logo" />
                            </a>
                            <p class="ud-widget-desc">
                                Dinas Perumahan dan Kawasan Permukiman Kabupaten Cianjur.
                            </p>
                            <ul class="ud-widget-socials">
                                <!-- <li>
                                    <a href="https://twitter.com/">
                                        <i class="lni lni-facebook-filled"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://twitter.com/">
                                        <i class="lni lni-twitter-filled"></i>
                                    </a>
                                </li> -->
                                <li>
                                    <a href="https://instagram.com/disperkim.cianjur">
                                        <i class="lni lni-instagram-filled"></i>
                                    </a>
                                </li>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6">
                        <div class="ud-widget">
                            <h5 class="ud-widget-title">Tentang Kami</h5>
                            <ul class="ud-widget-links">
                                <li>
                                    <a href="javascript:void(0)">Tentang Kami</a>
                                </li>
                            </ul>
                        </div>
                    </div> -->
                    <!-- <div class="col-xl-2 col-lg-3 col-md-6 col-sm-6">
                        <div class="ud-widget">
                            <h5 class="ud-widget-title">Pelayanan</h5>
                            <ul class="ud-widget-links">
                                <li>
                                    <a href="javascript:void(0)">How it works</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">Privacy policy</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">Terms of service</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">Refund policy</a>
                                </li>
                            </ul>
                        </div>
                    </div> -->
                    <!-- <div class="col-xl-2 col-lg-3 col-md-6 col-sm-6">
                        <div class="ud-widget">
                            <h5 class="ud-widget-title">Informasi Lainnya</h5>
                            <ul class="ud-widget-links">

                            </ul>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
        <div class="ud-footer-bottom">
            <div class="container">
                <!-- <div class="row">
                    <div class="col-md-8">
                        <ul class="ud-footer-bottom-left">
                            <li>
                                <a href="javascript:void(0)">Privacy policy</a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">Support policy</a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">Terms of service</a>
                            </li>
                        </ul>
                    </div>
                </div> -->
            </div>
        </div>
    </footer>
    <!-- ====== Footer End ====== -->

    <!-- ====== Back To Top Start ====== -->
    <a href="javascript:void(0)" class="back-to-top">
        <i class="lni lni-chevron-up"> </i>
    </a>
    <!-- ====== Back To Top End ====== -->

    <!-- ====== All Javascript Files ====== -->
    <script src="{{ URL::asset('front/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ URL::asset('front/assets/js/wow.min.js') }}"></script>
    <script src="{{ URL::asset('front/assets/js/main.js') }}"></script>
    <script>

    </script>
    @yield('script')

</body>

</html>
