

<?php $__env->startSection('title'); ?> SIM-TPU Kab. Cianjur <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?> SIM-TPU <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?> Dashboard <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>
<p>Jumlah Retribusi: <?php echo e($retribusi); ?></p>
<p>Jumlah Registrasi Pemakaman: <?php echo e($registrasi->count()); ?></p>
<p>Jumlah Makam: <?php echo e($makam->count()); ?></p>
<p>Jumlah Registrasi tahun 2021: <?php echo e($subTahun); ?></p>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/ilhamtaufiq/www/simtpuv2/resources/views/index.blade.php ENDPATH**/ ?>