<?php if (! $__env->hasRenderedOnce('31a20a73-1b88-4355-9eb1-5101efff149c')): $__env->markAsRenderedOnce('31a20a73-1b88-4355-9eb1-5101efff149c'); ?>
<?php $__env->startPush('plugin-js'); ?>
<?php $__env->startComponent('boilerplate::minify'); ?>
    <script src="<?php echo mix('/plugins/tinymce/tinymce.min.js', '/assets/vendor/boilerplate'); ?>"></script>
    <script>
        tinymce.defaultSettings = {
            plugins: "autoresize fullscreen codemirror link lists table media image imagetools paste customalign",
            toolbar: "undo redo | styleselect | bold italic underline | customalignleft aligncenter customalignright | link media image | bullist numlist | table | code fullscreen",
            contextmenu: "link image imagetools table spellchecker bold italic underline",
            toolbar_drawer: "sliding",
            toolbar_sticky_offset: $('nav.main-header').outerHeight(),
            codemirror: { config: { theme: 'storm' } },
            menubar: false,
            removed_menuitems: 'newdocument',
            remove_linebreaks: false,
            forced_root_block: false,
            force_p_newlines: true,
            relative_urls: false,
            verify_html: false,
            branding: false,
            statusbar: false,
            browser_spellcheck: true,
            encoding: 'UTF-8',
            image_uploadtab: false,
            deprecation_warnings: false,
            paste_preprocess: function(plugin, args) {
                args.content = args.content.replace(/<(\/)*(\\?xml:|meta|link|span|font|del|ins|st1:|[ovwxp]:)((.|\s)*?)>/gi, ''); // Unwanted tags
                args.content = args.content.replace(/\s(class|style|type|start)=("(.*?)"|(\w*))/gi, ''); // Unwanted attributes
                args.content = args.content.replace(/<(p|a|div|span|strike|strong|i|u)[^>]*?>(\s|&nbsp;|<br\/>|\r|\n)*?<\/(p|a|div|span|strike|strong|i|u)>/gi, ''); // Empty tags
            },
            <?php if(setting('darkmode', false) && config('boilerplate.theme.darkmode')): ?>
                skin : "boilerplate-dark",
                content_css: 'boilerplate-dark',
            <?php else: ?>
                skin : "oxide",
            <?php endif; ?>
            <?php if(App::getLocale() !== 'en'): ?>
                language: '<?php echo e(App::getLocale()); ?>',
            <?php endif; ?>
            <?php echo $__env->renderWhen($hasMediaManager, 'boilerplate-media-manager::load.mceextend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>
        };

        /** Fix for editors removed from the DOM (modal, ajax, ...) **/
        setInterval(() => {
            if (tinymce.editors.length > 0) {
                $(tinymce.editors).each((i,e) => {
                    if($('#'+e.id).length === 0) {
                        tinymce.get(e.id).remove();
                    }
                });
            }
        });
    </script>
<?php echo $__env->renderComponent(); ?>
<?php $__env->stopPush(); ?>
<?php endif; ?><?php /**PATH E:\Repo\simtpu-v2\vendor\sebastienheyd\boilerplate\src/resources/views/load/tinymce.blade.php ENDPATH**/ ?>