<?php
include("include/header.php"); 
?>

    <section class="page-title-area" style="padding-top: 150px;">
        <div class="container">
            <div class="page-title-content">
                <h1>Registrazione</h1>
            </div>
        </div>
        <div class="shape2"><img src="assets/img/shape/shape2.png" alt="image"></div>
        <div class="shape3"><img src="assets/img/shape/shape3.png" alt="image"></div>
        <div class="shape5"><img src="assets/img/shape/shape5.png" alt="image"></div>
        <div class="shape6"><img src="assets/img/shape/shape6.png" alt="image"></div>
        <div class="shape7"><img src="assets/img/shape/shape7.png" alt="image"></div>
        <div class="shape8"><img src="assets/img/shape/shape8.png" alt="image"></div>
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
                    Procedura di registrazione avvenuta con successo.<br>Riceverai una email con tutti i dettagli
                    </p>
                </div>
                <a href="<?php echo base_url().'/'; ?>" class="default-btn"><i class="flaticon-tick"></i>Torna in home<span></span></a>
            </div>
        </div>
    </section>
    <?php } ?>

<!-- Meta Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window, document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '1162963221073632');
fbq('track', 'PageView');
</script>
<noscript>
<script>
fbq('track', 'CompleteRegistration');
</script>

<?php
include("include/footer.php"); 
?>