<?php
include("include/header.php"); 

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
                            <h2>Registrazione</h2>
                        </div>
                    </div>
                </div>

            </div>

        </div>

        <div class="shape15"><img src="assets/img/shape/shape15.png" alt="image"></div>
    </section>

    <section class="profile-authentication-area ptb-70">
        <div class="container">
            <div class="row" style="background-color:#fff; box-shadow: 15px 15px 15px 0 rgba(0, 0, 0, 0.3); ">

            <div class="col-lg-6 col-md-12">
            <div class="container" style="background-color:#FE9F1C; height:100%; color:#fff;padding: 50px;">
            
                <div style="width: 100%; padding: 20px 10px; text-align: left;">
                <div class="col-md-12 hideme">
						<h2>Partecipa ai sondaggi.<br> Ottieni una ricompensa. <br>Guadagna contanti o buoni Amazon. </h2>
                        <br/>
						<h3 style='color:#6D6D6D'>Fai valere la tua opinione!</h3>
						<br>
						<center>
                        <img style="border-radius:10%;" src="https://millebytes.com/assets/img/reprize.png" alt="image">
						</center>
					</div>

                </div>
					
				


            </div>

            </div>

                <div class="col-lg-6 col-md-12">
                    <div class="register-form" style="padding: 50px;">

                        <h2>Registrazione</h2>

                        <?php //echo form_open(base_url().'/rconfirm/website', 'class="row"'); ?>
                        <form id="registerUser" name="registerUser" method="post" class="row">
                            <!-- GIUSEPPE -->
                            <input type="hidden" name="sid" id="sid" value="<?= $_GET["sid"] ?>">
                            <input type="hidden" name="utm" id="utm" value="<?= $_GET["utm"] ?>">
                            <!-- -->
                            <div class="form-group col-6">
                                <label>Cognome *</label>
                                <input type="text" name="second_name" id="second_name" class="form-control" minlength="2" placeholder="" >
                            </div>
                            <div class="form-group col-6">
                                <label>Nome *</label>
                                <input type="text" name="first_name" id="first_name" class="form-control" minlength="3" placeholder="" >
                            </div>
                            <div class="form-group col-6">
                                <label>Email *</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="" >
                            </div>
                            <div class="form-group col-6">
                                <label>Password *</label>
                                <input type="password" name="pwd" id="pwd" maxlength="15" minlength="6" class="form-control" placeholder="Password" >
                            </div>

                            <div class="form-group col-6">
                                <label>Genere *</label>
                                <select class="form-control form-select" id="gender" name="gender" >
                                    <option value="">Seleziona</option>    
                                    <option value="1">Uomo</option>
                                    <option value="2">Donna</option>
                                </select>
                            </div>

                            <div class="form-group col-6">
                                <label>Data di nascita *</label>
                                <input type="date" name="birth_date" id="birth_date" min="<?php echo $minData; ?>" max="<?php echo $maxData; ?>" value="<?php echo $maxData; ?>" class="form-control" placeholder="">
                            </div>

                            <div class="form-group col-6">
                                <label>Nazione *</label>
                                <select class="form-control form-select" id="country" name="country" >
                                    <option value="IT">Italia</option>
                                    <option value="FR">Francia</option>
                                    <option value="ES">Spagna</option>
                                    <option value="GB">Gran Bretagna</option>
                                    <option value="DE">Germania</option>
                                </select>
                            </div>

                            <div class="form-group col-6">
                                <label>Provincia *</label>
                                <select class="form-control form-select" id="province_id" name="province_id" >
                                    <option value="">Seleziona</option>
                                    <option value="1">Alessandria</option>
                                    <option value="2">Crotone</option>
                                    <option value="3">Aosta</option>
                                    <option value="4">Arezzo</option>
                                    <option value="5">Ascoli</option>
                                    <option value="6">Piceno</option>
                                    <option value="7">Asti</option>
                                    <option value="8">Avellino</option>
                                    <option value="9">Bari</option>
                                    <option value="10">Belluno</option>
                                    <option value="11">Benevento</option>
                                    <option value="12">Bergamo</option>
                                    <option value="13">Biella</option>
                                    <option value="14">Bologna</option>
                                    <option value="15">Bolzano</option>
                                    <option value="16">Brescia</option>
                                    <option value="17">Brindisi</option>
                                    <option value="18">Cagliari</option>
                                    <option value="19">Caltanissetta</option>
                                    <option value="20">Campobasso</option>
                                    <option value="21">Caserta</option>
                                    <option value="22">Catania</option>
                                    <option value="23">Catanzaro</option>
                                    <option value="24">Chieti</option>
                                    <option value="25">Como</option>
                                    <option value="26">Cosenza</option>
                                    <option value="27">Cremona</option>
                                    <option value="29">Cuneo</option>
                                    <option value="30">Enna</option>
                                    <option value="31">Ferrara</option>
                                    <option value="32">Firenze</option>
                                    <option value="33">Foggia</option>
                                    <option value="34">Forli'</option>
                                    <option value="35">Frosinone</option>
                                    <option value="36">Genova</option>
                                    <option value="37">Gorizia</option>
                                    <option value="38">Grosseto</option>
                                    <option value="39">Imperia Isernia</option>
                                    <option value="40">L'Aquila</option>
                                    <option value="41">La Spezia</option>
                                    <option value="42">Latina</option>
                                    <option value="43">Lecce</option>
                                    <option value="44">Lecco</option>
                                    <option value="45">Livorno</option>
                                    <option value="46">Lodi</option>
                                    <option value="47">Lucca</option>
                                    <option value="48">Macerata</option>
                                    <option value="49">Mantova</option>
                                    <option value="50">Massa Carrara</option>
                                    <option value="51">Matera</option>
                                    <option value="52">Messina</option>
                                    <option value="53">Milano</option>
                                    <option value="54">Modena</option>
                                    <option value="55">Napoli</option>
                                    <option value="56">Novara</option>
                                    <option value="57">Nuoro</option>
                                    <option value="58">Oristano</option>
                                    <option value="59">Padova</option>
                                    <option value="60">Palermo</option>
                                    <option value="61">Parma</option>
                                    <option value="62">Pavia</option>
                                    <option value="63">Perugia</option>
                                    <option value="64">Pesaro e Urbino</option>
                                    <option value="65">Pescara</option>
                                    <option value="66">Piacenza</option>
                                    <option value="67">Pisa</option>
                                    <option value="68">Pistoia</option>
                                    <option value="69">Pordenone</option>
                                    <option value="70">Potenza</option>
                                    <option value="71">Prato</option>
                                    <option value="72">Ragusa</option>
                                    <option value="73">Ravenna</option>
                                    <option value="74">Reggio</option>
                                    <option value="75">Calabria</option>
                                    <option value="76">Reggio Emilia</option>
                                    <option value="77">Rieti</option>
                                    <option value="78">Rimini</option>
                                    <option value="79">Roma</option>
                                    <option value="80">Rovigo</option>
                                    <option value="81">Salerno</option>
                                    <option value="82">Sassari</option>
                                    <option value="83">Savona</option>
                                    <option value="84">Siena</option>
                                    <option value="85">Siracusa</option>
                                    <option value="86">Sondrio</option>
                                    <option value="87">Taranto</option>
                                    <option value="88">Teramo</option>
                                    <option value="89">Terni</option>
                                    <option value="90">Torino</option>
                                    <option value="91">Trapani</option>
                                    <option value="92">Trento</option>
                                    <option value="93">Treviso</option>
                                    <option value="94">Trieste</option>
                                    <option value="95">Udine</option>
                                    <option value="96">Varese</option>
                                    <option value="97">Venezia</option>
                                    <option value="98">Verbano-Cusio-Os</option>
                                    <option value="99">Vercelli</option>
                                    <option value="100">Verona</option>
                                    <option value="101">Vibo Valentia</option>
                                    <option value="102">Vicenza</option>
                                    <option value="103">Viterbo</option>
                                    <option value="104">Altro</option>
                                    <option value="105">Fermo</option>
                                    <option value="106">Barletta Andria Trani</option>
                                </select>
                            </div>

                            

                            <p class="description">Compilando il form accetti il trattamento dei dati secondo normativa vigente</p>
                            
                            <input type="hidden" value="<?php echo $prov; ?>" name="provenienza">
                            
                            <button type="button" onclick="registerUser2()" id="submitMsg">Registrami</button>
                        </form>
                        
                        <p id="results"></p>

                    </div>
                </div>
            </div>
        </div>
    </section>

<?php
include("include/footer.php"); 
?>