<?php settings_errors()?>
<?php 
    $firstName = esc_attr(get_option('first-name'));
    $lastName = esc_attr(get_option('last-name'));
    $fullName = $firstName . ' ' . $lastName;
?>
<div class="demo-sidebar-preview">
    <div class="demo-sidebar">
        <h1 class="demo-username">1</h1>
        <h2 class="demo-description">2</h2>
        <div class="icon-wrapper">2</div>
    </div>
</div>
<form method="post" action="options.php">
    <?php 
        settings_fields("demo-setting-group");
        do_settings_sections('demo');
        submit_button();
    ?> 
</form>