<?php 
/*
Author: Joshua Michaels / BioDesign
URL: http://wearebio.com/osseous/

This file includes custom functions for the Osseous theme. 
*/

/*
*****************************************
* LET'S ROCK SOME OSSEOUS THEME OPTIONS *
*****************************************
*/

// Adds option page to admin and admin menu
if( function_exists('acf_add_options_page') ) {
  
  acf_add_options_page(array(
    'page_title'  => 'Osseous Theme Settings',
    'menu_title'  => 'Theme Settings',
    'menu_slug'   => 'theme-general-settings',
    'capability'  => 'manage_options',
    'redirect'    => false
  ));
  
}

// Let's keep the options for the admins, k?
if( function_exists('acf_set_options_page_capability') )
{
    acf_set_options_page_capability( 'manage_options' );
}

// Allow site admin to change fonts.
add_filter( 'acfgfs/font_dropdown_array', 'my_font_list' );
function my_font_list( $fonts ) {
    $fonts = array(
        'Allerta' => 'Allerta',
		'Arvo' => 'Arvo',
		'Crimson Text' => 'Crimson Text',
		'Domine' => 'Domine',
		'Droid Sans' => 'Droid Sans',
		'Droid Serif' => 'Droid Serif',
		'Fjalla One' => 'Fjalla One',
		'Lato' => 'Lato',
		'Montserrat' => 'Montserrat',
		'Noto Serif' => 'Noto Serif',
		'Open Sans' => 'Open Sans',
		'Oswald' => 'Oswald',
		'Playfair Display' => 'Playfair Display',
		'PT Sans' => 'PT Sans',
		'PT Serif' => 'PT Serif',
		'Raleway' => 'Raleway',
		'Rambla' => 'Rambla',
		'Roboto' => 'Roboto',
		'Ubuntu' => 'Ubuntu',
		'Vollkorn' => 'Vollkorn',

    );
    return $fonts;
}



function disable_wp_emojicons() {

  // all actions related to emojis
  remove_action( 'admin_print_styles', 'print_emoji_styles' );
  remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
  remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
  remove_action( 'wp_print_styles', 'print_emoji_styles' );
  remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
  remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
  remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );

  // filter to remove TinyMCE emojis
  add_filter( 'tiny_mce_plugins', 'disable_emojicons_tinymce' );
}
add_action( 'init', 'disable_wp_emojicons' );

function disable_emojicons_tinymce( $plugins ) {
  if ( is_array( $plugins ) ) {
    return array_diff( $plugins, array( 'wpemoji' ) );
  } else {
    return array();
  }
}


add_filter( 'wp_default_scripts', 'remove_jquery_migrate' );

function remove_jquery_migrate( &$scripts)
{
    if(!is_admin())
    {
        $scripts->remove( 'jquery');
        $scripts->add( 'jquery', false, array( 'jquery-core' ), '1.10.2' );
    }
}