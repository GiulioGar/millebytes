<?php
include("include/header.php"); 
$row = $qUser->getRow();
$nUser = $qUser->getNumRows();
?>

    <section class="about-area bgOrange ptb-70">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-12 col-md-12">
                    <div class="about-content">
                        <div class="text">
                            <h2><i class="bx bxs-cabinet"></i>Storico utente</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="shape15"><img src="<?php echo base_url(); ?>/assets/img/shape/shape15.png" alt="image"></div>
    </section>


    <section class="cart-area ptb-100">
        <div class="container">
            <form>
                <?php if($nUser>0) { ?>
                <div class="cart-table table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Data</th>
                                <th scope="col">Evento</th>
                                <th scope="col">Codice</th>
                                <th scope="col">Punti</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            foreach ($qUser->getResult() as $rUser) { 
                            ?>
                            <tr>
                                <td class="product-name">
                                    <?php echo dateIta($rUser->event_date); ?>
                                </td>
                                <td class="product-name">
                                    <?php echo ($rUser->event_type=='interview_complete') ? 'Intervista Completata' : $rUser->event_info; ?>
                                </td>
                                <td class="product-name">
                                    <?php echo $rUser->codice; ?>
                                </td>
                                <td class="product-name">
                                    <?php echo intval($rUser->prev_level - $rUser->next_level_level); ?>
                                </td>
                            </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <?php } else { ?>
                <h4>Al momento non hai registrato nessuna attività</h4>
                <?php } ?>
            <div class="cart-buttons">
            <div class="row align-items-center">

            </form>
        </div>
    </section>

<?php
include("include/footer.php"); 
?>