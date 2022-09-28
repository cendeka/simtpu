<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" key="t-menu"><?php echo app('translator')->get('translation.Menu'); ?></li>

                <li>
                    <a href="<?php echo e(route('root')); ?>" class="waves-effect">
                        <i class="bx bx-home-circle"></i>
                        <span key="t-starter-page">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class=" bx bx-food-menu "></i>
                        <span key="t-starter-page">Registrasi</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="<?php echo e(route('registrasi.tambah')); ?>">Form Registrasi</a></li>
                        <li><a href="<?php echo e(route('registrasi')); ?>">Data Registrasi</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class="bx bx-book-content "></i>
                        <span key="t-starter-page">Herregistrasi</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="<?php echo e(route('herregistrasi')); ?>">Data Herregistrasi</a></li>
                        <li><a href="<?php echo e(route('herregistrasi.tagihan')); ?>">Tagihan Herregistrasi</a></li>

                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class=" bx bx-file-blank "></i>
                        <span key="t-starter-page">SKRD</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="<?php echo e(route('skrd.registrasi')); ?>">SKRD Registrasi</a></li>
                        <li><a href="<?php echo e(route('skrd.herregistrasi')); ?>">SKRD Herregistrasi</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class=" bx bx-user-pin "></i>
                        <span key="t-starter-page">Makam</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="<?php echo e(route('makam')); ?>">Data Makam</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class=" bx bx-line-chart"></i>
                        <span key="t-starter-page">Laporan</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="<?php echo e(route('statistik')); ?>">Data Statistik</a></li>
                        <li><a href="<?php echo e(route('laporan.registrasi')); ?>">Laporan Registrasi</a></li>

                    </ul>
                </li>

                <li class="menu-title" key="t-menu"><?php echo app('translator')->get('translation.Pages'); ?></li>
                <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class=" bx bx-cog "></i>
                        <span key="t-starter-page">Konfigurasi</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="<?php echo e(route('konfig.tambah')); ?>">Retribusi</a></li>
                    </ul>
                </li>
                <?php if (app('laratrust')->hasRole('admin')) : ?>
                <li>
                    <a href="/admin" class="waves-effect">
                        <i class="bx bx-user-circle"></i>
                        <span key="t-starter-page">Panel Admin</span>
                    </a>
                </li>
                <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class=" bx bx-cog "></i>
                        <span key="t-starter-page">Blog</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="<?php echo e(route('blog.index')); ?>">Daftar Artikel</a></li>
                        <li><a href="<?php echo e(route('blog.tambah')); ?>">Buat Artikel</a></li>

                    </ul>
                </li>
                <?php endif; // app('laratrust')->hasRole ?>
                



                

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
<?php /**PATH E:\Repo\simtpu-v2\resources\views/layouts/sidebar.blade.php ENDPATH**/ ?>