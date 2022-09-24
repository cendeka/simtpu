<?php $__env->startSection('title'); ?>
Konfigurasi
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
<link href="<?php echo e(URL::asset('/assets/libs/datatables/datatables.min.css')); ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo e(URL::asset('/assets/libs/sweetalert2/sweetalert2.min.css')); ?>" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->startComponent('components.breadcrumb'); ?>
    <?php $__env->slot('li_1'); ?>
        Konfigurasi
    <?php $__env->endSlot(); ?>
    <?php $__env->slot('title'); ?>
        Konfigurasi Retribusi
    <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="<?php echo e(route("konfig.store")); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <label for="konfig">Nama</label>
                        <input type="text" name="konfig" class="form-control" placeholder="Nama Item">
                    </div>
                    <label for="properties">Properties</label>
                    <div class="row">
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <input type="text" name="properties[0][kode_rekening]" class="form-control" placeholder="Kode Rekening">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <input type="text" name="properties[0][uraian]" class="form-control" placeholder="Uraian">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                <input type="number" name="properties[0][nominal]" class="form-control" placeholder="Nominal">
                                </div>
                            </div>
                    </div>
                    <div>
                        <input class="btn btn-success" type="submit">
                    </div>
                </form>
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->
<table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
    <thead>
        <tr>
            <th>No</th>
            <th>Jenis</th>
            <th>Kode Rekening</th>
            <th>Uraian</th>
            <th>Nominal</th>
            <th>Opsi</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $i = 1;
        ?>
      <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <?php $__currentLoopData = $value->properties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <tr>
        <td><?php echo e($i++); ?></td>
        <td><?php echo e($value->konfig); ?></td>
        <td><?php echo e($p['kode_rekening']); ?></td>
        <td><?php echo e($p['uraian']); ?></td>
        <td>Rp<?php echo e(number_format($p['nominal'],'2',',','.')); ?></td>
        <td><div class="btn-group">
            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Opsi <i class="mdi mdi-chevron-down"></i></button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="" id="editData" data-toggle="modal" data-target='#editModal' data-id="<?php echo e($value->id); ?>">Ubah</a>
                    <a class="dropdown-item btn-hapus" href="">Hapus</a>
                </div>
            </div>
        </td>
      </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<div class="modal fade" id="editModal">
    <div class="modal-dialog">
       <form id="konfigData">
            <div class="modal-content">
            <input type="text" id="id" name="id" value="">
            <div class="modal-body">
            </div>
            <input type="submit" value="Submit" id="submit" class="btn btn-sm btn-outline-danger py-0" style="font-size: 0.8em;">
        </div>
       </form>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src="<?php echo e(URL::asset('/assets/libs/datatables/datatables.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('/assets/libs/jszip/jszip.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('/assets/libs/pdfmake/pdfmake.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('/assets/libs/sweetalert2/sweetalert2.min.js')); ?>"></script>
<script>
    $(document).ready(function() {
        $('#datatable').DataTable({
            dom: 'Bfrtip',
            responsive: true,
            ordering: true,
            info: true,
            buttons: [{
                    extend: 'copyHtml5',
                    className: 'btn btn-dark',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5]
                    }
                },
                {
                    extend: 'excelHtml5',
                    className: 'btn btn-dark',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4]
                    }
                },
                {
                    extend: 'print',
                    className: 'btn btn-dark',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4]
                    }
                },
                {
                    extend: 'pdfHtml5',
                    className: 'btn btn-dark',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4]
                    }
                },
            ]
        });
        $('#datatable_filter input').addClass('form-control form-control-sm'); // <-- add this line
        $('#datatable_filter label').addClass('text-muted'); // <-- add this line
    });
</script>
<script>
    
$(document).ready(function () {

$.ajaxSetup({
    headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
});

$('body').on('click', '#editData', function (event) {

    event.preventDefault();
    var id = $(this).data('id');
    $('#id').val(id);
    $.get('konfigurasi/' + id + '/edit', function (data) {
        data.forEach(function(e))
     })
});

}); 
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/ilhamtaufiq/www/simtpuv2/resources/views/pages/konfigurasi/index.blade.php ENDPATH**/ ?>