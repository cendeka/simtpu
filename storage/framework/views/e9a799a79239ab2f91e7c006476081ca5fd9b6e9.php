<?php $__env->startSection('title'); ?>
    Registrasi Pemakaman
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <!-- DataTables -->
    <link href="<?php echo e(URL::asset('/assets/libs/datatables/datatables.min.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(URL::asset('/assets/libs/sweetalert2/sweetalert2.min.css')); ?>" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?>
            Pemakaman
        <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?>
            Registrasi
        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>
    <div class="row">
        <div class="col-4">
            <div class="btn-group">
                <button type="button" class="btn btn-success dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Pilih Tahun<i class="mdi mdi-chevron-down"></i></button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="<?php echo e(route('registrasi')); ?>?tahun=2021">2021</a>
                        <a class="dropdown-item" href="<?php echo e(route('registrasi')); ?>?tahun=2020">2020</a>
                        <a class="dropdown-item" href="<?php echo e(route('registrasi')); ?>?tahun=2019">2019</a>


                    </div>
            </div>
            <button class="btn  btn-primary" data-bs-toggle="modal" data-bs-target=".modal-upload">Import data</button>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                   
                </div>
                <div class="card-body">
                    <table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Ahli Waris</th>
                                <th>Tahun</th>
                                <th>TPU</th>
                                <th>Retribusi</th>
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
                                    <td><?php echo e($item->nama_meninggal); ?></td>
                                    <td><?php echo e($item->ahliwaris->nama); ?></td>
                                    <td><?php echo e(date('m-Y',strtotime($item->makam->tanggal_meninggal))); ?></td>
                                    <td><?php echo e($item->makam->nama_tpu); ?></td>
                                    <td>Rp<?php echo e(number_format($item->retribusi->sum('nominal'),'2',',','.')); ?></td>
                                    <td>
                                        <div class="btn-group">
                                        <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Opsi <i class="mdi mdi-chevron-down"></i></button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="registrasi/ubah?id=<?php echo e($item->id); ?>">Ubah</a>
                                                <a class="dropdown-item btn-hapus" href="javascript:void(0)" onclick="hapus(<?php echo e($item->id); ?>)">Hapus</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="/registrasi/formulir?id=<?php echo e($item->id); ?>">Print Formulir</a>
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
    <div class="modal fade modal-upload" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myLargeModalLabel">Import Data dari File Excel</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo e(route('registrasi.import')); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="form-group mb-4" style="max-width: 500px; margin: 0 auto;">
                            <div class="custom-file text-left">
                                <input type="file" name="file" class="custom-file-input" id="customFile">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                        </div>
                        <button class="btn btn-primary">Import data</button>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
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
    <script>
        function hapus(id) {
            var url = '<?php echo e(route('registrasi.hapus')); ?>';
            var id = id;
            Swal.fire({
                title: "Apakah Anda Yakin ?",
                text: "Data Yang Sudah Dihapus Tidak Bisa Dikembalikan!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya, Tetap Hapus!"
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: url,
                        type: "POST",
                        data: {
                            "_token": "<?php echo e(csrf_token()); ?>",
                            "id": id,
                        },
                        success: function(response) {
                            swal.fire({
                                title: 'Hapus Data',
                                text: 'Data Berhasil Dihapus.',
                                icon: 'success',
                                timer: 2000,
                            });
                            location.reload();                         
                        }
                    })
                }
            })
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/ilhamtaufiq/www/simtpuv2/resources/views/pages/registrasi/index.blade.php ENDPATH**/ ?>