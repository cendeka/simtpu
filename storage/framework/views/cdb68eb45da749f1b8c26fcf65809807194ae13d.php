<?php if (! $__env->hasRenderedOnce('66fdc85c-5162-4788-b404-5f72a8ae9c55')): $__env->markAsRenderedOnce('66fdc85c-5162-4788-b404-5f72a8ae9c55'); ?>
<?php $__env->startComponent('boilerplate::minify'); ?>
    <?php echo $__env->make('boilerplate::load.async.moment', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <script>
        loadStylesheet('<?php echo mix('/plugins/datatables/datatables.min.css', '/assets/vendor/boilerplate'); ?>');
        whenAssetIsLoaded('momentjs', () => {
            loadScript('<?php echo mix('/plugins/datatables/datatables.min.js', '/assets/vendor/boilerplate'); ?>', () => {
                
                <?php $__currentLoopData = $plugins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plugin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($$plugin ?? false): ?>
                        loadStylesheet('<?php echo mix('/plugins/datatables/plugins/'.$plugin.'.bootstrap4.min.css', '/assets/vendor/boilerplate'); ?>');
                        loadScript('<?php echo mix('/plugins/datatables/plugins/dataTables.'.$plugin.'.min.js', '/assets/vendor/boilerplate'); ?>', () => {
                            loadScript('<?php echo mix('/plugins/datatables/plugins/'.$plugin.'.bootstrap4.min.js', '/assets/vendor/boilerplate'); ?>', () => {
                            <?php if($plugin === 'buttons'): ?>
                                loadScript('<?php echo mix('/plugins/datatables/buttons.min.js', '/assets/vendor/boilerplate'); ?>', () => {
                            <?php endif; ?>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                registerAsset('datatables', () => {
                    $.extend(true, $.fn.dataTable.defaults, {
                        autoWidth: false,
                        language: {
                            url: "<?php echo mix('/plugins/datatables/i18n/'.$locale.'.json', '/assets/vendor/boilerplate'); ?>"
                        },
                    });
                });
                <?php $__currentLoopData = $plugins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plugin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($$plugin ?? false): ?>
                        <?php if($plugin === 'buttons'): ?>
                                });
                        <?php endif; ?>
                            });
                        });
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            });
        });
    </script>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>


<?php /**PATH E:\Repo\simtpu-v2\vendor\sebastienheyd\boilerplate\src/resources/views/load/async/datatables.blade.php ENDPATH**/ ?>