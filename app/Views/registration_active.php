<?php
include("include/header.php"); 
?>

<?php if(!empty($_GET["sid"])) { 
        
        $sid=$_GET["sid"];
        echo "<img src='https://www.safe-track.net/620d3220b2f6f/space.gif?sid=$sid'>";
        
    }?>

    <section class="page-title-area" style="padding-top: 150px;">
        <div class="container">
            <div class="page-title-content">
                <h1>Registrazione</h1>
            </div>
        </div>
        <div class="shape2"><img src="<?php echo base_url(); ?>/assets/img/shape/shape2.png" alt="image"></div>
        <div class="shape3"><img src="<?php echo base_url(); ?>/assets/img/shape/shape3.png" alt="image"></div>
        <div class="shape5"><img src="<?php echo base_url(); ?>/assets/img/shape/shape5.png" alt="image"></div>
        <div class="shape6"><img src="<?php echo base_url(); ?>/assets/img/shape/shape6.png" alt="image"></div>
        <div class="shape7"><img src="<?php echo base_url(); ?>/assets/img/shape/shape7.png" alt="image"></div>
        <div class="shape8"><img src="<?php echo base_url(); ?>/assets/img/shape/shape8.png" alt="image"></div>
        <div class="lines">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
        </div>
    </section>

    <?php if($error) { ?>
    <section class="cart-area ptb-100">
        <div class="container">
            <div class="payment-box">
                <div class="payment-method">
                    <p align="center">
                    <?php echo $error; ?>
                    </p>
                </div>
                <a href="#" onclick="window.history.back();" class="default-btn"><i class="flaticon-tick"></i>Torna indietro<span></span></a>
            </div>
        </div>
    </section>
    <?php } else { ?>
    <section class="cart-area ptb-100">
        <div class="container">
            <div class="payment-box">
                <div class="payment-method">
                    <p align="center">
                    Il tuo profilo è attivo. Fai login per accedere alla tua dashboard
                    </p>
                </div>
                <a href="<?php echo base_url().'/login'; ?>" class="default-btn"><i class="flaticon-tick"></i>Login<span></span></a>
            </div>
        </div>
    </section>
    <?php } ?>


<script>
fbq('track', 'CompleteRegistration');
</script>

<?php
include("include/footer.php"); 
?>