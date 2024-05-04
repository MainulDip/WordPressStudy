<?php
/**
 * Functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package mycustom1
 * @since 0.0.1
 */

/**
 * Enqueue the style.css file.
 * 
 * @since 1.0.0
 */
function lession_one_style () {
    wp_enqueue_style(
        'style_one',
        get_stylesheet_uri(),
        array(),
        wp_get_theme()->get('Version')
    );
}