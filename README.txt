=== GDPR Data Request Form ===
Contributors: audrasjb,whodunitagency,xkon
Tags: GDPR, RGPD, Gutenberg, block, privacy, form, data request, export, personal data
Requires at least: 4.9.6
Tested up to: 5.3
Requires PHP: 5.6
Stable tag: 1.4.2
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Use WordPress Core GDPR tools to build front-end Personal Data export/erasure forms (includes Widget, Gutenberg Block, shortcode & Hooks).

== Description ==

This plugin uses WordPress Core tools for GDPR Compliance.

Since release 4.9.6, WordPress admin has some tools to handle Privacy User Requests. Administrators are able to create Data Request for every users in order to send or erase users data. This plugin allow website administrators to display Data Request Forms in front-end, for example in your Privacy Policy Page.

Easily integrate a Personal Data Request Form for your visitors/users in front-end, with some options:
- Personal Data Export
- Personal Data Erasure
- Both of them

It’s easy to integrate:

- **Widget**
The widget allows to integrate Data Request Form in your theme widget areas. It comes with three options: Form Title, Form Description Paragraph and Form Type.

- **Gutenberg Block** (since 1.4!)
The Gutenberg Block make it even easier to integrate front-end forms in your website. The block allows you to choose the type of form you need.

- **Shortcode**
`[gpdr-data-request]` shortcode allows to integrate Data Request Form where you need. This shortcode has no parameter.

- **PHP Function**
`echo gdrf_data_request_form( $args )` function allows to integrate Data Request Form where you need. This function has some parameters and filters (see FAQ section below). Don’t forget to `echo` the function.

GDPR Data Request Form is using AJAX to provide clean and user-friendly forms in front-end. You can integrate them in any page of your website (like your Privacy Policy Page) or in your sidebar/footer.

**CAUTION: You need WordPress 4.9.6 at least to use this plugin!**

**Data Request Workflow:**

- The user/visitor use your Personal Data Request Form to ask for Personal Data Export or Erasure.
- A request is created in WordPress Tools > Export/Erase personal data.
- An email is sent to the user/visitor to confirm this request.
- The user request is set to Confirmed in Tools > Export/Erase personal data.
- An email is sent to the website administrator to validate the request.
- The personal data are sent by email to the user/visitor (as a 3-day available download link), or erased, depending on the user request type.

== Installation ==
1. Upload this plugin folder to the `/wp-content/plugins/` directory
2. Activate the plugin through "Plugins" WordPress menu: That's all, there is no settings!
3. To display Data Request Form, use our shortcode `[gpdr-data-request]` in your posts/pages or use our Widget `GDPR Data Request Form` available on "Widgets" Screen.

== Frequently Asked Questions ==
 
= Prerequisites =

**You need WordPress 4.9.6 at least to use this plugin.**

= Data Request Workflow =

- The user/visitor use your Personal Data Request Form to ask for Personal Data Export or Erasure.
- A `request` is created in WordPress Tools > Export/Erase personal data.
- An email is sent to the user to confirm this request.
- The user request is set to Confirmed in WordPress Tools > Export/Erase personal data.
- An email is sent to the website administrator to validate the request.
- The personal data are sent by email to the user/visitor (as a 3-day available download link), or erased, depending on the user request type.

= How to display Data Request Forms using the shortcode? =

Use our shortcode `[gdpr-data-request]` in your posts or pages.

= How to display Data Request Forms using the PHP function? =

Use our function: `echo gdrf_data_request_form()` in your theme/child theme.
This function has some parameters:

'form_id' (type String): ID of the <form> HTML element. Default: `gdrf-form`.
'label_select_request' (type String): label of the Request Type selector.
'label_select_export' (type String): label of the export option radio button.
'label_select_remove' (type String): label of the remove option radio button.
'label_input_email' (type String): label of the "email" required field.
'label_input_captcha' (type String): label of the "captcha" required field.
'value_submit' (type String): text of the submit form button.
'request_type' (type String): either you want to display the Export Personal Data Form, the Remove Personal Data Form, or to let the users choose their request by themselves.

