<?php settings_errors(); ?>
<form method="post" action="options.php" class="demo-generademo-setting-groupl-form">
    <?php 
        settings_fields("demo-theme-support");
        do_settings_sections('demo_theme');
        submit_button();
    ?> 
</form>