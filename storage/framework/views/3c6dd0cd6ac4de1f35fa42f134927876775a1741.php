<?php if (! $__env->hasRenderedOnce('6ca230ad-5457-43a8-bd03-49ed7db0db43')): $__env->markAsRenderedOnce('6ca230ad-5457-43a8-bd03-49ed7db0db43'); ?>
<?php if(config('broadcasting.default') === 'pusher'): ?>
<?php $__env->startComponent('boilerplate::minify'); ?>
<script>
    loadScript("<?php echo e(mix('/pusher.min.js', '/assets/vendor/boilerplate')); ?>", function() {
        window.Echo = new Echo({
            broadcaster: 'pusher',
            cluster: '<?php echo e(config('broadcasting.connections.pusher.options.cluster')); ?>',
            key: '<?php echo e(config('broadcasting.connections.pusher.key')); ?>',
<?php if(config('broadcasting.connections.pusher.options.host', false)): ?>
            wsHost: '<?php echo e(config('broadcasting.connections.pusher.options.host')); ?>',
            forceTLS: false,
            encrypted: true,
            enabledTransports: ['ws', 'wss'],
            disableStats: true,
<?php endif; ?>
<?php if(config('broadcasting.connections.pusher.options.port', false)): ?>
            wsPort: <?php echo e(config('broadcasting.connections.pusher.options.port')); ?>,
<?php endif; ?>
<?php if(config('broadcasting.connections.pusher.options.wss_port', false)): ?>
            wssPort: <?php echo e(config('broadcasting.connections.pusher.options.wss_port')); ?>,
<?php endif; ?>
        });
        registerAsset('echo');
    })
</script>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php endif; ?><?php /**PATH E:\Repo\simtpu-v2\vendor\sebastienheyd\boilerplate\src/resources/views/load/pusher.blade.php ENDPATH**/ ?>