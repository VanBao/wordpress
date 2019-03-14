<?php

/*
	
@package demotheme
	
	========================
		THEME CUSTOM POST TYPES
	========================
*/

$contact = get_option('activate-contact');

if(1){
	add_action('init', 'demo_contact_custom_post_type');
}

function demo_contact_custom_post_type(){
    $label = array(
        'name' => 'Message',
        'singular_name' => 'Message',
        'menu_name' => 'Message',
        'name_admin_bar'=> 'Message'
    );

    $args = array(
        'labels'  => $label,
        'show_ui' => true,
        'show_in_menu' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'menu_position' => 26,
        'supports' => array('title', 'editor', 'author')
    );
    register_post_type('demo-contact', $args);
}