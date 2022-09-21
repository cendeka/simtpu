<?php if (! $__env->hasRenderedOnce('77af9913-d31d-4176-bb93-46b569b3340b')): $__env->markAsRenderedOnce('77af9913-d31d-4176-bb93-46b569b3340b'); ?>
<?php $__env->startPush('plugin-css'); ?>
    <link rel="stylesheet" href="<?php echo mix('/plugins/fullcalendar/main.min.css', '/assets/vendor/boilerplate'); ?>">
<?php $__env->stopPush(); ?>
<?php $__env->startPush('plugin-js'); ?>
    <script src="<?php echo mix('/plugins/fullcalendar/fullcalendar.min.js', '/assets/vendor/boilerplate'); ?>"></script>
<?php if(App::getLocale() !== 'en'): ?>
    <script src="<?php echo mix('/plugins/fullcalendar/locales/'.App::getLocale().'.js', '/assets/vendor/boilerplate'); ?>"></script>
    <script>registerAsset('fullCalendar',()=>{$.fn.fullCalendar.options = {locale:"<?php echo e(App::getLocale()); ?>"}})</script>
<?php else: ?>
    <script>registerAsset('fullCalendar')</script>
<?php endif; ?>
<?php $__env->stopPush(); ?>
<?php endif; ?><?php /**PATH /Users/ilhamtaufiq/www/simtpuv2/vendor/sebastienheyd/boilerplate/src/resources/views/load/fullcalendar.blade.php ENDPATH**/ ?>