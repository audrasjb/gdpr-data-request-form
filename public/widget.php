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

		add_action(
			'widgets_init',
			function() {
				register_widget( 'GDRF_Widget' );
			}
		);

	}

	public function widget( $args, $instance ) {

		if ( ! empty( $instance['title'] ) ) {
			echo '<h3>' . esc_html( $instance['title'] ) . '</h3>';
		}
		if ( ! empty( $instance['text'] ) ) {
			echo '<p>' . esc_html( $instance['text'] ) . '</p>';
		}
		$params = array();
		if ( isset( $instance['request_type'] ) ) {
			if ( 'export' === $instance['request_type'] ) {
				$params['request_type'] = 'export';
			} elseif ( 'remove' === $instance['request_type'] ) {
				$params['request_type'] = 'remove';
			}
		}
		echo gdrf_data_request_form( $params );

	}

	public function form( $instance ) {
		$title        = ( ! empty( $instance['title'] ) ) ? $instance['title'] : '';
		$text         = ( ! empty( $instance['text'] ) ) ? $instance['text'] : '';
		$request_type = ( ! empty( $instance['request_type'] ) ) ? $instance['request_type'] : '';

		?>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Optional widget title:', 'gdpr-data-request-form' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'text' ) ); ?>"><?php esc_html_e( 'Optional widget description:', 'gdpr-data-request-form' ); ?></label>
			<textarea class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'text' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'text' ) ); ?>" type="text" cols="30" rows="10"><?php echo esc_attr( $text ); ?></textarea>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'request_type' ) ); ?>"><?php echo esc_attr( 'Request type:', 'gdpr-data-request-form' ); ?></label>
			<select name="<?php echo esc_attr( $this->get_field_name( 'request_type' ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'request_type' ) ); ?>">
				<option value="both" <?php selected( $request_type, 'both' ); ?>><?php esc_attr_e( 'Both Export and Remove', 'gdpr-data-request-form' ); ?></option>
				<option value="export" <?php selected( $request_type, 'export' ); ?>><?php esc_attr_e( 'Data Export form only', 'gdpr-data-request-form' ); ?></option>
				<option value="remove" <?php selected( $request_type, 'remove' ); ?>><?php esc_attr_e( 'Data Remove form only', 'gdpr-data-request-form' ); ?></option>
			</select>
		</p>

		<?php
	}

	public function update( $new_instance, $old_instance ) {

		$instance = array();

		$instance['title']        = ( ! empty( $new_instance['title'] ) ) ? wp_strip_all_tags( $new_instance['title'] ) : '';
		$instance['text']         = ( ! empty( $new_instance['text'] ) ) ? $new_instance['text'] : '';
		$instance['request_type'] = ( ! empty( $new_instance['request_type'] ) ) ? $new_instance['request_type'] : '';

		return $instance;

	}
}
$gdrf_widget = new GDRF_Widget();
