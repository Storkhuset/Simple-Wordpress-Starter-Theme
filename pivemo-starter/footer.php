<?php wp_footer(  ); ?>
    <footer class="frontpage-footer">
        <div class="container flex gap-200">
            <div class="footer-links">
                <h2><?php echo __('Links', 'themedomain'); ?></h2>
                <?php 
                    /* 
                    This will get the navigation from an external file. 
                    The file is located in the includes folder of this theme. 
                    */
                    get_template_part( "includes/navbar-footer" );
                ?>
            </div>
            <div class="contact-form">
                <h2><?php echo __('Contact', 'themedomain'); ?></h2>
                <form action="" method="post" onsubmit="return submitForm()">  <!-- Simmples form of form validation -->
                    <?php wp_nonce_field("save_starter_values", "starter_nonce"); // This adds a nonce field to stop usage from external sources ?>
                    <div class="form-group">
                        <label for="form-name"><?php echo __('Name', 'themedomain'); ?></label>
                        <input type="text" id="form-name" name="form-name">
                    </div>
                    <div class="form-group surname">
                        <label for="surname"><?php echo __("Surname", "themedomain") ?></label>
                        <input type="text" name="starter_surname" id="surname" autocomplete="off" tabindex="-1" />
                    </div>
                    <div class="form-group">
                        <label for="form-email"><?php echo __('Email', 'themedomain'); ?></label>
                        <input type="email" id="form-email" name="form-email">
                    </div>
                    <div class="form-group">
                        <label for="form-message"><?php echo __('Message', 'themedomain'); ?></label>
                        <textarea name="form-message" id="form-message" rows="5"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="form-submit" id="form-submit" value="<?php echo __('Send', 'themedomain'); ?>">
                    </div>
                </form>
            </div>
        </div>
    </footer>
</body>
</html>