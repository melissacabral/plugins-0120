<?php 
/*
Plugin Name: MMC Greetings Bar
Description: Puts an announcement bar across the top of the site
Author: Melissa Cabral
Version: 0.1
License: GPLv3
*/

//HTML output for the bar
add_action( 'wp_footer', 'greeting_html' );
function greeting_html(){
	?>
	<div id="greetings-bar">
		<p>This is the call to action</p>
		<a href="#" class="greetings-button">Click Here</a>
	</div>
	<?php
}

//Attach CSS/JS 
add_action( 'wp_enqueue_scripts', 'greeting_scripts' );
function greeting_scripts(){
	//absolute URL to the file
	$css = plugins_url( 'css/greeting-style.css', __FILE__ );
	wp_enqueue_style( 'greeting-style', $css );
}
