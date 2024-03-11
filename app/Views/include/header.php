<!doctype html>
<html lang="it">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/flaticon.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/animate.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/owl.carousel.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/boxicons.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/meanmenu.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/nice-select.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/fancybox.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/odometer.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/magnific-popup.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/style.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/responsive.css">
        <title>Club Millebytes</title>
        <link rel="icon" type="image/png" href="<?php echo base_url(); ?>/assets/img/favicon.png">

        <!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window,document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
 fbq('init', '1162963221073632'); 
fbq('track', 'PageView');
</script>
<noscript>
 <img height="1" width="1" 
src="https://www.facebook.com/tr?id=1162963221073632&ev=PageView
&noscript=1"/>
</noscript>
<!-- End Facebook Pixel Code -->


    </head>
    
    <body>

        <?php
        //echo $_SERVER["REQUEST_URI"];
        //if (url_is('') || url_is('home')) {
        if (url_is('0000000')) {
        ?>
        <header class="top-header-area">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6">
                        <ul class="top-header-contact-info">
                            <li><i class='bx bx-phone-call'></i> <a href="tel:+14854560102">+1-485-456-0102</a></li>
                            <li><i class='bx bx-envelope'></i> <a href="mailto:info@millebytes.com"><span class="__cf_email__">info@millebytes.com</span></a></li>
                        </ul>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="top-header-btn">
                            <a href="contact" class="default-btn">Iscriviti</a>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <?php
        }
        ?>

        <?php
        include("menu.php"); 
        ?>