<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('boilerplate::auth.loginbox'); ?>
        <p class="login-box-msg text-sm"><?php echo app('translator')->get('boilerplate::auth.password_reset.intro'); ?></p>
        <?php echo Form::open(['route' => 'boilerplate.password.reset.post', 'method' => 'post', 'autocomplete'=> 'off']); ?>

            <?php echo Form::hidden('token', $token); ?>

            <?php $__env->startComponent('boilerplate::input', ['name' => 'email', 'placeholder' => 'boilerplate::auth.fields.email', 'append-text' => 'fas fa-fw fa-envelope', 'type' => 'email', 'value' => $email, 'autofocus' => true]); ?><?php echo $__env->renderComponent(); ?>
            <?php $__env->startComponent('boilerplate::password', ['name' => 'password', 'placeholder' => 'boilerplate::auth.fields.password']); ?><?php echo $__env->renderComponent(); ?>
            <?php $__env->startComponent('boilerplate::password', ['name' => 'password_confirmation', 'placeholder' => 'boilerplate::auth.fields.password_confirm', 'check' => false]); ?><?php echo $__env->renderComponent(); ?>
            <div class="row">
                <div class="col-12 text-center">
                    <button class="btn btn-primary" type="submit"><?php echo app('translator')->get('boilerplate::auth.password_reset.submit'); ?></button>
                </div>
            </div>
        <?php echo Form::close(); ?>

    <?php echo $__env->renderComponent(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('boilerplate::auth.layout', ['title' => __('boilerplate::auth.password_reset.title')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/ilhamtaufiq/www/simtpuv2/vendor/sebastienheyd/boilerplate/src/resources/views/auth/passwords/reset.blade.php ENDPATH**/ ?>