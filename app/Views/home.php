<?php
include("include/header.php"); 
?>

    
    <?php if(!empty($_GET["sid"])) { 
        /*
        $sid=$_GET["sid"];
        echo "<img src='https://www.safe-track.net/620d3220b2f6f/space.gif?sid=$sid'>";
        */
    }?>

    <?php if(!empty($_GET["utm"])) { ?>
        <iframe src="https://tracking.trkadviceme.com/aff_lsr?transaction_id=<?php echo $_GET['utm']; ?>" title="" width="1" height="1"></iframe> 
    <?php } ?>

    
    <script>
    $(document).ready(function(){
        <?php if($msg) { ?>
            $('.toast').toast('show');
        <?php } ?>
    });
    </script>




    <?php if($msg) { ?>
        <div aria-live="polite" aria-atomic="true" class="d-flex justify-content-center align-items-center" style="min-height: 200px;z-index: 33; position: absolute; width: 100%;">
            <div class="toast" data-autohide="false" style="opacity: 1 !important;">
                <div class="toast-header" style="justify-content:space-between;">
                    Messaggio di sistema
                    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close" onclick="ht()">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="toast-body"><strong><?php echo $msg; ?></strong></div>
            </div>
        </div>
    <?php } ?>


    
       




    <section class="about-area bgOrange ptb-70">

        <div class="container-fluid">

            <div class="row align-items-center">

                <div class="col-lg-12 col-md-12">
                    <div class="about-content">
                        <div class="text">
                            <h2>Unisciti al Club Millebytes</h2>
                            <p>La tua opinione per noi vale! Partecipa ai nostri sondaggi, esprimi la tua opinione sui migliori prodotti presenti sul mercato e guadagna! Per ogni sondaggio riceverai dei punti che potrai convertire in buoni Amazon o Ricariche Paypal</p>
                            <a href="registrazione" class="default-btn">Registrati</a>
                            <a href="login" class="default-btn">Accedi</a>
                        </div>
                    </div>
                </div>

            </div>

        </div>

        <div class="shape15"><img src="<?php echo base_url(); ?>/assets/img/shape/shape15.png" alt="image"></div>
    </section>

<?php
include("include/section_service_block.php"); 

include("include/section_aboutus.php"); 

include("include/section_price_block.php"); 

include("include/section_security.php"); 

include("include/footer.php"); 
?>