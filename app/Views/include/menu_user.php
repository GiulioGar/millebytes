<div class="navbar-area navbar-style-two<?php //if (url_is('') || url_is('home')) { echo 'navbar-style-two'; } else { echo 'navbar-color-white'; } ?>">

    <div class="dibiz-responsive-nav">
        <div class="container-fluid">
            <div class="dibiz-responsive-menu">
                <div class="logo">
                    <a href="<?php echo base_url(); ?>/mydashboard">
                        <img src="http://millebytes.com/sites/default/files/milebytes-logo.jpg" alt="logo">
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="dibiz-nav">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-md navbar-light">
                <a class="navbar-brand" href="<?php echo base_url(); ?>/mydashboard">
                    <img src="http://millebytes.com/sites/default/files/milebytes-logo.jpg" alt="logo">
                </a>
                <div class="collapse navbar-collapse mean-menu">
                    <ul class="navbar-nav">
                        <li class="nav-item"><a href="<?php echo base_url(); ?>/mydashboard" class="nav-link active">Home</a></li>
                        <li class="nav-item"><a href="<?php echo base_url(); ?>/regolamento" class="nav-link">Regolamento</a></li>
                        <li class="nav-item"><a href="<?php echo base_url(); ?>/privacy" class="nav-link">Privacy</a></li>
                        <li class="nav-item"><a href="<?php echo base_url(); ?>/faq" class="nav-link">Faq</a></li>
                        <li class="nav-item"><a href="<?php echo base_url(); ?>/contact" class="nav-link">Contatti</a></li>
                        <li class="nav-item"><a href="<?php echo base_url(); ?>/mydashboard" class="nav-link">Dashboard</a></li>
                        <li class="nav-item"><a href="<?php echo base_url(); ?>/profilo" class="nav-link">Profilo</a></li>
                        <li class="nav-item"><a href="<?php echo base_url(); ?>/logout" class="nav-link">Logout</a></li>
                    </ul>
                    <div class="others-option d-flex align-items-center">
                        <div class="option-item">
                            <div class="search-box">
                                <i class="flaticon-search"></i>
                            </div>
                        </div>
                    </div>
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