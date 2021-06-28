<?php
function theme_enqueue_styles() {

    $parent_style = 'parent-style';

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style )
    );
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );

function themeslug_enqueue_script() {
    wp_enqueue_script( 'custom-js', get_stylesheet_directory_uri() . '/js/script.js', array( 'jquery' ),'',true );
}
add_action( 'wp_enqueue_scripts', 'themeslug_enqueue_script' );

$defaults = array(
    'height'               => 500,
    'width'                => 1000,
    'flex-height'          => true,
    'flex-width'           => true,
    'header-text'          => array( 'site-title', 'site-description' ),
    'unlink-homepage-logo' => true, 
);

add_theme_support( 'custom-logo', $defaults );

/**
 * WPGlobus language switcher.
 * Example 1: with using module `Publish` from WPGlobus Plus.
 */
function wp_globus() {
	$enabled_languages = apply_filters( 'wpglobus_extra_languages', WPGlobus::Config()->enabled_languages, WPGlobus::Config()->language );

	foreach ( $enabled_languages as $language ):
		$url = null;
		$is_current = true;

		if ( $language != WPGlobus::Config()->language ) {
			$url = WPGlobus_Utils::localize_current_url( $language );
			$is_current = false;
		}

		$flag = '<img src="'.WPGlobus::Config()->flags_url . WPGlobus::Config()->flag[ $language ].'" />';
		$link = $flag . '&nbsp;' . WPGlobus::Config()->en_language_name[$language] . '&nbsp;&nbsp;&nbsp;';

		printf( '<a %s %s>%s</a>', ( empty( $url ) ? '' : 'href="' . esc_url( $url ) . '"' ), ( $is_current ? 'class="wpglobus-current-language"' : '' ), $link );

	endforeach;
}
