<?php
include("include/header.php"); 
?>

        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center">
            <div class="auth-box p-4 bg-white rounded">
                <div id="loginform">
                    <div class="logo">
                        <h3 class="box-title mb-3">Login</h3>
                    </div>
                    <!-- Form -->
                    <div class="row">
                        <div class="col-12">
                            <form class="form-horizontal mt-3 form-material" id="loginform" action="<?php echo base_url(); ?>/Form/user_login" method="post">
                                <div class="form-group mb-3">
                                    <input class="form-control" type="text" name="email" id="email" placeholder="Email" required>
                                </div>
                                <div class="form-group mb-3">
                                    <input class="form-control" type="password" name="psw" id="psw" placeholder="Password" required>
                                </div>
                                <div class="form-group mb-3 d-flex">
                                </div>
                                <div class="form-group text-center">
                                    <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Login</button>
                                </div>
        
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
    
<?php
include("include/footer.php"); 
?>