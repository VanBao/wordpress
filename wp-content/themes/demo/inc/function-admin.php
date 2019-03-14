<?php

/*
	
@package demotheme
	
	========================
		ADMIN PAGE
	========================
*/

function demo_add_admin_page() {
	add_menu_page('Demo Theme Options', 'Demo', 'manage_options', 'demo', 'demo_theme_create_page', 'dashicons-admin-customizer', 110 );
	add_submenu_page('demo', 'Demo Sidebar Options', 'General', 'manage_options', 'demo', 'demo_theme_create_page');
	add_submenu_page('demo', 'Demo CSS Options', 'Custom CSS', 'manage_options', 'demo_custom_css', 'demo_settings_page');
	add_submenu_page('demo', 'Demo Theme Options', 'Theme Options', 'manage_options', 'demo_theme', 'demo_theme_support_page');
	add_submenu_page('demo', 'Demo Contact Form', 'Contact Form', 'manage_options', 'demo_theme_contact', 'demo_theme_contact_form');
}
add_action( 'admin_menu', 'demo_add_admin_page' );
add_action("admin_init", 'demo_custom_settings');

function demo_custom_settings(){
	//Sidebar Options
	register_setting('demo-setting-group', 'profile-picture');
	register_setting('demo-setting-group', 'first-name');
	register_setting('demo-setting-group', 'last-name');
	register_setting('demo-setting-group', 'user-description');
	register_setting('demo-setting-group', 'twitter-handler', 'demo_sanitize_twitter_handler');
	register_setting('demo-setting-group', 'facebook-handler');
	register_setting('demo-setting-group', 'google-plus-handler');
	add_settings_section('demo-sidebar-options', 'Sidebar Options', 'demo_sidebar_options', 'demo');
	add_settings_field('sidebar-profile-picture', 'Profile Picture', 'demo_sidebar_profile_picture', 'demo', 'demo-sidebar-options');
	add_settings_field('sidebar-name', 'First Name', 'demo_sidebar_name', 'demo', 'demo-sidebar-options');
	add_settings_field('sidebar-description', 'User Description', 'demo_sidebar_description', 'demo', 'demo-sidebar-options');
	add_settings_field('sidebar-twitter', 'Twitter Handler', 'demo_sidebar_twitter', 'demo', 'demo-sidebar-options');
	add_settings_field('sidebar-facebook', 'Facebook Handler', 'demo_sidebar_facebook', 'demo', 'demo-sidebar-options');
	add_settings_field('sidebar-google-plus', 'Google Plus Handler', 'demo_sidebar_google_plus', 'demo', 'demo-sidebar-options');

	//Theme Support Options
	register_setting('demo-theme-support', 'post-formats');
	register_setting('demo-theme-support', 'custom-header');
	register_setting('demo-theme-support', 'custom-background');
	add_settings_section('demo-theme-options', 'Theme Options', 'demo_theme_options', 'demo_theme');
	add_settings_field('post-formats', 'Post Formats', 'demo_post_formats', 'demo_theme', 'demo-theme-options');
	add_settings_field('custom-header', 'Custom Header', 'demo_custom_header', 'demo_theme', 'demo-theme-options');
	add_settings_field('custom-background', 'Custom Background', 'demo_custom_background', 'demo_theme', 'demo-theme-options');

	// Contact Form
	register_setting('demo-contact-options', 'activate-contact');
	add_settings_section('demo-contact-section', 'Contact Form', 'demo_theme_contact', 'demo-theme-contact');
	add_settings_field('activate-form', 'Activate contact form', 'demo_activate_contact_form', 'demo-theme-contact', 'demo-contact-section');
}

function demo_theme_options(){
	echo 'Activate and Deactivate specific Theme Support Options';
}

function demo_activate_contact_form(){
	$option = get_option('activate-contact');
	$checked = ( @$option == 1 ? ' checked' : '' );
	echo '<label><input type="checkbox" id="activate-contact" name="activate-contact" value="1" '.$checked.' /> Activate contact</label>';
}

function demo_theme_contact(){
	echo 'Activate and Deactivate the built-in contact form';
}

function demo_sidebar_name(){
	$firstName = esc_attr(get_option('first-name'));
	$lastName = esc_attr(get_option('last-name'));
	echo "<input type='text' value='$firstName' name='first-name' placeholder='First Name'/>" . 
		 "<input type='text' value='$lastName' name='last-name' placeholder='Last Name'/>";
}

function demo_custom_header(){
	$options = get_option( 'custom-header');
	$checked = ( @$options == 1 ? ' checked' : '' );
	echo '<label><input type="checkbox" id="custom-header" name="custom-header" value="1" '.$checked.' /> Activate custom header</label>';
}

function demo_custom_background(){
	$options = get_option('custom-background');
	$checked = ( @$options == 1 ? ' checked' : '' );
	echo '<label><input type="checkbox" id="custom-background" name="custom-background" value="1" '.$checked.' /> Activate custom background</label>';
}

function demo_post_formats(){
	$options = get_option( 'post-formats');
	$formats = array( 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat' );
	$output = '';
	foreach ( $formats as $format ){
		$checked = ( @$options[$format] == 1 ? ' checked' : '' );
		$output .= '<label><input type="checkbox" id="'.$format.'" name="post-formats['.$format.']" value="1" '.$checked.' /> '.$format.'</label><br>';
	}
	echo $output;
}

function demo_sidebar_options(){
	echo 'Customize your sidebar information';
}

function demo_theme_create_page() {
	require_once(get_template_directory() . '/inc/templates/demo-admin.php');
}

function demo_theme_support_page(){
	require_once(get_template_directory() . '/inc/templates/demo-theme-support.php');
}

function demo_theme_contact_form(){
	require_once(get_template_directory() . '/inc/templates/demo-contact-form.php');
}

function demo_sidebar_twitter(){
	$twitter = esc_attr(get_option('twitter-handler'));
	echo "<input type='text' value='$twitter' name='twitter-handler' placeholder='Twitter handler'/><p class='description'>Please input your Twitter username without the @ character.</p>";
}

function demo_sidebar_profile_picture(){
	$picture = esc_attr(get_option('profile-picture'));
	if(!empty($picture)){
		echo "<input type='button' class='button button-secondary' value='Replace profile picture' id='upload-button'/>
		  <input type='hidden' value='$picture' name='profile-picture' placeholder='Profile picture' id='profile-picture'/> <input type='button' class='button button-secondary' id='remove-picture' value='Remove profile picture'/>";
	}else{
		echo "<input type='button' class='button button-secondary' value='Upload profile picture' id='upload-button'/>
		  <input type='hidden' value='$picture' name='profile-picture' placeholder='Profile picture' id='profile-picture'/>";
	}
}

function demo_sidebar_description(){
	$user_description = esc_attr(get_option('user-description'));
	echo "<input type='text' value='$user_description' name='user-description' placeholder='User description'/>";
}

function demo_sidebar_facebook(){
	$facebook = esc_attr(get_option('facebook-handler'));
	echo "<input type='text' value='$facebook' name='facebook-handler' placeholder='Facebook handler'/>";
}

function demo_sidebar_google_plus(){
	$googlePlus = esc_attr(get_option('google-plus-handler'));
	echo "<input type='text' value='$googlePlus' name='google-plus-handler' placeholder='Google Plus handler'/>";
}

function demo_sanitize_twitter_handler($input){
	$output = sanitize_text_field($input);
	$output = str_replace('@', '', $output);
	return $output;
}

function demo_settings_page(){

}