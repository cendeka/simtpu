<?php if (! $__env->hasRenderedOnce('3b558c6a-460f-42a4-bc21-23a405b0e6f1')): $__env->markAsRenderedOnce('3b558c6a-460f-42a4-bc21-23a405b0e6f1'); ?>
<?php $__env->startComponent('boilerplate::minify'); ?>
    <?php echo $__env->make('boilerplate::load.async.moment', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <script>
        loadStylesheet("<?php echo mix('/plugins/datepicker/daterangepicker.min.css', '/assets/vendor/boilerplate'); ?>");
        whenAssetIsLoaded('momentjs', () => {
            loadScript("<?php echo mix('/plugins/datepicker/daterangepicker.min.js', '/assets/vendor/boilerplate'); ?>", () => {
                registerAsset('daterangepicker');
                $.fn.daterangepicker.defaultOptions = {
                    locale: {
                        "applyLabel": "<?php echo app('translator')->get('boilerplate::daterangepicker.applyLabel'); ?>",
                        "cancelLabel": "<?php echo app('translator')->get('boilerplate::daterangepicker.cancelLabel'); ?>",
                        "fromLabel": "<?php echo app('translator')->get('boilerplate::daterangepicker.fromLabel'); ?>",
                        "toLabel": "<?php echo app('translator')->get('boilerplate::daterangepicker.toLabel'); ?>",
                        "customRangeLabel": "<?php echo app('translator')->get('boilerplate::daterangepicker.customRangeLabel'); ?>",
                    }
                };
            });
        });
    </script>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?><?php /**PATH E:\Repo\simtpu-v2\vendor\sebastienheyd\boilerplate\src/resources/views/load/async/daterangepicker.blade.php ENDPATH**/ ?>