# Formidable Forms Custom Global Login Message
This Wordpress plugin changes the [Formidable Forms](https://formidableforms.com) global login message, which is displayed to logged out users when form permissions are set to "Logged in" and is usually set under Global Settings / Message Defaults.

The reason for using a function to modify this value rather than inserting a hyperlink directly into the settings is in order for the login link to include a redirect back to the user's pre-login location.

A comment under source 2 below gave a good tip to replace get_permalink with some alternative code in order to keep any query vars in the URL. This is especially useful if the Formidable Form is inserted within a the detail page of a Formidable View for example in the format `/PageWithView/ViewDetail/ID` this might be `/Staff/StaffDetail/25`. Get Permalink would give us `/Staff` but omit the rest, whereas the suggested code, included in this plugin, will maintain the entire link.

v1.1.0
Now instead of replacing the entire string with a hard-coded value, it will add the link to the string specified in the settings. It will search for a word between two asterisks, e.g. `You do not have permission to view this form, please *log in* to continue.` and apply the link the that word.

This draws from documented features:
 * Source 1 Formidable KB: [frm_global_login_message](https://formidableforms.com/knowledgebase/frm_global_login_msg/)
 * Source 2 Wordpress Developer Reference: [wp_login_url](https://developer.wordpress.org/reference/functions/wp_login_url/)
