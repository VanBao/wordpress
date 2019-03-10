<?php settings_errors()?>
<?php 
    $firstName = esc_attr(get_option('first-name'));
    $lastName = esc_attr(get_option('last-name'));
    $fullName = $firstName . ' ' . $lastName;
    $user_description = esc_attr(get_option('user-description'));
    $profile_picture = esc_attr(get_option('profile-picture'));
?>
<div class="demo-sidebar-preview">
    <div class="demo-sidebar">
        <div class="image-container">
            <div class="profile-picture">
                <img style="width: 20%;" src="<?php print $profile_picture?>"/>
            </div>
        </div>
        <h1 class="demo-username"><?php print $fullName?></h1>
        <h2 class="demo-description"><?php print $user_description?></h2>
        <div class="icon-wrapper">2</div>
    </div>
</div>
<form method="post" action="options.php" class="demo-general-form">
    <?php 
        settings_fields("demo-setting-group");
        do_settings_sections('demo');
        submit_button();
    ?> 
</form>