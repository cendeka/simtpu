<?php if (! $__env->hasRenderedOnce('39e4f162-6b70-4695-9325-3a5f78f93e01')): $__env->markAsRenderedOnce('39e4f162-6b70-4695-9325-3a5f78f93e01'); ?>
<?php $__env->startPush('plugin-css'); ?>
    <link rel="stylesheet" href="<?php echo e(mix('/plugins/codemirror/codemirror.min.css', '/assets/vendor/boilerplate')); ?>">
    <link rel="stylesheet" href="/assets/vendor/boilerplate/plugins/codemirror/theme/<?php echo e($theme ?? 'storm'); ?>.css">
<?php $__env->stopPush(); ?>
<?php
    $default = [
        'mode/xml/xml.js',
        'mode/css/css.js',
        'mode/javascript/javascript.js',
        'mode/htmlmixed/htmlmixed.js',
        'addon/edit/matchbrackets.js',
        'addon/edit/matchtags.js',
        'addon/edit/closetag.js',
        'addon/fold/xml-fold.js',
        'addon/selection/active-line.js'
    ];

    if (isset($js) && is_array($js)) {
        $default = array_merge($default, $js);
    }

    $js = array_unique($default);
?>
<?php $__env->startPush('js'); ?>
    <script src="<?php echo e(mix('/plugins/codemirror/jquery.codemirror.min.js', '/assets/vendor/boilerplate')); ?>"></script>
<?php if(!empty($js)): ?>
<?php $__currentLoopData = $js; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $script): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <script src="/assets/vendor/boilerplate/plugins/codemirror/<?php echo e($script); ?>"></script>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
    <script>registerAsset('CodeMirror',()=>{$.fn.codemirror.defaults.theme='<?php echo e($theme ?? 'storm'); ?>'});</script>
<?php $__env->stopPush(); ?>
<?php endif; ?>
<?php /**PATH E:\Repo\simtpu-v2\vendor\sebastienheyd\boilerplate\src/resources/views/load/codemirror.blade.php ENDPATH**/ ?>