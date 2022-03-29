<?php
/*
Plugin Name: Formidable Forms Login Message
Plugin URI: https://github.com/jvarn/formidable-custom-global-login-message
Description: Changes Global Login Message to include a login link
Version: 1.1.0
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
	$frm_settings = FrmAppHelper::get_settings();
	$frm_login_msg = $frm_settings->login_msg;
	
	if ( substr_count( $frm_login_msg, '*') == 2 ) {
		$frm_login_msg_array = explode( "*", $frm_login_msg );
		
		$current_url = home_url( add_query_arg( [], $GLOBALS['wp']->request ) ); // get_permalink() doesn't include query vars
		
		$message = $frm_login_msg_array[0];
	    $message .= '<a href="' . esc_url( wp_login_url( $current_url ) ) . '" alt="' . esc_attr__( 'Login', 'Wordpress' ) . '">';
		$message .= $frm_login_msg_array[1];
		$message .= '</a>';
		$message .= $frm_login_msg_array[2];
		
	    return $message;
    } else {
	    return $frm_login_msg;
    }
}
add_filter( 'frm_global_login_msg', 'jlv_ff_change_global_login_message' );
