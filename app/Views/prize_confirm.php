<?php
include("include/header.php"); 
$row = $qUser->getRow();
?>

    <section class="page-title-area" style="padding-top: 150px;">
        <div class="container">
            <div class="page-title-content">
                <h1>Richiesta premio</h1>
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


    <section class="cart-area ptb-100">
        <div class="container">
        <div class="payment-box">
<div class="payment-method">
<p align="center">
La tua richiesta è stata inoltrata. Il tuo nuovo saldo punti è <?php echo $pointsuser; ?>
</p>

</div>
<a href="#" class="default-btn"><i class="flaticon-tick"></i>Torna in home<span></span></a>
</div>
        </div>
    </section>

<?php
include("include/footer.php"); 
?>