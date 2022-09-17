<?php if(empty($name)): ?>
    <code>
        &lt;x-boilerplate::datatable>
        The name attribute has not been set
    </code>
<?php elseif(! $permission): ?>
    <code>
        &lt;x-boilerplate::datatable>
        You don't have permission to access the table "<?php echo e($name); ?>"
    </code>
<?php else: ?>
    <div class="table-responsive">
        <table class="table table-striped table-hover va-middle w-100<?php echo e($datatable->condensed ? ' table-sm' : ''); ?>" id="<?php echo e($id); ?>">
            <thead>
            <tr>
                <?php $__currentLoopData = $datatable->getColumns(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $column): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <th><?php if(!empty($column->tooltip)): ?><span data-toggle="tooltip" title="<?php echo e($column->tooltip); ?>"><?php endif; ?><?php echo $column->title; ?><?php if(!empty($column->tooltip)): ?></span><?php endif; ?></th>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tr>
            <?php if(in_array('filters', $datatable->buttons)): ?>
            <tr class="filters" style="display:none">
                <?php $__currentLoopData = $datatable->getColumns(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $column): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <th>
                        <?php if($column->searchable === false): ?>
                            <?php continue; ?>
                        <?php endif; ?>
                        <?php switch($column->filterType):
                            case ('select'): ?>
                                <?php $__env->startComponent('boilerplate::select2', ['name' => "filter[$k]", 'groupClass' => 'mb-0', 'class' => 'form-control-sm dt-filter-select', 'options' => $column->filterOptions, 'data-field' => "$k", 'allowClear' => true]); ?><?php echo $__env->renderComponent(); ?>
                            <?php break; ?>
                            <?php case ('select-multiple'): ?>
                                <?php $__env->startComponent('boilerplate::select2', ['name' => "filter[$k]", 'groupClass' => 'mb-0', 'class' => 'form-control-sm dt-filter-select', 'options' => $column->filterOptions, 'data-field' => "$k", 'multiple' => true]); ?><?php echo $__env->renderComponent(); ?>
                            <?php break; ?>
                            <?php case ('daterangepicker'): ?>
                                <?php $__env->startComponent('boilerplate::daterangepicker', ['name' => "filter[$k]", 'groupClass' => 'mb-0', 'class' => 'dt-filter-daterange', 'controlClass' => 'form-control-sm', 'data-field' => "$k", 'alignment' => 'center']); ?><?php echo $__env->renderComponent(); ?>
                            <?php break; ?>
                            <?php default: ?>
                                <?php $__env->startComponent('boilerplate::input', ['name' => "filter[$k]", 'groupClass' => 'mb-0', 'class' => 'dt-filter-text form-control-sm', 'data-field' => "$k", 'clearable' => true]); ?><?php echo $__env->renderComponent(); ?>
                            <?php break; ?>
                        <?php endswitch; ?>
                    </th>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tr>
            <?php endif; ?>
            </thead>
            <tbody></tbody>
        </table>
    </div>
    <?php echo $__env->make('boilerplate::load.async.datatables', ['buttons' => true], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('boilerplate::load.pusher', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php $__env->startComponent('boilerplate::minify'); ?>
    <script>
        whenAssetIsLoaded('datatables', function() {
            window.<?php echo e($id); ?>_ajax = <?php echo json_encode($ajax); ?>

            window.<?php echo e(\Str::camel($id)); ?> = $('#<?php echo e($id); ?>')
                .data('inst', '<?php echo e(\Str::camel($id)); ?>' )
                .on('processing.dt', $.fn.dataTable.customProcessing).DataTable({
                processing: false,
                serverSide: true,
                autoWidth: false,
                orderCellsTop: true,
                buttons: { buttons: [<?php echo $datatable->getButtons(); ?>]},
                info: <?php echo e((int) $datatable->info); ?>,
                searching: <?php echo e((int) $datatable->searching); ?>,
                ordering: <?php echo e((int) $datatable->ordering); ?>,
                <?php if($datatable->ordering): ?>
                    order: <?php echo $datatable->order; ?>,
                <?php endif; ?>
                paging: <?php echo e((int) $datatable->paging); ?>,
                pageLength: <?php echo e($datatable->pageLength); ?>,
                <?php if($datatable->paging): ?>
                    pagingType: '<?php echo e($datatable->pagingType); ?>',
                    lengthChange: <?php echo e((int) $datatable->lengthChange); ?>,
                    lengthMenu: <?php echo $datatable->lengthMenu; ?>,
                <?php endif; ?>
                <?php if($datatable->stateSave): ?>
                    stateSave: true,
                    stateSaveParams: $.fn.dataTable.saveFiltersState,
                    stateLoadParams: $.fn.dataTable.loadFiltersState,
                <?php endif; ?>
                ajax: {
                    url: '<?php echo route('boilerplate.datatables', $datatable->slug, false); ?>',
                    type: 'post',
                    data: $.fn.dataTable.parseDatatableFilters,
                    complete: () => { $('#<?php echo e($id); ?> [name=dt-check-all]').prop('checked', false) }
                },
                columns: [
                    <?php $__currentLoopData = $datatable->getColumns(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $column): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php echo $column->get(); ?>,
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                ],
                initComplete: $.fn.dataTable.init,
                dom:
                    "<'d-flex flex-wrap justify-content-between'<'dt_top_left mb-2 mr-2'l><'dt_top_right d-flex mb-2'f>>" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'d-flex flex-wrap align-items-center justify-content-between'<'dt_bottom_left mt-2'i><'dt_bottom_right mt-2'p>>",
            });

            window.<?php echo e(\Str::camel($id)); ?>.locale = <?php echo $datatable->getLocale(); ?>

        });

        whenAssetIsLoaded('echo', () => {
            Echo.private('<?php echo e(channel_hash('dt', $name)); ?>')
                .listen('.RefreshDatatable', (res) => {
                    if (res.name === '<?php echo e($name); ?>') {
                        window.<?php echo e(\Str::camel($id)); ?>.draw('full-hold');
                    }
                });
        });
    </script>
    <?php echo $__env->renderComponent(); ?>
<?php endif; ?><?php /**PATH E:\Repo\simtpu-v2\vendor\sebastienheyd\boilerplate\src/resources/views/components/datatable.blade.php ENDPATH**/ ?>