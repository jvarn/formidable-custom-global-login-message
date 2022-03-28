<?php
/*
Plugin Name: Formidable Forms Login Message
Plugin URI: https://github.com/jvarn/formidable-custom-global-login-message
Description: Changes Global Login Message to include a login link
Version: 1.0.0
Author: Jeremy Varnham
Author URI: https://abuyasmeen.com/
*/

/**
 * Change the Formidable Forms global login message 
 * displayed when form permissions are set to "Logged in"
 * to include a login link with redirect back to pre-login location
 *
 * @source https://formidableforms.com/knowledgebase/frm_global_login_msg/
 * @source https://developer.wordpress.org/reference/functions/wp_login_url/
 */

function jlv_ff_change_global_login_message( $message ) {
	$current_url = home_url( add_query_arg( [], $GLOBALS['wp']->request ) ); // get_permalink() doesn't include query vars
	$message = 'Please ';
  $message .= '<a href="' . esc_url( wp_login_url( $current_url ) ) . '" alt="' . esc_attr__( 'Login', 'Formidable' ) . '">'; // login url uses current url to redirect back where they were after login
  $message .= __( 'Login', 'Formidable' );
	$message .= '</a>';
	$message .= ' before filling this form.';
  
  return $message;
}
add_filter( 'frm_global_login_msg', 'jlv_ff_change_global_login_message' );
