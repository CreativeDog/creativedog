<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package CreativeDog
 */
?>

			<!-- Footer -->

            <footer>
                <aside class="dog"></aside>
                <section id="newsletter_section">
                    <div id="content_newsletter">
                            <h3 class="titulo_secciones white">Suscribite a nuestro Newsletter!</h3>
                            <h4 class="titulo_secciones_ingles center">- Subscribe to our Newsletter -</h4>
                            <p>Recibirás info sobre proyectos en los que estamos trabajando y algunas cosas mas!</p>
                            <div class="fr">
                                <!-- Begin MailChimp Signup Form -->
                                <div id="mc_embed_signup" style="display: inline-block;">
                                    <form action="//creativedog.us4.list-manage.com/subscribe/post?u=bf28322ee5da39d358f366ee2&amp;id=aee405e910" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                                        <div class="mc-field-group content_campo">
                                            <!-- <label for="mce-EMAIL">Email Address </label> -->
                                            <input class="col-md-6 fEmail required email" name='EMAIL' id="mce-EMAIL" placeholder='Escribe tu Email'/>
                                            <!-- <a href="#" class="subS">Suscribirme!</a> -->
                                        </div>
                                        <div id="mce-responses" class="clear">
                                            <div class="response" id="mce-error-response" style="display:none"></div>
                                            <div class="response" id="mce-success-response" style="display:none"></div>
                                        </div>
                                        <div class="content_enviar">
                                            <div style="position: absolute; left: -5000px;"><input type="text" name="b_bf28322ee5da39d358f366ee2_aee405e910" tabindex="-1" value=""></div>
                                            <div class="clear"><input type="submit" value="Suscribirme!" name="subscribe" id="mc-embedded-subscribe" class="subS"></div>
                                        </div>
                                    </form> 
                                </div> 
                            </div>
                        </div>
                        <div class="soc">
                            <ul>
                                <li class="soc2"><a href="<?php if (get_field('facebook','options')) {the_field('facebook','options');}?>" target="_blank"></a></li>
                                <li class="soc3"><a href="<?php if (get_field('twitter','options')) {the_field('twitter','options');}?>" target="_blank"></a></li>                           
                            </ul>
                        </div>
                </section>
                <aside id="copy_section">
                    <p><?php if (get_field('copyright','options')) {the_field('copyright','options');}?></p>
                    <a class="html5_logo" href="http://www.w3.org/html/logo/">
                    <img src="http://www.w3.org/html/logo/badge/html5-badge-h-css3-device-graphics-performance-semantics.png" width="261" height="64" alt="HTML5 Powered with CSS3 / Styling, Device Access, Graphics, 3D &amp; Effects, Performance &amp; Integration, and Semantics" title="HTML5 Powered with CSS3 / Styling, Device Access, Graphics, 3D &amp; Effects, Performance &amp; Integration, and Semantics">
                    </a>
                    <div class="clearfix"></div>
                </aside>
            </footer>

		</div><!-- Container -->
    </div><!-- Content Page -->
    </div>
	
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

	<?php wp_footer(); ?>

	
</body>
</html>
