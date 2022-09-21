<footer class="main-footer text-sm">
    <div class="d-flex justify-content-between flex-wrap">
        <div>
            <strong>
                &copy; <?php echo e(date('Y')); ?>

                <?php if(config('boilerplate.theme.footer.vendorlink')): ?>
                    <a href="<?php echo e(config('boilerplate.theme.footer.vendorlink')); ?>">
                        <?php echo config('boilerplate.theme.footer.vendorname'); ?>

                    </a>.
                <?php else: ?>
                    <?php echo config('boilerplate.theme.footer.vendorname'); ?>.
                <?php endif; ?>
            </strong>
            <?php echo e(__('boilerplate::layout.rightsres')); ?>

        </div>
        <a href="https://github.com/sebastienheyd/boilerplate">
            Boilerplate | <?php echo e(\Composer\InstalledVersions::getPrettyVersion('sebastienheyd/boilerplate')); ?>

        </a>
    </div>
</footer><?php /**PATH /Users/ilhamtaufiq/www/simtpuv2/vendor/sebastienheyd/boilerplate/src/resources/views/layout/footer.blade.php ENDPATH**/ ?>