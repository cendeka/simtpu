<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('boilerplate::auth.loginbox'); ?>
        <p class="login-box-msg text-sm"><?php echo app('translator')->get('boilerplate::auth.password.intro'); ?></p>
        <?php if(session('status')): ?>
            <div class="alert alert-success d-flex align-items-center">
                <span class="far fa-check-circle fa-3x mr-3"></span>
                <?php echo e(session('status')); ?>

            </div>
        <?php else: ?>
            <?php echo Form::open(['route' => 'boilerplate.password.email', 'method' => 'post', 'autocomplete'=> 'off']); ?>

                <?php $__env->startComponent('boilerplate::input', ['name' => 'email', 'placeholder' => 'boilerplate::auth.fields.email', 'append-text' => 'fas fa-envelope', 'type' => 'email', 'autofocus' => true]); ?><?php echo $__env->renderComponent(); ?>
                <div class="form-group">
                    <div class="row">
                        <div class="col-12 text-right">
                            <button type="submit" class="btn btn-primary"><?php echo app('translator')->get('boilerplate::auth.password.submit'); ?></button>
                        </div>
                    </div>
                </div>
            <?php echo Form::close(); ?>

        <?php endif; ?>
        <p class="mb-0 text-sm">
            <a href="<?php echo e(route('boilerplate.login')); ?>"><?php echo app('translator')->get('boilerplate::auth.password.login_link'); ?></a>
        </p>
        <?php if(config('boilerplate.auth.register')): ?>
            <p class="mb-0 text-sm">
                <a href="<?php echo e(route('boilerplate.register')); ?>" class="text-center"><?php echo app('translator')->get('boilerplate::auth.login.register'); ?></a>
            </p>
        <?php endif; ?>
    <?php echo $__env->renderComponent(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('boilerplate::auth.layout', ['title' => __('boilerplate::auth.password.title'), 'bodyClass' => 'hold-transition login-page'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Repo\simtpu-v2\vendor\sebastienheyd\boilerplate\src/resources/views/auth/passwords/email.blade.php ENDPATH**/ ?>