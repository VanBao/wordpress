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
}

add_action('admin_enqueue_scripts', 'demo_load_admin_scripts');