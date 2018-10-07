<?php
/**
 * Footer credits
 */
function theme_footer_credits() {
	echo '<a href="' . esc_url( __( 'http://wordpress.org/', 'oblique' ) ) . '" rel="nofollow">';
	/* translators: WordPress 
		printf( __( 'Proudly powered by %s', 'oblique' ), 'Me' );*/
	echo '</a>';
	//echo '<span class="sep"> | </span>';
	/* translators: 1 - Theme author 2 - Theme name */
	printf( __( 'Theme: %2$s by %1$s.', 'oblique' ), '<a href="https://www.linkedin.com/in/pierre-vanlierde-b2a637a4/</a>" rel="nofollow">Pierre Vanlierde', 'Liverdan' );
	//echo '<span class="sep"> | </span></div>';
}
add_action( 'theme_footer', 'theme_footer_credits' );

include('inc/form_function.php');

/**
 * Activation CDN Jquery et Jquery_UI
*/

function jquery_jquery_ui() {
 //if (!is_admin()) {
  //wp_deregister_script('jquery');

  // Google API (CDN)
  //wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js', false, '3.3.1', true);
  wp_register_script('jquery-ui', 'https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js', array('jquery'), "1.12.1", true);

  //wp_enqueue_script('jquery');
  wp_enqueue_script('jquery-ui');
 }
//}
add_action('init', 'jquery_jquery_ui');


function executeJQ(){
 wp_register_script("custom", get_template_directory_uri()."/js/executeJQ.js", array("jquery", "jquery-ui"), "2018.07.11", true);
 wp_enqueue_script("custom");
}

add_action("init", "executeJQ"); 

?>