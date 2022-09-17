<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('boilerplate::plugins.demo', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('boilerplate::layout.index', [
    'title' => __('boilerplate::layout.dashboard'),
    'subtitle' => 'Components & plugins demo',
    'breadcrumb' => ['Components & plugins demo']]
, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Repo\simtpu-v2\vendor\sebastienheyd\boilerplate\src/resources/views/dashboard.blade.php ENDPATH**/ ?>