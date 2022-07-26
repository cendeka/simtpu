<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" key="t-menu"><?php echo app('translator')->get('translation.Menu'); ?></li>

                <li>
                    <a href="<?php echo e(route('root')); ?>" class="waves-effect">
                        <i class="bx bx-home-circle"></i>
                        <span key="t-starter-page">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class=" bx bx-food-menu "></i>
                        <span key="t-starter-page">Registrasi</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="<?php echo e(route('registrasi.tambah')); ?>">Form Registrasi</a></li>
                        <li><a href="<?php echo e(route('registrasi')); ?>">Data Registrasi</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class="bx bx-book-content "></i>
                        <span key="t-starter-page">Herregistrasi</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="<?php echo e(route('herregistrasi')); ?>">Data Herregistrasi</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class=" bx bx-file-blank "></i>
                        <span key="t-starter-page">SKRD</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="<?php echo e(route('skrd.registrasi')); ?>">SKRD Registrasi</a></li>
                        <li><a href="<?php echo e(route('skrd.herregistrasi')); ?>">SKRD Herregistrasi</a></li>
                    </ul>
                </li>
                 <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class=" bx bx-user-pin "></i>
                        <span key="t-starter-page">Makam</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="<?php echo e(route('makam')); ?>">Data Makam</a></li>
                    </ul>
                </li>

                <li class="menu-title" key="t-menu"><?php echo app('translator')->get('translation.Pages'); ?></li>

                <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <span class="badge rounded-pill bg-success float-end"
                            key="t-new"><?php echo app('translator')->get('translation.New'); ?></span>
                        <i class="bx bx-user-circle"></i>
                        <span key="t-authentication"><?php echo app('translator')->get('translation.Authentication'); ?></span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="auth-login" key="t-login"><?php echo app('translator')->get('translation.Login'); ?></a></li>
                        <li><a href="auth-login-2" key="t-login-2"><?php echo app('translator')->get('translation.Login'); ?> 2</a></li>
                        <li><a href="auth-register" key="t-register"><?php echo app('translator')->get('translation.Register'); ?></a></li>
                        <li><a href="auth-register-2" key="t-register-2"><?php echo app('translator')->get('translation.Register'); ?> 2</a></li>
                        <li><a href="auth-recoverpw" key="t-recover-password"><?php echo app('translator')->get('translation.Recover_Password'); ?></a>
                        </li>
                        <li><a href="auth-recoverpw-2" key="t-recover-password-2"><?php echo app('translator')->get('translation.Recover_Password'); ?>
                                2</a></li>
                        <li><a href="auth-lock-screen" key="t-lock-screen"><?php echo app('translator')->get('translation.Lock_Screen'); ?></a></li>
                        <li><a href="auth-lock-screen-2" key="t-lock-screen-2"><?php echo app('translator')->get('translation.Lock_Screen'); ?> 2</a>
                        </li>
                        <li><a href="auth-confirm-mail" key="t-confirm-mail"><?php echo app('translator')->get('translation.Confirm_Mail'); ?></a></li>
                        <li><a href="auth-confirm-mail-2" key="t-confirm-mail-2"><?php echo app('translator')->get('translation.Confirm_Mail'); ?> 2</a>
                        </li>
                        <li><a href="auth-email-verification"
                                key="t-email-verification"><?php echo app('translator')->get('translation.Email_verification'); ?></a></li>
                        <li><a href="auth-email-verification-2"
                                key="t-email-verification-2"><?php echo app('translator')->get('translation.Email_verification'); ?> 2</a></li>
                        <li><a href="auth-two-step-verification"
                                key="t-two-step-verification"><?php echo app('translator')->get('translation.Two_step_verification'); ?></a></li>
                        <li><a href="auth-two-step-verification-2"
                                key="t-two-step-verification-2"><?php echo app('translator')->get('translation.Two_step_verification'); ?> 2</a></li>
                    </ul>
                </li>



                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-share-alt"></i>
                        <span key="t-multi-level"><?php echo app('translator')->get('translation.Multi_Level'); ?></span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li><a href="javascript: void(0);" key="t-level-1-1"><?php echo app('translator')->get('translation.Level_1.1'); ?></a></li>
                        <li>
                            <a href="javascript: void(0);" class="has-arrow"
                                key="t-level-1-2"><?php echo app('translator')->get('translation.Level_1.2'); ?></a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="javascript: void(0);" key="t-level-2-1"><?php echo app('translator')->get('translation.Level_2.1'); ?></a>
                                </li>
                                <li><a href="javascript: void(0);" key="t-level-2-2"><?php echo app('translator')->get('translation.Level_2.2'); ?></a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
<?php /**PATH E:\Repo\simtpu-v2\resources\views/layouts/sidebar.blade.php ENDPATH**/ ?>