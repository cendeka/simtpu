<?php $__env->startSection('title'); ?>
    Laporan
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <link href="<?php echo e(URL::asset('/assets/libs/sweetalert2/sweetalert2.min.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(URL::asset('/assets/libs/datatables/datatables.min.css')); ?>" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?>
            Laporan
        <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?>
            Registrasi Pemakaman
        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>
    <h1>Laporan</h1>
    <form action="">
        <select name="tahun" id="">
            <option value="">Pilih Tahun</option>
            <option value="2022">2022</option>
            <option value="2021">2021</option>
            <option value="2020">2020</option>
            <option value="2019">2019</option>
        </select>
        <select name="bulan" id="">
            <option value="">Pilih Bulan</option>
            <option value="01">Januari</option>
            <option value="02">Februari</option>
            <option value="03">Maret</option>
            <option value="04">April</option>
            <option value="05">Mei</option>
            <option value="06">Juni</option>
            <option value="07">Juli</option>
            <option value="08">Agustus</option>
            <option value="09">September</option>
            <option value="10">Oktober</option>
            <option value="11">November</option>
            <option value="12">Desember</option>
        </select>
        <button type="submit">Lihat</button>
    </form>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1><i class="fas fa-file-excel "></i></h1>
                <p>Laporan Registrasi Pemakaman Bulan <?php echo e(request()->get('bulan') ?? ''); ?> Tahun <?php echo e(request()->get('tahun') ?? ''); ?> </p>
            </div>
            <div class="col-12 text-center">
                <?php if(!$data->isEmpty()): ?>
                    <button class="btn btn-sm btn-success"
                        onclick="location.href='registrasi/download?tahun=<?php echo e(request()->get('tahun') ?? ''); ?>&bulan=<?php echo e(request()->get('bulan') ?? ''); ?>'">
                        Download</button>
                <?php else: ?>
                    <button disabled="disabled" class="btn btn-sm btn-danger">Tidak Tersedia</button>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <br>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/ilhamtaufiq/www/simtpuv2/resources/views/pages/laporan/registrasi.blade.php ENDPATH**/ ?>