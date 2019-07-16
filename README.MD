# GDPR Data Request Form WordPress Plugin 🔐

## About 🔎

The purpose of this repository is to develop a WordPress Plugin to handle Privacy Data Request front-end Forms.

Note that this is also related to a WordPress Core Feature Request. It has it’s own [repository on GitHub](https://github.com/audrasjb/wp-core-privacy-data-request-form).

## Context ⏳

[See WordPress Core Privacy Team roadmap](https://make.wordpress.org/core/roadmap/privacy/):

> Front End User Initiated Requests (Feature Plugin)
> 
> In 4.9.6, the ability for an administrator to initiate a data export or data erasure for a user by email address was added. While this provided sites with the tools to be compliant with new laws and regulations, site owners are still left to find a way to accommodate those requests. Adding a way for users to initiate this request on their own would prove a more “out of the box” experience and decrease the burden on site administrators to initiate these requests themselves.
> Related tickets: #44013

## Features 🛠

- ✅ PHP Function to display the Privacy Data Request Form: `wp_get_privacy_data_request_form()`
- ✅ Shortcode
- ✅ Widget
- ✅ Filters to handle strings customization
- ✅ Possibility to choose either to show remove request, export request, or both in PHP Function
- ✅ Possibility to choose either to show remove request, export request, or both in Widget
- ✅ Filter Documentation
- ✅ CSS classes documentation
- ✅ Gutenberg Block
- ✅ Possibility to choose either to show remove request, export request, or both in Gutenberg Block

## Contributors 👥

- audrasjb
- whodunitagency
- xkon
- WordPress Core Privacy Team

## Documentation 📚

### Function: `wp_get_privacy_data_request_form()`

`$args` (array) An array of default Privacy Data Request Form arguments. Default: None.

Default parameters: see Filter/Parameters section below.

### Filter: `privacy_data_request_form_defaults`

#### Description

`privacy_data_request_form_defaults` filters the default form output arguments. It is part of the function `gdrf_data_request_form( $args )`.

#### Parameters

`$args` (array) (required) An array of default Privacy Data Request Form arguments. Default: None.

The defaults set in the `gdrf_data_request_form( $args )` function are as follows:

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

#### Example

```
add_filter( 'privacy_data_request_form_defaults', 'my_privacy_form' );
function my_privacy_form() {
	$args = array(
		'form_id'                => 'my_privacy_form_id'
		'label_select_request'   => 'Please select a request',
		'label_select_export'    => 'Export',
		'label_select_remove'    => 'Delete', 
		'label_input_captcha'    => 'Please prove you’re a human:',
		'value_submit'           => 'Send your request',
		'request_type'           => 'export',
	);
	return $args;
}
```

## Screenshots 🖼

### Gutenberg Block

Block available in Widget category:

![Admin Widget in the Widget Screen](https://jeanbaptisteaudras.com/images/gdrf/gdrf-gutenberg-1.png)

Block rendering in Post/Page back-end:

![Admin Widget in the Widget Screen](https://jeanbaptisteaudras.com/images/gdrf/gdrf-gutenberg-2.png)

### Admin Widget in the Widgets Screen

![Admin Widget in the Widget Screen](https://jeanbaptisteaudras.com/images/privacy-widget-admin.png)

### Public Widget Rendering in Twenty Nineteen (default styles)

![Public Widget Rendering in Twenty Nineteen (default styles)](https://jeanbaptisteaudras.com/images/privacy-widget-public.png)
