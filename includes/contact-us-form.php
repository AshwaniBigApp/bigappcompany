<div class="ui small contact modal"> <i class="close icon"></i>
        <div class="content">
            <h3 class="accent-bar center-align">Message Our Team</h3>
            <p class="center-align">Or call us on +91 95354 22200 </p>
            <div class="ui form center-align">
                <div role="form" class="wpcf7" id="wpcf7-f90-o1" lang="en-US" dir="ltr">
                    <div class="screen-reader-response"></div>
                    <form action="<?=base_url?>mail/contact_me.php" method="post" class="wpcf7-form">
                        <!--<div style="display: none;">
                            <input type="hidden" name="_wpcf7" value="90" />
                            <input type="hidden" name="_wpcf7_version" value="4.5" />
                            <input type="hidden" name="_wpcf7_locale" value="en_US" />
                            <input type="hidden" name="_wpcf7_unit_tag" value="wpcf7-f90-o1" />
                            <input type="hidden" name="_wpnonce" value="3677ef55fc" /> 
                        </div>-->
                        <div class="field"> 
                            <span class="wpcf7-form-control-wrap full-name">
                                <input type="text" name="name" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false" placeholder="Full Name*" required/>
                            </span> 
                        </div>
                        <div class="field">
                            <span class="wpcf7-form-control-wrap company-name">
                                <input type="text" name="company-name" value="" size="40" class="wpcf7-form-control wpcf7-text" aria-invalid="false" placeholder="Company Name" required/>
                            </span> 
                        </div>
                        <div class="field">
                            <span class="wpcf7-form-control-wrap email">
                                <input type="email" name="email" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email" aria-required="true" aria-invalid="false" placeholder="Email*" required/>
                            </span> 
                        </div>
                        <div class="field">
                            <span class="wpcf7-form-control-wrap phone">
                                <input type="text" pattern="[0-9]*"  name="mobile" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false" placeholder="Phone*"/>
                            </span> 
                        </div>
                        <div class="field">
                            <span class="wpcf7-form-control-wrap subject"><input type="text" name="services" value="" size="40" class="wpcf7-form-control wpcf7-text" aria-invalid="false" placeholder="Services Interested In?"/>
                            </span>
                        </div>
                        <div class="field">
                            <span class="wpcf7-form-control-wrap message">
                                <textarea name="message" cols="40" rows="10" class="wpcf7-form-control wpcf7-textarea" aria-invalid="false" placeholder="Message"></textarea>
                            </span> 
                        </div>
                        <p>
                            <input type="submit" value="Send" class="wpcf7-form-control wpcf7-submit ui secondary button" />
                        </p>
                        <div class="wpcf7-response-output wpcf7-display-none"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
