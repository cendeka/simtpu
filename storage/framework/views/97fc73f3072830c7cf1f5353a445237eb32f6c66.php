<?php if (! $__env->hasRenderedOnce('3d4227e0-be2d-4683-970b-cf9e5a115025')): $__env->markAsRenderedOnce('3d4227e0-be2d-4683-970b-cf9e5a115025'); ?>
<?php $__env->startComponent('boilerplate::minify'); ?>
    <script>
        loadScript('<?php echo e(mix('/plugins/spectrum-colorpicker2/spectrum.min.js', '/assets/vendor/boilerplate')); ?>', () => {
            loadStylesheet('<?php echo e(mix('/plugins/spectrum-colorpicker2/spectrum.min.css', '/assets/vendor/boilerplate')); ?>', () => {
                registerAsset('ColorPicker');
            });
        })
    </script>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?><?php /**PATH E:\Repo\simtpu-v2\vendor\sebastienheyd\boilerplate\src/resources/views/load/async/colorpicker.blade.php ENDPATH**/ ?>