See the documentation for further examples/use case: [GitHub Repository](https://github.com/audrasjb/gdpr-data-request-form)

= How to display Data Request Forms using widgets? =

Use our widget `GDPR Data Request Form` available on Widgets Screen.

= How to display Data Request Forms using Gutenberg Block? =

Use our `Privacy Request Block` Block available on any page/post using Gutenberg Block Editor.

= Can I use custom CSS styles for my GDPR Data Request Forms? =

Sure! This plugin only have CSS Styles for error/success messages. It will use your theme default CSS styles. Every HTML element of the form uses specific CSS classes so your can customize it as you need. There is no default CSS styles except for error/success messages.

= How can I manage Users Personal Data Request in WordPress Admin? =

Please read this [Make/Core post announcing 4.9.6 GDPR features (English)](https://wordpress.org/news/2018/05/wordpress-4-9-6-privacy-and-maintenance-release/).
If you speak French, you can also read the post I wrote on Whodunit Agency’s Blog: [WordPress 4.9.6 et la conformité RGPD (French)](https://www.whodunit.fr/wordpress-4-9-6-et-la-conformite-rgpd/)

= My language is not supported or partially, what can I do? =

This plugin is handled by the WordPress polyglot’s community. 
The plugin author is not responsible for translations or mistakes in other languages than English (and also French since this is my native language).
You can contribute to [translate GDPR Data Request Form in your native language here](https://translate.wordpress.org/projects/wp-plugins/gdpr-data-request-form) (and fix any mistakes/typos by yourself as well).

= How can I contribute to this plugin?  =

[This plugin is being developed on Github](https://github.com/audrasjb/gdpr-data-request-form).
Any comment, issue or pull request are more than welcome :)
You can also [open a support ticket](https://wordpress.org/support/plugin/gdpr-data-request-form) to ask for enhancements/bugfixes.

Lovely contributors: [@audrasjb (plugin author)](https://profiles.wordpress.org/audrasjb), [@juliobox](https://profiles.wordpress.org/juliobox), [@wolly](https://profiles.wordpress.org/wolly), [@presskopp](https://profiles.wordpress.org/presskopp), [@abdullahramzan](https://profiles.wordpress.org/abdullahramzan), [@xkon](https://profiles.wordpress.org/xkon).

== Screenshots ==

1. Front-end form feature.
2. Front-end form request succeed.
3. Specific Gutenberg Block available.
4. Gutenberg Block rendering in the editor.
5. Widget parameters.
4. Confirmation email sent to the user/visitor.
5. Data requests screen updated in WordPress Admin.
6. The user/visitor confirmed this Data Request.
7. Website owner can email user/visitor personal data.
8. The user/visitor received an email with a download link.
9. Personal Data Export as received by the user/visitor.

== Changelog ==

= 1.4.2 =
* Various WordPress coding standards enhancements. Props @leprincenoir for the patch: https://github.com/audrasjb/gdpr-data-request-form/pull/25

= 1.4.1 =
* Fix: Simplify form data serialization when submitting form with AJAX. Props @gonzomir for the patch: https://github.com/audrasjb/gdpr-data-request-form/pull/24

= 1.4 =
* New feature: introduce the Privacy Data Request Gutenberg Block.
* New feature: introduce `privacy_data_request_form_defaults` Filter to hook the default form parameters.
* Enhancement: new option on the Widget. Now you can choose the type of form you want to display.
* Coding standards improvements.

= 1.3 =
* Introduce gdrf_data_request_form() function.
* General code refactoring to prepare potential Core inclusion of the plugin.
* Introduce [gdpr-data-request] shortcode. Obviously, the old shortcake is still supported for backward compatibility.

= 1.2 =
* Replaces fixed captcha with a randomized one for better security.
* Adds function_exists to check if WP 4.9.6 is used before displaying the form.
* Fix some i18n strings
Thanks @juliobox, @presskopp and @abdullahramzan for feedbacks, fixes and implementations.

= 1.1 =
* Enqueue styles and scripts only when necessary (thanks @juliobox and @jmlapam for the feedback and few fixes)
* Removes CSS default color to radio button label (thanks @wolly for the feedback)

= 1.0.1 =
* Small fix on widget part (thanks @juliobox for his feedback)

= 1.0 =
* First version of this plugin: includes shortcode and widget to handle GDPR Personal Data Requests Form in front-end.