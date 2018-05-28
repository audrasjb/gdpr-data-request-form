<?php

/**
 * Form public function.
 *
 * @link       http://jeanbaptisteaudras.com
 * @since      1.1
 *
 * @package    gdpr-data-request-form
 * @subpackage gdpr-data-request-form/public
 * @prefix     gdrf_
 */

/*******************
* PLEASE NOTE: THIS FUNCTION IS NOT AVAILABLE FOR THE MOMENT. THIS IS PLANNED FOR RELEASE 1.2, SCHEDULED ON MAY, 25TH/26TH
* ALTERNATIVELY, YOU CAN USE `echo do_shortcode([gdpr-data-request]);`.
********************/

/*
 * Provide public function to display forms int themes.
 *
 * @since 1.2
 * @param		$settings             array of arguments {
 * @param			form_id           string    Default 'gdrf-form'
 * @param			enqueue_css       bool      Default true (load plugin’s css default minimal styles)
 * @param			title             string    Default '' (no title)
 * @param			description       string    Default '' (no description text)
 * @param			request_type      string    Default 'export_remove' (displays radio buttons for both options) 
 * 					                  You can also use 'export' or 'remove' (the option is set in an hidden input element so it's not displayed for the user)
 * @param			email_label       string    Default 'Your email address (required)' (translatable string)
 * @param			captcha_label     string    Default 'Human verification (required):' (translatable string)
 * @param			submit_label      string    Default 'Send request' (translatable string)
 * }
 */
function gdrf_data_request_form( $settings ) {

	// Check is 4.9.6 Core function wp_create_user_request() exists
	if ( function_exists( 'wp_create_user_request' ) ) {

		// Settings
		$form_id = 'gdrf-form';			
		if ( ! empty( $settings['form_id'] ) ) {
			$form_id = sanitize_key( $settings['form_id'] );
		}
		$enqueue_css = true;			
		if ( false === filter_var( $settings['enqueue_css'], FILTER_VALIDATE_BOOLEAN ) ) {
			$enqueue_css = false;
		}
		$title = '';			
		if ( ! empty( $settings['title'] ) ) {
			$title = esc_attr( $settings['title'] );
		}
		$description = '';
		if ( ! empty( $settings['description'] ) ) {
			$description = esc_attr( $settings['description'] );
		}
		$request_type = 'export_remove';
		if ( ! empty( $settings['request_type'] ) ) {
			$request_type = sanitize_key( $settings['request_type'] );
		}
		$email_label = esc_html__( 'Your email address (required)', 'gdpr-data-request-form' );
		if ( ! empty( $settings['email_label'] ) ) {
			$email_label = esc_attr( $settings['email_label'] );
		}
		$captcha_label = esc_html__( 'Human verification (required):', 'gdpr-data-request-form' );
		if ( ! empty( $settings['email_label'] ) ) {
			$email_label = esc_attr( $settings['email_label'] );
		}
		$submit_label = esc_html__( 'Send request', 'gdpr-data-request-form' );
		if ( ! empty( $settings['submit_label'] ) ) {
			$submit_label = esc_attr( $settings['submit_label'] );
		}

		// Enqueue CSS/JS
		wp_enqueue_script( 'gdrf-public-scripts' );
		if ( true === $enqueue_css ) {
			wp_enqueue_style( 'gdrf-public-styles' );
		}
		
		// Captcha
		$number_one = rand( 1, 9 );
		$number_two = rand( 1, 9 );

		?>
			<form action="<?php echo esc_url( admin_url( 'admin-ajax.php' ) ); ?>" method="post" id="<?php echo $form_id; ?>">
				<input type="hidden" name="action" value="gdrf_data_request">
				<input type="hidden" name="gdrf_data_human_key" id="gdrf_data_human_key" value="<?php echo $number_one . '000' . $number_two; ?>" />
				<input type="hidden" name="gdrf_data_nonce" id="gdrf_data_nonce" value="<?php echo wp_create_nonce( 'gdrf_nonce' ); ?>" />

			<?php if ( ! empty( $title ) ) : ?>
				<h2 class="gdrf-field-title widget-title">
					<?php echo esc_attr( $title ); ?>
				</h2>
			<?php endif; ?>

			<?php if ( ! empty( $description ) ) : ?>
				<div class="gdrf-field-description">
					<?php echo wp_kses_post( $description ); ?>
				</div>
			<?php endif; ?>
				
			<?php if ( $request_type === 'export_remove' ) : ?>

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

			<?php elseif ( $request_type === 'export' ) : ?>

				<input type="hidden" name="gdrf_data_type" value="export">

			<?php elseif ( $request_type === 'remove' ) : ?>

				<input type="hidden" name="gdrf_data_type" value="remove">

			<?php endif; ?>

				<p class="gdrf-field gdrf-field-email">
					<label for="gdrf_data_email">
						<?php echo $email_label; ?>
					</label>
					<input type="email" id="gdrf_data_email" name="gdrf_data_email" required />
				</p>
				
				<p class="gdrf-field gdrf-field-human">
					<label for="gdrf_data_human">
						<?php echo $captcha_label; ?> 
						<?php echo $number_one . ' + ' . $number_two . ' = ?'; ?>
					</label>
					<input type="text" id="gdrf_data_human" name="gdrf_data_human" required />
				</p>

				<p class="gdrf-field gdrf-field-submit">
					<input id="gdrf-submit-button" type="submit" value="<?php echo $submit_label; ?>" />
				</p>
			</form>
		<?php
	
	} else {
		// Display error message
		esc_html_e( 'This plugin requires WordPress 4.9.6.', 'gdpr-data-request-form' );
	}
}
