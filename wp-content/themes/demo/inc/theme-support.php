<?php

/*
	
@package demotheme
	
	========================
		THEME SUPPORT OPTIONS
	========================
*/

$options = get_option('post-formats');
$formats = array( 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat' );
$output = array();
foreach ( $formats as $format ){
	$output[] = (@$options[$format] == 1 ? $format : '');
}
if(!empty($options)){
    add_theme_support('post-formats', $output);
}

$header = get_option('custom-header');

if(@$header == 1){
	add_theme_support('custom-header');
}

$background = get_option('custom-background');

if(@$background == 1){
	add_theme_support('custom-background');
}