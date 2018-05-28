<?php

/**
 * The public-specific functionality of the plugin.
 *
 * @link       http://jeanbaptisteaudras.com
 * @since      1.0
 *
 * @package    gdpr-data-request-form
 * @subpackage gdpr-data-request-form/public
 * @prefix     gdrf_
 */

add_action( 'wp_enqueue_scripts', 'enqueue_styles_gdrf_public' );
function enqueue_styles_gdrf_public() {
	wp_register_style( 'gdrf-public-styles', plugin_dir_url( __FILE__ ) . 'css/public.css', array(), '', 'all' );
}

add_action( 'wp_enqueue_scripts', 'enqueue_scripts_gdrf_public' );
function enqueue_scripts_gdrf_public() {
	wp_register_script( 'gdrf-public-scripts', plugin_dir_url( __FILE__ ) . 'js/gdrf-public.js', array( 'jquery' ), '', false );
	$translations = array(
		'gdrf_ajax_url' => esc_url( admin_url( 'admin-ajax.php' ) ),
		'gdrf_success'  => __( 'Your enquiry have been submitted. Check your email to validate your data request.', 'gdpr-data-request-form' ),
		'gdrf_errors'   => __( 'Some errors occurred:', 'gdpr-data-request-form' ),
	);
	wp_localize_script( 'gdrf-public-scripts', 'gdrf_localize', $translations );
}
