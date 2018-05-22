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
 * @param		$args array of arguments {
 * 		@param	$title 				string optional. Default '' (no title)
 * 		@param	$description 		string optional. Default '' (no description text)
 * 		@param	$request_type 		string optional. Default 'export_remove' (displays radio buttons for both options). You can use 'export' or 'remove' (the option is set in an hidden input element so it's not displayed for the user) OR 'export_remove' (displays radio buttons for both options).
 * 		@param	$email_label 		string optional. Default '' (no email label)
 * 		@param	$captcha_question 	string optional. Default '' (no captcha question)
 * 		@param	$captcha_answer	 	int optional. Default 0 (no captcha). Use integer value to set up a captcha.
 * 		@param 	$email_label 		string optional. Default 'Your email address (required)'
 * 		@param	$submit_label 		string optional. Default 'Send request'
 * }
 */
function gdrf_data_request_form( $args ) {

		?>
			<form action="<?php echo esc_url( admin_url( 'admin-ajax.php' ) ); ?>" method="post" id="gdrf-form">
				<input type="hidden" name="action" value="gdrf_data_request">
				<input type="hidden" name="gdrf_data_nonce" id="gdrf_data_nonce" value="<?php echo wp_create_nonce( 'gdrf_nonce' ); ?>" />
				<div class="gdrf-field gdrf-field-action" role="radiogroup" aria-labelledby="gdrf-radio-label">
					<p id="gdrf-radio-label">
						<?php esc_html_e( 'Select your request:', 'gdpr-data-request-form' ); ?>
					</p>
					
					<input id="gdrf-data-type-export" class="gdrf-data-type-input" type="radio" name="gdrf_data_type" value="export_personal_data"> 
					<label for="gdrf-data-type-export" class="gdrf-data-type-label"><?php esc_html_e( 'Export Personal Data', 'gdpr-data-request-form' ); ?></label>
					<br />
					<input id="gdrf-data-type-remove" class="gdrf-data-type-input" type="radio" name="gdrf_data_type" value="remove_personal_data"> 
					<label for="gdrf-data-type-remove" class="gdrf-data-type-label"><?php esc_html_e( 'Remove Personal Data', 'gdpr-data-request-form' ); ?></label>
				</div>
				<p class="gdrf-field gdrf-field-email">
					<label for="gdrf_data_email">
						<?php esc_html_e( 'Your email address (required)', 'gdpr-data-request-form' ); ?>
					</label>
					<input type="email" id="gdrf_data_email" name="gdrf_data_email" />
				</p>
				<p class="gdrf-field gdrf-field-human">
					<label for="gdrf_data_human">
						<?php esc_html_e( 'Human Verification (required) : 3 + 5 = ?', 'gdpr-data-request-form' ); ?>
					</label>
					<input type="text" id="gdrf_data_human" name="gdrf_data_human" />
				</p>
				<p class="gdrf-field gdrf-field-submit">
					<input id="gdrf-submit-button" type="submit" value="<?php esc_html_e( 'Send request', 'gdpr-data-request-form' ); ?>" />
				</p>
			</form>
		<?php
}
