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

/*
 * Provide public function to display forms int themes.
 *
 * @since 1.1
 * @param	$args array of arguments
 * @param	$title string optional. Default '' (no title)
 *
 */
 	function gdrf_data_request_form( $args = array() ) {

 		// Enqueues
		wp_enqueue_style( 'gdrf-public-styles' );
		wp_enqueue_script( 'gdrf-public-scripts' );

		// Captcha
		$number_one = rand( 1, 9 );
		$number_two = rand( 1, 9 );

		// Default strings
		$defaults = array(
			'form_id'                => 'gdrf-form',
			'label_select_request'   => esc_html__( 'Select your request:', 'gdpr-data-request-form' ),
			'label_select_export'    => esc_html__( 'Export Personal Data', 'gdpr-data-request-form' ),
			'label_select_remove'    => esc_html__( 'Remove Personal Data', 'gdpr-data-request-form' ),
			'label_input_email'      => esc_html__( 'Your email address (required)', 'gdpr-data-request-form' ),
			'label_input_captcha'    => esc_html__( 'Human verification (required):', 'gdpr-data-request-form' ),
			'value_submit'           => esc_html__( 'Send Request', 'gdpr-data-request-form' ),
			'request_type'           => 'both',
		);
		
		// Filter string array
		$args = wp_parse_args( $args, array_merge( $defaults, apply_filters( 'privacy_data_request_form_defaults', $defaults ) ) );

		// Check is 4.9.6 Core function wp_create_user_request() exists
		if ( function_exists( 'wp_create_user_request' ) ) {

			// Display the form
			ob_start();
			?>
			<form action="<?php echo esc_url( admin_url( 'admin-ajax.php' ) ); ?>" method="post" id="<?php echo $args['form_id']; ?>">
				<input type="hidden" name="action" value="gdrf_data_request" />
				<input type="hidden" name="gdrf_data_human_key" id="gdrf_data_human_key" value="<?php echo $number_one . '000' . $number_two; ?>" />
				<input type="hidden" name="gdrf_data_nonce" id="gdrf_data_nonce" value="<?php echo wp_create_nonce( 'gdrf_nonce' ); ?>" />

			<?php if ( 'export' === $args['request_type'] ) : ?>
				<input type="hidden" name="gdrf_data_type" value="export_personal_data" id="gdrf-data-type-export" />
			<?php elseif ( 'remove' === $args['request_type'] ) : ?>
				<input type="hidden" name="gdrf_data_type" value="remove_personal_data" id="gdrf-data-type-remove" />
			<?php else : ?>
				<div class="gdrf-field gdrf-field-action" role="radiogroup" aria-labelledby="gdrf-radio-label">
					<p id="gdrf-radio-label">
						<?php echo esc_html( $args['label_select_request'] ); ?>
					</p>

					<input id="gdrf-data-type-export" class="gdrf-data-type-input" type="radio" name="gdrf_data_type" value="export_personal_data" />
					<label for="gdrf-data-type-export" class="gdrf-data-type-label">
						<?php echo esc_html( $args['label_select_export'] ); ?>
					</label>
					<br />
					<input id="gdrf-data-type-remove" class="gdrf-data-type-input" type="radio" name="gdrf_data_type" value="remove_personal_data" />
					<label for="gdrf-data-type-remove" class="gdrf-data-type-label">
						<?php echo esc_html( $args['label_select_remove'] ); ?>
					</label>
				</div>
			<?php endif; ?>

				<p class="gdrf-field gdrf-field-email">
					<label for="gdrf_data_email">
						<?php echo esc_html( $args['label_input_email'] ); ?>
					</label>
					<input type="email" id="gdrf_data_email" name="gdrf_data_email" required />
				</p>

				<p class="gdrf-field gdrf-field-human">
					<label for="gdrf_data_human">
						<?php echo esc_html( $args['label_input_captcha'] ); ?>
						<?php echo $number_one . ' + ' . $number_two . ' = ?'; ?>
					</label>
					<input type="text" id="gdrf_data_human" name="gdrf_data_human" required />
				</p>

				<p class="gdrf-field gdrf-field-submit">
					<input id="gdrf-submit-button" type="submit" value="<?php echo esc_attr( $args['value_submit'] ); ?>" />
				</p>
			</form>
			<?php
			return ob_get_clean();
		} else {
			// Display error message
			return esc_html__( 'This plugin requires WordPress 4.9.6.', 'gdpr-data-request-form' );
		}
		
	}
