

<?php $__env->startSection('title'); ?>
    Blog
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?>
            Blog
        <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?>
            Daftar Artikel
        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-start">
                    <div class="me-2">
                        <h5 class="card-title mb-4">Terbaru</h5>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table align-middle table-nowrap mb-0">
                        <tr>
                            <th scope="col" colspan="2">Post</th>
                            <th scope="col">Author</th>
                            <th scope="col">Action</th>
                          </tr>
                        <tbody>
                          <?php $__currentLoopData = $post; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <tr>
                            <td style="width: 100px;"><img src="<?php echo e($item->foto_path); ?>" alt="" class="avatar-md h-auto d-block rounded"></td>
                            <td>
                                <h5 class="font-size-13 text-truncate mb-1"><a href="javascript: void(0);" class="text-dark"><?php echo e($item->judul); ?></a></h5>
                                <p class="text-muted mb-0"><?php echo e(date('d-m-Y', strtotime($item->created_at))); ?></p>
                            </td>
                            <td><i class="bx bx-like align-middle me-1"></i> 125</td>
                            <td>
                                <div class="dropdown">
                                    <a class="text-muted font-size-16" role="button" data-bs-toggle="dropdown" aria-haspopup="true">
                                        <i class="mdi mdi-dots-horizontal"></i>
                                    </a>
                                  
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item" href="#">Action</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">Separated link</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- end card -->
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Repo\simtpu-v2\resources\views/pages/blog/index.blade.php ENDPATH**/ ?>