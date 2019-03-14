<?php settings_errors(); ?>
<form method="post" action="options.php" class="demo-generademo-setting-groupl-form">
    <?php 
        settings_fields("demo-contact-options");
        do_settings_sections('demo-theme-contact');
        submit_button();
    ?> 
</form>