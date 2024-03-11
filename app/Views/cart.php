<?php
include("include/header.php"); 
$row = $qUser->getRow();
//$rCart = $qCart->getRow();

$today = date("Y-m-d H:i:s");
?>

    <section class="about-area bgOrange ptb-70">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-12 col-md-12">
                    <div class="about-content">
                        <div class="text">
                            <h2><i class="bx bxs-cart"></i>Carrello</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="shape15"><img src="<?php echo base_url(); ?>/assets/img/shape/shape15.png" alt="image"></div>
    </section>


    <?php if($msg) { ?>
    <script>
    $(document).ready(function(){
        $('.toast').toast('show');
    });
    
    </script>

    <div id="toastContainer" aria-live="assertive" aria-atomic="true" class="d-flex justify-content-center align-items-center" style="min-height: 200px;z-index: 33; position: absolute; width: 100%;">
        <div class="toast" data-autohide="true" style="opacity: 1 !important;">
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

    <section class="cart-area ptb-70">
        <div class="container">
            <form>
                <div class="cart-table table-responsive">

                    <h3>Premi richiesti</h3>

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Data richiesta</th>
                                <th scope="col">Premio richiesto</th>
                                <th scope="col">Bytes spesi</th>
                                <th scope="col">Pagamento</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            foreach ($qWithdraw->getResult() as $rCart) { 

                                if(strpos($rCart->event_info,'Amazon')) {
                                    $finalData = date('Y-m-d', strtotime($rCart->event_date. ' + 30 days'));
                                } else {
                                    $finalData = date('Y-m-d', strtotime($rCart->event_date. ' + 60 days'));
                                }

                            ?>

                            <script>
                                var countDownDate = new Date("<?php echo $rCart->event_date; ?>").getTime();

                                var x = setInterval(function() {

                                    var now = new Date().getTime();

                                    var distance = countDownDate - now;

                                    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                                    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                                    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                                    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                                    //document.getElementById("d<?php //echo $rCart->id; ?>").innerHTML = days;
                                    //document.getElementById("h<?php //echo $rCart->id; ?>").innerHTML = hours;
                                    //document.getElementById("m<?php //echo $rCart->id; ?>").innerHTML = minutes;

                                    if (distance < 0) {
                                        clearInterval(x);
                                        //document.getElementById("d<?php //echo $rCart->id; ?>").innerHTML = "0";
                                    }
                                    
                                }, 1000);
                            </script>

                            <tr>
                                <td class="product-name">
                                    <?php echo dateIta($rCart->event_date); ?>
                                </td>
                                <td class="product-name">
                                    <?php echo $rCart->event_info; ?>
                                </td>
                                <td class="product-name">
                                    <?php echo intval(abs($rCart->prev_level-$rCart->new_level)); ?>
                                </td>
                                <td class="product-name">
                                    <div class="countdown">
                                        <div class="cd-box2">
                                            <p class="numbers2 days" id="d<?php echo $rCart->id; ?>">
                                                <?php 
                                                //echo $rCart->daysd;
                                                if($finalData<$today) {
                                                    echo "0";
                                                } else {
                                                    echo checkDays($today,$finalData);
                                                }
                                                
                                                ?>
                                            </p><br>
                                            <p class="strings2 timeRefDays">Giorni</p>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            <div class="cart-buttons">
            <div class="row align-items-center">

            </form>
        </div>
    </section>

    <section class="cart-area ptb-50" style="display:none;">
        <div class="container">
            <form>
                <div class="cart-table table-responsive">

                    <h3>Premi in arrivo</h3>

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Data richiesta</th>
                                <th scope="col">Premio richiesto</th>
                                <th scope="col">Giorni rimanenti</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            foreach ($qWithdrawPay->getResult() as $rCart) { 
                            ?>
                            <tr>
                                <td class="product-name">
                                    <?php echo dateIta($rCart->event_date); ?>
                                </td>
                                <td class="product-name">
                                    <?php echo $rCart->event_info; ?>
                                </td>
                                <td class="product-name">
                                    <div class="countdown">
                                        <div class="cd-box2">
                                            <p class="numbers2 days" id="d<?php echo $rCart->id; ?>"><?php echo $rCart->daysd; ?></p><br>
                                            <p class="strings2 timeRefDays">Giorni</p>
                                        </div>
                                        <div class="cd-box2">
                                            <p class="numbers2 hours" id="h<?php echo $rCart->id; ?>">
                                                <?php 
                                                $h = intval($rCart->hourd/24);
                                                echo $rCart->hourd-($h*24); 
                                                ?>
                                            </p><br>
                                            <p class="strings2 timeRefHours">Ore</p>
                                        </div>
                                        <div class="cd-box2">
                                            <p class="numbers2 minutes" id="m<?php echo $rCart->id; ?>"><?php echo $rCart->mind; ?></p><br>
                                            <p class="strings2 timeRefMinutes">Minuti</p>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            <div class="cart-buttons">
            <div class="row align-items-center">

            </form>
        </div>
    </section>

    <section class="cart-area ptb-70">
        <div class="container">
            <form>
                <div class="cart-table table-responsive">

                <h3>Premi disponibili</h3>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Status</th>
                                <th scope="col">Premio</th>
                                <th scope="col">Valore</th>
                                <th scope="col">Punti da usare</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            foreach ($qCart->getResult() as $rCart) { 
                            ?>
                            <tr>
                                <td class="product-name">
                                    DISPONIBILE
                                </td>
                                <td class="product-name">
                                    <?php if($rCart->nome=='Buono Amazon') { echo '<img src="'.base_url().'/assets/img/amazon.png" style="height:30px">'; } ?>
                                    <?php if($rCart->nome=='Ricarica Paypal') { echo '<img src="'.base_url().'/assets/img/paypal.png" style="height:30px">'; } ?>
                                    <?php echo $rCart->nome; ?>
                                </td>
                                <td class="product-name">
                                    <?php echo $rCart->valore; ?> €
                                </td>
                                <td class="product-name">
                                    <?php echo $rCart->punti; ?>
                                </td>
                                <td class="product-name">
                                    <?php if($pointsuser>=$rCart->punti) { ?>
                                    <a href="<?php echo base_url(); ?>/cart/confirm/<?php echo $rCart->id; ?>" class="default-btn" onClick="return(confirm('Stai richiedendo un premio, cliccando su ok ti saranno scalati <?php echo $rCart->punti; ?> punti?'))">Richiedi</a>
                                    <?php } else { ?>
                                    <a href="#" class="default-btn" style="background-color: #eaeaea; --mainColor: #eaeaea;" disabled>Richiedi</a>
                                    <?php } ?>
                                </td>
                            </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>

                </div>
                <div class="cart-buttons">
                <div class="row align-items-center">

            </form>
        </div>
    </section>

    

<?php
include("include/footer.php"); 
?>