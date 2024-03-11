<?php
include("include/header.php"); 
?>

    <section class="about-area bgOrange ptb-70">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-12 col-md-12">
                    <div class="about-content">
                        <div class="text">
                            <h2><i class="bx bx-list-ul"></i>F.A.Q.</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="shape15"><img src="assets/img/shape/shape15.png" alt="image"></div>
    </section>

    <section class="faq-area pt-100 pb-70">
        <div class="container">
            
            <div class="row">

                <?php foreach ($qList->getResult() as $rResult) { ?>
                <div class="col-lg-6 col-md-6">
                    <div class="faq-item">
                        <h3><?php echo $rResult->domanda; ?></h3>
                        <p><?php echo $rResult->risposta; ?></p>
                    </div>
                </div>
                <?php } ?>
        
            </div>
        </div>
    </section>

<?php
include("include/footer.php"); 
?>