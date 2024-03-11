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
        <div class="shape15"><img src="assets/img/shape/shape15.png" alt="image"></div>
    </section>

    <section class="profile-authentication-area ptb-100">
        <div class="container">
            <div class="row jcc">

                <div class="col-lg-6 col-md-12">
                    <div class="login-form">
                        <h2>Recupero password</h2>
                        <form action="<?php echo base_url(); ?>/User/lostform" method="post">
                            <div class="form-group">
                                <label>Inserisci email di registrazione</label>
                                <input type="email" name="email" class="form-control" placeholder="" required>
                            </div>
                            <button type="submit">Conferma</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>

<?php
include("include/footer.php"); 
?>