<?php
include("include/header.php"); 
?>

    <section class="about-area bgOrange ptb-70">

        <div class="container-fluid">

            <div class="row align-items-center">

                <div class="col-lg-12 col-md-12">
                    <div class="about-content">
                        <div class="text">
                            <h2><i class="bx bx-mail-send"></i>Contatti</h2>
                        </div>
                    </div>
                </div>

            </div>

        </div>

        <div class="shape15"><img src="assets/img/shape/shape15.png" alt="image"></div>
    </section>

    <section class="contact-info-area pt-100 pb-70">

        <div class="container">

            <div class="row">

                <div class="col-lg-4 col-md-6">
                    <div class="contact-info-box">
                        <div class="back-icon">
                            <i class='bx bx-map'></i>
                        </div>
                        <div class="icon">
                            <i class='bx bx-map'></i>
                        </div>
                        <h3>Sede legale</h3>
                        <p>Via Falvo, 20 - 80127 Napoli</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="contact-info-box">
                        <div class="back-icon">
                            <i class='bx bx-phone-call'></i>
                        </div>
                        <div class="icon">
                            <i class='bx bx-phone-call'></i>
                        </div>
                        <h3>Recapiti</h3>
                        <p>E-mail: <a href="mailto:millebytes@interactive-mr.com"><span class="__cf_email__">millebytes@interactive-mr.com</span></a></p>
                        <p>Facebook: <a href="https://www.facebook.com/millebytes" target="_blank">millebytes</a></p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 offset-lg-0 offset-md-3">
                    <div class="contact-info-box">
                        <div class="back-icon">
                            <i class='bx bx-time-five'></i>
                        </div>
                        <div class="icon">
                            <i class='bx bx-time-five'></i>
                        </div>
                        <h3>Orari supporto</h3>
                        <p>Lunedì - Venerdì: 09:00 - 18:00</p>
                    </div>
                </div>

            </div>

        </div>

    </section>

    <section class="contact-area pb-100">
        <div class="container">

            <div class="section-title">
                <span class="sub-title">Compila il form con i tuoi dati</span>
                <h2>Invia un messaggio<span class="overlay"></span></h2>
                <p>oppure <a href="https://m.me/millebytes" target="_blank">Chatta con noi su Facebook</a></p>
            </div>

            <div class="row">

                <div class="col-lg-6 col-md-12">
                    <div class="contact-image" data-tilt>
                        <img src="assets/img/contact.png" alt="image">
                    </div>
                </div>

                <div class="col-lg-6 col-md-12">
                    <div class="contact-form">

                        <?php //echo form_open(base_url().'/contactSend', 'id="contactSend"'); ?>
                        <form id="contactSend" name="contactSend" method="post">
                            <div class="row">

                                <div class="col-lg-12 col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="name" class="form-control" id="name" required data-error="Inserire nominativo" placeholder="Nome e cognome">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-6">
                                    <div class="form-group">
                                    <input type="email" name="email" class="form-control" id="email" required data-error="Inserire una email valida" placeholder="Email">
                                    <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                    <input type="text" name="phone_number" class="form-control" id="phone_number" required data-error="Inserire un recapito telefonico valido" placeholder="Telefono">
                                    <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <div class="select-box">
                                            <select class="form-control form-select" name="info" id="info">
                                                <?php foreach ($query->getResult() as $row) { ?>
                                                <option value="<?php echo $row->value; ?>"><?php echo $row->value; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                    <textarea name="message" id="message" class="form-control" cols="30" rows="6" required data-error="Inserire il contenuto del messaggio" placeholder="Scrivi il tuo messaggio"></textarea>
                                    <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                    <p class="comment-form-cookies-consent">
                                        <input type="checkbox" id="privacy">
                                        <label for="privacy">Accetto il trattamento dati secondo normativa vigente</label>
                                    </p>
                                </div>

                                <div class="col-lg-3 col-md-3">
                                    <button type="button" class="default-btn" onclick="sendContact()" id="submitMsg">Invia</button>
                                    <div id="msgSubmit" class="h3 text-center hidden"></div>
                                    <div class="clearfix"></div>
                                </div>
                                
                                <div class="col-lg-9 col-md-9" style="display: flex;align-items: center;">
                                    <div id="result"></div>
                                </div>
                
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>


<?php
include("include/footer.php"); 
?>