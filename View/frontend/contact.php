
<!-- start sectoion contact -->
<section id="contact" class="paddsection">
    <div class="container">
        <div class="contact-block1">
            <div class="row">

                <div class="col-lg-6">
                    <div class="contact-contact">

                    <h2 class="mb-30">CONTACTEZ-MOI</h2>

                    <ul class="contact-details">
                        <li><span>23 Main, Street</span></li>
                        <li><span>New York, United States</span></li>
                        <li><span>+88 01912704287</span></li>
                        <li><span>example@example.com</span></li>
                    </ul>

                    </div>
                </div>

                <div class="col-lg-6">
                    <form action="" method="post" role="form" class="contactForm">
                    <div class="row">

                        <div id="sendmessage">Votre message a été envoyé !</div>
                        <div id="errormessage"></div>

                        <div class="col-lg-6">
                            <div class="form-group contact-block1">
                                <input type="text" name="name" class="form-control" id="name" placeholder="Votre nom" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                <div class="validation"></div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Votre Email" data-rule="email" data-msg="Please enter a valid email" />
                                <div class="validation"></div>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group">
                                <input type="text" class="form-control" name="subject" id="subject" placeholder="Sujet" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                                <div class="validation"></div>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group">
                                <textarea class="form-control" name="message" rows="12" data-rule="required" data-msg="Please write something for us" style="height: 200px;" placeholder="Message"></textarea>
                                <div class="validation"></div>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <input type="submit" class="btn" value="Envoyer le message">
                        </div>

                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- start sectoion contact -->

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>