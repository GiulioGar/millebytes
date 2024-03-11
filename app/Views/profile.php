<?php
include("include/header.php"); 
$row = $qUser->getRow();

$qWork = $db->query("
SELECT works.*
FROM works 
WHERE works.id = ".$row->work_id);
$rWork = $qWork->getRow();
?>

    <section class="about-area bgOrange ptb-70">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-12 col-md-12">
                    <div class="about-content">
                        <div class="text">
                            <h2><i class="bx bxs-user-detail"></i>Profilo</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="shape15"><img src="<?php echo base_url(); ?>/assets/img/shape/shape15.png" alt="image"></div>
    </section>


    <section class="portfolio-details-area bg-f9f9f9 ptb-100">
        <div class="container">

            <div class="row">

                <div class="col-lg-3 col-md-12">
                    <div class="single-team-member">
                        <div class="image">
                            <img src="<?php if($row->image) { echo base_url().'/uploads/user/'.$row->image; } else { echo base_url().'/assets/img/user.png'; } ?>" alt="team-image">
                        </div>
                        <div class="content">
                            <h3><?php echo $row->first_name." ".$row->second_name; ?></h3>
                            <span>Profilo Utente</span>

                            <div class="overview-box">
                                <div class="overview-content" style="width:100%;">
                                <div class="content" style="padding:0 0 0 0;">
                                    <ul class="features-list" style="flex-direction: column;">
                                        <li style="width:100%;"><a href="<?php echo base_url(); ?>/profilo/edit/<?php echo $iduser; ?>"><span><i class="bx bxs-edit"></i> Modifica</span></a></li>
                                        <li style="width:100%;"><a href="<?php echo base_url(); ?>/storico/<?php echo $iduser; ?>"><span><i class="bx bxs-edit"></i> Storico</span></a></li>
                                    </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-lg-9 col-md-12">
                    
                    <div class="portfolio-details-info">
                        <h3>Informazioni di base</h3>
                        <p>
                            Email utente: <strong><?php echo $row->email; ?></strong><br>
                            Nome e cognome: <strong><?php echo $row->first_name." ".$row->second_name; ?></strong><br>
                            Genere: <strong><?php echo ($row->gender==1) ? 'Uomo' : 'Donna'; ?></strong><br>
                            Data di nascita: <strong><?php echo dateIta($row->birth_date); ?></strong><br>
                            Indirizzo: <strong><?php echo $row->address; ?></strong>
                        </p>
                    </div>

                    <div class="portfolio-details-info mt20">
                        <h3>Altre informazioni</h3>
                        <p>
                            Professione: <strong><?php echo $rWork->name; ?></strong><br>
                            Livello istruzione: <strong><?php echo instrLevel($row->instr_level_id); ?></strong><br>
                            Stato civile: <strong><?php echo marStatus($row->mar_status_id); ?></strong><br>
                            Iscritto dal: <strong><?php echo dateIta($row->reg_date); ?></strong><br>
                        </p>
                    </div>

                    
                    <div class="portfolio-details-info mt20">
                        <?php echo form_open(base_url().'/profilo/close', 'class="row"'); ?>
                        <h3>Gestione conto</h3>
                        <p>
                            Per chiudere il tuo conto, seleziona la casella qui sotto e clicca il bottone [Chiudi Conto].<br>
                            <input type="checkbox" name="confirm" value="1" required> confermo di voler chiudere il mio conto e rinunciare ad ogni eventuale premio a cui avessi diritto in conseguenza del livello raggiunto nel mio percorso utente.<br>
                            <button type="submit" class="default-btn mt20">Chiudi conto</button>
                            <input type="hidden" name="act" value="close">
                        </p>
                        </form>
                    </div>
                    

                </div>

                

            </div>
        </div>
    </section>


<?php
include("include/footer.php"); 
?>