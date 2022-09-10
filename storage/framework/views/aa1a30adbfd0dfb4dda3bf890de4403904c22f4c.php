<?php $__env->startSection('title'); ?>
Detail Makam
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">

                <div class="mt-5">
                    <h5 class="mb-3">Detail Makam <?php echo e($data->registrasi->nama_meninggal); ?></h5>

                    <div class="table-responsive">
                        <table class="table mb-0 table-bordered">
                            <tbody>
                                <tr>
                                    <th scope="row" style="width: 400px;">Kode Registrasi</th>
                                    <td><?php echo e($data->registrasi->kode_registrasi); ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">TPU</th>
                                    <td><?php echo e($data->nama_tpu); ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Blok</th>
                                    <td><?php echo e($data->blok_tpu); ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Nomor</th>
                                    <td><?php echo e($data->nomor_tpu); ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Luas Lahan</th>
                                    <td><?php echo e($data->luas_lahan); ?> m2</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="mt-5" id="pembayaran">
                    <h5 class="mb-3">Daftar Pembayaran Herregistrasi</h5>

                    <div class="table-responsive">
                        <table class="table mb-0 table-bordered">
                            <thead>
                                <th>No</th>
                                <th>Tahun</th>
                                <th>Bulan</th>
                                <th>Status</th>
                            </thead>
                            <tbody>
                                <?php
                                    $i = 1;
                                ?>
                              <?php $__currentLoopData = $data->registrasi->herregistrasi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($i++); ?></td>
                                    <td><?php echo e($item->tahun); ?></td>
                                    <td><?php echo e($item->masa); ?></td>
                                    <td><?php echo e($item->status); ?></td>
                                </tr>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="row mb-3">
                            <div class="col-md-12 text-end">
                                <img src="data:image/png;base64, <?php echo base64_encode(QrCode::format('png')->color(255, 0, 0)->merge('/public/assets/images/pemda.png')->size(200)->generate("".env('APP_URL')."/makam/detail?registrasi_id=".$data->registrasi->id."")); ?> ">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end Specifications -->

            </div>
        </div>
        <!-- end card -->
    </div>
</div>
<!--  Large modal example -->
<div class="modal fade modal-upload" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Foto Makam</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?php echo e(route('makam.upload')); ?>" method="post" enctype="multipart/form-data">
                    <h3 class="text-center mb-5">Upload Foto</h3>
                      <?php echo csrf_field(); ?>
                      <?php if($message = Session::get('success')): ?>
                      <div class="alert alert-success">
                          <strong><?php echo e($message); ?></strong>
                      </div>
                    <?php endif; ?>
                    <?php if(count($errors) > 0): ?>
                      <div class="alert alert-danger">
                          <ul>
                              <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </ul>
                      </div>
                    <?php endif; ?>
                      <div class="custom-file">
                            <input type="hidden" value="<?php echo e($data->registrasi->id); ?>" name="registrasi_id">
                          <input type="file" name="file" class="custom-file-input" id="chooseFile">
                          <label class="custom-file-label" for="chooseFile">Select file</label>
                      </div>
                      <button type="submit" name="submit" class="btn btn-primary btn-block mt-4">
                          Upload
                      </button>
                  </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- end row -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master-without-nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/ilhamtaufiq/www/simtpuv2/resources/views/pages/makam/publik.blade.php ENDPATH**/ ?>