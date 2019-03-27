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
	function gdrf_shortcode_data_request( $atts ) {

		// Enqueue CSS/JS
		wp_enqueue_script( 'gdrf-public-scripts' );
		wp_enqueue_style( 'gdrf-public-styles' );

		// Captcha
		$number_one = rand( 1, 9 );
		$number_two = rand( 1, 9 );

		// Check is 4.9.6 Core function wp_create_user_request() exists
		if ( function_exists( 'wp_create_user_request' ) ) {

			// Display the form
			ob_start();
			?>
			<form action="<?php echo esc_url( admin_url( 'admin-ajax.php' ) ); ?>" method="post" id="gdrf-form">
				<input type="hidden" name="action" value="gdrf_data_request">
				<input type="hidden" name="gdrf_data_human_key" id="gdrf_data_human_key" value="<?php echo $number_one . '000' . $number_two; ?>" />
				<input type="hidden" name="gdrf_data_nonce" id="gdrf_data_nonce" value="<?php echo wp_create_nonce( 'gdrf_nonce' ); ?>" />

				<div class="gdrf-field gdrf-field-action" role="radiogroup" aria-labelledby="gdrf-radio-label">
					<p id="gdrf-radio-label">
						<?php esc_html_e( 'Select your request:', 'gdpr-data-request-form' ); ?>
					</p>

					<input id="gdrf-data-type-export" class="gdrf-data-type-input" type="radio" name="gdrf_data_type" value="export_personal_data">
					<label for="gdrf-data-type-export" class="gdrf-data-type-label">
						<?php esc_html_e( 'Export Personal Data', 'gdpr-data-request-form' ); ?>
					</label>
					<br />
					<input id="gdrf-data-type-remove" class="gdrf-data-type-input" type="radio" name="gdrf_data_type" value="remove_personal_data">
					<label for="gdrf-data-type-remove" class="gdrf-data-type-label">
						<?php esc_html_e( 'Remove Personal Data', 'gdpr-data-request-form' ); ?>
					</label>
				</div>

				<p class="gdrf-field gdrf-field-email">
					<label for="gdrf_data_email">
						<?php esc_html_e( 'Your email address (required)', 'gdpr-data-request-form' ); ?>
					</label>
					<input type="email" id="gdrf_data_email" name="gdrf_data_email" required />
				</p>

				<p class="gdrf-field gdrf-field-human">
					<label for="gdrf_data_human">
						<?php esc_html_e( 'Human verification (required):', 'gdpr-data-request-form' ); ?>
						<?php echo $number_one . ' + ' . $number_two . ' = ?'; ?>
					</label>
					<input type="text" id="gdrf_data_human" name="gdrf_data_human" required />
				</p>

				<p class="gdrf-field gdrf-field-submit">
					<input id="gdrf-submit-button" type="submit" value="<?php esc_html_e( 'Send request', 'gdpr-data-request-form' ); ?>" />
				</p>
			</form>
			<?php
			return ob_get_clean();
		} else {
			// Display error message
			return esc_html__( 'This plugin requires WordPress 4.9.6.', 'gdpr-data-request-form' );
		}
	}
	add_shortcode( 'gpdr-data-request', 'gdrf_shortcode_data_request' );
}
add_action( 'init', 'gdrf_shortcode_init' );
