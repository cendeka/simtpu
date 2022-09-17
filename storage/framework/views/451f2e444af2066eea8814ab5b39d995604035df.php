<?php if (! $__env->hasRenderedOnce('1f92ac27-7745-447c-a5ef-4acdbd3d34bf')): $__env->markAsRenderedOnce('1f92ac27-7745-447c-a5ef-4acdbd3d34bf'); ?>
<?php $__env->startPush('plugin-css'); ?>
    <link rel="stylesheet" href="<?php echo mix('/plugins/fileinput/bootstrap-fileinput.min.css', '/assets/vendor/boilerplate'); ?>">
<?php $__env->stopPush(); ?>
<?php $__env->startPush('plugin-js'); ?>
    <script src="<?php echo mix('/plugins/fileinput/bootstrap-fileinput.min.js', '/assets/vendor/boilerplate'); ?>"></script>
    <script src="/assets/vendor/boilerplate/plugins/fileinput/themes/fas/theme.min.js"></script>
    <script>$.fn.fileinput.defaults = $.extend({}, $.fn.fileinput.defaults, $.fn.fileinputThemes.fas);</script>
<?php if(App::getLocale() !== 'en'): ?>
    <script src="/assets/vendor/boilerplate/plugins/fileinput/locales/<?php echo e(App::getLocale()); ?>.js"></script>
    <script>$.fn.fileinput.defaults.language='<?php echo e(App::getLocale()); ?>';</script>
<?php endif; ?>
    <script>registerAsset('fileinput');</script>
<?php $__env->stopPush(); ?>
<?php endif; ?><?php /**PATH E:\Repo\simtpu-v2\vendor\sebastienheyd\boilerplate\src/resources/views/load/fileinput.blade.php ENDPATH**/ ?>