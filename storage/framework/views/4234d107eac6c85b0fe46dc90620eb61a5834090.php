<?php $__env->startSection('title'); ?>
    Tagihan Herregistrasi Pemakaman
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
<link href="<?php echo e(URL::asset('/assets/libs/sweetalert2/sweetalert2.min.css')); ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo e(URL::asset('/assets/libs/datatables/datatables.min.css')); ?>" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?>
            Herregistrasi
        <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?>
            Tagihan
        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="" method="GET">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="verticalnav-firstname-input">Tahun</label>
                                <input class="form-control" type="text" name="tahun" placeholder="Tahun" value="<?php echo e(Request::get('tahun')); ?>">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="verticalnav-lastname-input">Bulan</label>
                                <input class="form-control" type="text" name="masa" placeholder="Masa" value="<?php echo e(Request::get('masa')); ?>">
                            </div>
                        </div>
                    </div>
                            <input type="submit" value="Cari">

                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Meninggal</th>
                                <th>Nominal</th>
                                <th>Masa</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $i = 1;
                            ?>
                            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($i++); ?></td>  
                                    <th>
                                    <?php $__currentLoopData = $item->registrasi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $register): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php echo e($register->nama_meninggal); ?>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </th>    
                                    <th><?php echo e($item->nominal); ?></th>  
                                    <th><?php echo e($item->masa); ?></th>        
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-primary dropdown-toggle"
                                                data-bs-toggle="dropdown" aria-expanded="false">Opsi <i
                                                    class="mdi mdi-chevron-down"></i></button>
                                            <div class="dropdown-menu">
                                                <a href="#" id="detail" class="dropdown-item" href="javascript:void(0)"
                                                onclick="detail(<?php echo e($item->id); ?>)">Detail</a>
                                                <a href="#" class="dropdown-item" href="javascript:void(0)"
                                                    onclick="tambah(<?php echo e($item->id); ?>)">Buat Tagihan</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src="<?php echo e(URL::asset('/assets/libs/datatables/datatables.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('/assets/libs/jszip/jszip.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('/assets/libs/pdfmake/pdfmake.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('/assets/libs/sweetalert2/sweetalert2.min.js')); ?>"></script>

<script>
    <?php if($errors->any()): ?>
        Swal.fire({
            title: 'Error!',
            html: '<?php echo implode('', $errors->all('<div>:message</div>')); ?>',
            icon: 'error',
            confirmButtonText: 'Ok'
        })
    <?php endif; ?>
    <?php if(session()->has('message')): ?>
        swal.fire({
            title: 'Simpan Data',
            text: '<?php echo e(session('message')); ?>',
            icon: 'success',
            timer: 3000,
        });
    <?php endif; ?>
</script>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/ilhamtaufiq/www/simtpuv2/resources/views/pages/herregistrasi/tagihan.blade.php ENDPATH**/ ?>