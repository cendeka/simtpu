<?php if (! $__env->hasRenderedOnce('90c3460e-8bfe-4563-b402-14ab620ef210')): $__env->markAsRenderedOnce('90c3460e-8bfe-4563-b402-14ab620ef210'); ?>
<?php $__env->startComponent('boilerplate::minify'); ?>
    <script>
        loadScript('<?php echo e(mix('/plugins/spectrum-colorpicker2/spectrum.min.js', '/assets/vendor/boilerplate')); ?>', () => {
            loadStylesheet('<?php echo e(mix('/plugins/spectrum-colorpicker2/spectrum.min.css', '/assets/vendor/boilerplate')); ?>', () => {
                registerAsset('ColorPicker');
            });
        })
    </script>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?><?php /**PATH /Users/ilhamtaufiq/www/simtpuv2/vendor/sebastienheyd/boilerplate/src/resources/views/load/async/colorpicker.blade.php ENDPATH**/ ?>