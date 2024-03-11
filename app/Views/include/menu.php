<div class="navbar-area navbar-style-two<?php //if (url_is('') || url_is('home')) { echo 'navbar-style-two'; } else { echo 'navbar-color-white'; } ?>">

    <div class="dibiz-responsive-nav">
        <div class="container-fluid">
            <div class="dibiz-responsive-menu">
                <div class="logo">
                    <a href="<?php if ($nameuser) { echo base_url().'/mydashboard'; } else { echo base_url(); } ?>">
                        <img src="<?php echo base_url(); ?>/assets/img/milebytes-logo.jpg" alt="logo">
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="dibiz-nav">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-md navbar-light">
                <a class="navbar-brand" href="<?php if ($nameuser) { echo base_url().'/mydashboard'; } else { echo base_url(); } ?>">
                    <img src="<?php echo base_url(); ?>/assets/img/milebytes-logo.jpg" alt="logo">
                </a>
                <div class="collapse navbar-collapse mean-menu">
                    <?php if ($nameuser) { //(url_is('profilo') || url_is('mydashboard')) ?>
                    <ul class="navbar-nav">
                        <li class="nav-item"><a href="<?php echo base_url(); ?>/mydashboard" class="nav-link <?php if (url_is('') || url_is('home')) { echo 'active'; } ?>">Home</a></li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Informazioni <i class="bx bx-chevron-down"></i></a>
                            <ul class="dropdown-menu">
                                <li class="nav-item"><a href="<?php echo base_url(); ?>/regolamento" class="nav-link">Regolamento</a></li>
                                <li class="nav-item"><a href="<?php echo base_url(); ?>/privacy" class="nav-link">Privacy</a></li>
                                <li class="nav-item"><a href="<?php echo base_url(); ?>/faq" class="nav-link">Faq</a></li>
                                <li class="nav-item"><a href="<?php echo base_url(); ?>/contact" class="nav-link">Contatti</a></li>
                            </ul>
                        </li>
                        <li class="nav-item" style="margin-right: 32px;">
                            <a href="<?php echo base_url(); ?>/mydashboard" class="nav-link">Sondaggi <span style="position: absolute; right: -28px; width: 21px; height: 21px; text-align: center; line-height: 20px; border-radius: 50%; background-color: orange; font-size: 14px; font-weight: 600;"><?php echo $nSurvey; ?></span></a>
                        </li>
                        <li class="nav-item"><a href="#" class="nav-link"><span style="background-color: #FE9F1C; border-radius: 17px;padding: 10px;"><?php echo $pointsuser; ?> BYTES</span></a></li>
                    </ul>
                    <div class="others-option d-flex align-items-center">
                        <div class="option-item">
                            <div class="cart-btn">
                                <a href="<?php echo base_url(); ?>/cart">
                                    <i class="flaticon-shopping-cart"></i>
                                    <span><?php echo intval($oCart); ?></span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <ul class="navbar-nav" style="margin-left: 28px !important;">
                        <li class="nav-item">
                            <a href="#" class="nav-link"><?php echo $nameuser; ?> <i class="bx bx-chevron-down"></i></a>
                            <ul class="dropdown-menu" style="right: 0;left:auto !important;">
                                <li class="nav-item"><a href="<?php echo base_url(); ?>/mydashboard" class="nav-link">Dashboard</a></li>
                                <li class="nav-item"><a href="<?php echo base_url().'/profilo'; ?>" class="nav-link">Profilo</a></li>
                                <li class="nav-item"><a href="<?php echo base_url().'/storico/'.$iduser; ?>" class="nav-link">Storico</a></li>
                                <li class="nav-item"><a href="<?php echo base_url(); ?>/logout" class="nav-link">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                    <?php } else { ?>
                    <ul class="navbar-nav">
                        <li class="nav-item"><a href="<?php echo base_url(); ?>" class="nav-link <?php if (url_is('') || url_is('home')) { echo 'active'; } ?>">Home</a></li>
                        <li class="nav-item"><a href="<?php echo base_url(); ?>/regolamento" class="nav-link <?php if (url_is('regolamento')) { echo 'active'; } ?>">Regolamento</a></li>
                        <li class="nav-item"><a href="<?php echo base_url(); ?>/privacy" class="nav-link <?php if (url_is('privacy')) { echo 'active'; } ?>">Privacy</a></li>
                        <li class="nav-item"><a href="<?php echo base_url(); ?>/faq" class="nav-link <?php if (url_is('faq')) { echo 'active'; } ?>">Faq</a></li>
                        <li class="nav-item"><a href="<?php echo base_url(); ?>/contact" class="nav-link <?php if (url_is('contact')) { echo 'active'; } ?>">Contatti</a></li>
                        <li class="nav-item"><a href="<?php echo base_url(); ?>/login" class="nav-link <?php if (url_is('login')) { echo 'active'; } ?>">Login</a></li>
                    </ul>
                    <?php } ?>
                    
                </div>
            </nav>
        </div>
    </div>

    <div class="others-option-for-responsive">
        <div class="container">
            <div class="dot-menu">
                <div class="inner">
                    <div class="circle circle-one"></div>
                    <div class="circle circle-two"></div>
                    <div class="circle circle-three"></div>
                </div>
            </div>

            <div class="container">
                <div class="option-inner">
                    <div class="others-option justify-content-center d-flex align-items-center">
                        <div class="option-item">
                            <div class="search-box">
                                <i class="flaticon-search"></i>
                            </div>
                        </div>
                        <div class="option-item">
                            <div class="side-menu-btn">
                                <i class="flaticon-menu" data-bs-toggle="modal" data-bs-target="#sidebarModal"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>