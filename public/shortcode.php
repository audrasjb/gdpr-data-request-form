<?php

/**
 * Form shortcode.
 *
 * @link       http://jeanbaptisteaudras.com
 * @since      1.0
 *
 * @package    gdpr-data-request-form
 * @subpackage gdpr-data-request-form/public
 * @prefix     gdrf_
 */

function gdrf_shortcode_init() {

	add_shortcode( 'gdpr-data-request', 'gdrf_data_request_form' );
	// Legacy shortcode for backward compatibility
	add_shortcode( 'gpdr-data-request', 'gdrf_data_request_form' );
}
add_action( 'init', 'gdrf_shortcode_init' );
