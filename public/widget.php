<?php

/**
 * Form widget.
 *
 * @link       http://jeanbaptisteaudras.com
 * @since      1.0
 *
 * @package    gdpr-data-request-form
 * @subpackage gdpr-data-request-form/public
 * @prefix     gdrf_
 */

class GDRF_Widget extends WP_Widget {
	
 	function __construct() {

		parent::__construct(
			'gdrf-widget',
			'GDPR Data Request Form'
		);

		add_action( 'widgets_init', function() {
			register_widget( 'GDRF_Widget' );
		});

	}

	public function widget( $args, $instance ) {
		
		?>
			<form action="<?php echo esc_url( admin_url( 'admin-ajax.php' ) ); ?>" method="post" id="gdrf-form" class="widget widget_gdrf">
				<input type="hidden" name="action" value="gdrf_data_request">
				<input type="hidden" name="gdrf_data_nonce" id="gdrf_data_nonce" value="<?php echo wp_create_nonce( 'gdrf_nonce' ); ?>" />

		<?php if ( ! empty( $instance['title'] ) ) : ?>
				<h2 class="gdrf-field-title widget-title">
					<?php echo esc_html( $instance['title'] ); ?>
				</h2>
		<?php endif; ?>
 
		<?php if ( ! empty( $instance['text'] ) ) : ?>
				<div class="gdrf-field-description">
					<?php echo wp_kses_post( $instance['text'] ); ?>
				</div>
		<?php endif; ?>

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
						<?php esc_html_e( 'Human Verification (required):', 'gdpr-data-request-form' ); ?>  3 + 5 = ?
					</label>
					<input type="text" id="gdrf_data_human" name="gdrf_data_human" />
				</p>
				<p class="gdrf-field gdrf-field-submit">
					<input id="gdrf-submit-button" type="submit" value="<?php esc_html_e( 'Send request', 'gdpr-data-request-form' ); ?>" />
				</p>
			</form>

		<?php
    }
 
    public function form( $instance ) {
 
        $title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( '', 'gdpr-data-request-form' );
        $text = ! empty( $instance['text'] ) ? $instance['text'] : esc_html__( '', 'gdpr-data-request-form' );

        ?>

        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Optional widget title:', 'gdpr-data-request-form' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'text' ) ); ?>"><?php esc_html_e( 'Optional widget description:', 'gdpr-data-request-form' ); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'text' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'text' ) ); ?>" type="text" cols="30" rows="10"><?php echo esc_attr( $text ); ?></textarea>
        </p>

        <?php
    }
 
    public function update( $new_instance, $old_instance ) {
 
        $instance = array();
 
        $instance['title'] = ( !empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['text'] = ( !empty( $new_instance['text'] ) ) ? $new_instance['text'] : '';
 
        return $instance;
    
    }
 
}
$gdrf_widget = new GDRF_Widget();
