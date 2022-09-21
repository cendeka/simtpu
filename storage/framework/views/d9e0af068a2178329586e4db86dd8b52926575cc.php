<nav class="main-header navbar navbar-expand<?php echo e(config('boilerplate.theme.navbar.bg') === 'white' ? '' : ' navbar-'.config('boilerplate.theme.navbar.bg')); ?> navbar-<?php echo e(setting('darkmode', false) && config('boilerplate.theme.darkmode') ? 'dark' : config('boilerplate.theme.navbar.type')); ?> <?php echo e(config('boilerplate.theme.navbar.border') ? "" : "border-bottom-0"); ?>" data-type="<?php echo e(config('boilerplate.theme.navbar.type')); ?>">
    <div class="navbar-left d-flex">
        <ul class="nav navbar-nav">
            <li class="nav-item">
                <a class="nav-link sidebar-toggle px-2" data-widget="pushmenu" href="#">
                    <i class="fas fa-fw fa-bars"></i>
                </a>
            </li>
            <?php $__currentLoopData = app('boilerplate.navbar.items')->getItems('left'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $view): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php echo $view; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
    <div class="navbar-right ml-auto d-flex">
        <ul class="nav navbar-nav">
            <?php echo $__env->renderWhen(config('boilerplate.theme.navbar.user.visible'), 'boilerplate::layout.header.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>
            <?php $__currentLoopData = app('boilerplate.navbar.items')->getItems('right'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $view): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php echo $view; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php echo $__env->renderWhen((config('boilerplate.app.allowImpersonate') && Auth::user()->hasRole('admin')) || session()->has('impersonate'), 'boilerplate::layout.header.impersonate', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>
            <?php echo $__env->renderWhen(config('boilerplate.locale.switch', false), 'boilerplate::layout.header.language', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>
            <?php echo $__env->renderWhen(config('boilerplate.theme.darkmode', false), 'boilerplate::layout.header.darkmode', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>
            <?php echo $__env->renderWhen(config('boilerplate.theme.fullscreen', false), 'boilerplate::layout.header.fullscreen', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>
            <li class="nav-item">
                <?php echo Form::open(['route' => 'boilerplate.logout', 'method' => 'post', 'id' => 'logout-form']); ?>

                <button type="submit" class="btn nav-link d-flex align-items-center logout px-2" data-question="<?php echo e(__('boilerplate::layout.logoutconfirm')); ?>" data-toggle="tooltip" title="<?php echo app('translator')->get('boilerplate::layout.logout'); ?>">
                    <span class="fa fa-fw fa-power-off hidden-xs pr-1"></span>
                </button>
                <?php echo Form::close(); ?>

            </li>
        </ul>
    </div>
</nav>
<?php /**PATH /Users/ilhamtaufiq/www/simtpuv2/vendor/sebastienheyd/boilerplate/src/resources/views/layout/header.blade.php ENDPATH**/ ?>