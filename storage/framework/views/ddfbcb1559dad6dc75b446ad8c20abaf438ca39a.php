<div class="content-header pt-2 pb-1">
    <div class="container-fluid">
        <div class="d-flex align-items-end flex-wrap justify-content-between pb-2">
            <h1 class="m-0 pr-3">
                <?php echo e($title); ?>

                <?php if(isset($subtitle)): ?>
                    <small class="font-weight-light ml-1 text-md"><?php echo e($subtitle); ?></small>
                <?php endif; ?>
            </h1>
            <ol class="breadcrumb text-sm">
                <li class="breadcrumb-item">
                    <a href="<?php echo e(route('boilerplate.dashboard')); ?>">
                        <?php echo e(__('boilerplate::layout.home')); ?>

                    </a>
                </li>
                <?php if(isset($breadcrumb)): ?>
                    <?php $__currentLoopData = $breadcrumb; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $label => $route): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(is_numeric($label)): ?>
                            <li class="breadcrumb-item active"><?php echo e($route); ?></li>
                        <?php elseif(is_array($route)): ?>
                            <li class="breadcrumb-item"><a href="<?php echo e(route($route[0], $route[1])); ?>"><?php echo e($label); ?></a></li>
                        <?php else: ?>
                            <li class="breadcrumb-item"><a href="<?php echo e(route($route)); ?>"><?php echo e($label); ?></a></li>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </ol>
        </div>
    </div>
</div>
<?php /**PATH E:\Repo\simtpu-v2\vendor\sebastienheyd\boilerplate\src/resources/views/layout/contentheader.blade.php ENDPATH**/ ?>