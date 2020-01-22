<?php
/*
Plugin Name: MMC Portfolio CPT
Description: Adds a custom post type for portfolio pieces
Author: Melissa Cabral
Version: 0.1
License: GPLv3
*/

add_action( 'init', 'mmc_register_cpt' );
function mmc_register_cpt(){
	register_post_type( 'portfolio_piece', array(
		'public' 			=> true,
		'label' 			=> 'Portfolio',
		'menu_position'		=> 5,
		'menu_icon'			=> 'dashicons-format-gallery',
		'has_archive'		=> true,
		'show_in_rest'		=> true, //use new editor
		'supports'			=> array( 'title', 'editor', 'thumbnail', 'excerpt', 
									'revisions', 'custom-fields' ),
		'rewrite'			=> array( 'slug' => 'portfolio' ), //custom URL
		'labels'			=> array(
									'name' 			=> 'Portfolio',
									'singular_name' => 'Portfolio Piece',
									'add_new_item'	=> 'Add New Portfolio Piece',
									'not_found'		=> 'No Pieces Found',
								),
	) );

	register_taxonomy( 'work_type', 'portfolio_piece', array(
		'labels' => array(
						'name' => 'Work Types',
						'singular_name' => 'Work Type',
						'search_items'	=> 'Search Types',
						'add_new_item'	=> 'Add New Work Type',
						'not_found'		=> 'No Work Types Found',
					),
		'show_in_rest' => true, //make it work with the new editor
		'hierarchical' => true, //checkbox-style interface
		'show_admin_column' => true,
	) );
}

//Make this plugin fix 404 errors when it activates
function mmc_flush_links(){
	mmc_register_cpt();
	flush_rewrite_rules();
}
register_activation_hook( __FILE__, 'mmc_flush_links' );
