<?php if (! $__env->hasRenderedOnce('00f975d4-032d-4348-b4b9-53196f796407')): $__env->markAsRenderedOnce('00f975d4-032d-4348-b4b9-53196f796407'); ?>
<?php $__env->startComponent('boilerplate::minify'); ?>
    <script>
        loadScript('<?php echo mix('/plugins/moment/moment-with-locales.min.js', '/assets/vendor/boilerplate'); ?>', () => {
            moment.locale('<?php echo e(App::getLocale()); ?>');
            registerAsset('momentjs');
        });
    </script>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?><?php /**PATH E:\Repo\simtpu-v2\vendor\sebastienheyd\boilerplate\src/resources/views/load/async/moment.blade.php ENDPATH**/ ?>