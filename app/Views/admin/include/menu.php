<!-- ============================================================== -->
<!-- Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">

                <!-- User Profile-->
                <li>
                    <!-- User profile -->
                    <div class="user-profile text-center position-relative pt-4 mt-1">
                        <!-- User profile image -->
                        <div class="profile-img m-auto"> <img src="<?php echo base_url(); ?>assets/img/users/1.jpg" alt="user" class="w-100 rounded-circle" /> </div>
                        <!-- User profile text-->
                        <div class="profile-text py-1"> <a href="#" class="dropdown-toggle link u-dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">Markarn Doe <span class="caret"></span></a>
                            <div class="dropdown-menu animated flipInY">
                                <a href="#" class="dropdown-item"><i class="ti-user"></i> My Profile</a>
                                <a href="#" class="dropdown-item"><i class="ti-wallet"></i> My Balance</a>
                                <a href="#" class="dropdown-item"><i class="ti-email"></i> Inbox</a>
                                <div class="dropdown-divider"></div> <a href="#" class="dropdown-item"><i class="ti-settings"></i> Account Setting</a>
                                <div class="dropdown-divider"></div> <a href="login.html" class="dropdown-item"><i class="fa fa-power-off"></i> Logout</a>
                            </div>
                        </div>
                    </div>
                    <!-- End User profile text-->
                </li>
                <!-- User Profile-->

                <li class="nav-devider"></li>

                <li class="sidebar-item"> 
                    <a class="sidebar-link" href="<?php echo base_url(); ?>/admin/dashboard" aria-expanded="false">
                        <i data-feather="home" class="feather-icon"></i><span class="hide-menu">Dashboard</span>
                    </a>
                </li>

                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i data-feather="users" class="feather-icon"></i><span class="hide-menu">Sondaggi</span></a>
                    <ul aria-expanded="false" class="collapse first-level">
                        <li class="sidebar-item"><a href="<?php echo base_url(); ?>/admin/sondaggi/list" class="sidebar-link"><i class="mdi mdi-account-box"></i> <span class="hide-menu"> Elenco</span></a></li>
                        <li class="sidebar-item"><a href="<?php echo base_url(); ?>/admin/sondaggi/new" class="sidebar-link"><i class="mdi mdi-account-network"></i><span class="hide-menu"> Nuovo</span></a></li>
                    </ul>
                </li>

                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i data-feather="users" class="feather-icon"></i><span class="hide-menu">Utenti</span></a>
                    <ul aria-expanded="false" class="collapse first-level">
                        <li class="sidebar-item"><a href="<?php echo base_url(); ?>/admin/utenti/list" class="sidebar-link"><i class="mdi mdi-account-box"></i> <span class="hide-menu"> Elenco</span></a></li>
                        <li class="sidebar-item"><a href="<?php echo base_url(); ?>/admin/utenti/new" class="sidebar-link"><i class="mdi mdi-account-network"></i><span class="hide-menu"> Nuovo</span></a></li>
                    </ul>
                </li>

                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i data-feather="settings" class="feather-icon"></i><span class="hide-menu">Setting</span></a>
                    <ul aria-expanded="false" class="collapse first-level">
                        <li class="sidebar-item"><a href="<?php echo base_url(); ?>/admin/setting/page?id=1" class="sidebar-link"><i class="mdi mdi-account-box"></i> <span class="hide-menu"> Regolamento</span></a></li>
                        <li class="sidebar-item"><a href="<?php echo base_url(); ?>/admin/setting/page?id=1" class="sidebar-link"><i class="mdi mdi-account-box"></i> <span class="hide-menu"> Privacy</span></a></li>
                        <li class="sidebar-item"><a href="<?php echo base_url(); ?>/admin/setting/page?id=1" class="sidebar-link"><i class="mdi mdi-account-box"></i> <span class="hide-menu"> Faq</span></a></li>
                        <li class="sidebar-item"><a href="<?php echo base_url(); ?>/admin/setting/email" class="sidebar-link"><i class="mdi mdi-account-network"></i><span class="hide-menu"> Email</span></a></li>
                    </ul>
                </li>

                <li class="nav-devider"></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url(); ?>/admin/logout" aria-expanded="false"><i data-feather="log-out" class="feather-icon"></i><span class="hide-menu">Logout</span></a></li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
    <!-- Bottom points-->
    <div class="sidebar-footer">
        <!-- item-->
        <a href="" class="link" data-toggle="tooltip" title="Settings"><i class="ti-settings"></i></a>
        <!-- item-->
        <a href="" class="link" data-toggle="tooltip" title="Email"><i class="mdi mdi-gmail"></i></a>
        <!-- item-->
        <a href="" class="link" data-toggle="tooltip" title="Logout"><i class="mdi mdi-power"></i></a>
    </div>
    <!-- End Bottom points-->
</aside>
<!-- ============================================================== -->
<!-- End Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->