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
    <link rel="shortcut icon" href="<?php echo e(URL::asset('assets/images/pemda.png   ')); ?>" type="image/svg" />

    <!-- ===== All CSS files ===== -->
    <link rel="stylesheet" href="<?php echo e(URL::asset('front/assets/css/bootstrap.min.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(URL::asset('front/assets/css/animate.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(URL::asset('front/assets/css/lineicons.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(URL::asset('front/assets/css/ud-styles.css')); ?>" />
</head>

<body>
    <!-- ====== Header Start ====== -->
    <header class="ud-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg">
                        <a class="navbar-brand" href="/">
                            <img src="<?php echo e(URL::asset('/assets/images/pemda.png')); ?>" style="weight: 52px; width: 52px;"
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
                                    <a class="ud-menu-scroll" href="#home">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="ud-menu-scroll" href="#home">Informasi</a>
                                </li>
                                <li class="nav-item">
                                    <a class="ud-menu-scroll" href="#home">Tentang Kami</a>
                                </li>
                            </ul>
                        </div>

                        <div class="navbar-btn d-none d-sm-inline-block">
                            <?php if(Auth::check()): ?>
                                <a href="dashboard" class="ud-main-btn ud-white-btn">
                                    Dashboard
                                </a>
                            <?php else: ?>
                                <a href="<?php echo e(url('/login')); ?>" class="ud-main-btn ud-login-btn">
                                    Masuk
                                </a>
                                <a class="ud-main-btn ud-white-btn" href="javascript:void(0)">
                                    Daftar
                                </a>
                            <?php endif; ?>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ====== Header End ====== -->
    <?php echo $__env->yieldContent('content'); ?>

    <!-- ====== Footer Start ====== -->
    <footer class="ud-footer wow fadeInUp" data-wow-delay=".15s">
        <div class="shape shape-1">
            <img src="<?php echo e(URL::asset('front/assets/images/footer/shape-1.svg')); ?>" alt="shape" />
        </div>
        <div class="shape shape-2">
            <img src="<?php echo e(URL::asset('front/assets/images/footer/shape-2.svg')); ?>" alt="shape" />
        </div>
        <div class="shape shape-3">
            <img src="<?php echo e(URL::asset('front/assets/images/footer/shape-3.svg')); ?>" alt="shape" />
        </div>
        <div class="ud-footer-widgets">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="ud-widget">
                            <a href="/" class="ud-footer-logo">
                                <img src="<?php echo e(URL::asset('/assets/images/pemda.png')); ?>"
                                    style="height: 54px; width: 52px;" alt="logo" />
                            </a>
                            <p class="ud-widget-desc">
                                We create digital experiences for brands and companies by
                                using technology.
                            </p>
                            <ul class="ud-widget-socials">
                                <li>
                                    <a href="https://twitter.com/">
                                        <i class="lni lni-facebook-filled"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://twitter.com/">
                                        <i class="lni lni-twitter-filled"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://twitter.com/">
                                        <i class="lni lni-instagram-filled"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://twitter.com/">
                                        <i class="lni lni-linkedin-original"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6">
                        <div class="ud-widget">
                            <h5 class="ud-widget-title">Tentang Kami</h5>
                            <ul class="ud-widget-links">
                                <li>
                                    <a href="javascript:void(0)">Tentang Kami</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-3 col-md-6 col-sm-6">
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
                    </div>
                    <div class="col-xl-2 col-lg-3 col-md-6 col-sm-6">
                        <div class="ud-widget">
                            <h5 class="ud-widget-title">Informasi Lainnya</h5>
                            <ul class="ud-widget-links">
                                <li>
                                    <a href="https://lineicons.com/" rel="nofollow noopner" target="_blank">Lineicons
                                    </a>
                                </li>
                                <li>
                                    <a href="https://ecommercehtml.com/" rel="nofollow noopner"
                                        target="_blank">Ecommerce HTML</a>
                                </li>
                                <li>
                                    <a href="https://ayroui.com/" rel="nofollow noopner" target="_blank">Ayro UI</a>
                                </li>
                                <li>
                                    <a href="https://graygrids.com/" rel="nofollow noopner" target="_blank">Plain
                                        Admin</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ud-footer-bottom">
            <div class="container">
                <div class="row">
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
                </div>
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
    <script src="<?php echo e(URL::asset('front/assets/js/bootstrap.bundle.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('front/assets/js/wow.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('front/assets/js/main.js')); ?>"></script>
    <!--<script src="../qr-scanner.umd.min.js"></script>-->
    <!--<script src="../qr-scanner.legacy.min.js"></script>-->
    <script type="module">
    import QrScanner from "../assets/vendor/scanner/qr-scanner.min.js";

    const video = document.getElementById('qr-video');
    const videoContainer = document.getElementById('video-container');
    const camHasCamera = document.getElementById('cam-has-camera');
    const camList = document.getElementById('cam-list');
    const camHasFlash = document.getElementById('cam-has-flash');
    const flashToggle = document.getElementById('flash-toggle');
    const flashState = document.getElementById('flash-state');
    const camQrResult = document.getElementById('cam-qr-result');
    const camQrResultTimestamp = document.getElementById('cam-qr-result-timestamp');
    const fileSelector = document.getElementById('file-selector');
    const fileQrResult = document.getElementById('file-qr-result');

    function setResult(label, result) {
        console.log(result.data);
        label.textContent = result.data;
        camQrResultTimestamp.textContent = new Date().toString();
        label.style.color = 'teal';
        clearTimeout(label.highlightTimeout);
        label.highlightTimeout = setTimeout(() => label.style.color = 'inherit', 100);
    }

    // ####### Web Cam Scanning #######

    const scanner = new QrScanner(video, result => setResult(camQrResult, result), {
        onDecodeError: error => {
            camQrResult.textContent = error;
            camQrResult.style.color = 'inherit';
        },
        highlightScanRegion: true,
        highlightCodeOutline: true,
    });

    const updateFlashAvailability = () => {
        scanner.hasFlash().then(hasFlash => {
            camHasFlash.textContent = hasFlash;
            flashToggle.style.display = hasFlash ? 'inline-block' : 'none';
        });
    };

    scanner.start().then(() => {
        updateFlashAvailability();
        // List cameras after the scanner started to avoid listCamera's stream and the scanner's stream being requested
        // at the same time which can result in listCamera's unconstrained stream also being offered to the scanner.
        // Note that we can also start the scanner after listCameras, we just have it this way around in the demo to
        // start the scanner earlier.
        QrScanner.listCameras(true).then(cameras => cameras.forEach(camera => {
            const option = document.createElement('option');
            option.value = camera.id;
            option.text = camera.label;
            camList.add(option);
        }));
    });

    QrScanner.hasCamera().then(hasCamera => camHasCamera.textContent = hasCamera);

    // for debugging
    window.scanner = scanner;

    document.getElementById('scan-region-highlight-style-select').addEventListener('change', (e) => {
        videoContainer.className = e.target.value;
        scanner._updateOverlay(); // reposition the highlight because style 2 sets position: relative
    });

    document.getElementById('show-scan-region').addEventListener('change', (e) => {
        const input = e.target;
        const label = input.parentNode;
        label.parentNode.insertBefore(scanner.$canvas, label.nextSibling);
        scanner.$canvas.style.display = input.checked ? 'block' : 'none';
    });

    document.getElementById('inversion-mode-select').addEventListener('change', event => {
        scanner.setInversionMode(event.target.value);
    });

    camList.addEventListener('change', event => {
        scanner.setCamera(event.target.value).then(updateFlashAvailability);
    });

    flashToggle.addEventListener('click', () => {
        scanner.toggleFlash().then(() => flashState.textContent = scanner.isFlashOn() ? 'on' : 'off');
    });

    document.getElementById('start-button').addEventListener('click', () => {
        scanner.start();
    });

    document.getElementById('stop-button').addEventListener('click', () => {
        scanner.stop();
    });

    // ####### File Scanning #######

    fileSelector.addEventListener('change', event => {
        const file = fileSelector.files[0];
        if (!file) {
            return;
        }
        QrScanner.scanImage(file, { returnDetailedScanResult: true })
            .then(result => setResult(fileQrResult, result))
            .catch(e => setResult(fileQrResult, { data: e || 'No QR code found.' }));
    });
