<?php
/*
Plugin Name: Formidable Forms Login Link with Redirect in Login Message 
Plugin URI: https://github.com/jvarn/formidable-custom-global-login-message
Description: Changes Global Login Message to include a login link that redirects user back to pre-login location
Version: 1.1.1
Author: Jeremy Varnham
Author URI: https://abuyasmeen.com/
*/

/*
Formidable Forms Login Link with Redirect in Login Message is dedicated to the 
public domain under the terms of the Creative Commons Zero v1.0 Universal Licence
and the author has waived all of his rights to the work worldwide under copyright
law, including all related and neighboring rights, to the extent allowed by law.

You can copy, modify, and distribute Formidable Forms Login Link with Redirect in 
Login Message, even for commercial purposes, all without asking permission.

See the Creative Commons Zero v1.0 Universal Licence for more details.

You should have received a copy of the Creative Commons Zero v1.0 Universal Licence
along with Formidable Forms Login Link with Redirect in Login Message. If not, please
see https://creativecommons.org/publicdomain/zero/1.0/.
*/
 
if ( ! defined( 'ABSPATH' ) ) {
	die( 'No direct access.' );
}

function jlv_ff_change_global_login_message( $message ) {
	if ( function_exists( 'load_formidable_forms' ) ) {

		$frm_settings = FrmAppHelper::get_settings();
		$frm_login_msg = $frm_settings->login_msg;
		
		if ( substr_count( $frm_login_msg, '*' ) == 2 ) {
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
}
add_filter( 'frm_global_login_msg', 'jlv_ff_change_global_login_message' );
