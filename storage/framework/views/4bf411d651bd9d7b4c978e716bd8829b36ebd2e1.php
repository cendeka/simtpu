<?php $__env->startSection('content'); ?>
    <?php if(isset($email)): ?>
    <?php echo Form::open(['route' => ['emaileditor.email.update', $email->id], 'method' => 'put', 'autocomplete'=> 'off', 'id' => 'email-form']); ?>

    <?php else: ?>
    <?php echo Form::open(['route' => 'emaileditor.email.store', 'method' => 'post', 'autocomplete'=> 'off', 'id' => 'email-form']); ?>

    <?php endif; ?>
    <?php echo $__env->make('boilerplate-email-editor::email.toolbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="row">
        <div class="col-md-4">
            <?php $__env->startComponent('boilerplate::card', ['color' => 'success', 'title' => __('boilerplate-email-editor::email.header')]); ?>
                <?php $__env->startComponent('boilerplate::input', ['name' => 'subject', 'value' => $email->subject ?? '', 'label' => __('boilerplate-email-editor::email.Subject'), 'group-class' => 'required']); ?><?php echo $__env->renderComponent(); ?>
                <?php $__env->startComponent('boilerplate::input', ['name' => 'sender_name', 'value' => $email->sender_name ?? '', 'label' => __('boilerplate-email-editor::email.Sender_name'), 'placeholder' => config('boilerplate.email-editor.from.name'), 'help' => __('boilerplate-email-editor::email.ifNameEmpty')]); ?><?php echo $__env->renderComponent(); ?>
                <?php $__env->startComponent('boilerplate::input', ['name' => 'sender_email', 'value' => $email->sender_email ?? '', 'label' => __('boilerplate-email-editor::email.Sender_email'), 'placeholder' => config('boilerplate.email-editor.from.address'), 'help' => __('boilerplate-email-editor::email.ifAdressEmpty')]); ?><?php echo $__env->renderComponent(); ?>
            <?php echo $__env->renderComponent(); ?>

            <?php if (app('laratrust')->ability('admin', 'emaileditor_email_dev')) : ?>
            <?php $__env->startComponent('boilerplate::card', ['color' => 'primary', 'title' => __('boilerplate-email-editor::email.Parameters')]); ?>
                <?php $__env->startComponent('boilerplate::input', ['name' => 'slug', 'value' => $email->slug ?? '', 'label' => __('boilerplate-email-editor::email.Slug'), 'help' => __('boilerplate-email-editor::email.Slug_tip'), 'group-class' => 'required']); ?><?php echo $__env->renderComponent(); ?>
                <?php $__env->startComponent('boilerplate::input', ['name' => 'description', 'value' => $email->description ?? '', 'label' => __('boilerplate-email-editor::email.Description')]); ?><?php echo $__env->renderComponent(); ?>
                <?php $__env->startComponent('boilerplate::input', ['type' => 'select', 'name' => 'layout', 'value' => $email->layout ?? '0', 'options' => ['0' => '-'] + $layouts, 'id' => 'layout', 'label' => __('boilerplate-email-editor::email.Layout')]); ?><?php echo $__env->renderComponent(); ?>
            <?php echo $__env->renderComponent(); ?>
            <?php else: ?>
                <input type="hidden" name="layout" value="<?php echo e($email->layout ?? ''); ?>">
            <?php endif; // app('laratrust')->permission ?>
        </div>
        <div class="col-md-8">
            <?php $__env->startComponent('boilerplate::card', ['color' => 'info', 'tabs' => true]); ?>
                <?php $__env->slot('header'); ?>
                    <ul class="nav nav-tabs" id="email-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="content-tab" data-toggle="pill" href="#tab-content" role="tab" aria-controls="email-tabs-content" aria-selected="true"><?php echo e(__('boilerplate-email-editor::email.Content')); ?></a>
                        </li>
                        <?php if (app('laratrust')->ability('admin', 'emaileditor_email_dev')) : ?>
                        <li class="nav-item">
                            <a class="nav-link" id="code-tab" data-toggle="pill" href="#tab-code" role="tab" aria-controls="email-tabs-code" aria-selected="false"><?php echo e(__('boilerplate-email-editor::email.Code')); ?></a>
                        </li>
                        <?php endif; // app('laratrust')->ability ?>
                    </ul>
                <?php $__env->endSlot(); ?>
                <div class="tab-content" id="email-tabs-tabContent">
                    <div class="tab-pane fade show active" id="tab-content" role="tabpanel" aria-labelledby="content-tab">
                        <?php $__env->startComponent('boilerplate::input', ['type' => 'textarea', 'name' => 'content', 'value' => $email->mce_content ?? '', 'id' => 'content']); ?><?php echo $__env->renderComponent(); ?>
                    </div>
                    <div class="tab-pane fade" id="tab-code" role="tabpanel" aria-labelledby="code-tab"></div>
                </div>
            <?php echo $__env->renderComponent(); ?>
        </div>
    </div>
    <?php echo Form::close(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
<?php $__env->startComponent('boilerplate::minify', ['type' => 'css']); ?>
    <style>
        .required label:after {
            content: '*';
            padding-left: 5px;
            color: crimson;
        }
    </style>
<?php echo $__env->renderComponent(); ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('boilerplate-email-editor::email.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('boilerplate::layout.index', [
    'title' => __('boilerplate-email-editor::editor.title'),
    'subtitle' => __('boilerplate-email-editor::email.add.title'),
    'breadcrumb' => [
        __('boilerplate-email-editor::editor.title'),
        __('boilerplate-email-editor::email.add.title')
    ]
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Repo\simtpu-v2\vendor\sebastienheyd\boilerplate-email-editor\src/resources/views/email/edit.blade.php ENDPATH**/ ?>