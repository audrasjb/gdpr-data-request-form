=== GDPR Data Request Form ===
Contributors: audrasjb,whodunitagency
Tags: GDPR, RGPD, privacy, form, data request, personal data request, export, personal data
Requires at least: 4.9.6
Tested up to: 4.9.6
Requires PHP: 5.4
Stable tag: 1.2
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Integrates WordPress Core 4.9.6 GDPR tools to allow users/visitors to request Personal Data export and erasure with front-end forms

== Description ==

This plugin uses WordPress Core tools for GDPR Compliance.

Since release 4.9.6, WordPress admin has some tools to handle Privacy User Requests. Administrators are able to create Data Request for every users in order to send or erase users data. This plugin allow website administrators to display Data Request Forms in front-end, for example in your Privacy Page.

Easily integrate a Personal Data Request Form for your visitors/users in front-end, with two options:
- Personal Data Export
- Personal Data Erasure

Easy to integrate:

- **Widget**
The widget allows to integrate Data Request Form in your theme widget areas. It comes with two options: Form Title and Form Description Paragraph. Both are empty by default so no title/description are displayed by default.

- **Shortcode**
`[gpdr-data-request]` shortcode allows to integrate Data Request Form everywhere you want, wether in a post or with PHP, using `echo do_shortcode( '[gpdr-data-request]' );` PHP snippet. This shortcode has no parameter.

- **Function** (planned release: 1.2 / next major release)
We’re currently working on some PHP functions to allow developers to customize front-end forms. This is slated to the next release.

- **Gutenberg Block** (planned release: 1.3)
We’re of course working on a Gutenberg block integration too :)

GDPR Data Request Form is using AJAX to provide clean and user-friendly forms in front-end. You can integrate them in your Privacy Page / Legal Notice with our shortcodes or in your sidebar/footer with our widgets.

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

= How to display Data Request Forms using shortcodes? =

Use our shortcode `[gpdr-data-request]` in your posts or pages.

= How to display Data Request Forms using widgets? =

Use our widget `GDPR Data Request Form` available on Widgets Screen.

= Can I use custom CSS styles for my GDPR Data Request Forms? =

Sure! This plugin only have CSS Styles for error/success messages. It will use your theme default CSS styles. Every HTML element of the form uses specific CSS classes so your can customize it as you need. There is no default CSS styles except for error/success messages.

= How can I manage Users Personal Data Request in WordPress Admin? =

Read this Make/Core post: https://wordpress.org/news/2018/05/wordpress-4-9-6-privacy-and-maintenance-release/ (English)
If you speak French, you can also read the post I wrote on Whodunit Agency’s Blog: https://www.whodunit.fr/wordpress-4-9-6-et-la-conformite-rgpd/ (French)
 
== Screenshots ==

1. Shortcode integration.
2. Front-end form feature.
3. Front-end form request succeed.
4. Confirmation email sent to the user/visitor.
5. Data requests screen updated in WordPress Admin.
6. The user/visitor confirmed this Data Request.
7. Website owner can email user/visitor personal data.
8. The user/visitor received an email with a download link.
9. Personal Data Export as received by the user/visitor.

== Changelog ==

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