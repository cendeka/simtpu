<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" key="t-menu">@lang('translation.Menu')</li>

                <li>
                    <a href="{{route('root')}}" class="waves-effect">
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
                        <li><a href="{{route('registrasi.tambah')}}">Tambah Registrasi</a></li>
                        <li><a href="{{route('registrasi')}}">Data Registrasi</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class="bx bx-book-content "></i>
                        <span key="t-starter-page">Herregistrasi</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('herregistrasi')}}">Data Herregistrasi</a></li>
                        <li><a href="{{route('herregistrasi.tagihan')}}">Tagihan Herregistrasi</a></li>

                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class=" bx bx-file-blank "></i>
                        <span key="t-starter-page">SKRD</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('skrd.registrasi')}}">SKRD Registrasi</a></li>
                        <li><a href="{{route('skrd.herregistrasi')}}">SKRD Herregistrasi</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class=" bx bx-user-pin "></i>
                        <span key="t-starter-page">Makam</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('makam')}}">Data Makam</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class=" bx bx-line-chart"></i>
                        <span key="t-starter-page">Laporan</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('statistik')}}">Data Statistik</a></li>
                        <li><a href="{{route('laporan.registrasi')}}">Laporan Registrasi</a></li>

                    </ul>
                </li>

                <li class="menu-title" key="t-menu">@lang('translation.Pages')</li>
                <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class=" bx bx-credit-card "></i>
                        <span key="t-starter-page">Pengaturan</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('konfig.tambah')}}">Tarif</a></li>
                    </ul>
                </li>
                @role('admin')
                <li>
                    <a href="/admin" class="waves-effect">
                        <i class="bx bx-user-circle"></i>
                        <span key="t-starter-page">Panel Admin</span>
                    </a>
                </li>
                <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class=" bx bx-cog "></i>
                        <span key="t-starter-page">Blog</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('blog.index')}}">Daftar Artikel</a></li>
                        <li><a href="{{route('blog.tambah')}}">Buat Artikel</a></li>

                    </ul>
                </li>
                @endrole
                {{-- <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <span class="badge rounded-pill bg-success float-end"
                            key="t-new">@lang('translation.New')</span>
                        <i class="bx bx-user-circle"></i>
                        <span key="t-authentication">@lang('translation.Authentication')</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="auth-login" key="t-login">@lang('translation.Login')</a></li>
                        <li><a href="auth-login-2" key="t-login-2">@lang('translation.Login') 2</a></li>
                        <li><a href="auth-register" key="t-register">@lang('translation.Register')</a></li>
                        <li><a href="auth-register-2" key="t-register-2">@lang('translation.Register') 2</a></li>
                        <li><a href="auth-recoverpw" key="t-recover-password">@lang('translation.Recover_Password')</a>
                        </li>
                        <li><a href="auth-recoverpw-2" key="t-recover-password-2">@lang('translation.Recover_Password')
                                2</a></li>
                        <li><a href="auth-lock-screen" key="t-lock-screen">@lang('translation.Lock_Screen')</a></li>
                        <li><a href="auth-lock-screen-2" key="t-lock-screen-2">@lang('translation.Lock_Screen') 2</a>
                        </li>
                        <li><a href="auth-confirm-mail" key="t-confirm-mail">@lang('translation.Confirm_Mail')</a></li>
                        <li><a href="auth-confirm-mail-2" key="t-confirm-mail-2">@lang('translation.Confirm_Mail') 2</a>
                        </li>
                        <li><a href="auth-email-verification"
                                key="t-email-verification">@lang('translation.Email_verification')</a></li>
                        <li><a href="auth-email-verification-2"
                                key="t-email-verification-2">@lang('translation.Email_verification') 2</a></li>
                        <li><a href="auth-two-step-verification"
                                key="t-two-step-verification">@lang('translation.Two_step_verification')</a></li>
                        <li><a href="auth-two-step-verification-2"
                                key="t-two-step-verification-2">@lang('translation.Two_step_verification') 2</a></li>
                    </ul>
                </li> --}}



                {{-- <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-share-alt"></i>
                        <span key="t-multi-level">@lang('translation.Multi_Level')</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li><a href="javascript: void(0);" key="t-level-1-1">@lang('translation.Level_1.1')</a></li>
                        <li>
                            <a href="javascript: void(0);" class="has-arrow"
                                key="t-level-1-2">@lang('translation.Level_1.2')</a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="javascript: void(0);" key="t-level-2-1">@lang('translation.Level_2.1')</a>
                                </li>
                                <li><a href="javascript: void(0);" key="t-level-2-2">@lang('translation.Level_2.2')</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li> --}}

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
