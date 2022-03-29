=== Formidable Form Change Login Message ===
Contributors: jvarn13
Tags: formidable
Requires at least: 1.5
Tested up to: 5.9.2
Stable tag: trunk
License: Creative Commons Zero v1.0 Universal
License URI: https://creativecommons.org/publicdomain/zero/1.0/

== Description ==

Changes the Formidable Forms global login message displayed to logged out users when form permissions are set to "Logged in" to include a login link.

== Installation ==

1. Upload plugin files to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Open Formidable Forms Global Settings and select Message Defaults
4. In the Login Message, add asterisks around the word or words to which you want to apply the link, e.g. Please *sign in* to view this form.

== Frequently Asked Questions ==
None

== Changelog ==

= 1.1.1 =
* Added no direct access check
* Added check for formidable forms plugin
* Added CC licence information
* Updated WP tested version
= 1.1.0 =
* Uses *string* in settings to define link position instead of replacing entire message
= 1.0.0 =
* First release