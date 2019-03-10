<?php

/*
	
@package demotheme
	
	========================
		ADMIN PAGE
	========================
*/

function demo_add_admin_page() {
	add_menu_page('Demo Theme Options', 'Demo', 'manage_options', 'demo', 'demo_theme_create_page', 'dashicons-admin-customizer', 110 );
	add_submenu_page('demo', 'Demo Theme Options', 'General', 'manage_options', 'demo', 'demo_theme_create_page');
	add_submenu_page('demo', 'Demo CSS Options', 'Custom CSS', 'manage_options', 'demo_custom_css', 'demo_settings_page');
}
add_action( 'admin_menu', 'demo_add_admin_page' );
add_action("admin_init", 'demo_custom_settings');
function demo_custom_settings(){
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
}

function demo_sidebar_name(){
	$firstName = esc_attr(get_option('first-name'));
	$lastName = esc_attr(get_option('last-name'));
	echo "<input type='text' value='$firstName' name='first-name' placeholder='First Name'/>" . 
		 "<input type='text' value='$lastName' name='last-name' placeholder='Last Name'/>";
}

function demo_sidebar_options(){
	echo 'Customize your sidebar information';
}

function demo_theme_create_page() {
	require_once(get_template_directory() . '/inc/templates/demo-admin.php');
}

function demo_sidebar_twitter(){
	$twitter = esc_attr(get_option('twitter-handler'));
	echo "<input type='text' value='$twitter' name='twitter-handler' placeholder='Twitter handler'/><p class='description'>Please input your Twitter username without the @ character.</p>";
}

function demo_sidebar_profile_picture(){
	$picture = esc_attr(get_option('profile-picture'));
	echo "<input type='button' class='button button-secondary' value='Upload profile picture' id='upload-button'/>
		  <input type='hidden' value='$picture' name='profile-picture' placeholder='Profile picture' id='profile-picture'/>";
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