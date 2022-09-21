<?php if (! $__env->hasRenderedOnce('feee2bb3-290f-4674-a264-d06211df5fee')): $__env->markAsRenderedOnce('feee2bb3-290f-4674-a264-d06211df5fee'); ?>
<?php $__env->startComponent('boilerplate::minify'); ?>
    <script>
        loadScript('<?php echo mix('/plugins/moment/moment-with-locales.min.js', '/assets/vendor/boilerplate'); ?>', () => {
            moment.locale('<?php echo e(App::getLocale()); ?>');
            registerAsset('momentjs');
        });
    </script>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?><?php /**PATH /Users/ilhamtaufiq/www/simtpuv2/vendor/sebastienheyd/boilerplate/src/resources/views/load/async/moment.blade.php ENDPATH**/ ?>