<?php $__env->startSection('content'); ?>
    <div id="disable"></div>
    <div id="loading"><div><span class="fa fa-4x fa-sync-alt fa-spin"></span></div></div>
    <div id="media-content" data-mce="0" data-display="list" data-type="<?php echo e($type); ?>" data-path="/<?php echo e((string) $path); ?>"></div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
    <link rel="stylesheet" href="<?php echo e(mix('/mediamanager.min.css', '/assets/vendor/boilerplate-media-manager')); ?>">
<?php $__env->stopPush(); ?>

<?php echo $__env->make('boilerplate-media-manager::scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('boilerplate::layout.index', [
    'title' => __('boilerplate-media-manager::menu.medialibrary'),
    'subtitle' => __('boilerplate-media-manager::menu.medialist'),
    'breadcrumb' => [
        __('boilerplate-media-manager::menu.medialibrary')
    ]
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Repo\simtpu-v2\vendor\sebastienheyd\boilerplate-media-manager\src/resources/views/index.blade.php ENDPATH**/ ?>