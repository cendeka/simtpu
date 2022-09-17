<div class="card card-outline card-info">
    <div id="btn-paste-group" style="display: none">
        <div class="files-selected">
            <span id="nb-files-selected"></span> <?php echo e(__('boilerplate-media-manager::message.paste.files')); ?>

        </div>
        <div class="btn-group">
            <button class="btn btn-primary btn-paste" disabled><?php echo e(__('boilerplate-media-manager::menu.paste')); ?></button>
            <button class="btn btn-default btn-paste-cancel"><?php echo e(__('boilerplate-media-manager::menu.cancel')); ?></button>
        </div>
    </div>
    <div class="card-header border-bottom-0">
        <div class="btn-group">
            <button href="#" class="btn btn-default delete-checked" disabled>
                <span class="fa fa-trash"></span>
            </button>
            <button href="#" class="btn btn-default copy-checked" disabled>
                <span class="fa fa-clipboard"></span>
            </button>
        </div>
        <span href="#" class="btn btn-default fileinput-button">
            <i class="fa fa-upload"></i>
            <span><?php echo e(__('boilerplate-media-manager::menu.upload')); ?></span>
            <input id="fileupload" type="file" name="file"  multiple>
        </span>
        <a href="#" class="btn btn-default add-folder">
            <span class="fa fa-folder"></span> <?php echo e(__('boilerplate-media-manager::menu.newFolder')); ?>

        </a>
        <div class="btn-group float-right">
            <a href="#" class="btn btn-<?php echo e($display === 'list' ? 'secondary' : 'default'); ?> btn-toggle-display" data-display="list">
                <span class="fa fa-th-list"></span>
            </a>
            <a href="#" class="btn btn-<?php echo e($display === 'tiles' ? 'secondary' : 'default'); ?> btn-toggle-display" data-display="tiles">
                <span class="fa fa-th"></span>
            </a>
        </div>
        <div class="btn-group float-right mr-2">
            <a href="#" class="btn btn-default btn-refresh">
                <span class="fa fa-sync-alt"></span>
            </a>
        </div>
    </div>
    <div class="card-body pt-0">
        <ol id="media-breadcrumb" class="breadcrumb mb-3 py-2">
            <li><a href="<?php echo e(route('mediamanager.index', [], false)); ?>"><i class="fa fa-home"></i></a></li>
            <?php $__currentLoopData = $breadcrumb->items(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dir): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><a href="<?php echo e(route('mediamanager.index', ['path' => $dir['path']], false)); ?>"><?php echo e($dir['name']); ?></a></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ol>
        <div id="progress" class="progress mb-3" style="display: none">
            <div class="progress-bar"></div>
        </div>
        <?php if(empty($list) && empty($parent)): ?>
            <div class="alert alert-default-secondary">
                <?php echo e(__('boilerplate-media-manager::list.nocontent')); ?>

            </div>
        <?php else: ?>
            <?php if($display === 'list'): ?>
                <?php echo $__env->make('boilerplate-media-manager::list-table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php else: ?>
                <?php echo $__env->make('boilerplate-media-manager::list-tiles', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>
        <?php endif; ?>
    </div>
</div>
<?php /**PATH E:\Repo\simtpu-v2\vendor\sebastienheyd\boilerplate-media-manager\src/resources/views/list.blade.php ENDPATH**/ ?>