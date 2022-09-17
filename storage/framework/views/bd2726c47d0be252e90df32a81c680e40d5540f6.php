<?php $__env->startSection('content'); ?>
    <?php if (app('laratrust')->ability('admin', 'emaileditor_email_dev')) : ?>
    <div class="row">
        <div class="col-12 mb-3">
            <span class="btn-group float-right">
                <a href="<?php echo e(route("emaileditor.email.create")); ?>" class="btn btn-primary">
                    <?php echo e(__('boilerplate-email-editor::email.add')); ?>

                </a>
            </span>
        </div>
    </div>
    <?php endif; // app('laratrust')->ability ?>
    <?php $__env->startComponent('boilerplate::card'); ?>
        <table class="table table-striped table-hover va-middle" id="emails-table">
            <thead>
            <tr>
                <th><?php echo e(__('boilerplate-email-editor::email.id')); ?></th>
                <th><?php echo e(__('boilerplate-email-editor::email.Slug')); ?></th>
                <th><?php echo e(__('boilerplate-email-editor::email.Subject')); ?></th>
                <th><?php echo e(__('boilerplate-email-editor::email.Description')); ?></th>
                <th><?php echo e(__('boilerplate-email-editor::email.actions')); ?></th>
            </tr>
            </thead>
        </table>
    <?php echo $__env->renderComponent(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('boilerplate::load.datatables', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->startPush('js'); ?>
<?php $__env->startComponent('boilerplate::minify'); ?>
    <script>
        $(function () {
            oTable = $('#emails-table').DataTable({
                processing: false,
                serverSide: true,
                stateSave: true,
                ajax: {
                    url: '<?php echo route('emaileditor.email.datatable'); ?>',
                    type: 'post',
                },
                columns: [
                    {data: 'id', name: 'id', width: '70px', searchable: false},
                    {data: 'slug', name: 'slug'},
                    {data: 'subject', name: 'subject', orderable: false},
                    {data: 'description', name: 'description', searchable: true, orderable: false},
                    {data: 'actions', name: 'actions', orderable: false, searchable: false, width: '140px', class: "visible-on-hover"}
                ]
            });

            $('#emails-table').on('click', '.destroy', function (e) {
                e.preventDefault();

                var href = $(this).attr('href');

                bootbox.confirm("<?php echo e(__('boilerplate-email-editor::email.delete')); ?>", function (result) {
                    if (result === false) {
                        return;
                    }

                    $.ajax({
                        url: href,
                        method: 'delete',
                        success: function () {
                            oTable.ajax.reload();
                            growl("<?php echo e(__('boilerplate-email-editor::email.deletesuccess')); ?>", "success");
                        }
                    });
                });
            });
        });
    </script>
<?php echo $__env->renderComponent(); ?>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('boilerplate::layout.index', [
    'title' => __('boilerplate-email-editor::editor.title'),
    'subtitle' => __('boilerplate-email-editor::email.list'),
    'breadcrumb' => [
        __('boilerplate-email-editor::editor.title'),
        __('boilerplate-email-editor::email.list'),
    ]
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Repo\simtpu-v2\vendor\sebastienheyd\boilerplate-email-editor\src/resources/views/email/index.blade.php ENDPATH**/ ?>