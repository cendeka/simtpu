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
    <script src="<?php echo e(URL::asset('assets/vendor/html5-qrcode/html5-qrcode.min.js')); ?>"></script>
    <script>
        function docReady(fn) {
            // see if DOM is already available
            if (document.readyState === "complete" || document.readyState === "interactive") {
                // call on next available tick
                setTimeout(fn, 1);
            } else {
                document.addEventListener("DOMContentLoaded", fn);
            }
        }
        /** Ugly function to write the results to a table dynamically. */
        function printScanResultPretty(codeId, decodedText, decodedResult) {
            let resultSection = document.getElementById('scanned-result');
            let tableBodyId = "scanned-result-table-body";
            if (!document.getElementById(tableBodyId)) {
                let table = document.createElement("table");
                table.className = "styled-table";
                table.style.width = "100%";
                resultSection.appendChild(table);
                let theader = document.createElement('thead');
                let trow = document.createElement('tr');
                let th1 = document.createElement('td');
                th1.innerText = "Count";
                let th2 = document.createElement('td');
                th2.innerText = "Format";
                let th3 = document.createElement('td');
                th3.innerText = "Result";
                trow.appendChild(th1);
                trow.appendChild(th2);
                trow.appendChild(th3);
                theader.appendChild(trow);
                table.appendChild(theader);
                let tbody = document.createElement("tbody");
                tbody.id = tableBodyId;
                table.appendChild(tbody);
            }
            let tbody = document.getElementById(tableBodyId);
            let trow = document.createElement('tr');
            let td1 = document.createElement('td');
            td1.innerText = `${codeId}`;
            let td2 = document.createElement('td');
            td2.innerText = `${decodedResult.result.format.formatName}`;
            let td3 = document.createElement('td');
            td3.innerText = `${decodedText}`;
            trow.appendChild(td1);
            trow.appendChild(td2);
            trow.appendChild(td3);
            tbody.appendChild(trow);
        }
        docReady(function() {
            hljs.initHighlightingOnLoad();
            var lastMessage;
            var codeId = 0;
            function onScanSuccess(decodedText, decodedResult) {
                /**
                 * If you following the code example of this page by looking at the
                 * source code of the demo page - good job!!
                 * 
                 * Tip: update this function with a success callback of your choise.
                 */
                if (lastMessage !== decodedText) {
                    lastMessage = decodedText;
                    printScanResultPretty(codeId, decodedText, decodedResult);
                    ++codeId;
                }
            }
            let html5QrcodeScanner = new Html5QrcodeScanner(
                "reader", 
                { 
                    fps: 10,
                    qrbox: { width: 250, height: 250 },
                    // Important notice: this is experimental feature, use it at your
                    // own risk. See documentation in
                    // mebjas@/html5-qrcode/src/experimental-features.ts
                    experimentalFeatures: {
                        useBarCodeDetectorIfSupported: true
                    },
                    rememberLastUsedCamera: true
                });
            html5QrcodeScanner.render(onScanSuccess);
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