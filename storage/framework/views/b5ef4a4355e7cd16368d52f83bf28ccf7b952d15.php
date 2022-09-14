

<?php $__env->startSection('title'); ?>
Konfigurasi Siste
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->startComponent('components.breadcrumb'); ?>
    <?php $__env->slot('li_1'); ?>
        Konfigurasi
    <?php $__env->endSlot(); ?>
    <?php $__env->slot('title'); ?>
        Konfigurasi Sistem
    <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="<?php echo e(route("konfig.store")); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <label for="konfig">Name</label>
                        <input type="text" name="konfig" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="properties">Properties</label>
                        <div class="col">
                            <input type="text" name="properties[0][kode_rekening]" class="form-control" placeholder="Kode Rekening">
                        </div>
                        <div class="col">
                            <input type="text" name="properties[0][uraian]" class="form-control" placeholder="Uraian">
                        </div>
                        <div class="col">
                            <input type="number" name="properties[0][nominal]" class="form-control" placeholder="Nominal">
                        </div>
                    </div>
                    <div>
                        <input class=" btn btn-danger" type="submit">
                    </div>
                </form>
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Jenis</th>
                            <th>Kode Rekening</th>
                            <th>Uraian</th>
                            <th>Nominal</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php $__currentLoopData = $value->properties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($value->konfig); ?></td>
                            <td><?php echo e($p['kode_rekening']); ?></td>
                            <td><?php echo e($p['uraian']); ?></td>
                            <td><?php echo e($p['nominal']); ?></td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
               
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Repo\simtpu-v2\resources\views/pages/konfigurasi/index.blade.php ENDPATH**/ ?>