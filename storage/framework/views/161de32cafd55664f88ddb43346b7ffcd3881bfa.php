<?php $__env->startSection('content'); ?>
    <section class="ud-hero" id="home">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ud-hero-content wow fadeInUp" data-wow-delay=".2s">
                        <h1 class="ud-hero-title">
                            Pelayanan Pemakaman Umum Kabupaten Cianjur
                        </h1>
                        <p class="ud-hero-desc">
                            Dinas Perumahan Dan Kawasan Permukiman Kabupaten Cianjur
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ====== Features Start ====== -->
    <section id="features" class="ud-features">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ud-section-title">
                        <span>Pelayanan</span>
                        <h2>Pelayanan Pemakaman Umum</h2>
                        <p>
                            Selamat datang di sistem informasi pelayanan pemakaman di Kabupaten Cianjur.
                            
                        </p>
                    </div>
                    <div id="reader" style="display: inline-block;"></div>
                    <div class="empty"></div>
                    <div id="scanned-result"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-sm-6">
                    <div class="ud-single-feature wow fadeInUp" data-wow-delay=".1s">
                        <div class="ud-feature-icon">
                            <i class="lni lni-gift"></i>
                        </div>
                        <div class="ud-feature-content">
                            <a href="">
                                <h3 class="ud-feature-title">TPU</h3>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-sm-6">
                    <div class="ud-single-feature wow fadeInUp" data-wow-delay=".15s">
                        <div class="ud-feature-icon">
                            <i class="lni lni-move"></i>
                        </div>
                        <div class="ud-feature-content">
                            <a href="">
                                <h3 class="ud-feature-title">Retribusi</h3>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-sm-6">
                    <div class="ud-single-feature wow fadeInUp" data-wow-delay=".2s">
                        <div class="ud-feature-icon">
                            <i class="lni lni-layout"></i>
                        </div>
                        <div class="ud-feature-content">
                            <a href="">
                                <h3 class="ud-feature-title">Herregistrasi</h3>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-sm-6">
                    <div class="ud-single-feature wow fadeInUp" data-wow-delay=".25s">
                        <div class="ud-feature-icon">
                            <i class="lni lni-layers"></i>
                        </div>
                        <div class="ud-feature-content">
                            <a href="">
                                <h3 class="ud-feature-title">Regulasi</h3>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ====== Features End ====== -->
    <!-- ====== Blog Start ====== -->
    <section class="ud-blog-grids">
        <div class="container">
            <div class="ud-section-title">
                <span>Artikel</span>
                <h2>Artikel terbaru</h2>
            </div>
            <div class="row">
                <?php $__currentLoopData = $blog; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-4 col-md-6">
                    <div class="ud-single-blog">
                        <div class="ud-blog-image">
                            <a href="blog-details.html">
                                <img src="<?php echo e($post->foto_path); ?>" alt="blog" />
                            </a>
                        </div>
                        <div class="ud-blog-content">
                            <span class="ud-blog-date"><?php echo e(date('d-m-Y', strtotime($post->created_at))); ?></span>
                            <h3 class="ud-blog-title">
                                <a href="/blog/detail?id=<?php echo e($post->id); ?>">
                                    <?php echo e($post->judul); ?>

                                </a>
                            </h3>
                            <p class="ud-blog-desc">
                                <?php echo $post->post; ?>

                            </p>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
            </div>
        </div>
    </section>
    <!-- ====== Blog End ====== -->
    <!-- ====== Contact Start ====== -->
    <section id="contact" class="ud-contact">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-8 col-lg-7">
                    <div class="ud-contact-content-wrapper">
                        <div class="ud-contact-title">
                            <span>Hubungi Kami</span>
                            <h2>
                                Silakan hubungi kami <br />
                                Untuk informasi mengenai pelayanan pemakaman
                            </h2>
                        </div>
                        <div class="ud-contact-info-wrapper">
                            <div class="ud-single-info">
                                <div class="ud-info-icon">
                                    <i class="lni lni-map-marker"></i>
                                </div>
                                <div class="ud-info-meta">
                                    <h5>Alamat</h5>
                                    <p>Jl. Adi Sucipto No.7 - Cianjur</p>
                                </div>
                            </div>
                            <div class="ud-single-info">
                                <div class="ud-info-icon">
                                    <i class="lni lni-envelope"></i>
                                </div>
                                <div class="ud-info-meta">
                                    <h5>Ada yang bisa kami bantu?</h5>
                                    <p>info@cendera.id</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-5">
                    <div class="ud-contact-form-wrapper wow fadeInUp" data-wow-delay=".2s">
                        <h3 class="ud-contact-form-title">Kirim Pesan</h3>
                        <form class="ud-contact-form">
                            <div class="ud-form-group">
                                <label for="fullName">Nama Lengkap*</label>
                                <input type="text" name="fullName" placeholder="Adam Gelius" />
                            </div>
                            <div class="ud-form-group">
                                <label for="email">Email*</label>
                                <input type="email" name="email" placeholder="example@yourmail.com" />
                            </div>
                            <div class="ud-form-group">
                                <label for="phone">Nomor Telepon*</label>
                                <input type="text" name="phone" placeholder="+885 1254 5211 552" />
                            </div>
                            <div class="ud-form-group">
                                <label for="message">Pesan*</label>
                                <textarea name="message" rows="1" placeholder="type your message here"></textarea>
                            </div>
                            <div class="ud-form-group mb-0">
                                <button type="submit" class="ud-main-btn">
                                    Kirim Pesan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ====== Contact End ====== -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main-front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/ilhamtaufiq/www/simtpuv2/resources/views/pages/front/index.blade.php ENDPATH**/ ?>