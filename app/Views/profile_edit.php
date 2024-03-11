<?php
include("include/header.php"); 
$row = $qUser->getRow();

$maxData = date("Y-m-d");
$maxData = strtotime($maxData.' -14 year');
$maxData = date('Y-m-d', $maxData);
$minData = strtotime($minData.' -99 year');
$minData = date('Y-m-d', $minData);
?>

    <section class="about-area bgOrange ptb-70">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-12 col-md-12">
                    <div class="about-content">
                        <div class="text">
                            <h2><i class="bx bxs-user-detail"></i>Aggiorna il tuo profilo <?php echo $nameuser; ?></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="shape15"><img src="<?php echo base_url(); ?>/assets/img/shape/shape15.png" alt="image"></div>
    </section>


    <section class="profile-authentication-area ptb-70">

        <div class="container">
            <div class="row">

                <div class="col-lg-12 col-md-12">
                    <div class="register-form">

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

                        <?php //echo form_open_multipart(base_url().'/profilo/edit/'.$uid.'/update', 'class="row"'); ?>
                        <form method="post" action="<?php echo base_url(base_url().'/profilo/edit/'.$uid.'/update');?>" class="row" enctype="multipart/form-data">

                            <?php //if($msg) { echo "<p style='color:red;font-weight:bold;'>".$msg."</p>"; } ?>

                            <div class="form-group col-6">
                                <label>Foto profilo</label>
                                <?php 
                                if($row->image!='') {
                                    echo "<br><img src='".base_url().'/uploads/user/'.$row->image."' height='100'><br><br>";
                                }
                                ?>
                                <input type="file" class="form-control" id="image" name="image" aria-describedby="fileHelp">
                            </div>

                            <div class="form-group col-6">
                            </div>

                            <div class="form-group col-6">
                                <label>Cognome *</label>
                                <input type="text" name="second_name" class="form-control" value="<?php echo $row->second_name; ?>" placeholder="" required>
                            </div>
                            <div class="form-group col-6">
                                <label>Nome *</label>
                                <input type="text" name="first_name" class="form-control" value="<?php echo $row->first_name; ?>" placeholder="" required>
                            </div>
                            <div class="form-group col-6">
                                <label>Email *</label>
                                <input type="email" class="form-control" placeholder="" value="<?php echo $row->email; ?>" readonly>
                            </div>
                            <div class="form-group col-6">
                                <label>Password *</label>
                                <input type="password" name="pwd" id="pwd" class="form-control" placeholder="Solo modifica">
                            </div>

                            <div class="form-group col-6">
                                <label>Genere *</label>
                                <select class="form-control form-select" id="gender" name="gender" required>
                                    <option value="">Seleziona</option>    
                                    <option value="1" <?php if($row->gender==1) { echo 'selected'; } ?>>Uomo</option>
                                    <option value="2" <?php if($row->gender==2) { echo 'selected'; } ?>>Donna</option>
                                </select>
                            </div>

                            <div class="form-group col-6">
                                <label>Data di nascita *</label>
                                <input type="date" name="birth_date" class="form-control" min="<?php echo $minData; ?>" max="<?php echo $maxData; ?>" value="<?php echo $row->birth_date; ?>" placeholder="">
                            </div>

                            <div class="form-group col-6">
                                <label>Indirizzo</label>
                                <input type="text" name="address" class="form-control" value="<?php echo $row->address; ?>" placeholder="">
                            </div>

                            <div class="form-group col-6">
                                <label>Città</label>
                                <input type="text" name="city" class="form-control" value="<?php echo $row->city; ?>" placeholder="">
                            </div>

                            <div class="form-group col-4">
                                <label>Provincia *</label>
                                <select class="form-control form-select" id="province_id" name="province_id" required>
                                    <option value="">Seleziona</option>
                                    <option value="1" <?php if($row->province_id==1) { echo "selected"; } ?>>Alessandria</option>
                                    <option value="2" <?php if($row->province_id==2) { echo "selected"; } ?>>Crotone</option>
                                    <option value="3" <?php if($row->province_id==3) { echo "selected"; } ?>>Aosta</option>
                                    <option value="4" <?php if($row->province_id==4) { echo "selected"; } ?>>Arezzo</option>
                                    <option value="5" <?php if($row->province_id==5) { echo "selected"; } ?>>Ascoli</option>
                                    <option value="6" <?php if($row->province_id==6) { echo "selected"; } ?>>Piceno</option>
                                    <option value="7" <?php if($row->province_id==7) { echo "selected"; } ?>>Asti</option>
                                    <option value="8" <?php if($row->province_id==8) { echo "selected"; } ?>>Avellino</option>
                                    <option value="9" <?php if($row->province_id==9) { echo "selected"; } ?>>Bari</option>
                                    <option value="10" <?php if($row->province_id==10) { echo "selected"; } ?>>Belluno</option>
                                    <option value="11" <?php if($row->province_id==11) { echo "selected"; } ?>>Benevento</option>
                                    <option value="12" <?php if($row->province_id==12) { echo "selected"; } ?>>Bergamo</option>
                                    <option value="13" <?php if($row->province_id==13) { echo "selected"; } ?>>Biella</option>
                                    <option value="14" <?php if($row->province_id==14) { echo "selected"; } ?>>Bologna</option>
                                    <option value="15" <?php if($row->province_id==15) { echo "selected"; } ?>>Bolzano</option>
                                    <option value="16" <?php if($row->province_id==16) { echo "selected"; } ?>>Brescia</option>
                                    <option value="17" <?php if($row->province_id==17) { echo "selected"; } ?>>Brindisi</option>
                                    <option value="18" <?php if($row->province_id==18) { echo "selected"; } ?>>Cagliari</option>
                                    <option value="19" <?php if($row->province_id==19) { echo "selected"; } ?>>Caltanissetta</option>
                                    <option value="20" <?php if($row->province_id==20) { echo "selected"; } ?>>Campobasso</option>
                                    <option value="21" <?php if($row->province_id==21) { echo "selected"; } ?>>Caserta</option>
                                    <option value="22" <?php if($row->province_id==22) { echo "selected"; } ?>>Catania</option>
                                    <option value="23" <?php if($row->province_id==23) { echo "selected"; } ?>>Catanzaro</option>
                                    <option value="24" <?php if($row->province_id==24) { echo "selected"; } ?>>Chieti</option>
                                    <option value="25" <?php if($row->province_id==25) { echo "selected"; } ?>>Como</option>
                                    <option value="26" <?php if($row->province_id==26) { echo "selected"; } ?>>Cosenza</option>
                                    <option value="27" <?php if($row->province_id==27) { echo "selected"; } ?>>Cremona</option>
                                    <option value="29" <?php if($row->province_id==28) { echo "selected"; } ?>>Cuneo</option>
                                    <option value="30" <?php if($row->province_id==29) { echo "selected"; } ?>>Enna</option>
                                    <option value="31" <?php if($row->province_id==30) { echo "selected"; } ?>>Ferrara</option>
                                    <option value="32" <?php if($row->province_id==31) { echo "selected"; } ?>>Firenze</option>
                                    <option value="33" <?php if($row->province_id==32) { echo "selected"; } ?>>Foggia</option>
                                    <option value="34" <?php if($row->province_id==33) { echo "selected"; } ?>>Forli'</option>
                                    <option value="35" <?php if($row->province_id==34) { echo "selected"; } ?>>Frosinone</option>
                                    <option value="36" <?php if($row->province_id==35) { echo "selected"; } ?>>Genova</option>
                                    <option value="37" <?php if($row->province_id==36) { echo "selected"; } ?>>Gorizia</option>
                                    <option value="38" <?php if($row->province_id==37) { echo "selected"; } ?>>Grosseto</option>
                                    <option value="39" <?php if($row->province_id==38) { echo "selected"; } ?>>Imperia Isernia</option>
                                    <option value="40" <?php if($row->province_id==40) { echo "selected"; } ?>>L'Aquila</option>
                                    <option value="41" <?php if($row->province_id==41) { echo "selected"; } ?>>La Spezia</option>
                                    <option value="42" <?php if($row->province_id==42) { echo "selected"; } ?>>Latina</option>
                                    <option value="43" <?php if($row->province_id==43) { echo "selected"; } ?>>Lecce</option>
                                    <option value="44" <?php if($row->province_id==44) { echo "selected"; } ?>>Lecco</option>
                                    <option value="45" <?php if($row->province_id==45) { echo "selected"; } ?>>Livorno</option>
                                    <option value="46" <?php if($row->province_id==46) { echo "selected"; } ?>>Lodi</option>
                                    <option value="47" <?php if($row->province_id==47) { echo "selected"; } ?>>Lucca</option>
                                    <option value="48" <?php if($row->province_id==48) { echo "selected"; } ?>>Macerata</option>
                                    <option value="49" <?php if($row->province_id==49) { echo "selected"; } ?>>Mantova</option>
                                    <option value="50" <?php if($row->province_id==50) { echo "selected"; } ?>>Massa Carrara</option>
                                    <option value="51" <?php if($row->province_id==51) { echo "selected"; } ?>>Matera</option>
                                    <option value="52" <?php if($row->province_id==52) { echo "selected"; } ?>>Messina</option>
                                    <option value="53" <?php if($row->province_id==53) { echo "selected"; } ?>>Milano</option>
                                    <option value="54" <?php if($row->province_id==54) { echo "selected"; } ?>>Modena</option>
                                    <option value="55" <?php if($row->province_id==55) { echo "selected"; } ?>>Napoli</option>
                                    <option value="56" <?php if($row->province_id==56) { echo "selected"; } ?>>Novara</option>
                                    <option value="57" <?php if($row->province_id==57) { echo "selected"; } ?>>Nuoro</option>
                                    <option value="58" <?php if($row->province_id==58) { echo "selected"; } ?>>Oristano</option>
                                    <option value="59" <?php if($row->province_id==59) { echo "selected"; } ?>>Padova</option>
                                    <option value="60" <?php if($row->province_id==60) { echo "selected"; } ?>>Palermo</option>
                                    <option value="61" <?php if($row->province_id==61) { echo "selected"; } ?>>Parma</option>
                                    <option value="62" <?php if($row->province_id==62) { echo "selected"; } ?>>Pavia</option>
                                    <option value="63" <?php if($row->province_id==63) { echo "selected"; } ?>>Perugia</option>
                                    <option value="64" <?php if($row->province_id==64) { echo "selected"; } ?>>Pesaro e Urbino</option>
                                    <option value="65" <?php if($row->province_id==65) { echo "selected"; } ?>>Pescara</option>
                                    <option value="66" <?php if($row->province_id==66) { echo "selected"; } ?>>Piacenza</option>
                                    <option value="67" <?php if($row->province_id==67) { echo "selected"; } ?>>Pisa</option>
                                    <option value="68" <?php if($row->province_id==68) { echo "selected"; } ?>>Pistoia</option>
                                    <option value="69" <?php if($row->province_id==69) { echo "selected"; } ?>>Pordenone</option>
                                    <option value="70" <?php if($row->province_id==70) { echo "selected"; } ?>>Potenza</option>
                                    <option value="71" <?php if($row->province_id==71) { echo "selected"; } ?>>Prato</option>
                                    <option value="72" <?php if($row->province_id==72) { echo "selected"; } ?>>Ragusa</option>
                                    <option value="73" <?php if($row->province_id==73) { echo "selected"; } ?>>Ravenna</option>
                                    <option value="74" <?php if($row->province_id==74) { echo "selected"; } ?>>Reggio</option>
                                    <option value="75" <?php if($row->province_id==75) { echo "selected"; } ?>>Calabria</option>
                                    <option value="76" <?php if($row->province_id==76) { echo "selected"; } ?>>Reggio Emilia</option>
                                    <option value="77" <?php if($row->province_id==77) { echo "selected"; } ?>>Rieti</option>
                                    <option value="78" <?php if($row->province_id==78) { echo "selected"; } ?>>Rimini</option>
                                    <option value="79" <?php if($row->province_id==79) { echo "selected"; } ?>>Roma</option>
                                    <option value="80" <?php if($row->province_id==80) { echo "selected"; } ?>>Rovigo</option>
                                    <option value="81" <?php if($row->province_id==81) { echo "selected"; } ?>>Salerno</option>
                                    <option value="82" <?php if($row->province_id==82) { echo "selected"; } ?>>Sassari</option>
                                    <option value="83" <?php if($row->province_id==83) { echo "selected"; } ?>>Savona</option>
                                    <option value="84" <?php if($row->province_id==84) { echo "selected"; } ?>>Siena</option>
                                    <option value="85" <?php if($row->province_id==85) { echo "selected"; } ?>>Siracusa</option>
                                    <option value="86" <?php if($row->province_id==86) { echo "selected"; } ?>>Sondrio</option>
                                    <option value="87" <?php if($row->province_id==87) { echo "selected"; } ?>>Taranto</option>
                                    <option value="88" <?php if($row->province_id==88) { echo "selected"; } ?>>Teramo</option>
                                    <option value="89" <?php if($row->province_id==89) { echo "selected"; } ?>>Terni</option>
                                    <option value="90" <?php if($row->province_id==90) { echo "selected"; } ?>>Torino</option>
                                    <option value="91" <?php if($row->province_id==91) { echo "selected"; } ?>>Trapani</option>
                                    <option value="92" <?php if($row->province_id==92) { echo "selected"; } ?>>Trento</option>
                                    <option value="93" <?php if($row->province_id==93) { echo "selected"; } ?>>Treviso</option>
                                    <option value="94" <?php if($row->province_id==94) { echo "selected"; } ?>>Trieste</option>
                                    <option value="95" <?php if($row->province_id==95) { echo "selected"; } ?>>Udine</option>
                                    <option value="96" <?php if($row->province_id==96) { echo "selected"; } ?>>Varese</option>
                                    <option value="97" <?php if($row->province_id==97) { echo "selected"; } ?>>Venezia</option>
                                    <option value="98" <?php if($row->province_id==98) { echo "selected"; } ?>>Verbano-Cusio-Os</option>
                                    <option value="99" <?php if($row->province_id==99) { echo "selected"; } ?>>Vercelli</option>
                                    <option value="100" <?php if($row->province_id==100) { echo "selected"; } ?>>Verona</option>
                                    <option value="101" <?php if($row->province_id==101) { echo "selected"; } ?>>Vibo Valentia</option>
                                    <option value="102" <?php if($row->province_id==102) { echo "selected"; } ?>>Vicenza</option>
                                    <option value="103" <?php if($row->province_id==103) { echo "selected"; } ?>>Viterbo</option>
                                    <option value="104" <?php if($row->province_id==104) { echo "selected"; } ?>>Altro</option>
                                    <option value="105" <?php if($row->province_id==105) { echo "selected"; } ?>>Fermo</option>
                                    <option value="106" <?php if($row->province_id==106) { echo "selected"; } ?>>Barletta Andria Trani</option>
                                </select>
                            </div>

                            <div class="form-group col-4">
                                <label>Cap</label>
                                <input type="text" name="code" class="form-control" value="<?php echo $row->code; ?>" placeholder="">
                            </div>

                            <div class="form-group col-4">
                                <label>Nazione</label>
                                <input type="text" name="code" class="form-control" value="<?php echo $row->country; ?>" placeholder="">
                            </div>

                            <div class="form-group col-6">
                                <label>Cellulare</label>
                                <input type="text" name="mobile_phone" value="<?php echo $row->mobile_phone; ?>" class="form-control" placeholder="">
                            </div>

                            <div class="form-group col-6">
                                <label>Stato civile</label>
                                <select class="form-control form-select" id="mar_status_id" name="mar_status_id">
                                    <option value="">Seleziona</option>    
                                    <option value="1" <?php if($row->mar_status_id==1) { echo 'selected'; } ?>>Single</option>
                                    <option value="2" <?php if($row->mar_status_id==2) { echo 'selected'; } ?>>Sposato</option>
                                    <option value="3" <?php if($row->mar_status_id==3) { echo 'selected'; } ?>>Divorziato</option>
                                    <option value="4" <?php if($row->mar_status_id==4) { echo 'selected'; } ?>>Separato</option>
                                    <option value="5" <?php if($row->mar_status_id==5) { echo 'selected'; } ?>>Vedovo</option>
                                </select>
                            </div>

                            <div class="form-group col-6">
                                <label>Istruzione</label>
                                <select class="form-control form-select" id="instr_level_id" name="instr_level_id">
                                    <option value="">Seleziona</option>
                                    <option value="1" <?php if($row->instr_level_id==1) { echo 'selected'; } ?>>Scuola Elementare</option>
                                    <option value="2" <?php if($row->instr_level_id==2) { echo 'selected'; } ?>>Scuola Media</option>
                                    <option value="3" <?php if($row->instr_level_id==3) { echo 'selected'; } ?>>Scuola Secondaria</option>
                                    <option value="4" <?php if($row->instr_level_id==4) { echo 'selected'; } ?>>Diploma Universitario</option>
                                    <option value="5" <?php if($row->instr_level_id==5) { echo 'selected'; } ?>>Laurea</option>
                                    <option value="6" <?php if($row->instr_level_id==6) { echo 'selected'; } ?>>Specializzazione Post-Laurea</option>
                                </select>

                            </div>

                            <div class="form-group col-6">
                                <label>Professione</label>
                                <select class="form-control form-select" id="work_id" name="work_id">
                                    <option value="">Nessuno</option>
                                    <option value="1" <?php if($row->work_id==1) { echo 'selected'; } ?>>Agente di Commercio</option>
                                    <option value="2" <?php if($row->work_id==2) { echo 'selected'; } ?>>Agricoltore</option>
                                    <option value="3" <?php if($row->work_id==3) { echo 'selected'; } ?>>Analista/Programmatore</option>
                                    <option value="4" <?php if($row->work_id==4) { echo 'selected'; } ?>>Architetto</option>
                                    <option value="5" <?php if($row->work_id==5) { echo 'selected'; } ?>>Artigiano</option>
                                    <option value="6" <?php if($row->work_id==6) { echo 'selected'; } ?>>Autotrasportatore/Autista</option>
                                    <option value="7" <?php if($row->work_id==7) { echo 'selected'; } ?>>Avvocato</option>
                                    <option value="8" <?php if($row->work_id==8) { echo 'selected'; } ?>>Bancario</option>
                                    <option value="9" <?php if($row->work_id==9) { echo 'selected'; } ?>>Casalinga</option>
                                    <option value="10" <?php if($row->work_id==10) { echo 'selected'; } ?>>Commercialista</option>
                                    <option value="11" <?php if($row->work_id==11) { echo 'selected'; } ?>>Commerciante</option>
                                    <option value="12" <?php if($row->work_id==12) { echo 'selected'; } ?>>Dirigente</option>
                                    <option value="13" <?php if($row->work_id==13) { echo 'selected'; } ?>>Disoccupato</option>
                                    <option value="14" <?php if($row->work_id==14) { echo 'selected'; } ?>>Farmacista</option>
                                    <option value="15" <?php if($row->work_id==15) { echo 'selected'; } ?>>Fotografo</option>
                                    <option value="16" <?php if($row->work_id==16) { echo 'selected'; } ?>>Geometra</option>
                                    <option value="17" <?php if($row->work_id==17) { echo 'selected'; } ?>>Giornalista</option>
                                    <option value="18" <?php if($row->work_id==18) { echo 'selected'; } ?>>Grafico</option>
                                    <option value="19" <?php if($row->work_id==19) { echo 'selected'; } ?>>Impiegato</option>
                                    <option value="20" <?php if($row->work_id==20) { echo 'selected'; } ?>>Imprenditore</option>
                                    <option value="21" <?php if($row->work_id==21) { echo 'selected'; } ?>>Infermiere</option>
                                    <option value="22" <?php if($row->work_id==22) { echo 'selected'; } ?>>Ingegnere</option>
                                    <option value="23" <?php if($row->work_id==23) { echo 'selected'; } ?>>Insegnante/Docente</option>
                                    <option value="24" <?php if($row->work_id==24) { echo 'selected'; } ?>>Medico</option>
                                    <option value="25" <?php if($row->work_id==25) { echo 'selected'; } ?>>Militare/Forze dell'Ordine</option>
                                    <option value="26" <?php if($row->work_id==26) { echo 'selected'; } ?>>Musicista</option>
                                    <option value="27" <?php if($row->work_id==27) { echo 'selected'; } ?>>Notaio</option>
                                    <option value="28" <?php if($row->work_id==28) { echo 'selected'; } ?>>Operaio</option>
                                    <option value="29" <?php if($row->work_id==29) { echo 'selected'; } ?>>Operatore Turistico</option>
                                    <option value="30" <?php if($row->work_id==30) { echo 'selected'; } ?>>Pensionato</option>
                                    <option value="31" <?php if($row->work_id==31) { echo 'selected'; } ?>>Psicologo</option>
                                    <option value="32" <?php if($row->work_id==32) { echo 'selected'; } ?>>Pubblicitario</option>
                                    <option value="33" <?php if($row->work_id==33) { echo 'selected'; } ?>>Ragioniere</option>
                                    <option value="34" <?php if($row->work_id==34) { echo 'selected'; } ?>>Ricercatore</option>
                                    <option value="35" <?php if($row->work_id==35) { echo 'selected'; } ?>>Studente</option>
                                    <option value="36" <?php if($row->work_id==36) { echo 'selected'; } ?>>Altro</option>
                                </select>
                            </div>

                            <input type="hidden" name="uid" value="<?php echo $uid; ?>">
                            <input type="hidden" name="act" value="update">
                            
                            <button type="submit">Aggiorna</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>


<?php
include("include/footer.php"); 
?>