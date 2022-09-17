
<?php $__env->startPush('js'); ?>
    <script>
        var clipboard = {path: '', files: []};
        var locales = {
            deleteConfirm: "<?php echo e(__('boilerplate-media-manager::message.delete.confirm')); ?>",
            deleteSuccess: "<?php echo e(__('boilerplate-media-manager::message.delete.success')); ?>",
            folderName: "<?php echo e(__('boilerplate-media-manager::message.folder.name')); ?>",
            folderSuccess: "<?php echo e(__('boilerplate-media-manager::message.folder.success')); ?>",
            renameTitle: "<?php echo e(__('boilerplate-media-manager::message.rename.title')); ?>",
            renameSuccess: "<?php echo e(__('boilerplate-media-manager::message.rename.success')); ?>",
            uploadSuccess: "<?php echo e(__('boilerplate-media-manager::message.upload.success')); ?>",
            pasteSuccess: "<?php echo e(__('boilerplate-media-manager::message.paste.success')); ?>",
        };
        var routes = {
            ajaxList: "<?php echo e(route('mediamanager.ajax.list', [], false)); ?>",
            ajaxDelete: "<?php echo e(route('mediamanager.ajax.delete', [], false)); ?>",
            ajaxUpload: "<?php echo e(route('mediamanager.ajax.upload', [], false)); ?>",
            ajaxPaste: "<?php echo e(route('mediamanager.ajax.paste', [], false)); ?>",
            newFolder: "<?php echo e(route('mediamanager.ajax.new-folder', [], false)); ?>",
            rename: "<?php echo e(route('mediamanager.ajax.rename', [], false)); ?>",
        }
    </script>
    <script src="<?php echo e(mix('/vendor/blueimp-file-upload/jquery.fileupload.min.js', '/assets/vendor/boilerplate-media-manager')); ?>"></script>
    <script src="<?php echo e(mix('/vendor/jquery-lazy/jquery.lazy.plugins.js', '/assets/vendor/boilerplate-media-manager')); ?>"></script>
    <script src="<?php echo e(mix('/mediamanager.min.js', '/assets/vendor/boilerplate-media-manager')); ?>"></script>
<?php $__env->stopPush(); ?>
<?php /**PATH E:\Repo\simtpu-v2\vendor\sebastienheyd\boilerplate-media-manager\src/resources/views/scripts.blade.php ENDPATH**/ ?>