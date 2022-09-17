<table class="table table-striped table-sm table-hover" id="media-list" data-path="<?php echo e($content->path()); ?>">
    <thead>
    <tr>
        <th style="width:35px">
            <div class="icheck-primary">
                <input type="checkbox" class="check-all" id="check-all">
                <label for="check-all"></label>
            </div>
        </th>
        <th><?php echo e(__('boilerplate-media-manager::list.name')); ?></th>
        <th style="width: 100px"><?php echo e(__('boilerplate-media-manager::list.weight')); ?></th>
        <th style="width: 80px"><?php echo e(__('boilerplate-media-manager::list.type')); ?></th>
        <th style="width: 160px"><?php echo e(__('boilerplate-media-manager::list.date')); ?></th>
        <th style="width: 150px"></th>
    </tr>
    </thead>
    <tbody>
    <?php if($parent): ?>
        <tr class="level-up">
            <td></td>
            <td>
                <a href="<?php echo e($parent['link']); ?>" class="link-folder">
                    <span class="fa fa-level-up-alt fa-lg fa-fw media-icon fa-flip-horizontal" ></span> ..
                </a>
            </td>
            <td>-</td>
            <td><?php echo e(__('boilerplate-media-manager::types.folder')); ?></td>
            <td><?php echo e($parent['time']); ?></td>
            <td></td>
        </tr>
    <?php endif; ?>
    <?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr class="media" data-filename="<?php echo e($item['name']); ?>" data-url="<?php echo e($item['url']); ?>">
            <td>
                <div class="icheck-primary">
                    <input type="checkbox" name="check[]" value="<?php echo e($item['name']); ?>" id="item_<?php echo e($k); ?>">
                    <label for="item_<?php echo e($k); ?>"></label>
                </div>
            </td>
            <td>
                <?php if($item['isDir']): ?>
                    <a href="<?php echo e($item['link']); ?>" class="link-folder">
                        <span class="far fa-folder fa-lg fa-fw media-icon"></span>&nbsp;<?php echo e($item['name']); ?>

                    </a>
                <?php else: ?>
                    <a href="<?php echo e($item['url']); ?>" class="link-media" data-filename="<?php echo e($item['name']); ?>">
                    <?php if($item['type'] === 'image'): ?>
                        <img class="lazy mr-2" data-src="<?php echo e($item['thumb']); ?>" alt="<?php echo e($item['name']); ?>" style="max-width:26px;max-height:26px"> <?php echo e($item['name']); ?>

                    <?php else: ?>
                        <span class="far fa-<?php echo e($item['icon']); ?> fa-lg fa-fw media-icon"></span>&nbsp;<?php echo e($item['name']); ?>

                    <?php endif; ?>
                    </a>
                <?php endif; ?>
            </td>
            <td><?php echo e($item['size']); ?></td>
            <td><?php echo e(__('boilerplate-media-manager::types.'.$item['type'])); ?></td>
            <td><?php echo e($item['time']); ?></td>
            <td class="visible-on-hover">
                <div class="btn-group">
                    <?php if(!$item['isDir']): ?>
                        <a href="<?php echo e($item['url']); ?>" class="btn btn-sm btn-default btn-view">
                            <span class="fa fa-eye"></span>
                        </a>
                        <a href="<?php echo e($item['url']); ?>" class="btn btn-sm btn-default" download="<?php echo e($item['url']); ?>" target="_blank">
                            <span class="fa fa-download"></span>
                        </a>
                    <?php endif; ?>
                    <a href="#" class="btn btn-sm btn-default btn-rename" data-type="<?php echo e($item['type'] === 'folder' ? 'folder' : 'file'); ?>" data-filename="<?php echo e($item['name']); ?>" data-name="<?php echo e($item['filename'] ?? ''); ?>">
                        <span class="fa fa-pencil-alt"></span>
                    </a>
                    <a href="#" class="btn btn-sm btn-default btn-delete" data-filename="<?php echo e($item['name']); ?>">
                        <span class="fa fa-trash"></span>
                    </a>
                </div>
            </td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<?php /**PATH E:\Repo\simtpu-v2\vendor\sebastienheyd\boilerplate-media-manager\src/resources/views/list-table.blade.php ENDPATH**/ ?>