<?php
include("include/header.php"); 

$today = date("Y-m-d H:i:s");
?>

    <section class="about-area bgOrange ptb-70">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-12 col-md-12">
                    <div class="about-content">
                        <div class="text">
                            <h2><i class="bx bxs-user-detail"></i>Benvenuto nel tuo Dashboard</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="shape15"><img src="assets/img/shape/shape15.png" alt="image"></div>
    </section>


    <section class="portfolio-details-area bg-f9f9f9 ptb-70">
        <div class="container">

            <div class="row rowDash">
                <h3>Le tue attività <?php //echo $iduser; ?></h3>
                <?php 
                if($nRespint>0) {
                    foreach ($qRespint->getResult() as $rRespint) { 
                        $qSurveys = $db->query("SELECT * FROM t_surveys WHERE status=2 AND sid='".$rRespint->sid."'");
                        $nSurveys = $qSurveys->getNumRows();
                        if($nSurveys>0) {
                            $rSurveys = $qSurveys->getRow();

                            $qSurveysEnv = $db->query("SELECT * FROM t_surveys_env WHERE name='survey_object' AND sid='".$rRespint->sid."'");
                            $rSurveysEnv = $qSurveysEnv->getRow();

                            $qSurveysEnv2 = $db->query("SELECT * FROM t_surveys_env WHERE name='prize_complete' AND sid='".$rRespint->sid."'");
                            $rSurveysEnv2 = $qSurveysEnv2->getRow();

                            $qSurveysEnv3 = $db->query("SELECT * FROM t_surveys_env WHERE name='length_of_interview' AND sid='".$rRespint->sid."'");
                            $rSurveysEnv3 = $qSurveysEnv3->getRow();
                    //}

                    //foreach ($qList->getResult() as $rResult) { 
                    ?>
                        <div class="col-lg-4 col-md-12">
                            <a href="https://www.primisoft.com/primis/run.do?sid=<?php echo $rRespint->sid; ?>&prj=<?php echo $rRespint->prj_name; ?>&uid=<?php echo $rRespint->uid; ?>" target="_blank">
                                <div class="portfolio-details-info mt20" id="<?php echo $rRespint->prj_name; ?>">
                                    <h3>Nuovo sondaggio</h3>
                                    <?php echo $rSurveysEnv->value; ?>
                                    <hr>
                                    <div style="display: flex; justify-content: space-between;">
                                        <div>
                                            <i class='bx bx-coin-stack'></i> <?php echo intval($rSurveysEnv2->value); ?> bytes
                                        </div>
                                        <div>
                                            <i class='bx bx-time-five'></i> <?php echo intval($rSurveysEnv3->value); ?> min.
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php 
                        }
                    } 
                } else {
                    echo "<p>Al momento non ci sono sondaggi disponibili</p>";
                }
                ?>

                <div class="col-lg-4 col-md-12" style="display:none;">
                    <div class="portfolio-sidebar-sticky">
                        <div class="portfolio-details-info">
                            <ul>
                                <li>
                                    <div class="icon">
                                        <i class='bx bx-user-pin'></i>
                                    </div>
                                    <span>Completamento profilo</span>
                                    38% completo<br><br>
                                    Compila le seguenti domande per migliorare la tua profilazione:<br><br>
                                    <i>- Composizione familiare (escluso te stesso)</i><br>
                                    <i>- Quali sono i tuoi hobby?</i><br>
                                    <i>- Quali di questi prodotti tecnologici hai a casa tua?</i><br>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row" style="height: 35px;"></div>

            <div class="row rowDash ptb-70"">
                <h3>I tuoi obiettivi</h3>

                <?php 
                foreach ($qCart->getResult() as $rCart) { 
                ?>
                <div class="col-lg-4 col-md-12">
                    <a href="cart">
                        <div class="portfolio-details-info <?php if($pointsuser>=$rCart->punti) { echo 'green-left-border'; } ?> mt20">
                            <h3><?php echo $rCart->nome." ".$rCart->valore." €"; ?></h3>
                            <hr>
                            <div style="display: flex; justify-content: space-between;">
                                <div>
                                    <?php
                                    if($pointsuser<$rCart->punti) {
                                    ?>
                                    <i class='bx bx-coin-stack'></i> Ti mancano <?php echo ($rCart->punti-$pointsuser); ?> punti
                                    <?php } else { ?>
                                    <i class='bx bx-gift'></i> <strong>Puoi richiedere questo premio!</strong>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <?php
                }
                ?>
            </div>

            <div class="row" style="height: 35px;"></div>

            <div class="row rowDash ptb-70"">
                <h3>Le tue richieste</h3>

                <?php 
                foreach ($qWithdraw->getResult() as $rWi) { 

                    if(strpos($rWi->event_info,'Amazon')) {
                        $finalData = date('Y-m-d', strtotime($rWi->event_date. ' + 30 days'));
                    } else {
                        $finalData = date('Y-m-d', strtotime($rWi->event_date. ' + 60 days'));
                    }
                ?>

                <script>
                    // Set the date we're counting down to
                    var countDownDate = new Date("<?php echo $rWi->event_date; ?>").getTime();

                    // Update the count down every 1 second
                    var x = setInterval(function() {

                    // Get today's date and time
                    var now = new Date().getTime();

                    // Find the distance between now and the count down date
                    var distance = countDownDate - now;

                    // Time calculations for days, hours, minutes and seconds
                    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                    // Display the result in the element with id="demo"
                    /*document.getElementById("d").innerHTML = days + "d " + hours + "h "
                    + minutes + "m " + seconds + "s ";
                    */

                    //document.getElementById("d<?php echo $rWi->id; ?>").innerHTML = days;
                    //document.getElementById("h<?php echo $rWi->id; ?>").innerHTML = hours;
                    //document.getElementById("m<?php echo $rWi->id; ?>").innerHTML = minutes;

                    // If the count down is finished, write some text
                    if (distance < 0) {
                        clearInterval(x);
                        //document.getElementById("d<?php echo $rWi->id; ?>").innerHTML = "0";
                    }
                    }, 1000);
                </script>

                <div class="col-lg-4 col-md-12">
                    <a href="cart">
                        <div class="portfolio-details-info mt20">
                            <i class='bx bx-gift'></i>
                            <h5>Hai richiesto un <i><?php echo $rWi->event_info; ?></i> che ti sarà pagato entro...</h5>
                            <div class="countdown">
                                <div class="cd-box">
                                    <p class="numbers days" id="d<?php echo $rWi->id; ?>">
                                        <?php 
                                        if($finalData<$today) {
                                            echo "0";
                                        } else {
                                            echo checkDays($today,$finalData);
                                        }
                                        ?>
                                    </p><br>
                                    <p class="strings timeRefDays">Giorni</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <?php
                }
                ?>
            </div>

        </div>
    </section>


<?php
include("include/footer.php"); 
?>