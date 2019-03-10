<?php 
/*
	
@package demotheme
	
	========================
		ADMIN ENQUEUE FUNCTIONS
	========================
*/

function demo_load_admin_scripts($hook){
    if($hook !== 'toplevel_page_demo') return;
    wp_register_style('demo-admin', get_template_directory_uri() . '/css/demo.admin.css', array(), '1.0.0', 'all');
    wp_enqueue_style('demo-admin');
    wp_enqueue_media();
    wp_register_script('demo-admin-script', get_template_directory_uri() . '/js/demo.admin.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('demo-admin-script');
}

add_action('admin_enqueue_scripts', 'demo_load_admin_scripts');