<?php
/**
 * Main functions (preloader)
 *
 * @package Loader
 * @since 1.0.0
 */

// No direct access, please.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}


/**
 * Load script
 *
 * @package Loader
 * @since 1.0.0
 */


function loader_preload_script() {
    wp_enqueue_script( 'hover_loader_script', plugin_dir_url( __FILE__ ) . 'assets/js/hover-loader.min.js');
}
if ( get_theme_mod('enable_preload' , 1) == 1 ) {
   add_action('wp_enqueue_scripts', 'loader_preload_script');
}

function loader_load_jquery($value=''){
wp_enqueue_script("jquery");
}
add_action('wp_enqueue_scripts', 'loader_load_jquery');

if ( get_theme_mod('enable_preloader', 1 ) == 1 ) {
	

/**
 * Preloader Script
 *
 * @version	1.2.2
 * @since 1.0.0
 * @package	Loader
 */
function loader_script() {
 echo'
 <script>
 if(self==top){jQuery(document).ready(function(d){d(window).load(function(){d("#bbpreloading").addClass("hidepreloader")})});}
 else{
 jQuery(document).ready(function(l){l(window).ready(function(){
  setInterval(function(){ 
    l("#bbpreloading").addClass("hidepreloader")
  }, 2000);
});});
}
</script>';
}



	

/**
 * Preloader Only Home Script
 *
 * @version	1.2.2
 * @since 1.2.2
 * @package	Loader
 */
function loader_home_script() {
	$home_url = get_home_url();
 echo'
 <script>
if ( window.location.href ==  "'. $home_url . '/" ){
jQuery(document).ready(function(d){d(window).load(function(){d("#bbpreloading").addClass("hidepreloader")})});
}

if ( window.location.href !==  "'. $home_url . '/" ){
jQuery(document).ready(function(l){ l("#bbpreloading").remove(); });
}
</script>';
}



/**
 * Preloader Html
 *
 * @version	1.2.2
 * @since 1.0.0
 * @package	Loader
 */

function loader_html() {
	 echo'<!- Loader Preloader ->';
	 echo'<div id="bbpreloading" class="bbpreloading">';
	 echo'<div class="spinner"></div>';
	 echo'<div class="random-quote">';
	 loader_quote();
	 echo'</div>';
	 echo'</div>'
;}

function loader_3_html() {
	 echo'<!- Loader Preloader ->';
	 echo'<div id="bbpreloading" class="bbpreloading">';
	 echo'<div class="loader-loader"><div></div><div></div></div>';
	 echo'<div class="random-quote">';
	 loader_quote();
	 echo'</div>';
	 echo'</div>'
;}

function loader_4_html() {
	 echo'<!- Loader Preloader ->';
	 echo'<div id="bbpreloading" class="bbpreloading">';
	 echo'<div class="loader-loader"><div></div><div></div><div></div><div></div></div>';
	 echo'<div class="random-quote">';
	 loader_quote();
	 echo'</div>';
	 echo'</div>'
;}

function loader_6_html() {
	 echo'<!- Loader Preloader ->';
	 echo'<div id="bbpreloading" class="bbpreloading">';
	 echo'	<div class="spinner">
			  <div class="bounce-1"></div>
			  <div class="bounce-2"></div>
			</div>';
	 echo'<div class="random-quote">';
	 loader_quote();
	 echo'</div>';
	 echo'</div>'
;}



function loader_image_html() {
	 echo'<!- Loader Preloader ->';
	 echo'<div id="bbpreloading" class="bbpreloading">';
	 ?>
	 <div class="loader-image"><img class="loader-img-ani" src="<?php echo esc_url( get_theme_mod( 'loader_image' ) ); ?>" alt="Loading..."></div>
	 <?php
	 echo'<div class="random-quote">';
	 loader_quote();
	 echo'</div>';
	 echo'</div>'
;}


/**
 * Preloader Quotes
 *
 * @version	1.2.2
 * @since 1.0.0
 * @package	Loader
 */

function loader_quotes() {

	$quotes = get_theme_mod('loader_all_quotes' , 'I am Loader!');

	// Split lines
	$quotes = explode( "\n", $quotes );

	// Randomly choose a line
	return wptexturize( $quotes[ mt_rand( 0, count( $quotes ) - 1 ) ] );
}

// Show the line on preloader
function loader_print_one_quote() {
	$chosen = loader_quotes();

	echo $chosen;
}



// Add script to footer
if ( get_theme_mod('only_home' , 0) == 1 ) {
	add_action('wp_head', 'loader_home_script');
} else{
	add_action('wp_footer', 'loader_script');
}



// Call the quote on preloader if enabled.
if ( get_theme_mod('enable_quotes' , 1) == 1 ) {
	add_action( 'loader_quote', 'loader_print_one_quote' );
}



/**
 * Add html detecting user choice
 *
 * @version	1.2.2
 * @since 1.0.0
 * @package	Loader
 */

if ( get_theme_mod('loader_style_select' , 1) == 1) {

	// Check if the wp_body_hook is available
	if(has_action('wp_body_open')) {

	// If avaibale add html after body tag
	add_action('wp_body_open', 'loader_html');

	} else {

	// Else add html to head
	add_action('wp_head', 'loader_html');
}
}


if ( get_theme_mod('loader_style_select') == 2) {

	// Check if the wp_body_hook is available
	if(has_action('wp_body_open')) {

	// If avaibale add html after body tag
	add_action('wp_body_open', 'loader_html');

	} else {

	// Else add html to head
	add_action('wp_head', 'loader_html');
}
}


if ( get_theme_mod('loader_style_select') == 3) {

	// Check if the wp_body_hook is available
	if(has_action('wp_body_open')) {

	// If avaibale add html after body tag
	add_action('wp_body_open', 'loader_3_html');

	} else {

	// Else add html to head
	add_action('wp_head', 'loader_3_html');
}
}


if ( get_theme_mod('loader_style_select') == 4) {

	// Check if the wp_body_hook is available
	if(has_action('wp_body_open')) {

	// If avaibale add html after body tag
	add_action('wp_body_open', 'loader_4_html');

	} else {

	// Else add html to head
	add_action('wp_head', 'loader_4_html');
}
}


if ( get_theme_mod('loader_style_select') == 5) {

	// Check if the wp_body_hook is available
	if(has_action('wp_body_open')) {

	// If avaibale add html after body tag
	add_action('wp_body_open', 'loader_html');

	} else {

	// Else add html to head
	add_action('wp_head', 'loader_html');
}
}

if ( get_theme_mod('loader_style_select') == 6) {

	// Check if the wp_body_hook is available
	if(has_action('wp_body_open')) {

	// If avaibale add html after body tag
	add_action('wp_body_open', 'loader_6_html');

	} else {

	// Else add html to head
	add_action('wp_head', 'loader_6_html');
}
}


if ( get_theme_mod('loader_style_select') == 'image') {

	// Check if the wp_body_hook is available
	if(has_action('wp_body_open')) {

	// If avaibale add html after body tag
	add_action('wp_body_open', 'loader_image_html');

	} else {

	// Else add html to head
	add_action('wp_head', 'loader_image_html');
}
}
}