</script>
    <script>
        // ==== for menu scroll
        const pageLink = document.querySelectorAll(".ud-menu-scroll");

        pageLink.forEach((elem) => {
            elem.addEventListener("click", (e) => {
                e.preventDefault();
                document.querySelector(elem.getAttribute("href")).scrollIntoView({
                    behavior: "smooth",
                    offsetTop: 1 - 60,
                });
            });
        });

        // section menu active
        function onScroll(event) {
            const sections = document.querySelectorAll(".ud-menu-scroll");
            const scrollPos =
                window.pageYOffset ||
                document.documentElement.scrollTop ||
                document.body.scrollTop;

            for (let i = 0; i < sections.length; i++) {
                const currLink = sections[i];
                const val = currLink.getAttribute("href");
                const refElement = document.querySelector(val);
                const scrollTopMinus = scrollPos + 73;
                if (
                    refElement.offsetTop <= scrollTopMinus &&
                    refElement.offsetTop + refElement.offsetHeight > scrollTopMinus
                ) {
                    document
                        .querySelector(".ud-menu-scroll")
                        .classList.remove("active");
                    currLink.classList.add("active");
                } else {
                    currLink.classList.remove("active");
                }
            }
        }

        window.document.addEventListener("scroll", onScroll);
    </script>
</body>

</html>
<?php /**PATH /Users/ilhamtaufiq/www/simtpuv2/resources/views/layouts/main-front.blade.php ENDPATH**/ ?>