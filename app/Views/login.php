<?php
include("include/header.php"); 
?>

<section class="about-area bgOrange ptb-70">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-12 col-md-12">
                    <div class="about-content">
                        <div class="text">
                            <h2>Benvenuto in MilleBytes</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="shape15"><img src="<?php echo base_url(); ?>/assets/img/shape/shape15.png" alt="image"></div>
    </section>

    <section class="profile-authentication-area ptb-100">
        <div class="container">
            <div class="row jcc">

                <div class="col-lg-6 col-md-12">
                    <div class="login-form">
                        <h2>Login</h2>
                        <?php if($msg) { echo "<p style='color:orange;font-weight:bold;'>".$msg."</p>"; } ?>
                        <form action="<?php echo base_url(); ?>/User/auth" method="post">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" placeholder="" required>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="psw" class="form-control" placeholder="" required>
                            </div>
                            <div class="row align-items-center">
                                <div class="col-lg-12 col-md-12 col-sm-12 lost-your-password-wrap">
                                    <a href="<?php echo base_url(); ?>/lost" class="lost-your-password">Dimenticato le credenziali?</a>
                                </div>
                            </div>
                            <button type="submit">Entra</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>

<?php
include("include/footer.php"); 
?>